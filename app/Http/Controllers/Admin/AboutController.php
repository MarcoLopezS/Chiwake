<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\About;
use Chiwake\Repositories\AboutRepo;

class AboutController extends Controller {

	protected $aboutRepo;
	protected $id = 1;

    public function __construct(AboutRepo $aboutRepo)
    {
        $this->middleware('auth');
        $this->aboutRepo = $aboutRepo;
    }

	public function nosotros()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		return view('admin.about.nosotros', compact('post'));
	}

	public function nosotrosUpdate(Request $request)
	{
        //BUSCAR ID
		$post = $this->aboutRepo->findOrFail($this->id);

        //REGLAS
		$rules = [
	        'contenido' => 'required',
	        'imagen' => 'mimes:jpeg,jpg,png',
	    ];

		//VALIDACION DE DATOS
        $this->validate($request, $rules);

        //VARIABLES
        $contenido = $request->input('contenido');

        //VERIFICAR SI SUBIO IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->aboutRepo->CrearCarpeta();
            $ruta = "upload/".$this->aboutRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->aboutRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->aboutRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //GUARDAR DATOS
        $post->about = $contenido;
        $post->about_imagen = $imagen;
        $post->about_imagen_carpeta = $imagen_carpeta;
        $this->aboutRepo->update($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.about.nosotros');
	}


	public function misvis()
	{
		$post = $this->aboutRepo->findOrFail($this->id);

		return view('admin.about.misvis', compact('post'));
	}

	public function misvisUpdate(Request $request)
	{
        //BUSCAR ID
		$post = $this->aboutRepo->findOrFail($this->id);

        //REGLAS
		$rules = [
	        'mision_contenido' => 'required',
	        'vision_contenido' => 'required',
	        'imagen' => 'mimes:jpeg,jpg,png',
	    ];

        //VALIDACION DE DATOS
        $this->validate($request, $rules);

        //VERIFICAR SI SUBIO IMAGEN
        if($request->hasFile('imagen'))
        {
            $this->aboutRepo->CrearCarpeta();
            $ruta = "upload/".$this->aboutRepo->FechaCarpeta();
            $archivo = $request->file('imagen');
            $imagen = $this->aboutRepo->FileMove($archivo, $ruta);
            $imagen_carpeta = $this->aboutRepo->FechaCarpeta();
        }else{
            $imagen = $request->input('imagen_actual');
            $imagen_carpeta = $request->input('imagen_actual_carpeta');
        }

        //VARIABLES
        $mision_contenido = $request->input('mision_contenido');
        $vision_contenido = $request->input('vision_contenido');

        //GUARDAR DATOS
        $post->mision = $mision_contenido;
        $post->vision = $vision_contenido;
        $post->misvis_imagen = $imagen;
        $post->misvis_imagen_carpeta = $imagen_carpeta;
        $this->aboutRepo->update($post, $request->all());

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.about.misvis');
	}


}
