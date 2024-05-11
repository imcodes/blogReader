<?php

namespace App\Models;

use App\Models\Scopes\UntrashedPostScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "user_id",
        "featured_image",
        "title",
        "body",
        "description",
        "editors_pick",
        "view_count",
    ];

    // protected static function boot(){
    //     parent::boot();
    //     static::addGlobalScope(UntrashedPostScope::class);
    // }
    protected $casts = ['editors_pick'=>'boolean'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    public function media_files(){
        return $this->hasMany(MediaFile::class);
    }
    
    /**
     * scope prevent temporary deleted blogs from being sent to the frontend
     */
    public function scopeUnTrashedPost(Builder $builder){
         return  $builder->whereNotNull('deleted_at');
    }
}
