<?php namespace Chiwake\Repositories;

use Chiwake\Entities\About;

class AboutRepo extends BaseRepo{

    public function getModel()
    {
        return new About;
    }

}