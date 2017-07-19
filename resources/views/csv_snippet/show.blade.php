@extends('app')

@section('content')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $snippet->title or "Untitled" }}</div>

        {!! $snippet->body !!}

    </div>

@endsection