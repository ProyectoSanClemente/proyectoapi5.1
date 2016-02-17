<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Libraries\Repositories\CuentaRepository;
use App\Libraries\Repositories\UsuarioRepository;
use Flash;
use Response;
use App\Models\Usuario;
use Auth;

class CuentaController extends Controller
{

	/** @var  CuentaRepository */
	private $cuentaRepository;
	private $usuarioRepository;

	function __construct(CuentaRepository $cuentaRepo,UsuarioRepository $usuarioRepo)
	{
		$this->cuentaRepository = $cuentaRepo;
		$this->usuarioRepository = $usuarioRepo;
	}

	/**
	 * Display a listing of the Cuenta.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cuentas = $this->cuentaRepository->all();
		return view('cuentas.index')
			->with('cuentas', $cuentas);
	}

	/**
	 * Show the form for creating a new Cuenta.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$usuario= $this->usuarioRepository->find($id);
		
		$cuenta=$usuario->Cuenta->first();
		
		if($cuenta){//Si es que ya tiene asociada cuentas			
			return redirect(route('cuentas.edit', $cuenta->id));
		}
		else{
			return view('cuentas.create')
				->with('usuario',$usuario);
		}
	}

	/**
	 * Store a newly created Cuenta in storage.
	 *
	 * @param CreateCuentaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCuentaRequest $request)
	{
		$input = $request->all();
		
		$cuenta = $this->cuentaRepository->create($input);
		
		Flash::success('Cuenta agregada satisfactoriamente.');
		
		return redirect(route('cuentas.index'));
	}
	/**
	 * Display the specified Cuenta.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta no encontrada.');

			return redirect(route('cuentas.index'));
		}

		return view('cuentas.show')->with('cuenta', $cuenta);
	}

	/**
	 * Show the form for editing the specified Cuenta.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$cuenta = $this->cuentaRepository->find($id);
		if(empty($cuenta))
		{
			return var_dump($cuenta);
			Flash::error('Cuenta no encontrada.');

			return redirect(route('cuentas.index'));
		}

		return view('cuentas.edit')
			->with('cuenta', $cuenta)
			->with('usuario',$cuenta->usuario);
	}

	/**
	 * Update the specified Cuenta in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCuentaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCuentaRequest $request)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta no encontrada.');

			return redirect(route('cuentas.index'));
		}

		$this->cuentaRepository->updateRich($request->all(), $id);

		Flash::success('Cuenta actualizada satisfactoriamente.');

		return redirect(route('cuentas.index'));
	}

	/**
	 * Remove the specified Cuenta from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta no encontrada.');

			return redirect(route('cuentas.index'));
		}

		$this->cuentaRepository->delete($id);

		Flash::success('Cuenta borrada satisfactoriamente.');

		return redirect(route('cuentas.index'));
	}

	//Comienzo Envio datos de cuentas
	public function glpi($id)
	{
		//$informacion = $this->cuentaRepository->find();
		return view('cuentas.glpi')
			->with('info',$informacion);
	}

	public function sidam()
	{
		$id=Auth::user()->id;
		$cuenta = $this->usuarioRepository->find($id)->Cuenta->first();
		return view('cuentas.sidam')
			->with('id',$cuenta->id_sidam)
			->with('pass',$cuenta->pass_sidam);	
		
	}

	public function owncloud()
	{	
		$accountname=Auth::user()->accountname;
		return view('cuentas.owncloud')
			->with('nombre',$accountname);
	}

	public function zimbra()
	{
		$id=Auth::user()->id;
		$cuenta = $this->usuarioRepository->find($id)->Cuenta->first();
		return view('cuentas.zimbra')
			->with('nombre',$cuenta->id_zimbra);
	}

	public function crecic()
	{
		$accountname=Auth::user()->accountname;
		return view('cuentas.crecic')
			->with('nombre',$accountname);
	}

	public function solicitudcompras()
	{
		$id=Auth::user()->id;
		$cuenta = $this->usuarioRepository->find($id)->Cuenta->first();		
		return view('cuentas.solicitudcompras')
			->with('id',$cuenta->id_sidam)
			->with('pass',$cuenta->pass_sidam);
	}
}
