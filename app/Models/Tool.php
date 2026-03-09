<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
        use HasFactory;

        protected $fillable = [
            'name',
            'category_id',
            'description',
            'price',
        ];

        public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
       return $this->belongsToMany(Tag::class, 'tool_tag');
    }
}
