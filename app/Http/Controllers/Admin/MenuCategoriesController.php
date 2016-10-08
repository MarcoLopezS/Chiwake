<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\MenuCategory;
use Chiwake\Repositories\MenuCategoryRepo;

class MenuCategoriesController extends Controller {

    protected  $rules = [
        'titulo' => 'required',
        'publicar' => 'required|in:1,0',
        'imagen' => 'required'
    ];

    protected $menuCategoryRepo;

    public function __construct(MenuCategoryRepo $menuCategoryRepo)
    {
        $this->middleware('auth');
        $this->menuCategoryRepo = $menuCategoryRepo;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $categories = $this->menuCategoryRepo->orderBy('titulo', 'asc')->get();
        return view('admin.menus_categories.list', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.menus_categories.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->menuCategoryRepo->CrearCarpeta();
            $ruta = "upload/".$this->menuCategoryRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->menuCategoryRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->menuCategoryRepo->FechaCarpeta();
        }else{
            $imagen = "";
            $imagen_carpeta = "";
        }

        //VARIABLES
        $titulo = $request->input('titulo');

        //CONVERTIR TITULO A URL
        $slug_url = $this->menuCategoryRepo->SlugUrl($titulo);

        $category = new MenuCategory($request->all());
        $category->slug_url = $slug_url;
        $category->imagen = $imagen;
        $category->imagen_carpeta = $imagen_carpeta;
        $category->user_id = Auth::user()->id;
        $this->menuCategoryRepo->create($category, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.menus_categories.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->menuCategoryRepo->findOrFail($id);
        return view('admin.menus_categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->menuCategoryRepo->findOrFail($id);
        return view('admin.menus_categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $category = $this->menuCategoryRepo->findOrFail($id);

        $this->validate($request, $this->rules);

        //VARIABLES
        $titulo = $request->input('titulo');

        //CONVERTIR TITULO A URL
        $slug_url = $this->menuCategoryRepo->SlugUrl($titulo);

        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->menuCategoryRepo->CrearCarpeta();
            $ruta = "upload/".$this->menuCategoryRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->menuCategoryRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->menuCategoryRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $category->imagen = $imagen;
        $category->imagen_carpeta = $imagen_carpeta;
        $category->slug_url = $slug_url;
        $category->user_id = Auth::user()->id;
        $this->menuCategoryRepo->update($category, $request->all());

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.menus_categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        
    }


    public function order()
    {
        $photos = $this->menuCategoryRepo->publicadoOrden('orden', 'asc');

        return view('admin.menus_categories.order', compact('photos'));
    }

    public function orderForm(Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $_POST['listPhoto'];
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = $this->menuCategoryRepo->find($sort);
                    $sortPhoto->orden = $key;
                    $sortPhoto->save();
                }
            }
            catch (Exception $e)
            {
                return 'false';
            }
        }
    }

}