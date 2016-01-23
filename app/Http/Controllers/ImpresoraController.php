<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImpresoraRequest;
use App\Http\Requests\UpdateImpresoraRequest;
use App\Libraries\Repositories\ImpresoraRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Libraries\Repositories\UsuarioRepository;

class ImpresoraController extends AppBaseController
{

	/** @var  ImpresoraRepository */
	private $impresoraRepository;

	function __construct(ImpresoraRepository $impresoraRepo)
	{
		$this->impresoraRepository = $impresoraRepo;
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
		return view('impresoras.create')->with('id',$id);
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
		$duplicade = FALSE;
		$input = $request->all();
		$busqueda = $this->impresoraRepository->findAllBy('modelo_impresora',$input['modelo_impresora']);
		foreach ($busqueda as $impresoraa) {
			if ($impresoraa->accountname==$input['accountname']) {
					$duplicade = TRUE;
					}		
		}
		if($duplicade)
		{
			Flash::warning('Error, ésta Impresora ya se encuentra asignada a éste Usuario.');

			return redirect(route('usuarios.index'));
		}
		else{
			$impresora = $this->impresoraRepository->create($input);	

			Flash::success('Impresora agredada satisfactoriamente.');

			return redirect(route('impresoras.index'));
		}
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
	public function imprimir($id)
	{
		# code...
	}
}
