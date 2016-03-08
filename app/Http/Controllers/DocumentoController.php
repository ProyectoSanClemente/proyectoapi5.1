<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Libraries\Repositories\DocumentoRepository;
use App\Libraries\Repositories\RepositorioRepository;
use Flash, File, Input;


class DocumentoController extends Controller
{

    /** @var  documentoRepository */
    private $documentoRepository;
    /** @var  repositorioRepository */
    private $repositorioRepository;
    

    function __construct(DocumentoRepository $DocumentoRepo, RepositorioRepository $RepositorioRepo)
    {
        $this->documentoRepository = $DocumentoRepo;
        $this->repositorioRepository = $RepositorioRepo;
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $repositorio=$this->repositorioRepository->find($id);
        return view('documentos.create')
            ->with('repositorio',$repositorio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDocumentoRequest $request)
    {
        $input = $request->all();
        
        if (!empty($input['documento'])) {
            $carpeta='documents/'.$input['id_repositorio'].'/';
            if (!File::exists('documents')) {    //Crear carpeta de documentos adjuntos
                File::makeDirectory('documents');
            }
            if (!File::exists($carpeta)) {    //Crear carpeta de documentos adjuntos
                File::makeDirectory($carpeta);
            }
            $nombre = Input::file('documento')->getClientOriginalName();

            Input::file('documento')->move($carpeta, $nombre);

            $input['documento']=$carpeta.$nombre;
        }

        $documento = $this->documentoRepository->create($input);
        
        Flash::success('Documento agregado satisfactoriamente al Repositorio.');
        
        return redirect(route('repositorios.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = $this->documentoRepository->find($id);

        if(empty($documento))
        {
            Flash::error('Documento no encontrada.');

            return redirect(route('documentos.index'));
        }
        $repositorio=$documento->Repositorio;

        return view('documentos.edit')
            ->with('documento', $documento)
            ->with('repositorio',$repositorio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentoRequest $request, $id)
    {
        $documento = $this->documentoRepository->find($id);

        if(empty($documento))
        {
            Flash::error('Documento no encontrado.');

            return redirect(route('repositorios.index'));
        }
        $input=$request->all();

        if (!empty($input['documento'])) {
            $carpeta='documents/'.$input['id_repositorio'].'/';
            if (!File::exists('documents')) {    //Crear carpeta de documentos adjuntos
                File::makeDirectory('documents');
            }
            if (!File::exists($carpeta))    //Crear carpeta de documentos adjuntos
                File::makeDirectory($carpeta);

            if(File::exists($documento->documento))//Se borra el Archivo antiguo si existia
                File::delete($documento->documento);

            $nombre = Input::file('documento')->getClientOriginalName();

            Input::file('documento')->move($carpeta, $nombre);

            $input['documento']=$carpeta.$nombre;
        }

        $this->documentoRepository->updateRich($input, $id);

        Flash::success('Documento actualizado satisfactoriamente.');

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
        $documento = $this->documentoRepository->find($id);

        if(empty($documento))
        {
            Flash::error('Documento no encontrado.');

            return redirect(route('documentos.index'));
        }

        $this->documentoRepository->delete($id);
        File::delete($documento->documento);

        Flash::success('Documento borrado satisfactoriamente.');

        return redirect(route('repositorios.index'));
    }
}
