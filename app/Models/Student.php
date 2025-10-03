<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{


    protected $fillable = [
        'name',
        'description',
        'image',
        'department_id'
    ];
     public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
