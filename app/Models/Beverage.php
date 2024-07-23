<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Beverage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'price',
        'published',
        'special', 
        'image',
        'category_id', 
 

    ];
 public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : 'No date available';
    }
}
