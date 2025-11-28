<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'github_url',
        'live_url',
        'status',
        'tech_stack',
        'server_id',
        'notes',
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function databaseCredentials()
    {
        return $this->hasMany(DatabaseCredential::class);
    }

    public function files()
    {
        return $this->hasMany(StoredFile::class);
    }
}
