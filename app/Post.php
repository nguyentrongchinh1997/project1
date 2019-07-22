<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_post";
    protected $fillable = [
        'title', 
        'unsigned_title', 
        'content', 
        'image', 
        'view', 
        'date', 
        'id_category'
    ];


    public function category()
    {
        return $this->belongsTo("App\Category", "id_category", "id");
    }

    public function listPost()
    {
        return $this->all();
    }

    
}
