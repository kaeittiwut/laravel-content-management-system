<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'post_image',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Image Mutator */
    /* Don't forget to comment all of mutator function before use Seeder!! */
    public function setPostImageAttribute($value)
    {
        $this->attributes['post_image'] = asset('storage/' . $value);
    }

    /* Image Accessors */
    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false) {
            return $value;
        }
        return asset('storage/' . $value);
    }
}
