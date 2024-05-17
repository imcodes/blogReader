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
  $sus = 'suspend user';
$msg = 'active';
$msg_type = 'success';
      if ($user->suspended != NULL || 0) {
        # code...
        $msg = "SUSPENDED";
        $msg_type = 'warning';
        $sus = 'unsuspend user';
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
                                <form action="/delete/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary" type="submit">Delete</button>
                                </form>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center my-2">
                            <div class="d-flex flex-row align-items-center">
                                <form action="{{route('admin.control.suspend',$user->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">{{$sus}}</button>
                                </form>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <a class="btn btn-link" href="/admin-panel/user/roles/{{$user->id}}">Change_role</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection
