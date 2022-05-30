<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\MediaLookup;

class Media extends Model
{
    use HasFactory;
    protected $table = "media";

    protected $casts = [
        'custom_properties'     =>  'array',
        'responsive_images'     =>  'array',
        'created_at'            => 'datetime:Y-m-d H:i:s',
        'updated_at'            => 'datetime:Y-m-d H:i:s'
    ];
    protected $fillable = [
        'collection_name',
        'name',
        'url',
        'mime_type',
        'size',
        'user_id',
        'custom_properties',
        'responsive_images'
    ];

    

    public static function upload($file) {
        $uploaded_file = Storage::disk('gcs')->put(date('Y/m'), $file);
        $media = Media::create([
            'name'              => $file->getClientOriginalName(),
            'url'               => $uploaded_file,
            'mime_type'         => $file->getClientMimeType(),
            'size'              => $file->getSize(),
            'custom_properties' => null,
            'responsive_images' => null,
            'user_id'           => auth()->user()->id
        ]);
        return $media;
    }

    public function attachTo($model, $model_id, $collection_name = 'default') {
        $q = MediaLookup::create([
            'model_type'        => $model,
            'model_id'          => $model_id,
            'media_id'          => $this->id,
            'collection_name'   => $collection_name,
        ]);

        return $q;
    } 

}
