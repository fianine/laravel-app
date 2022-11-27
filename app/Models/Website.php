<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Website
 * @package App\Models
 * @property string $id
 * @property string $name
 * @property string $domaine
 */

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'domain'
    ];

    protected $casts = [
        'id' => 'string'
    ];
}
