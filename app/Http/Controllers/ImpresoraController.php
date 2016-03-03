<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateImpresoraRequest;
use App\Http\Requests\UpdateImpresoraRequest;
use App\Models\Usuario;
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
	/** @var  departamenteoRepository */
	private $departamentoRepository;
	private $listaimpresoras;  
	
	function __construct(ImpresoraRepository $impresoraRepo,DepartamentoRepository $departamentoRepo)
	{
		$this->ImpresoraRepository = $impresoraRepo;
		$this->departamentoRepository = $departamentoRepo;
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
				$imp=new \stdClass;
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
			->with('impresoras', $impresoras)
			->with('listaimpresoras', $this->listaimpresoras);;
	}

	/**
	 * Show the form for creating a new Impresora.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		return view('impresoras.create')
			->with('departamentos',$departamentos)
			->with('impresoras',$this->listaimpresoras);
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
		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		if(empty($impresora))
		{
			Flash::error('Impresora no encontrada.');

			return redirect(route('impresoras.index'));
		}

		return view('impresoras.edit')
			->with('impresora', $impresora)
			->with('impresoras',$this->listaimpresoras)
			->with('departamentos',$departamentos);
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
		$impresoras=Auth::user()->Departamento->Impresoras;
		return view('impresoras.imprimir')
			->with('impresoras',$impresoras)
			->with('listaimpresoras',$this->listaimpresoras);

	}
}
