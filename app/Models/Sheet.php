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
        'author_id',
        'visits',
        'pinned'
    ];

    protected $attributes = [
		'theme' => 1
	];

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function fields(){
        return $this->hasMany(CheatField::class);
    }

    public function getThemes(){
        return [
            1 => 'dark',
            2 => 'light',
            3 => 'red',
            4 => 'gold',
            5 => 'blue',
        ];
    }

    public function getThemeAttribute($attribute){
		return $this->getThemes()[$attribute];
	}

    public function scopePinned($query){
		return $query->where('pinned','1');
	}

}
