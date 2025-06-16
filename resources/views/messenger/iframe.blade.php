
@extends('base')

@section('title', config('app.name') . '| Messagerie')

@section('content')
    @include('messenger.index')
@endsection