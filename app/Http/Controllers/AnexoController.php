<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAnexoRequest;
use App\Http\Requests\UpdateAnexoRequest;
use App\Libraries\Repositories\AnexoRepository;
use Flash;
use Response;
use Auth;

class AnexoController extends Controller
{

	/** @var  anexoRepository */
	private $anexoRepository;

	function __construct(AnexoRepository $anexoRepo)
	{
		$this->anexoRepository = $anexoRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the anexo.
	 *
	 * @return Response
	 */
	public function index()
	{

		$anexos = $this->anexoRepository->all();

		return view('anexos.index')
			->with('anexos', $anexos);
	}

	/**
	 * Show the form for creating a new anexo.
	 *
	 * @return Response
	 */
		public function create()
	{
		return view('anexos.create');
	}

	/**
	 * Store a newly created anexo in storage.
	 *
	 * @param CreateanexoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAnexoRequest $request)
	{
		$input = $request->all();
		
		$anexo = $this->anexoRepository->create($input);
		
		Flash::success('anexo agregada satisfactoriamente.');
		
		return redirect(route('anexos.index'));
	}
	
	/**
	 * Display the specified anexo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$anexo = $this->anexoRepository->find($id);

		if(empty($anexo))
		{
			Flash::error('anexo no encontrada.');

			return redirect(route('anexos.index'));
		}

		return view('anexos.show')->with('anexo', $anexo);
	}

	/**
	 * Show the form for editing the specified anexo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{

		$anexo = $this->anexoRepository->find($id);

		if(empty($anexo))
		{
			Flash::error('anexo no encontrada.');

			return redirect(route('anexos.index'));
		}

		//Validamos que tenga los permisos o este asignando su propia anexo
		if($anexo->id_usuario!=Auth::id() && Auth::user()->rol!='admin')
			throw new Exception("No posee los privilegios para editar las anexo asignadas de otros usuarios");

		return view('anexos.edit')
			->with('anexo', $anexo);
	}

	/**
	 * Update the specified anexo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateanexoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAnexoRequest $request)
	{
		$anexo = $this->anexoRepository->find($id);

		if(empty($anexo))
		{
			Flash::error('anexo no encontrada.');

			return redirect(route('anexos.index'));
		}

		$this->anexoRepository->updateRich($request->all(), $id);

		Flash::success('anexo actualizada satisfactoriamente.');

		return redirect(route('anexos.index'));
	}

	/**
	 * Remove the specified anexo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$anexo = $this->anexoRepository->find($id);

		if(empty($anexo))
		{
			Flash::error('anexo no encontrada.');

			return redirect(route('anexos.index'));
		}

		$this->anexoRepository->delete($id);

		Flash::success('anexo borrada satisfactoriamente.');

		return redirect(route('anexos.index'));
	}
}