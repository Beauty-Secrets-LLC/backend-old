<div class="media-uploader">
    <form wire:submit.prevent="upload" id="uploader_form">
        <div class="mb-4">
            <input type="file" id="uploader" wire:model.defer="files" multiple>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Хуулах</button>
        </div>
    </form>
</div>

@section('styles')
    <style>
        .media-uploader {
            text-align: center;
            padding: 40px;
            border:dashed 2px #1e1e2d;
        }
        
    </style>
@endsection

