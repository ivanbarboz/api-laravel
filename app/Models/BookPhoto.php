<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;



class BookPhoto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    protected $fillable = ['uri', 'book_id'];
    

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    protected function uri(): Attribute
    {
        return Attribute::make(
            //get: fn (string $value) =>  "images/{$value}",
            set: fn (string $value) => "storage/{$value}",
        );
    } 

}
