<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'views', 'menu_id', 'body'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
