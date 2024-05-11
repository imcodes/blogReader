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
                <caption>Employee List</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>created_at</th>
                        <th>____</th>
                        {{-- <th>updated_at</th> --}}
                    </tr>
                </thead>
                <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td data-cell="name">{{$user->name}}</td>
                        <td data-cell="email">{{$user->email}}</td>
                        <td data-cell="role">{{$user->user_role}}</td>
                        <td data-cell="created_at">{{$user->created_at}}</td>
                        <td class="d-flex">
                            <form action="/delete/{{$user->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger p-2" title="delete user" type="submit"><i class='mdi mdi-delete'></i></button>
                            </form>
                            <a href="/admin-panel/user/manage/{{$user->id}}" class="btn btn-primary p-2 btn-sm "><i class="fas fa-optin-monster    "></i></a>
                        </td>
                        {{-- <td data-cell="updated_at">{{$user->updated_at}}</td> --}}
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        </div>
    </div>



@endsection
