<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailPost
 * @package App\Models
 * @property string $id
 * @property string $post_id
 * @property string $user_id
 * @property string $status
 */

class EmailPost extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'status'
    ];
}
