<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSistemaRequest;
use App\Http\Requests\UpdateSistemaRequest;
use App\Libraries\Repositories\SistemaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use Input;
use Image;

class SistemaController extends AppBaseController
{

	/** @var  SistemaRepository */
	private $sistemaRepository;

	function __construct(SistemaRepository $sistemaRepo)
	{
		$this->sistemaRepository = $sistemaRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only' => ['edit','create','delete','show']]);
	}

	/**
	 * Display a listing of the Sistema.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sistemas = $this->sistemaRepository->all();

		return view('sistemas.index')
			->with('sistemas', $sistemas);
	}

	/**
	 * Show the form for creating a new Sistema.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sistemas.create');
	}

	/**
	 * Store a newly created Sistema in storage.
	 *
	 * @param CreateSistemaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSistemaRequest $request)
	{
		$input = $request->all();

		$filename = 'images/sistemas/'.$input['nombre_sistema'].'.jpg';
		$input['imagen_sistema']=$filename;
	    Image::make(Input::file('imagen_sistema'))->resize(400, 300)->save($filename);

		$sistema = $this->sistemaRepository->create($input);

		Flash::success('Sistema agregado satisfactoriamente.');

		return redirect(route('sistemas.index'));
	}

	/**
	 * Display the specified Sistema.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sistema = $this->sistemaRepository->find($id);

		if(empty($sistema))
		{
			Flash::error('Sistema no encontrado.');

			return redirect(route('sistemas.index'));
		}

		return view('sistemas.show')->with('sistema', $sistema);
	}

	/**
	 * Show the form for editing the specified Sistema.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$sistema = $this->sistemaRepository->find($id);

		if(empty($sistema))
		{
			Flash::error('Sistema no encontrado.');

			return redirect(route('sistemas.index'));
		}

		return view('sistemas.edit')->with('sistema', $sistema);
	}

	/**
	 * Update the specified Sistema in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSistemaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSistemaRequest $request)
	{
		$sistema = $this->sistemaRepository->find($id);
		$input = $request->all();
		if(empty($sistema))
		{
			Flash::error('Sistema no encontrado.');

			return redirect(route('sistemas.index'));
		}

		if (Input::hasFile('imagen_sistema'))
		{
			if(file_exists($sistema->imagen_sistema))
				unlink($sistema->imagen_sistema);
	    	$input['imagen_sistema']='images/sistemas/'.$input['nombre_sistema'].'.jpg';
	    	Image::make(Input::file('imagen_sistema'))->resize(640, 480)->save($input['imagen_sistema']);
	    }

		$this->sistemaRepository->updateRich($input, $id);

		Flash::success('Sistema actualizado satisfactoriamente.');

		return redirect(route('sistemas.index'));
	}

	/**
	 * Remove the specified Sistema from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$sistema = $this->sistemaRepository->find($id);

		if(empty($sistema))
		{
			Flash::error('Sistema no encontrado');

			return redirect(route('sistemas.index'));
		}

		$this->sistemaRepository->delete($id);
		if(file_exists($sistema->imagen_sistema))
			unlink($sistema->imagen_sistema);

		Flash::success('Sistema borrado satisfactoriamente.');

		return redirect(route('sistemas.index'));
	}
}
