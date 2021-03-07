<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Gets the products tht belongs to a category
     * @param Category $category , Can be null
     */
    public function scopeWithCategory($query,$category)
    {
        if($category) //checks if the category is not null
            return $query->where('category_id',$category->id);
        else 
            return $query;
    }
}
