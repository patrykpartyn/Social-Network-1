@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        @include('layouts.sidebar')
    
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form method="POST" action="{{ url('/posts') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('post_content') ? ' has-error' : '' }}">
                        <textarea name="post_content" class="form-control" cols="60" rows="5" placeholder="Co słychać?" style="margin-bottom: 10px;"></textarea>

                            @if ($errors->has('post_content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('post_content') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                        <button type="submit" class="btn btn-default pull-right">Dodaj post</button>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
