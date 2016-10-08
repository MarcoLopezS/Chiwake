<?php namespace Chiwake\Repositories;

use Chiwake\Entities\MenuCategory;

class MenuCategoryRepo extends BaseRepo {

    public function getModel()
    {
        return new MenuCategory;
    }

    //LISTAR CATEGORIAS
    public function listarCategorias()
    {
        return $this->getModel()->where('publicar',1)->orderBy('titulo', 'asc')->get();
    }

    //BUSCAR POR URL
    public function buscarUrl($url)
    {
        return $this->getModel()->where('slug_url', $url)->first();
    }

}