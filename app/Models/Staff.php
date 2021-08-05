<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo',  'address', 'email', 'structural_role', 'functional_role', 'formal_education', 'nonformal_education'];
}
