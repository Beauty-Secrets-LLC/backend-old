<form action="{{ route('subscription.import_transaction') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="file" name="transaction_file">
    <button type="submit">Ok</button>
</form>