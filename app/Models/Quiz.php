<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    use HasFactory;
    protected $fillable = [
        'quiz_cate_id',
        'title',
        'quizdata',
    ];

    // for store array
    protected $casts = [
        'quizdata' => 'array'
    ];
    public function quizcat(){
        return $this->belongsTo(QuizCate::class,'quiz_cate_id','id');
    }
    public function quizresults(){
        return $this->belongsToMany(QuizResult::class);
    }
}
