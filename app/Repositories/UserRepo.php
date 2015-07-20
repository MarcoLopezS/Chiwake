<?php namespace Chiwake\Repositories;

use Chiwake\Entities\User;

class UserRepo extends BaseRepo{

    public function getModel()
    {
        return new User;
    }

    public $filters = ['email'];

    public function filterByEmail($q, $value)
    {
        $q->where('email', 'LIKE', "%$value%");
    }
}