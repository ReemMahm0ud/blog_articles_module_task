<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];

    protected static function newFactory()
    {
        return \Modules\Article\Database\factories\ArticleFactory::new();
    }
}
