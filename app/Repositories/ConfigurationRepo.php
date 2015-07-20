<?php namespace Chiwake\Repositories;

use Chiwake\Entities\Configuration;

class ConfigurationRepo extends BaseRepo{

    public function getModel()
    {
        return new Configuration;
    }

}