<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImpresora_DepartamentoRequest;
use App\Http\Requests\UpdateImpresora_DepartamentoRequest;
use App\Libraries\Repositories\Impresora_DepartamentoRepository;
use App\Libraries\Repositories\DepartamentoRepository;
use App\Models\Impresora;
//use Illuminate\Database\Eloquent\Collection;
use Flash;
use Response;
use Auth;
use Goutte\Client;

class ImpresoraController extends Controller
{
	/** @var  Impresora_DepartamentoRepository */
	private $impresora_departamentoRepository;
	/** @var  departamenteoRepository */
	private $departamentoRepository;
	
	function __construct(Impresora_DepartamentoRepository $impresora_departamentoRepo,DepartamentoRepository $departamentoRepo)
	{
		$this->impresora_departamentoRepository = $impresora_departamentoRepo;
		$this->departamentoRepository = $departamentoRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only' => ['edit','create','delete','show']]);
		//$this->UpdateImpresorasList();
	}

	/**
	 * Display a listing of the Impresora.
	 *
	 * @return Response
	 */
	public function index()
	{
		$asignaciones=Auth::user()->Departamento->Impresoras_Departamento;
		$impresorasasignadas=$this->impresora_departamentoRepository->all();
		return view('impresoras_departamento.index')
			->with('impresorasasignadas', $impresorasasignadas)
			->with('asignaciones',$asignaciones);
	}

	/**
	 * Show the form for creating a new Impresora.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		$impresoras = Impresora::lists('modelo_impresora','id');
		return view('impresoras_departamento.create')
			->with('departamentos',$departamentos)
			->with('impresoras',$impresoras);
	}

	/**
	 * Store a newly created Impresora in storage.
	 *
	 * @param CreateImpresora_DepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateImpresora_DepartamentoRequest $request)
	{
		$input = $request->all();
		
		$impresora = $this->impresora_departamentoRepository->create($input);
		
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
		$impresora = $this->Impresora_DepartamentoRepository->find($id);

		if(empty($impresora))
		{
			Flash::error('Asignacion de Impresora encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras_departamento.show')->with('impresora', $impresora);
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
		$impresora = $this->impresora_departamentoRepository->find($id);
		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		$impresoras = Impresora::lists('modelo_impresora','id');
		if(empty($impresora))
		{
			Flash::error('Asignacion de Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras_departamento.edit')
			->with('impresora', $impresora)
			->with('impresoras',$impresoras)
			->with('departamentos',$departamentos);
	}

	/**
	 * Update the specified Impresora in storage.
	 *
	 * @param  int              $id
	 * @param UpdateImpresora_DepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateImpresora_DepartamentoRequest $request)
	{
		$impresora = $this->impresora_departamentoRepository->find($id);
		$input = $request->all();

		if(empty($impresora))
		{
			Flash::error('Asignacion de Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}
		
		$this->impresora_departamentoRepository->updateRich($input, $id);
		
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
		$asignacion = $this->impresora_departamentoRepository->find($id);

		if(empty($asignacion))
		{
			Flash::error('Asignacion de Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		$this->impresora_departamentoRepository->delete($id);

		Flash::success('Asignacion de Impresora borrada satisfactoriamente.');

		return redirect(route('impresoras.index'));
	}
	
	public function imprimir()
	{	
		$asignaciones=Auth::user()->Departamento->Impresoras_Departamento;
		return view('impresoras_departamento.imprimir')
			->with('asignaciones',$asignaciones);

	}

	public function UpdateImpresorasList()
	{		
		$client = new Client();
		$crawler = $client->request('GET', 'http://10.128.2.16/tinta/printers.php?sort=printers.server&dir=asc');
		$nodos=$crawler->filter('td');
		$i=1;
		$listaimpresoras=new Collection;
		foreach ($nodos as $key => $domElement) {
			if($i==$key){
				$i+=7;
				$imp=new \stdClass;
				$modelo_impresora=$domElement->nodeValue;
	    		$listaimpresoras->push($modelo_impresora);
	    		$impresora=Impresora::where('modelo_impresora',$modelo_impresora)->first();
	    		if(empty($impresora)){
	    			$impresora=new Impresora;
	    			$impresora->modelo_impresora=$modelo_impresora;
	    			$impresora->save();
	    		}
			}
		}

		/*foreach ($variable as $key => $value) {
					# code...
		}	*/	

	}
}
