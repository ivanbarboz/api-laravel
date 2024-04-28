<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        "name",
        "last_name"
    ];
    public function book(){
        return $this->hasMany(Book::class);
    }

    public function photos() :HasMany
    {
        return $this->hasMany(AuthorPhoto::class);
    }
}
