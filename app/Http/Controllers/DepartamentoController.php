<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Libraries\Repositories\DepartamentoRepository;
use Flash;
use Response;

class DepartamentoController extends Controller
{

	/** @var  DepartamentoRepository */
	private $DepartamentoRepository;

	function __construct(DepartamentoRepository $departamentoRepo)
	{
		$this->DepartamentoRepository = $departamentoRepo;
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the departamento.
	 *
	 * @return Response
	 */
	public function index()
	{

		$departamentos = $this->DepartamentoRepository->all();

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
	 * @param CreateDepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDepartamentoRequest $request)
	{
		$input = $request->all();
		
		$departamento = $this->DepartamentoRepository->create($input);
		
		Flash::success('Departamento agregado satisfactoriamente.');
		
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
		$departamento = $this->DepartamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('Departamento no encontrado.');

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

		$departamento = $this->DepartamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('Departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		return view('departamentos.edit')
			->with('departamento', $departamento);
	}

	/**
	 * Update the specified departamento in storage.
	 *
	 * @param  int              $id
	 * @param UpdateDepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateDepartamentoRequest $request)
	{
		$departamento = $this->DepartamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('Departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		$this->DepartamentoRepository->updateRich($request->all(), $id);

		Flash::success('Departamento actualizado satisfactoriamente.');

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
		$departamento = $this->DepartamentoRepository->find($id);

		if(empty($departamento))
		{
			Flash::error('Departamento no encontrado.');

			return redirect(route('departamentos.index'));
		}

		$this->DepartamentoRepository->delete($id);

		Flash::success('Departamento borrado satisfactoriamente.');

		return redirect(route('departamentos.index'));
	}
}