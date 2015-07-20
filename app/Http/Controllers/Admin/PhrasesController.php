<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\Phrase;
use Chiwake\Repositories\PhraseRepo;

class PhrasesController extends Controller {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'autor' => '',
        'publicar' => 'required|in:1,0'
    ];

    protected $phraseRepo;

    public function __construct(PhraseRepo $phraseRepo)
    {
        $this->middleware('auth');
        $this->phraseRepo = $phraseRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = $this->phraseRepo->orderBy('titulo', 'asc')->paginate();

        return view('admin.phrases.list', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.phrases.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //VALIDACION
        $this->validate($request, $this->rules);
        
        //VARIABLES
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $autor = $request->input('autor');

        //GUARDAR DATOS
        $post = new Phrase($request->all());
        $this->phraseRepo->create($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se agregó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.phrases.index');        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->phraseRepo->findOrFail($id);

        return view('admin.phrases.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->phraseRepo->findOrFail($id);

        return view('admin.phrases.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //BUSCAR ID
        $post = $this->phraseRepo->findOrFail($id);

        //VALIDACION
        $this->validate($request, $this->rules);

        //VARIABLES
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');
        $autor = $request->input('autor');
        
        //GUARDAR DATOS
        $this->phraseRepo->update($post,$request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.phrases.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $post = $this->phraseRepo->findOrFail($id);
        $post->delete();       

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $message
            ]);
        }

        return redirect()->route('administrador.phrases.index');
    }

}