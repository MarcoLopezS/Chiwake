<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\Menu;
use Chiwake\Repositories\MenuRepo;
use Chiwake\Entities\MenuCategory;
use Chiwake\Repositories\MenuCategoryRepo;

class MenusController extends Controller {

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'precio' => 'required',
        'imagen' => 'mimes:jpeg,jpg,png',
        'categoria' => '',
        'publicar' => 'required|in:1,0'
    ];

    protected $menuCategoryRepo;
    protected $menuRepo;

    public function __construct(MenuCategoryRepo $menuCategoryRepo,
                                MenuRepo $menuRepo)
    {
        $this->middleware('auth');
        $this->menuCategoryRepo = $menuCategoryRepo;
        $this->menuRepo = $menuRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index($category)
    {
        $posts = $this->menuRepo->where('menu_category_id', $category)->orderBy('titulo', 'asc')->paginate();
        $category = $this->menuCategoryRepo->findOrFail($category);
        
        return view('admin.menus.list', compact('posts', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($category)
    {
        $category = $this->menuCategoryRepo->findOrFail($category);
        
        return view('admin.menus.create', compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($category, Request $request)
    {
        $this->validate($request, $this->rules);

        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->menuRepo->CrearCarpeta();
            $ruta = "upload/".$this->menuRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->menuRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->menuRepo->FechaCarpeta();
        }else{
            $imagen = "";
            $imagen_carpeta = "";
        }

        //VARIABLES
        $titulo = $request->input('titulo');

        //CONVERTIR TITULO A URL
        $slug_url = $this->menuRepo->SlugUrl($titulo);

        //GUARDAR DATOS
        $post = new Menu($request->all());
        $post->slug_url = $slug_url;
        $post->menu_category_id = $category;
        $post->imagen = $imagen;
        $post->imagen_carpeta = $imagen_carpeta;
        $post->user_id = Auth::user()->id;
        $this->menuRepo->create($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se agregó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.menus.index', $category);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->menuRepo->findOrFail($id);

        return view('admin.menus.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($category, $id)
    {
        $post = $this->menuRepo->findOrFail($id);

        return view('admin.menus.edit', compact('post', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($category, $id, Request $request)
    {
        //BUSCAR ID
        $post = $this->menuRepo->findOrFail($id);

        //VALIDACION
        $this->validate($request, $this->rules);
        
         //VARIABLES
        $titulo = $request->input('titulo');

        //CONVERTIR TITULO A URL
        $slug_url = $this->menuRepo->SlugUrl($titulo);

        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->menuRepo->CrearCarpeta();
            $ruta = "upload/".$this->menuRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->menuRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->menuRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $post->imagen = $imagen;
        $post->imagen_carpeta = $imagen_carpeta;
        $post->menu_category_id = $category;
        $post->slug_url = $slug_url;
        $post->user_id = Auth::user()->id;
        $this->menuRepo->update($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.menus.index', $category);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($category, $id, Request $request)
    {
        $post = $this->menuRepo->find($id);
        $post->delete();

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $message
            ]);
        }

        return redirect()->route('administrador.menus.index', $category);
    }

}