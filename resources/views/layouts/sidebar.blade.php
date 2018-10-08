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

                    @if(Auth::check() && $user->id != Auth::id())
                    <form method="POST" action="{{url('friends/'.$user->id)}}"></form>
                    <button class="btn btn-success">Zaproś do znajomych</button>
                    @endif

                    

                    
                </div>
            </div>
</div>