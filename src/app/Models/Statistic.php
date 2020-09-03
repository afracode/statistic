<?php

namespace Afracode\Statistic\App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'uri',
        'method',
        'status_code',
        'ip',
        'session_id',
        'user_id',
        'server',
        'input',
        'created_at',
        'updated_at',
    ];


    protected $casts = [
        'uri' => 'string',
        'method' => 'string',
        'status_code' => 'integer',
        'ip' => 'string',
        'session_id' => 'string',
        'user_id' => 'integer',
        'server' => 'json',
        'input' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
