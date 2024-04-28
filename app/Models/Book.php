<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    public function specimens(){
        return $this->hasMany(Specimen::class);
    }
    

    public function photos(): HasMany
    {
        return $this->hasMany(BookPhoto::class);
    }
    
    
    
}
