@extends('layout.admin')
@section('page-title', "Your Profile")
{{-- @dd($profile) --}}
@section('main')
@push('links')
{{-- hhhhhhh --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" >
@endpush
{{-- <a href="{{route('author',)}}" class="btn btn-primary">My public profile</a> --}}
<div class="row w-100">

    <div class="col-12 my-2">
        <div class="card">
            <div class="card-header "><b>Set up your profile</b></div>
            <div class="card-body">
                <form action="{{route('admin.profile.update_profile')}}" method="POST">
                    @csrf
                    <div>
                        <b> Add your profile image:</b>
                    <div class="container" style="width:364px;">
                    <input name="profile_image" type="file" class="dropify" data-default-file="url_of_your_file" data-allowed-file-extensions="png jpg jpeg" />
                    </div>
                    </div>
                    
                    <div class="container">
                        <div class="form-group">
                            <label for="description">Description</label>
                          <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 my-2">
        <div class="card">
            <div class="card-header"><b>Edit username,email and password</b></div>
            <form action="{{route('edit_profile')}}" method="POST">
                @method('PUT')
                @csrf
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

                    <button type="submit" class="btn btn-primary">Change profile</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-12 my-2">
        <div class="card">

            <div class="card-header "> <b>Change your password</b></div>
            <div class="bg-primary badge badge-primary badge-pill p-1 my-2">{{session('success')}}</div>
            <form action="{{route('admin.profile.change_password')}}" method="POST" class="card-body">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label for="">Old-Password:</label>
                    {{-- {{dd(session('password'))}} --}}
                    <input type="text" class="form-control" name="old_password" id="" value="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <div class="form-group">
                    <label for="">Password:</label>
                    {{-- {{dd(session('password'))}} --}}
                    <input type="text" class="form-control" name="new_password" id="" value="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                  </div>
                  <button type="submit" class="btn btn-primary">Change password</button>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>

      <script>
      $('.dropify').dropify();
      </script>
@endpush
@endsection
