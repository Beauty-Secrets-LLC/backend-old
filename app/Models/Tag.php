<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\Tag as SpatieTag;

class Tag extends SpatieTag
{
    use HasFactory;

    public static function getLocale(): string
    {
        return 'mn';
    }

}
