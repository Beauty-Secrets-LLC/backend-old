@extends('emails.layout')
@section('content')
    Hi manal

    {{ json_encode($data) }}
@endsection