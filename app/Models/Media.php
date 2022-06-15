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

    const sizes = [
        'thumbnail'         => ['width' => 250, 'height' => 250],
        'shop_thumbnail'    => ['width' => 500, 'height' => 500]
    ];
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
        if(!preg_match('/[А-Яа-яЁё]/u', $url)) {
            $img = \Image::make($url);
            $filename = basename($url);
            
            $path = 'synced/'.date('Y/m').'/'.$filename;
            $upload = Storage::disk('gcs')->put($path, $img->stream());
            
            $responsive = [];
            $crop_size = intval(min($img->width(), $img->height()));
            $position_value =  intval((max($img->width(), $img->height()) - min($img->width(), $img->height()))/2);
            $posistion_x = ($img->width() >= $img->height()) ? $position_value : 0;
            $posistion_y = ($img->width() <= $img->height()) ? $position_value : 0;
    
            foreach(self::sizes as $size_id => $size) {
                $res_filename = preg_replace("/\.[^.]+$/", "", basename($url));
                $res_filename .= '-'.$size_id.'.'.pathinfo(basename($url), PATHINFO_EXTENSION);
                $res_path = 'synced/'.date('Y/m').'/'.$res_filename;
                $resized_image =  \Image::make($url)->crop($crop_size, $crop_size, $posistion_x, $posistion_y)->resize($size['width'], $size['height']);
                $upload = Storage::disk('gcs')->put($res_path, $resized_image->stream());
    
                $responsive[$size_id] = [
                    'url'       => $res_path,
                    'full_url'  => Media::storage_domain.$res_path,
                ];
            }
            $media = Media::create([
                'name'              => $filename,
                'url'               => $path,
                'full_url'          => Media::storage_domain.$path,
                'mime_type'         => $img->mime,
                'size'              => Storage::disk('gcs')->size($path),
                'custom_properties' => null,
                'responsive_images' => $responsive,
                'user_id'           => auth()->user()->id
            ]);
            return $media;
        }

        return false; 

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
            if(!empty($media->responsive_images)) {
                foreach($media->responsive_images as $image_variation) {
                    Storage::disk('gcs')->delete( $image_variation['url'] );
                }
            }
        });
    }

}
