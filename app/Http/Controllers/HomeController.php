<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Feeds;
use App\Libraries\Repositories\NoticeRepository;
use App\Libraries\Repositories\PostRepository;
use App\Libraries\Repositories\ComentarioRepository;
use App\Libraries\Repositories\UsuarioRepository;
use Auth;
use Mitul\Controller\AppBaseController as AppBaseController;




class HomeController extends AppBaseController
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $postRepository;
    private $noticeRepository;
    private $comentarioRepository;
    private $usuarioRepository;

    public function __construct(NoticeRepository $noticeRepo,PostRepository $postRepo,ComentarioRepository $comentarioRepo,UsuarioRepository $usuarioRepo)
    {
        $this->noticeRepository = $noticeRepo;
        $this->postRepository = $postRepo;
        $this->comentarioRepository = $comentarioRepo;
        $this->usuarioRepository = $usuarioRepo;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        
        $feed = Feeds::make('http://www.sanclemente.cl/web/?feed=rss',5,true);
        $notices = $this->noticeRepository->all()->sortByDesc('updated_at')->values();
        $posts = $this->postRepository->all()->sortByDesc('updated_at')->values();
        $usuario = $this->usuarioRepository->find(Auth::id());

        return view('home')
            ->with('feed',$feed)
            ->with('posteos', $posts)
            ->with('notices', $notices)
            ->with('usuario', $usuario);
    }
}
