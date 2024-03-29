<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function lession()
    {
        return $this->belongsTo(Lession::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
