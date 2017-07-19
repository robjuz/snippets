@extends('app')

@section('content')
    @foreach($snippets as $snippet)
    <div class="row">
        <div class="col-xs-12">
            <h2>
                <a href="{{ $snippet->route }}">
                {{ $snippet->title or "Untitled" }}
                <small class="pull-right">
                    {{ $snippet->created_at->diffForHumans() }}
                </small>
                </a>
            </h2>
        </div>
    </div>
        <hr>
    @endforeach
@endsection