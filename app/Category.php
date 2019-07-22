<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_category";
    protected $fillable = [
        'name', 
        'unsigned_name', 
        'type'
    ];

    public function post()
    {
        return $this->hasMany("App\Post", "id_category", "id");
    }

    public  function document()
    {
        return $this->hasMany("App\Document", "id_category", "id");
    }

    public function listCategory()
    {
        return $this->where("type", 0)->get();
    }
    public function listAllCategory()
    {
        return $this->all();
    }
}
