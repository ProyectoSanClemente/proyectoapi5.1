<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Libraries\Repositories\NoticeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use Input;
use Image;
use Feeds;

class NoticeController extends AppBaseController
{

	/** @var  NoticeRepository */
	private $noticeRepository;

	function __construct(NoticeRepository $noticeRepo)
	{
		$this->noticeRepository = $noticeRepo;
		$this->middleware('auth',['only'=>['create','edit']]);
	}

	/**
	 * Display a listing of the Notice.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notices = $this->noticeRepository->paginate(4);
		$feed = Feeds::make('http://www.sanclemente.cl/web/?feed=rss',5,true);

		return view('noticias.index')
			->with('notices', $notices)
			->with('feed',$feed);
	}

	/**
	 * Show the form for creating a new Notice.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('noticias.create');
	}

	/**
	 * Store a newly created Notice in storage.
	 *
	 * @param CreateNoticeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNoticeRequest $request)
	{

		$input = $request->all();
		$filename = 'images/noticias/'.$input['titulo'].'.jpg';
	    $input['imagen']=$filename;
	    Image::make(Input::file('imagen'))->resize(640, 480)->save($filename);
		$notice = $this->noticeRepository->create($input);
		Flash::success('Noticia agregada satisfactoriamente.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Display the specified Notice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Noticia no encontrada.');

			return redirect(route('noticias.index'));
		}

		return view('noticias.show')->with('notice', $notice);
	}

	/**
	 * Show the form for editing the specified Notice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Noticia no encontrada.');

			return redirect(route('noticias.index'));
		}

		return view('noticias.edit')->with('notice', $notice);
	}

	/**
	 * Update the specified Notice in storage.
	 *
	 * @param  int              $id
	 * @param UpdateNoticeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateNoticeRequest $request)
	{
		$input = $request->all();
		$notice = $this->noticeRepository->find($id);
		if(empty($notice))
		{
			Flash::error('Noticia no encontrada.');

			return redirect(route('noticias.index'));
		}
		if (Input::hasFile('imagen')){
			if(file_exists($notice->imagen))
				unlink($notice->imagen);
	    	$input['imagen']='images/noticias/'.$input['titulo'].'.jpg';
	    	Image::make(Input::file('imagen'))->resize(640, 480)->save($input['imagen']);
	    }
		$this->noticeRepository->updateRich($input, $id);

		Flash::success('Noticia actualizada satisfactoriamente.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Remove the specified Notice from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Noticia no encontrada.');

			return redirect(route('noticias.index'));
		}

		$this->noticeRepository->delete($id);
		if(file_exists($notice->imagen))
			unlink($notice->imagen);

		Flash::success('Noticia borrada satisfactoriamente.');

		return redirect(route('noticias.index'));
	}
}
