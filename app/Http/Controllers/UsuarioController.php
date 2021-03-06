<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Carbon\Carbon;
use App\Models\Impresora;
use App\Libraries\Repositories\UsuarioRepository;
use App\Libraries\Repositories\DepartamentoRepository;
use Flash, Input, Image, Adldap;
use Response, File, Auth, Exception;

class UsuarioController extends Controller
{

	/** @var  UsuarioRepository */
	private $usuarioRepository;
	/** @var DepartamentoRepository */
	private $departamentoRepository;

	function __construct(UsuarioRepository $usuarioRepo,DepartamentoRepository $departamentoRepo)
	{
		$this->usuarioRepository = $usuarioRepo;
		$this->departamentoRepository = $departamentoRepo;
		$this->middleware('auth');
		$this->middleware('admin',['except'=>['edit','update']]);		
	}

	/**
	 * Display a listing of the Usuario.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = $this->usuarioRepository->all();
		// $ldapusuarios = Adldap::users()->all();	
		// $ldapgrupos = Adldap::groups()->all();
		// $ldapcomputers = Adldap::computers()->all();
		// $ldapprinters = Adldap::printers()->all();
		// $ldapremoteuser = Adldap::printers()->all();    		
		return view('usuarios.index',compact('usuarios'));
			// ->with('ldapgrupos',$ldapgrupos)
			// ->with('ldapusuarios',$ldapusuarios)
			// ->with('ldapcomputers',$ldapcomputers)
			// ->with('ldapprinters',$ldapprinters)
			// ->with('usuarios', $usuarios);
	}

	/**
	 * Show the form for creating a new Usuario.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		return view('usuarios.create')
			->with('departamentos',$departamentos);
	}

	/**
	 * Store a newly created Usuario in storage.
	 *
	 * @param CreateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuarioRequest $request)
	{
		$input = $request->all();		
		
		if (Input::hasFile('imagen')){
			$input['imagen'] = 'images/avatar/'.$input['accountname'].'.jpg';              
            Image::make(Input::file('imagen'))->save($input['imagen']);
        }
        else
        	$input['imagen']='images/avatar/default.png';

        $usuario = $this->usuarioRepository->create($input);
		
		Flash::success('Usuario agregado satisfactoriamente.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Show the form for editing the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'))
			                    ->withInput();
		}
				
		//Validamos que tenga los permisos o sea su propia cuenta
		if(Auth::user()->id!=$id && Auth::user()->rol!='admin')
			throw new Exception("No posee los privilegios para editar otros usuarios");

		$departamentos=$this->departamentoRepository->lists('nombre', 'id');
		return view('usuarios.edit')
			->with('usuario', $usuario)
			->with('departamentos',$departamentos);;
	}

	/**
	 * Update the specified Usuario in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUsuarioRequest $request)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');
			return redirect(route('usuarios.index'));
		}

		if (trim(Input::get('password')) == '') { //Evita actualizar el password si es vacio.
		   $input = Input::except('password');
		}
		else {
		   $input = Input::all();
		}

		if (Input::hasFile('imagen')){//Actualizar Imagen
			$input['imagen'] = 'images/avatar/'.$usuario->accountname.'.jpg';         
            Image::make(Input::file('imagen'))->save($input['imagen']);
        }

        $this->usuarioRepository->updateRich($input, $id);

		Flash::success('Usuario '.$usuario->accountname.' actualizado satisfactoriamente.');
		
		if(Auth::user()->rol!='admin')//Si el usuario no es admin, se envia el mensaje a pagina inicio
			return redirect(url('home'));	

		return redirect(route('usuarios.index'));
	}

	/**
	 * Remove the specified Usuario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado.');

			return redirect(route('usuarios.index'));
		}

		$this->usuarioRepository->delete($id);
		$filename = $usuario->imagen;
		if(File::exists($filename)&&(basename($filename)!='default.png'))
			File::delete($filename);

		Flash::success('Usuario borrado satisfactoriamente.');

		return redirect(route('usuarios.index'));
	}

	public function getldapusers(){
    	$ldapusuarios = Adldap::users()->all();
		$agregados=0;

		foreach ($ldapusuarios as $user) {			
			$usuario=$this->usuarioRepository->findBy('accountname',$user->getAccountName());

			if(empty($usuario)){
				$usuario=new \App\Models\Usuario;
				$usuario->accountname=$user->getAccountName();
				$usuario->nombre=$user->getFirstName();
				$usuario->apellido=$user->getLastName();
				$usuario->save();
				$agregados++;
			}
		}
		$ldapusuarios=null;
		Flash::success('Importados '.$agregados.' usuarios desde el DA');

		return redirect(route('usuarios.index'));
    }

}
