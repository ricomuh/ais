<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'link', 'menu_id', 'sub_menu_title_id'];
}
