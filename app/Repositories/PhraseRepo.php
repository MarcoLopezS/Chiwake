<?php namespace Chiwake\Repositories;

use Chiwake\Entities\Phrase;

class PhraseRepo extends BaseRepo{

    public function getModel()
    {
        return new Phrase;
    }

}