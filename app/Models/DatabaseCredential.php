<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseCredential extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'name',
        'type',
        'host',
        'port',
        'database_name',
        'username',
        'password',
        'connection_string',
        'notes',
    ];

    protected $casts = [
        'username' => 'encrypted',
        'password' => 'encrypted',
        'connection_string' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
