<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "loan_date",
        "return_date",
        "specimen_id",
        "user_id"    
    ];
    public function specimen(){
        return $this->belongsTo(Specimen::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
