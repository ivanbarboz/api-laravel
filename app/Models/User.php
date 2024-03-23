<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "last_name",
        "email",
        "password",
        "cell_phone",
        "addres"
    ];
    public function loan(){
        return $this->hasMany(Loan::class);
    }
}
