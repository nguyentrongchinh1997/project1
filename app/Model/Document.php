<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'name', 
        'unsigned_name', 
        'dicription', 
        'type', 
        'price', 
        'download', 
        'image', 
        'url_document', 
        'preview', 
        'view', 
        'page', 
        'format', 
        'category_id',
        'date',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
