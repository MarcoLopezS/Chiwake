<?php namespace Chiwake\Repositories;

use Chiwake\Entities\Menu;

class MenuRepo extends BaseRepo{

    public function getModel()
    {
        return new Menu();
    }

    public $filters = ['search', 'category', 'publicar'];

    public function filterByCategory($q, $value)
    {
        $q->where('menu_category_id', $value);
    }
    
    //LISTAR POR CATEGORIA
    public function listarMenusPorCategoria($id)
    {
        return $this->getModel()->where('menu_category_id', $id)->get();
    }
}