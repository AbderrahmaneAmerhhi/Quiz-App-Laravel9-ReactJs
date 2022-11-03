<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{

    use HasFactory;
    protected $fillable =[
       'user_id',
       'quizze_id',
       'note',
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function quizes(){
        return $this->belongsToMany(Quiz::class);
    }
}
