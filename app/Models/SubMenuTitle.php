<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuTitle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'link', 'menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
