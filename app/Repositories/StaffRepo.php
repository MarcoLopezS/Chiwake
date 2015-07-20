<?php namespace Chiwake\Repositories;

use Chiwake\Entities\Staff;

class StaffRepo extends BaseRepo{

    public function getModel()
    {
        return new Staff;
    }

}