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
            1 => 'light',
            2 => 'dark',
            3 => 'danger',
            4 => 'warning'
        ];
    }

    public function getThemeAttribute($attribute){
		return $this->getThemes()[$attribute];
	}
}
