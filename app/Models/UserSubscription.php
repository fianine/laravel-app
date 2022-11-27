<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserSubscription
 * @package App\Models
 * @property string $id
 * @property string $website_id
 * @property string $user_id
 */

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'website_id'
    ];
}
