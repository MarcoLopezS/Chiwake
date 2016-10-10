<?php namespace Chiwake\Entities;

class Menu extends BaseEntity{

    protected $fillable = ['titulo','slug_url','descripcion','precio','menu_category_id','published_at','publicar'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('Chiwake\Entities\MenuCategory', 'menu_category_id');
    }

    /*
     * GETTERS
     */
    public function getImagenMenuThumbAttribute()
    {
        $imagen = "/upload/".$this->imagen_carpeta.$this->imagen;

        if(file_exists($imagen)){
            return "/upload/".$this->imagen_carpeta."400x300/".$this->imagen;
        }else{
            return "/upload/imagen.jpg";
        }
    }

} 