<div class="media-uploader mb-10">
    <form wire:submit.prevent="upload" id="form_uploader">
        <input type="file" class="d-none" id="input_uploader" wire:model="files" multiple>
        <div>
            <button type="button" id="button_selector" class="btn btn-primary">Файл сонгох</button> 
        </div>
        {{-- <div wire:loading wire:target="files">Uploading...</div>
        @if ($files)
            <div>
                @foreach ($files as $file)
                    <img class="h-100px" src="{{ $file->temporaryUrl() }}">
                @endforeach   
            </div>
        @endif --}}

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

@push('js')
    <script>
        jQuery('#button_selector').click(function(){
            jQuery('#input_uploader').click();
        });

        jQuery('#input_uploader').change(function(){
            jQuery('#form_uploader').submit();
            // Livewire.emit('media:upload');
        });
    </script>
@endpush

