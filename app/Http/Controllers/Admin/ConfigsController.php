<?php namespace Chiwake\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Chiwake\Http\Controllers\Controller;
use Session;

use Chiwake\Repositories\ConfigurationRepo;

class ConfigsController extends Controller {

    protected $rules = [
        'titulo' => 'required',
        'dominio' => 'required',
        'descripcion' => 'required|min:10|max:255',
        'keywords' => 'required'
    ];

    protected $configurationRepo;
    protected $id = 1;

    public function __construct(ConfigurationRepo $configurationRepo)
    {
        $this->middleware('auth');
        $this->configurationRepo = $configurationRepo;
    }

	/**
	 * Show the form for editing the specified adminconfig.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$config = $this->configurationRepo->findOrFail($this->id);

		return view('admin.config.edit', compact('config'));
	}

	/**
	 * Update the specified adminconfig in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        //BUSCAR ID
        $config = $this->configurationRepo->findOrFail($this->id);

        //VALIDACION
        $this->validate($request, $this->rules);
        
        //GUARDAR DATOS
        $config->fill($request->all());
        $config->save();

        //MENSAJE
        session()->flash('mensaje', 'El registro se actualizó satisfactoriamente.');

        //REDIRECCIONAR A PAGINA PARA VER DATOS
        return redirect()->route('administrador.config.edit', $this->id);
	}

}
