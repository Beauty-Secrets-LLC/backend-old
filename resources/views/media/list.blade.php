

<form action="{{ route('media.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" >
    <button type="submit">Ok</button>
</form>