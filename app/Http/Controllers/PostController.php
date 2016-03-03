<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Libraries\Repositories\PostRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\Post;
use Auth;
use Validator, Input, Request, DB;
use Image;
use File;

class PostController extends AppBaseController
{

	/** @var  postRepository */

	private $postRepository;
	function __construct(PostRepository $postRepo)
	{
		$this->postRepository = $postRepo;
	}

	/**
	 * Display a listing of the post.
	 *
	 * @return Response
	 */

	/**
	 * Show the form for creating a new post.
	 *
	 * @return Response
	 */
	public function create($id)
	{

		return view('posts.create')->with('id',$id);
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @param CreatepostRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePostRequest $request)
	{
		$input=Request::all();
		if (!empty($input['imagen'])) {
			$filename = 'images/comunidad/imagenes'.$input['titulo'].date("GisdY").'.jpg';
		    $input['imagen']=$filename;
		    Image::make(Input::file('imagen'))->resize(640, 480)->save($filename);
		}

		if (!empty($input['archivo'])) {
			$destinationPath = 'uploads'; // upload path
		    $extension = Input::file('archivo')->getClientOriginalExtension(); // getting image extension
		    $fileName = rand(11111,99999).'.'.$extension; // renameing image
		    Input::file('archivo')->move($destinationPath, $fileName); // uploading file to given path
		}

        	$post=Post::create($input);           
        
		return redirect('home');
    }


	/**
	 * Display the specified post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('Post no encontrada.');

			return redirect(route('posts.index'));
		}

		return view('posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */




	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('post no encontrada.');

			return redirect(url('home'));
		}

		$this->postRepository->delete($id);

		Flash::success('Post borrado satisfactoriamente.');

		return redirect(url('home'));
	}
}