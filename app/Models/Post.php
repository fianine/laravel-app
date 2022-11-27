<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @property string $id
 * @property string $title
 * @property string $desc
 * @property string $website_id
 */

class Post extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'desc',
        'website_id'
    ];

    protected $casts = [
        'id' => 'string'
    ];
}
