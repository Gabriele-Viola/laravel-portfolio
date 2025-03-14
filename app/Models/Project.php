<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // public $casts = [
    //     'technologies' => 'array',
    // ];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function technology()
    {
        return $this->belongsToMany(Technology::class);
    }
}
