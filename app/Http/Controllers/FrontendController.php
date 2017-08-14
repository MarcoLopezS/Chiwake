<?php namespace Chiwake\Http\Controllers;

use Illuminate\Http\Request;

use Chiwake\Repositories\AboutRepo;
use Chiwake\Repositories\MenuRepo;
use Chiwake\Repositories\MenuCategoryRepo;
use Chiwake\Repositories\PhraseRepo;
use Chiwake\Repositories\StaffRepo;

class FrontendController extends Controller {

    protected $aboutRepo;
    protected $menuRepo;
    protected $menuCategoryRepo;
    protected $phraseRepo;
    protected $staffRepo;

    public function __construct(AboutRepo $aboutRepo,
                                MenuRepo $menuRepo,
                                MenuCategoryRepo $menuCategoryRepo,
                                PhraseRepo $phraseRepo,
                                StaffRepo $staffRepo)
    {
        $this->aboutRepo = $aboutRepo;
        $this->menuRepo = $menuRepo;
        $this->menuCategoryRepo = $menuCategoryRepo;
        $this->phraseRepo = $phraseRepo;
        $this->staffRepo = $staffRepo;
    }

    public function construccion()
    {
        return view('construccion.home');
    }    

	public function home()
	{
        $frases = $this->phraseRepo->publicadoOrden('titulo', 'asc');
        $about = $this->aboutRepo->findOrFail(1);


		return view('frontend.home', compact('frases', 'about', 'categorias'));
	}

    public function nosotros()
    {
        $frases = $this->phraseRepo->publicadoOrden('titulo', 'asc');
        $staff = $this->staffRepo->publicadoOrden('orden', 'asc');
        $about = $this->aboutRepo->findOrFail(1);

        return view('frontend.nosotros', compact('frases', 'staff', 'about'));
    }

    /*
     * MENU
     */
    public function menu()
    {
        $menuCategoria = $this->menuCategoryRepo->listarCategorias();

        return view('frontend.menu', compact('menuCategoria'));
    }

    public function menuCategoria($categoria)
    {
        $menuCategoria = $this->menuCategoryRepo->buscarUrl($categoria);
        $menus = $this->menuRepo->listarMenusPorCategoria($menuCategoria->id);

        return view('frontend.menu-categoria', compact('menuCategoria','menus'));
    }

    /*
     * CORPORATIVO
     */
    public function corporativoGet()
    {
        $frases = $this->phraseRepo->publicadoOrden('titulo', 'asc');

        return view('frontend.corporativo', compact('frases'));
    }

    public function corporativoPost(Request $request)
    {
        $data = [
            'empresa' => $request->input('empresa'),
            'fecha' => $request->input('fecha'),
            'duracion' => $request->input('duracion'),
            'personas' => $request->input('personas'),
            'tipo' => $request->input('tipo'),
            'contacto' => $request->input('contacto'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ];

        $rules = [
            'empresa' => 'required',
            'fecha' => 'required',
            'duracion' => 'required',
            'personas' => 'required|min:1|max:255',
            'tipo' => 'required|in:almuerzo,cena',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required|email'
        ];

        $this->validate($request, $rules);

        //DE
        $deEmail = $data['email'];
        $deNombre = $data['empresa'];

        //A
        $aEmail = 'marketing@chiwake.pe';
        $aNombre = 'Chiwake';

        \Mail::send('emails.frontend.corporativo', $data, function($message) use ($aNombre, $aEmail, $deNombre, $deEmail){
            $message->to($aEmail, $aNombre);
            $message->from($deEmail, $deNombre);
            $message->subject('Chiwake - Corporativo');
        });

        $mensaje = 'Los datos han sido enviados.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $mensaje
            ]);
        }
    }

    /*
     * RESERVACION
     */
    public function reservacion()
    {
        $frases = $this->phraseRepo->publicadoOrden('titulo', 'asc');
        $mensaje = '';

        return view('frontend.reservacion', compact('mensaje','frases'));
    }

    public function reservacionForm(Request $request)
    {
        $data = [
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'fecha' => $request->input('fecha'),
            'hora' => $request->input('hora'),
            'personas' => $request->input('personas'),
        ];

        $rules = [
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'personas' => 'required|min:1|max:100'
        ];

        $this->validate($request, $rules);

        $fromEmail = 'reservas@chiwake.pe';
        $fromNombre = 'Chiwake';

        \Mail::send('emails.frontend.reservacion', $data, function($message) use ($fromNombre, $fromEmail){
            $message->to($fromEmail, $fromNombre);
            $message->from($fromEmail, $fromNombre);
            $message->subject('Chiwake - Reservación');
        });

        $mensaje = 'Tu mensaje ha sido enviado.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $mensaje
            ]);
        }
    }

    /*
     * CONTACTO
     */
    public function contacto()
    {
        return view('frontend.contacto', compact('mensaje'));
    }

    public function contactoForm(Request $request)
    {
        $data = [
            'mensaje' => $request->input('mensaje'),
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email')
        ];

        $rules = [
            'mensaje' => 'required',
            'nombre' => 'required',
            'email' => 'required|email'
        ];

        $this->validate($request, $rules);

        $fromEmail = 'reservas@chiwake.pe';
        $fromNombre = 'Chiwake';

        \Mail::send('emails.frontend.contacto', $data, function($message) use ($fromNombre, $fromEmail){
            $message->to($fromEmail, $fromNombre);
            $message->from($fromEmail, $fromNombre);
            $message->subject('Chiwake - Contacto');
        });

        $mensaje = 'Tu mensaje ha sido enviado.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $mensaje
            ]);
        }

    }

    public function suscripcionForm(Request $request)
    {
        $data = [
            'email' => $request->input('email')
        ];

        $rules = [
            'email' => 'required|email'
        ];

        $this->validate($request, $rules);

        $fromEmail = 'reservas@chiwake.pe';
        $fromNombre = 'Chiwake';

        \Mail::send('emails.frontend.suscripcion', $data, function($message) use ($fromNombre, $fromEmail){
            $message->to($fromEmail, $fromNombre);
            $message->from($fromEmail, $fromNombre);
            $message->subject('Chiwake - Suscripción');
        });

        $mensaje = 'Te has suscrito a nuestra web.';

        if($request->ajax())
        {
            return response()->json([
                'message' => $mensaje
            ]);
        }

    }

}