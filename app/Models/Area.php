<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function children(){
        return $this->hasMany(Area::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Area::class, 'parent_id');
    }
}
