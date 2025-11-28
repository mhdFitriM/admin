<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'ip_address',
        'provider',
        'port',
        'ssh_username',
        'ssh_password',
        'ssh_key',
        'cpanel_url',
        'cpanel_username',
        'cpanel_password',
        'root_password',
        'notes',
        'status',
    ];

    protected $casts = [
        'ssh_username' => 'encrypted',
        'ssh_password' => 'encrypted',
        'ssh_key' => 'encrypted',
        'cpanel_username' => 'encrypted',
        'cpanel_password' => 'encrypted',
        'root_password' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
