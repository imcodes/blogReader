@extends('layout.admin')
@section('main')
    <form action="/admin-panel/user/submit_role/{{$user->id}} " method="POST">
        @csrf
        <div class="form-group">
            <label for="role">select user role</label>
            <select class="form-control" name="role" id="role" value='{{old('role')}}'>
              <option>user</option>
              <option>author</option>
              <option>moderator</option>
              <option>community_manager</option>
              <option>regular_admin</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
