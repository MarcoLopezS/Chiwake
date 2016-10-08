<?php namespace Chiwake\Http\ViewComposers;

use Chiwake\Repositories\MenuCategoryRepo;
use Illuminate\Contracts\View\View;

use Chiwake\Entities\Configuration;

class ProfileComposer {

    protected $menuCategoryRepo;

    /**
     * ProfileComposer constructor.
     * @param MenuCategoryRepo $menuCategoryRepo
     */
    public function __construct(MenuCategoryRepo $menuCategoryRepo)
    {
        $this->menuCategoryRepo = $menuCategoryRepo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $conf = Configuration::find(1);
        $categorias = $this->menuCategoryRepo->listarCategorias();

        $view->with(['conf' => $conf, 'categorias' => $categorias]);
    }

}