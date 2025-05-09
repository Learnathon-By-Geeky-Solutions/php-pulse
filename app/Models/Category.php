<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // relationship is here

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    
}
