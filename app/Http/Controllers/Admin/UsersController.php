<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Entities\User;
use Chiwake\Repositories\UserRepo;

class UsersController extends Controller {

    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->userRepo->orderBy('first_name', 'asc')->paginate();

        return view('admin.users.list', compact('users'));
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        //REGLAS
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        //VALIDACION
		$this->validate($request, $rules);

        //GUARDAR DATOS
        $user = new User($request->all());
        $user->save();

        //MENSAJE
        session()->flash('mensaje', 'El registro se agregó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.users.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = $this->userRepo->findOrFail($id);

        return view('admin.users.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = $this->userRepo->findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        $user = $this->userRepo->findOrFail($id);

        //REGLAS
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'password_confirmation' => ''
        ];

        //VALIDACION
        $this->validate($request, $rules);

        //ACTUALIZAR DATOS
        $user->fill($request->all());
        $user->save();

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.users.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    /**
     * Funcion para mostar Perfil de usuario logeado
     */

    public function profile()
    {
        $user = Auth::user();

        return view('admin.users.profile', compact('user'));

    }

    /**
     * Funcion para cambiar contraseña de Perfil de usuario logeado
     */

    public function profileChangePassword(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $this->validate($request, $rules);

        $user->fill($request->all());
        $user->save();

        //MENSAJE
        session()->flash('mensaje', 'La contraseña se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.users.profile');
    }


}
