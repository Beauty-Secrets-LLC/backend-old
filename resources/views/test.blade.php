hello

<form action="{{ route('dashboard.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>