<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected function roleName(): Attribute
    {
        return Attribute::make(
            get: function() {
                return $this->type === static::TYPES['admin'] ? 'Admin' : 'Student';
            }
        );
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const TYPES = [
        'admin' => 1,
        'student' => 3,
    ];

    public function isAdmin()
    {
        return $this->type == static::TYPES['admin'];
    }

    public function isStudent()
    {
        return $this->type == static::TYPES['student'];
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'CourseUser', 'user_id', 'course_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify((new VerifyEmail)->onQueue('default'));
    }
}
