<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'value',
        'description',
        'service',
    ];

    protected $casts = [
        'value' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
