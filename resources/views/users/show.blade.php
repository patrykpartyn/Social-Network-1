@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md3 col-md-offset-1">
            <div class="card">
                <div class="card-header">
                Użytkownik
                @if($user->id===Auth::id())
                <a href="{{url('/users/'. $user->id .'/edit')}}" class="pull-right"><small>Edytuj</small></a>
                @endif
            </div>

                <div class="card-body text-center">
                <img src="{{url('user-avatar/'.$user->id.'/250')}}" alt="" class="img-responsive">
                   <h2> <a href="{{url('/users/' . $user->id)}}">{{$user->name}}</a></h2>
                    @if($user->sex=='m')
                    <p>Mężczyzna</p>
                    @else
                    <p>Kobieta</p>
                    @endif
                    <p>{{$user->email}}</p>
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Użytkownik</div>

                <div class="card-body">
                   <p>Lorem ipsum Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from .</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
