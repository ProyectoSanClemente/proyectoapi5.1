<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Libraries\Repositories\UsuarioRepository;
use Flash, Input, Image, Adldap, Response;

class UsuarioController extends Controller
{

	/** @var  UsuarioRepository */
	private $usuarioRepository;

	function __construct(UsuarioRepository $usuarioRepo)
	{
		$this->usuarioRepository = $usuarioRepo;
		$this->middleware('auth');
		$this->middleware('admin',['only'=>['create','index','delete']]);
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
		return view('usuarios.create');
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
			$input['imagen'] = 'images/avatar/'.$input['rut'].'.jpg';              
            Image::make(Input::file('imagen'))->resize(300, 300)->save($input['imagen']);
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

		return view('usuarios.edit')
			->with('usuario', $usuario);
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
		$input=$request->all();
		if (Input::hasFile('imagen')){//Actualizar Imagen
			$input['imagen'] = 'images/avatar/'.$usuario->accountname.'.jpg';         
            Image::make(Input::file('imagen'))->resize(300, 300)->save($input['imagen']);
        }

        $this->usuarioRepository->updateRich($input, $id);

		Flash::success('Usuario '.$usuario->accountname.' actualizado satisfactoriamente.');

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
		$filename = 'images/avatar/'.$usuario->accountname.'.jpg';
		if(File::exists($filename))
			unlink($filename);

		Flash::success('Usuario borrado satisfactoriamente.');

		return redirect(route('usuarios.index'));
	}

	public function getldapusers(){
    	$ldapusuarios = Adldap::users()->all();
		$agregados=0;

		foreach ($ldapusuarios as $user) {			
			$usuario=$this->usuarioRepository->findBy('accountname',$user->getAccountName());

			if(empty($usuario)){
				$data=[
				'accountname' => $user->getAccountName(),
				'displayname' => $user->getDisplayName(),
				'nombre' 	  => $user->getFirstName(),
				'apellido'    => $user->getLastName(),
				'rol'		  => 'usuario',
				'imagen' 	  => 'images/avatar/default.png',
				'password'    => '12345',
				'created_at'  => $user->getCreatedAt(),
				'updated_at'  => $user->getUpdatedAt(),
				];
				$usuario = $this->usuarioRepository->create($data);
				$agregados++;
			}
			else{
				
			}
		}
		Flash::success('Importados '.$agregados.' usuarios desde el DA');

		return redirect(route('usuarios.index'));
    }

}
