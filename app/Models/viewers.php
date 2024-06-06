<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viewers extends Model
{
    use HasFactory;
    protected $fillable = [
        'viewer_id',
        'blog_id'
    ] ;
}
