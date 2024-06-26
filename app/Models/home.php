<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class home extends Model
{
    use HasFactory;

    public function index()
    {
        return Home::all();
    }

    protected $guarded = ['id'];
    protected $with = [ 'author'];

    public function author()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
