<?php

namespace App\Http\Livewire\Media;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Media;

class Upload extends Component
{
    use WithFileUploads;
    public $files = [];
    
    protected $listeners = [
        '$refresh',
        'media:upload' => 'upload'
    ];

    public function render()
    {
        return view('livewire.media.upload');
    }

    public function upload() {
        
            $this->validate([
                'files.*' => 'image|max:1024', // 1MB Max
            ]);
            foreach ($this->files as $file) {
                $uploaded_file = $file->store('uploads/'.date('Y/m'), 'gcs');
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
            }
            $this->files = [];
            $this->emitTo('media.list-view', '$refresh');
        
    }
}
