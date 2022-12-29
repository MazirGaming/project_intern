<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use HasFactory;

    public const IS_ONLINE = [
        'online' => 1,
        'offline' => 0,
    ];

    public function courseUser()
    {
        return $this->hasOne(CourseUser::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function courseType(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->is_online === static::IS_ONLINE['online'] ? 'online' : 'offline';
            }
        );
    }
}
