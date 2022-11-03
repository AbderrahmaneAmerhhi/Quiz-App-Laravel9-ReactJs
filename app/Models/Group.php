<?php

namespace App\Models;

use App\Models\establishment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'establishment_id',
    ];

    public function establishment(){
        return $this->belongsTo(establishment::class,'establishment_id','id');
    }
    public function users(){
        return $this->hasMany(User::class);
    }

}
