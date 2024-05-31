<?php $id=0 ?>
@extends('layout.admin')
@push('links')
        <link rel="stylesheet" href="{{asset("css/mobile-table.css")}}">
        <link rel="stylesheet" href="{{asset("font-awesome/css/font-awesome.min.css")}}">
@endpush
@section('main')

    <div class="card">
    <div class="card-body">
    <div class="table-container p-1">
            <table class="table table-stripe table-mobile">
                <caption>Users</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>created_at</th>
                        <th></th>
                        {{-- <th>updated_at</th> --}}
                    </tr>
                </thead>
                <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td data-cell="name">{{ucwords($user->name)}}</td>
                        <td data-cell="email">{{$user->email}}</td>
                        <td data-cell="role">{{slug_to_string($user->user_role)}}</td>
                        <td data-cell="created_at">{{$user->created_at}}</td>
                        <td class="d-flex">
                            <button class="btn btn-link text-danger p-2" data-bs-target="#modal" data-bs-toggle="modal" onclick="setdel({{$user->id}})" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>
                            <a href="/admin-panel/user/manage/{{$user->id}}" class="btn btn-link text-primary p-2 btn-sm " title="Manage User"><i class="mdi mdi-account-settings"></i></a>
                        </td>
                        {{-- <td data-cell="updated_at">{{$user->updated_at}}</td> --}}
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="formbody">
            <form action="{{route('deleteuser',$id)}}" method="POST">
            <div class="modal-body">
                    @method('DELETE')
                    @csrf
            </div>
            <div class="modal-footer">
                <button class="btn btn-link text-danger p-2" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>
            </div>
        </form>
    </div>
          </div>
        </div>
      </div>
@push('scripts')
      <script>
        let setdel = (id) =>{
            document.querySelector('.formbody').innerHTML =
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
