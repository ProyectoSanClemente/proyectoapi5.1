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
	public function index()
	{
		$posts = $this->postRepository->all();

		return view('posts.index')
			->with('posts', $posts);
	}

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
        	$post=Post::create($input);           
        	$data=Request::all();
        	$data['success'] = true;

        return json_encode($data);
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
	public function edit($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('post no encontrada.');

			return redirect(route('posts.index'));
		}

		return view('posts.edit')->with('post', $post)
									->with('id',$id);
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int              $id
	 * @param UpdatepostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatepostRequest $request)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('post no encontrada.');

			return redirect(route('posts.index'));
		}

		$this->postRepository->updateRich($request->all(), $id);

		Flash::success('post actualizada satisfactoriamente.');

		return redirect(route('posts.index'));
	}

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

			return redirect(route('posts.index'));
		}

		$this->postRepository->delete($id);

		Flash::success('post borrada satisfactoriamente.');

		return redirect(route('posts.index'));
	}
}
