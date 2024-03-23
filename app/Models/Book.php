<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "author_id",
        "gender_id"
    ];
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function specimen(){
        return $this->hasMany(Specimen::class);
    }
    
    
}
