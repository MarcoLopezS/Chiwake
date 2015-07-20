<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\Staff;
use Chiwake\Repositories\StaffRepo;

class StaffController extends Controller {

    protected $rules = [
        'nombre' => 'required',
        'cargo' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'imagen' => 'mimes:jpeg,jpg,png',
        'publicar' => 'required|in:1,0'
    ];

    protected $staffRepo;

    public function __construct(StaffRepo $staffRepo)
    {
        $this->middleware('auth');
        $this->staffRepo = $staffRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $posts = $this->staffRepo->orderBy('orden', 'asc')->paginate();

        return view('admin.staff.list', compact('posts', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
            $this->staffRepo->CrearCarpeta();
            $ruta = "upload/".$this->staffRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->staffRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->staffRepo->FechaCarpeta();
        }else{
            $imagen = "";
            $imagen_carpeta = "";
        }

        //GUARDAR DATOS
        $post = new Staff($request->all());
        $post->imagen = $imagen;
        $post->imagen_carpeta = $imagen_carpeta;
        $this->staffRepo->create($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se agregó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.staff.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->staffRepo->findOrFail($id);

        return view('admin.staff.edit', compact('post'));
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
        $post = $this->staffRepo->findOrFail($id);

        //VALIDACION DE DATOS
        $this->validate($request, $this->rules);

        //CREAR CARPETA CON FECHA Y MOVER IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->staffRepo->CrearCarpeta();
            $ruta = "upload/".$this->staffRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->staffRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->staffRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $post->imagen = $imagen;
        $post->imagen_carpeta = $imagen_carpeta;
        $this->staffRepo->update($post,$request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.staff.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, Request $request)
    { 
        $post = $this->staffRepo->findOrFail($id);
        $post->delete();       

        $message = 'El registro se eliminó satisfactoriamente.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $message
            ]);
        }

        return redirect()->route('administrador.posts.index');
    }


    public function order()
    {
        $photos = $this->staffRepo->orderBy('orden', 'asc')->get();

        return view('admin.staff.order', compact('photos'));
    }

    public function orderForm(Request $request)
    {
        if($request->ajax())
        {
            $sortedval = $_POST['listPhoto'];
            try{
                foreach ($sortedval as $key => $sort){
                    $sortPhoto = $this->staffRepo->find($sort);
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