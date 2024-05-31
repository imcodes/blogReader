@extends('layout.admin')
@section('page-title', "Your Profile")
@section('main')

<div class="row w-100">
    <div class="col-5">

    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header"><b>Edit username,email and password</b></div>
            <div class="card-body">
                    <div class="form-group">
                      <label for="">Name:</label>
                      <input type="text" class="form-control" name="name" id="" value="{{$user->name}}" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">Email:</label>
                      <input type="email" class="form-control" name="email" id="" value="{{$user->email}}" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <div class="form-group">
                      <label for="">Password:</label>
                      {{-- {{dd(session('password'))}} --}}
                      <input type="text" class="form-control" name="password" id="" value="password" aria-describedby="helpId" placeholder="">
                      <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Change profile</button>
            </div>
        </div>
    </div>
</div>

@endsection
