@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header text-center">Edycja użytkownik {{$user->id}} </div>
                <div class="card-body text-center">

                    <img src="{{url('user-avatar/'.$user->id.'/600')}}" alt="" class="img-responsive">
                    <form action="{{url('/users/'.$user->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
                                <label for="">Zdjęcie</label>
                                <input type="file" name="avatar" class="form-control" placeholder="wybierz plik">
                                @if($errors->has('avatar'))
                                <span class="help-block">
                                    <strong>{{$errors->first('avatar')}}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
                                <label for="">Imie i nazwisko</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="iImie i nazwisko">
                                @if($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{$errors->first('name')}}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email">
                                  @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{$errors->first('email')}}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                        </div>


                        <div class="row">
                        <div class="col-md-12 col-md-offset-2">
                        <label for="sex">Gender</label>
                        <select id="sex" type="text" class="form-control" name="sex">
                            <option value="f" @if($user->sex=='f') selected @endif>Kobieta</option>
                            <option value="m" @if($user->sex=='m')selected @endif>Mężczyzna</option>
                        </select>
                        </div>
                         </div>

                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-12 col-md-offset-2">
                              <button type="submit" class="btn btn-primary btn-sm pull-right">Zapisz zmiany</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


