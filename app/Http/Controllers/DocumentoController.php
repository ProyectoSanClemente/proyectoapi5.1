<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use App\Libraries\Repositories\DocumentoRepository;
use App\Libraries\Repositories\RepositorioRepository;
use Flash;
use Response;

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
        
        $anexo = $this->documentoRepository->create($input);
        
        Flash::success('Documento agregado satisfactoriamente.');
        
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
        $Documento = $this->documentoRepository->find($id);

        if(empty($Documento))
        {
            Flash::error('Documento no encontrada.');

            return redirect(route('documentos.index'));
        }

        return view('documentos.edit')
            ->with('Documento', $Documento);
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
        $Documento = $this->documentoRepository->find($id);

        if(empty($Documento))
        {
            Flash::error('Documento no encontrada.');

            return redirect(route('documentos.index'));
        }

        $this->documentoRepository->updateRich($request->all(), $id);

        Flash::success('Documento actualizado satisfactoriamente.');

        return redirect(route('documentos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Documento = $this->documentoRepository->find($id);

        if(empty($Documento))
        {
            Flash::error('Documento no encontrado.');

            return redirect(route('documentos.index'));
        }

        $this->documentoRepository->delete($id);

        Flash::success('Documento borrado satisfactoriamente.');

        return redirect(route('documentos.index'));
    }
}
