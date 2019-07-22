<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public $timestamps = false;
    protected $table = "tbl_document";
    protected $fillable = [
        'name', 
        'unsigned_name', 
        'dicription', 
        'type', 'price', 
        'download', 
        'image', 
        'url_document', 
        'preview', 
        'view', 
        'page', 
        'format', 
        'id_category',
        'date'
    ];


    public function category(){
        return $this->belongsTo("App\Category", "id_category", "id");
    }
}
