<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];
    public function specimen(){
        return $this->hasMany(Specimen::class);
    }
}
