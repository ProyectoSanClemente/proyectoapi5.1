<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImpresoraRequest;
use App\Http\Requests\UpdateImpresoraRequest;
use App\Libraries\Repositories\ImpresoraRepository;
use App\Libraries\Repositories\UsuarioRepository;
use Flash;
use Response;
use Auth;

class ImpresoraController extends Controller
{

	/** @var  ImpresoraRepository */
	private $impresoraRepository;
	/** @var  usuarioRepository */
	private $usuarioRepository;

	
	function __construct(ImpresoraRepository $impresoraRepo,UsuarioRepository $usuarioRepo)
	{
		$this->impresoraRepository = $impresoraRepo;
		$this->usuarioRepository = $usuarioRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only' => ['edit','create','delete','show']]);
	}

	/**
	 * Display a listing of the Impresora.
	 *
	 * @return Response
	 */
	public function index()
	{

		$impresoras = $this->impresoraRepository->all();

		return view('impresoras.index')
			->with('impresoras', $impresoras);
	}

	/**
	 * Show the form for creating a new Impresora.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$usuario= $this->usuarioRepository->find($id);
		return view('impresoras.create')->with('usuario',$usuario);
	}

	/**
	 * Store a newly created Impresora in storage.
	 *
	 * @param CreateImpresoraRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateImpresoraRequest $request)
	{
		$input = $request->all();
		$usuario=$this->usuarioRepository->findBy('accountname',$input['accountname']);
		foreach ($usuario->Impresoras as $key => $impresora) {
			if($impresora->modelo_impresora==$input['modelo_impresora']){
				Flash::warning('Error, ésta Impresora ya se encuentra asignada a éste Usuario.');
				return redirect(route('usuarios.index'));
			}
		}
		$input['id_usuario']=$usuario->id;
		$impresora = $this->impresoraRepository->create($input);
		Flash::success('Impresora agregada satisfactoriamente.');
		return redirect(route('impresoras.index'));		
	}

	/**
	 * Display the specified Impresora.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$impresora = $this->impresoraRepository->find($id);

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras.show')->with('impresora', $impresora);
	}

	/**
	 * Show the form for editing the specified Impresora.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$impresora = $this->impresoraRepository->find($id);

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras.edit')->with('impresora', $impresora)
										->with('id',$id);
	}

	/**
	 * Update the specified Impresora in storage.
	 *
	 * @param  int              $id
	 * @param UpdateImpresoraRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateImpresoraRequest $request)
	{
		$impresora = $this->impresoraRepository->find($id);
		$input = $request->all();

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}
		$usuario = $this->usuarioRepository->find($impresora->id_usuario);//Buscando todas las impresoras de un usuario
		foreach ($usuario->Impresoras as $key => $impresora) { 
			if($impresora->modelo_impresora==$input['modelo_impresora']){ 
				if(!($id==$impresora->id)) //Si el modelo a asignar ya esta asignado
					$this->impresoraRepository->delete($id);
			}
		}
		
		$this->impresoraRepository->updateRich($input, $id);
		
		Flash::success('Impresora actualizada satisfactoriamente.');
		
		return redirect(route('impresoras.index'));
	}

	/**
	 * Remove the specified Impresora from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$impresora = $this->impresoraRepository->find($id);

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		$this->impresoraRepository->delete($id);

		Flash::success('Impresora borrada satisfactoriamente.');

		return redirect(route('impresoras.index'));
	}
	public function imprimir()
	{
		$impresoras = $this->impresoraRepository->findAllBy('accountname',Auth::user()->accountname);
		return view('impresoras.imprimir')
			->with('impresoras',$impresoras);
	}
}
