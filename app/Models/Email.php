<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'from', 'to', 'cc', 'subject', 'type', 'body', 'ip', 'user_agent'
    ];
}