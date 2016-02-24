<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Libraries\Repositories\CuentaRepository;
use App\Libraries\Repositories\UsuarioRepository;
use Flash, Response, Auth, Exception;

class CuentaController extends Controller
{
	/** @var  CuentaRepository */
	private $cuentaRepository;
	/** @var  UsuarioRepository */
	private $usuarioRepository;

	function __construct(CuentaRepository $cuentaRepo,UsuarioRepository $usuarioRepo)
	{
		$this->cuentaRepository = $cuentaRepo;
		$this->usuarioRepository = $usuarioRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only'=>['destroy']]);	
	}

	/**
	 * Display a listing of the Cuenta.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id=Auth::id();
		$cuenta=null;
		if($this->usuarioRepository->hasCuenta($id))
			$cuenta=$this->usuarioRepository->Cuenta($id);

		$cuentas = $this->cuentaRepository->all();
		return view('cuentas.index')
			->with('cuentas', $cuentas)
			->with('cuenta',$cuenta);
	}

	/**
	 * Show the form for creating a new Cuenta.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		//Validamos que tenga los permisos o este asignando su propia cuenta
		if(Auth::user()->id!=$id && Auth::user()->rol!='admin')
			throw new Exception("No posee los privilegios para asignar cuentas a otros usuarios");

		$usuario= $this->usuarioRepository->find($id);
		
		if($this->usuarioRepository->hasCuenta($id)){//Si es que ya tiene asociada cuenta
			$cuenta=$this->usuarioRepository->Cuenta($id);
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
		//Validamos que tenga los permisos o este asignando su propia cuenta
		if(Auth::user()->id!=$id && Auth::user()->rol!='admin')
			throw new Exception("No posee los privilegios para editar las cuentas asignadas de otros usuarios");
		$cuenta = $this->cuentaRepository->find($id);
		if(empty($cuenta))
		{
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
	public function glpi()
	{
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		return view('cuentas.glpi')
			->with('user',$cuenta->id_glpi)
			->with('pass',$cuenta->pass_glpi);		
	}

	public function sidam()
	{	
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'sidam');
		return view('cuentas.sidam')
			->with('user',$cuenta->id_sidam)
			->with('pass',$cuenta->pass_sidam);
		
		
	}

	public function owncloud()
	{	
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'owncloud');
		return view('cuentas.owncloud')
			->with('user',$cuenta->id_sidam)
			->with('pass',$cuenta->pass_sidam);
	}

	public function zimbra()
	{
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'zimbra');
		return view('cuentas.zimbra')
				->with('user',$cuenta->id_zimbra)
				->with('pass',$cuenta->pass_zimbra);
	}

	public function crecic()
	{
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'crecic');
		return view('cuentas.crecic')
				->with('user',$cuenta->id_crecic)
				->with('pass',$cuenta->pass_crecic);
	}

	public function solicitudcompras()
	{
		$this->tienecuentas();
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'solicitudcompras');
		return view('cuentas.solicitudcompras')
			->with('user',$cuenta->id_solicitudcompras)
			->with('pass',$cuenta->pass_solicitudcompras);
	}


	public function tienecuentas()
	{
		if(!$this->usuarioRepository->hasCuenta(Auth::user()->id))
		{
			throw new Exception("El usuario no tiene Cuentas Asignadas");
		}
	}

}
