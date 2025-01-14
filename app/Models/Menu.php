<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'link'];

    public function subMenuTitles()
    {
        return $this->hasMany(SubMenuTitle::class);
    }
    public function subMenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
