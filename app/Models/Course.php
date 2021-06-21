<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

     protected $fillable = [
      'course_name',
      'description',
      'image',
      'date',
      'num_max'
      
  ];

  //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    //protected $fillable = ['course_name','description','image','date','num_max'];


    public function showCourses(){

    }

  //Relacion many to many
    public function users(){
      return $this->belongsToMany(User::class, 'courses_users');
    }

    public function inscritos(){
      return $this->users()->count();
    }

    public function isFull(){
      return $this->inscritos() >= $this->num_max;
    }
}