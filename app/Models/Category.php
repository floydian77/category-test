<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
    ];

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
