<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImpresoraRequest;
use App\Http\Requests\UpdateImpresoraRequest;
use App\Libraries\Repositories\ImpresoraRepository;
use App\Libraries\Repositories\DepartamentoRepository;
use Illuminate\Database\Eloquent\Collection;
use Flash;
use Response;
use Auth;
use Goutte\Client;

class ImpresoraController extends Controller
{

	/** @var  ImpresoraRepository */
	private $ImpresoraRepository;
	/** @var  DepartamentoRepository */
	private $DepartamentoRepository;
	private $listaimpresoras;  
	
	function __construct(ImpresoraRepository $impresoraRepo,DepartamentoRepository $DepartamentoRepo)
	{
		$this->ImpresoraRepository = $impresoraRepo;
		$this->DepartamentoRepository = $DepartamentoRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only' => ['edit','create','delete','show']]);

		$client = new Client();
		$crawler = $client->request('GET', 'http://10.128.2.16/tinta/printers.php?sort=printers.server&dir=asc');
		$nodos=$crawler->filter('td');
		$i=1;
		$this->listaimpresoras=new Collection;
		foreach ($nodos as $key => $domElement) {
			if($i==$key){
				$i+=7;
	    		$this->listaimpresoras->push($domElement->nodeValue);
			}
		}
	}

	/**
	 * Display a listing of the Impresora.
	 *
	 * @return Response
	 */
	public function index()
	{
		$impresoras = $this->ImpresoraRepository->all();

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
		$usuario= $this->DepartamentoRepository->find($id);
		return view('impresoras.create')
			->with('usuario',$usuario)
			->with('listaimpresoras',$this->listaimpresoras);
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

		$impresora = $this->ImpresoraRepository->create($input);
		
		Flash::success('Impresora asignada satisfactoriamente.');
		
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
		$impresora = $this->ImpresoraRepository->find($id);

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
		$impresora = $this->ImpresoraRepository->find($id);
		$usuario=$this->DepartamentoRepository->find($impresora->id_usuario);
		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras.edit')
			->with('impresora', $impresora)
			->with('usuario',$usuario);
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
		$impresora = $this->ImpresoraRepository->find($id);
		$input = $request->all();

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}
		$usuario = $this->DepartamentoRepository->find($impresora->id_usuario);//Buscando todas las impresoras de un usuario
		foreach ($usuario->Impresoras as $key => $impresora) { 
			if($impresora->modelo_impresora==$input['modelo_impresora']){ 
				if(!($id==$impresora->id)) //Si el modelo a asignar ya esta asignado
					$this->ImpresoraRepository->delete($id);
			}
		}
		
		$this->ImpresoraRepository->updateRich($input, $id);
		
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
		$impresora = $this->ImpresoraRepository->find($id);

		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		$this->ImpresoraRepository->delete($id);

		Flash::success('Impresora borrada satisfactoriamente.');

		return redirect(route('impresoras.index'));
	}
	
	public function imprimir()
	{
		$impresoras = $this->ImpresoraRepository->findAllBy('accountname',Auth::user()->accountname);
		return view('impresoras.imprimir')
			->with('impresoras',$impresoras);
	}
}
