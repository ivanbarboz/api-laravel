<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specimen extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "statu_id",
        "book_id"
    ];
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function statu(){
        return $this->belongsTo(Statu::class);
    }
    public function loan(){
        return $this->hasMany(Loan::class);
    }
    
    
}
