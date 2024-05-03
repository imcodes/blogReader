<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'blog_id'
    ];
    public function blog(){
        return $this->belongsTo(blog::class);
    }
}
