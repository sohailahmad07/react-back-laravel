<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'feature_img',
        'description',
    ];

    protected $appends = ['feature_img_url'];

    public function featureImgUrl():Attribute{
        return Attribute::get(fn () => Storage::disk('public')->url($this->feature_img));
    }
}
