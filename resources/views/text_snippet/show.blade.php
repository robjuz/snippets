@extends('app')

@section('content')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $snippet->title or "Untitled" }}</div>
        <div class="panel-body">
            <pre>{{ $snippet->body }}</pre>
        </div>

    </div>

@endsection