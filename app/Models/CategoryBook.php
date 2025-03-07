<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
