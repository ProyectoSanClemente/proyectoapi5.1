<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Libraries\Repositories\CuentaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Libraries\Repositories\UsuarioRepository;
use App\Models\Usuario;

class CuentaController extends AppBaseController
{

	/** @var  CuentaRepository */
	private $cuentaRepository;
	private $usuarioRepository;

	function __construct(CuentaRepository $cuentaRepo)
	{
		$this->cuentaRepository = $cuentaRepo;
	}

	/**
	 * Display a listing of the Cuenta.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cuentas = $this->cuentaRepository->all();
		/*$comments = $this->usuarioRepository->find(1)->where('id', '=', $cuentas['usuario_id'])->first();*/
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

		return view('cuentas.create')->with('id',$id);
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

		try{
			$cuenta = $this->cuentaRepository->create($input);
			Flash::success('Cuenta agregada satisfactoriamente.');
			return redirect(route('cuentas.index'));

		    } catch(QueryException $e) {
        		if (preg_match('/Duplicate entry/',$e->getMessage())){
            	return response([
                'success' => false,
                'message' => 'Role exists for that user'
            	], 500);
       			}
			}
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
			Flash::error('Cuenta no encontrada.');

			return redirect(route('cuentas.index'));
		}

		return view('cuentas.edit')->with('cuenta', $cuenta)
									->with('id',$id);
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
}
