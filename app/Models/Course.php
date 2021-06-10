<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    public function showCourses(){

        
    }

  //Relacion many to many
    public function users(){
        return $this->belongsToMany(User::class, 'courses_users');
    }

}