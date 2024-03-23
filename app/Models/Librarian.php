<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "last_name",
        "email",
        "cell_phone",
        "addres"
    ];
    public function rol(){
        return $this->belongsToMany(Role::class, 'Librarian_roles');
    }
}
