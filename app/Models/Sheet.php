<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'theme',
        'author_id'
    ];

    public function author(){
        return $this->belongsTo(User::class);
    }
}
