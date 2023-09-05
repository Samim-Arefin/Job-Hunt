<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;

    public function rUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rJob()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
