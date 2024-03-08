<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';
    protected $fillable = ['category'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id');
    }
}
