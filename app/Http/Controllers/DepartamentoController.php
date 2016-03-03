<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAnexoRequest;
use App\Http\Requests\UpdateAnexoRequest;
use App\Libraries\Repositories\departamentoRepository;
use Flash;
use Response;

class DepartamentoController extends Controller
{

	/** @var  departamentoRepository */
	private $departamentoRepository;

	function __construct(departamentoRepository $departamentoRepo)
	{
		$this->departamentoRepository = $departamentoRepo;
		$this->middleware('auth');
		$this->middleware('admin',['except'=>['index']]);
	}

	/**
	 * Display a listing of the departamento.
	 *
	 * @return Response
	 */
	public function index()
	{

		$departamentos = $this->departamentoRepository->all();

		return view('departamentos.index')
			->with('departamentos', $departamentos);
	}

	/**
	 * Show the form for creating a new departamento.
	 *
	 * @return Response
	 */
		public function create()
	{
		return view('departamentos.create');
	}

	/**
	 * Store a newly created departamento in storage.
	 *
	 * @param CreateanexoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAnexoRequest $request)
	{
		$input = $request->all();
		
		$departamento = $this->departamentoRepository->create($input);
		
		Flash::success('departamento agregada satisfactoriamente.');
		
		return redirect(route('departamentos.index'));
	}
	
	/**
	 * Display the specified departamento.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$departamento = $this->departamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		return view('departamentos.show')->with('departamento', $departamento);
	}

	/**
	 * Show the form for editing the specified departamento.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{

		$departamento = $this->departamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		return view('departamentos.edit')
			->with('departamento', $departamento);
	}

	/**
	 * Update the specified departamento in storage.
	 *
	 * @param  int              $id
	 * @param UpdateanexoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAnexoRequest $request)
	{
		$departamento = $this->departamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		$this->departamentoRepository->updateRich($request->all(), $id);

		Flash::success('departamento actualizada satisfactoriamente.');

		return redirect(route('departamentos.index'));
	}

	/**
	 * Remove the specified departamento from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento = $this->departamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		$this->departamentoRepository->delete($id);

		Flash::success('departamento borrada satisfactoriamente.');

		return redirect(route('departamentos.index'));
	}
}