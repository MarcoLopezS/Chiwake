<?php namespace Chiwake\Entities;

class MenuCategory extends BaseEntity{

    protected $fillable = ['titulo','publicar'];

    protected $perPage = 10;

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function menu()
    {
        return $this->hasMany('Chiwake\Entities\Menu');
    }

} 