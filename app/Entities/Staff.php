<?php namespace Chiwake\Entities;

class Staff extends BaseEntity{

    protected $table = 'staffs';

    protected $fillable = ['nombre', 'cargo', 'descripcion', 'publicar'];

}