<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Librarian extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "name",
        "last_name",
        "email",
        "cell_phone",
        "address"
        
    ];
    
}
