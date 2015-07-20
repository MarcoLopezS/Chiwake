<?php namespace Chiwake\Repositories;

use Chiwake\Entities\MenuCategory;

class MenuCategoryRepo extends BaseRepo {

    public function getModel()
    {
        return new MenuCategory;
    }
}