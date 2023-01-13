<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'attachbale_id',
        'attachable_type',
        'file_name',
        'extension',
        'mime_type',
        'size'
    ];

    public function attachable()
    {
        return $this->morphTo();
    }
}
