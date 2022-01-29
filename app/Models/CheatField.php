<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheatField extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'info',
        'sheet_id'
    ];

    public function sheet(){
        return $this->belongsTo(Sheet::class);
    }
}
