@extends('app')

@section('content')
    <form action="{{ route('snippet.store') }}" method="post" role="form" enctype="multipart/form-data">
        <legend>New snippet</legend>

        @if ($errors)
            <div class="bg-danger">
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        <div class="form-group">
            <label for="title" class="sr-only control-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Snippet title">
        </div>

        <div class="form-group">
            <label for="body" class="sr-only control-label">Snippet body</label>
            <textarea class="form-control"
                      name="body"
                      rows="10"
                      placeholder="Paste your code here ...">
                {{ old('body') }}
            </textarea>
        </div>

        <div class="form-group">
                <input type="file" name="file" class="form-control">
        </div>

        <div class="form-group">
            <select name="language" class="form-control">
                <option value=""> -- Select Language --</option>
                @foreach(\App\Snippet::$languages as $id => $language)
                    <option value="{{ $id }}">{{ $language }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection