@extends('layout.admin')
@section('main')
  {{-- <p>{{$user->id}}</p>
  <p>{{$user->email}}</p>
  <p>{{$user->name}}</p>
  <p>{{$user->created_at}}</p>
  <p>{{$user->updated_at}}</p> --}}
<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
  @php
  $sus = 'Suspend User';
$msg = 'active';
$msg_type = 'success';
$action = route('admin.control.suspend',$user->id);
      if ($user->suspended != false || 0) {
        # code...
        $msg = "SUSPENDED";
        $msg_type = 'warning';
        $action = route('admin.control.unsuspend',$user->id);
        $sus = 'Unsuspend User';
      }
  @endphp
                      <div class="card-body">
                        <h4 class="card-title">{{ucwords($user->name)}}
                            <span class="badge badge-{{$msg_type}} badge-pill">{{ucwords($msg)}}</span>
                        </h4>
                        <h6>Id:{{$user->id}}</h6>
                        <hr>
                        <p>Role : {{ucwords($user->user_role)}}</p>
                        <p class="card-description">Has created <code>{{count($blog)}}</code> <span>blogs</span>
                        </p>
                        <div class="row">
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">

                                    <button class="btn btn-primary" type="submit" data-bs-target="#modal1" data-bs-toggle="modal" onclick="setdel({{$user->id}})">Delete</button>

                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center my-2">
                            <div class="d-flex flex-row align-items-center">
                                <form action="{{$action}}" method="POST">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">{{$sus}}</button>
                                </form>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <a class="btn" data-bs-target="#modal" data-bs-toggle="modal" >Change Role</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal modal-fade  " id='modal' tabindex='-1' aria-labelledby='examplemodallabel' aria-hidden="true">
                    <div class="modal-dialog p-2">
                        <div class='modal-content card'>
                            <div class="modal-header card-header">
                                <div class=""> Change Role </div>
                            </div>
                            <div class='modal-body card-body'>
                                <form action="{{route('admin.control.submit_role',$user->id)}}" method="POST" class="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="role">Select user role</label>
                                        <select class="form-control" name="role" id="role" value='{{old('role')}}'>
                                          <option>user</option>
                                          <option>author</option>
                                          <option>moderator</option>
                                          <option>community_manager</option>
                                          <option>regular_admin</option>
                                        </select>
                                      </div>
                                      <div class="justify-space-evenly w-100">
                                          <button type="submit" class="btn btn-sm btn-primary">Change Role</button>
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-default p-1">Close</button>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="formbody1">


                    </div>
                          </div>
                        </div>
                      </div>

                      @push('scripts')
      <script>
        let setdel = (id) =>{
            document.querySelector('.formbody1').innerHTML =
            `<form action='/delete/${id}' method="POST">
                <div class="modal-body">
             @method('DELETE')
             @csrf
     </div>
     <div class="modal-footer">
        <button class="btn btn-link text-danger p-2" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>
    </div>
 </form>
    `
        }
    </script>
@endpush
@endsection
