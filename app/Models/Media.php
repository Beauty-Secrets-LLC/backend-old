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

    const storage_domain = 'https://cdn.beautysecrets.mn/';

    protected $casts = [
        'custom_properties'     => 'array',
        'responsive_images'     => 'array',
        'created_at'            => 'datetime:Y-m-d H:i:s',
        'updated_at'            => 'datetime:Y-m-d H:i:s'
    ];
    protected $fillable = [
        'collection_name',
        'name',
        'url',
        'full_url',
        'mime_type',
        'size',
        'caption',
        'user_id',
        'custom_properties',
        'responsive_images'
    ];

    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function upload($file) {
        $uploaded_file = Storage::disk('gcs')->put('uploads/'.date('Y/m'), $file);
        $media = Media::create([
            'name'              => $file->getClientOriginalName(),
            'url'               => $uploaded_file,
            'full_url'          => Media::storage_domain.$uploaded_file,
            'mime_type'         => $file->getMimeType(),
            'size'              => $file->getSize(),
            'custom_properties' => null,
            'responsive_images' => null,
            'user_id'           => auth()->user()->id
        ]);
        return $media;
    }

    public static function upload_from_url($url){
        //dd(preg_match('/[А-Яа-яЁё]/u', $url));
    
        $filename = basename($url);
        $path = 'synced/'.date('Y/m').'/'.$filename;
        $img = \Image::make(urlencode($url));
        dd($img);
        $uploaded_file = Storage::disk('gcs')->put($path, $img->stream());
        dump(Storage::disk('gcs')->size($path));
        dd( $uploaded_file );

       

        return $uploaded_file;
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


    public static function boot() {
        parent::boot();

        static::deleting(function($media) { 
            //delete file from cloud storage
            Storage::disk('gcs')->delete($media->url);
        });
    }

}
