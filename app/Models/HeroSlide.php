<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory, MultiLanguage;

    protected $multi_lang = [
        'paragraph',
        'btn_text',
        'small_centered_text'
    ];
}
