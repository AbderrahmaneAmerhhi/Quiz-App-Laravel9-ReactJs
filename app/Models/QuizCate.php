<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizCate extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];
    public function quizes(){
        return $this->hasMany(Quiz::class,'id');
    }
}
