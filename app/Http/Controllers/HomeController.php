<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Feeds;
use App\Libraries\Repositories\NoticeRepository;
use Mitul\Controller\AppBaseController as AppBaseController;



class HomeController extends AppBaseController
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoticeRepository $noticeRepo)
    {
        $this->noticeRepository = $noticeRepo;
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
        $notices = $this->noticeRepository->paginate(4);


        return view('home')
            ->with('feed',$feed)
            ->with('notices', $notices);
    }
}
