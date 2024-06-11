<?php

namespace App\Core\Log\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'created',
        'client',
        'message',
        'level',
        'user_id',
    ];

    protected $casts = [
        'created' => 'datetime',
        'client' => 'string',
        'message' => 'string',
        'level' => 'string',
        'user_id' => 'integer',
    ];
}
