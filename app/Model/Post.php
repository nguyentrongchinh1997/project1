<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 
        'unsigned_title', 
        'content', 
        'image', 
        'view', 
        'date', 
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
