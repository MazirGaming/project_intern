<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'link',
        'price',
        'created_by',
        'category_id',
        'old_price',
        'benefits',
        'description',
        'content',
        'meta_title',
        'meta_desc',
        'meta_keyword',
    ];

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['created_by'] = Auth::user()->id;
            if (!empty($model['benefits'])) {
                $model['benefits'] = explode(",", $model['benefits']);
                $model['benefits'] = json_encode($model['benefits']);
            }
        });

        self::updating(function ($model) {
            $model['created_by'] = Auth::user()->id;
            if (!empty($model['benefits'])) {
                $model['benefits'] = explode(",", $model['benefits']);
                $model['benefits'] = json_encode($model['benefits']);
            }
        });
    }

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
            get: fn () => $this->is_online === static::IS_ONLINE['online'] ? 'online' : 'offline'
        );
    }

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->photo = $this->attachment->file_name
        );
    }
}
