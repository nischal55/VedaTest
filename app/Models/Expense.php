<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','item_name','price'];

    public function category()
    {
        return $this->belongsTo(CategoryExpenses::class, 'category_id');
    }
}
