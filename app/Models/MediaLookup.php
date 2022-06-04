<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class MediaLookup extends Model
{
    use HasFactory;
    protected $table = "media_lookup";

    protected $fillable = [
        'model_type',
        'model_id',
        'media_id',
        'collection_name',
    ];

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}
