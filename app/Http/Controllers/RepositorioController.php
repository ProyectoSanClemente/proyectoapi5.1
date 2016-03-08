<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateRepositorioRequest;
use App\Http\Requests\UpdateRepositorioRequest;
use App\Libraries\Repositories\RepositorioRepository;
use Flash;
use Response;

class RepositorioController extends Controller
{

        /** @var  anexoRepository */
    private $repositorioRepository;

    function __construct(RepositorioRepository $RepositorioRepo)
    {
        $this->repositorioRepository = $RepositorioRepo;
        $this->middleware('auth');
        $this->middleware('admin',['except'=>['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repositorios=$this->repositorioRepository->all();
        return view('repositorios.index')
            ->with('repositorios',$repositorios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repositorios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRepositorioRequest $request)
    {
        $input = $request->all();
        
        $anexo = $this->repositorioRepository->create($input);
        
        Flash::success('Repositorio agregado satisfactoriamente.');
        
        return redirect(route('repositorios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repositorio = $this->repositorioRepository->find($id);

        if(empty($repositorio))
        {
            Flash::error('Repositorio no encontrada.');

            return redirect(route('repositorios.index'));
        }

        return view('repositorios.edit')
            ->with('repositorio', $repositorio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepositorioRequest $request, $id)
    {
        $repositorio = $this->repositorioRepository->find($id);

        if(empty($repositorio))
        {
            Flash::error('Repositorio no encontrada.');

            return redirect(route('repositorios.index'));
        }

        $this->repositorioRepository->updateRich($request->all(), $id);

        Flash::success('Repositorio actualizado satisfactoriamente.');

        return redirect(route('repositorios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repositorio = $this->repositorioRepository->find($id);

        if(empty($repositorio))
        {
            Flash::error('Repositorio no encontrado.');

            return redirect(route('repositorios.index'));
        }

        $this->repositorioRepository->delete($id);

        Flash::success('Repositorio borrado satisfactoriamente.');

        return redirect(route('repositorios.index'));
    }
}
