<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'book_code', 'title' , 'cover' , 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    

    //membuat relasi dengan category
    public function categories() 
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id','category_id');
        // Category = models category
        // book_category = nama tabel
        // book_id dan  category_id = nama colum di tabel book_category
    }
}
