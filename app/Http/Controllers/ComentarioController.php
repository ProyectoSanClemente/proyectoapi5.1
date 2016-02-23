<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Libraries\Repositories\ComentarioRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Comentario;
use Auth;
use Validator, Input, Request, DB;

class ComentarioController extends AppBaseController
{

	/** @var  ComentarioRepository */

	private $ComentarioRepository;
	function __construct(ComentarioRepository $ComentarioRepo)
	{
		$this->ComentarioRepository = $ComentarioRepo;
	}

	/**
	 * Display a listing of the Comentario.
	 *
	 * @return Response
	 */

	/**
	 * Show the form for creating a new Comentario.
	 *
	 * @return Response
	 */
	public function create($id)
	{

		return view('Comentarios.create')->with('id',$id);
	}

	/**
	 * Store a newly created Comentario in storage.
	 *
	 * @param CreateComentarioRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		$input=Request::all();
    	$Comentario=Comentario::create($input);           
    	$data=Request::all();
    	$data['success'] = true;

        return json_encode($data);
    }

    /**
     * Display the comentarios history.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_comentarios()
    {
        $input=Request::all();
        $comentarios=$this->ComentarioRepository->findAllBy('id_post',$input['id_post']);
        foreach ($comentarios as $comentario) {
        	$comentario->usuario=$comentario->Usuario;   	
        }
        return json_encode($comentarios);
    }


	/**
	 * Remove the specified Comentario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$Comentario = $this->ComentarioRepository->find($id);

		if(empty($Comentario))
		{
			Flash::error('Comentario no encontrada.');

			return redirect(url('home'));
		}

		$this->ComentarioRepository->delete($id);

		Flash::success('Comentario borrado satisfactoriamente.');

		return redirect(url('home'));
	}
}