@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Lista znajomych<span class="label label-default">{{$user->friends()->count()}}</span></div>

                <div class="card-body">

                    @if($user->friends()->count()===0)
                    <h4 class="text-center"> BRAK Znajomywch</h4>
                    @else
                    <div class="row">
                    @foreach($user->friends() as $user)
                          <div class="col-sm-4 text-center">
                            <a href="{{url('/users/'.$user->id)}}">
                                <div class="thumbnail">
                                    <img src="{{url('user-avatar/'.$user->id.'/250')}}" alt="" class="img-responsive">
                                    <h5>{{$user->name}}</h5>
                                </div>
                            </a>

                          </div>
                    @endforeach
                    </div>

                    
                    @endif
                

                   
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
