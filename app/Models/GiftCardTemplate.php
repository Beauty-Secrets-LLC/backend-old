<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GiftCardTemplate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ;

    
    protected $table = "giftcard_templates";
    protected $fillable = [
        'template_name',
        'status'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('giftcard-image')
        ->withResponsiveImages();
    }

}
