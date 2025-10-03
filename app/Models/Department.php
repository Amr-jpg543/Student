<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    
    protected $fillable = [
        'name',
        
        
        'description',
       
        
    ];
 
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // لما يتحذف القسم امسح كل الطلاب اللي تحته
    protected static function booted()
    {
        static::deleting(function ($department) {
            $department->students()->delete();
        });
    }
    
}
