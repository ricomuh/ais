<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedTag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'tag_id', 'icon_class'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
