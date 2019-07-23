<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 
        'unsigned_name', 
        'type',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

}
