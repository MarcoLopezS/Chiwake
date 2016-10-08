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

    /*
     * GETTERS
     */
    public function getImagenMenuThumbAttribute()
    {
        return "/upload/".$this->imagen_carpeta."300x300/".$this->imagen;
    }

    public function getImagenMenuAttribute()
    {
        return "/upload/".$this->imagen_carpeta.$this->imagen;
    }

    public function getUrlAttribute()
    {
        return route('front.menu.categoria', $this->slug_url);
    }
} 