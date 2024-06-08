@extends('layout.admin')
@section('page-title','Blogs')
@push('links')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/slick/slick.css')}}">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen">

<!--Favicon-->
<link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
@endpush
@section('main')
{{-- @dd($blogs); --}}

@if(count($blogs) > 0)
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card overflow-scroll w-100 w-md-full">
      <div class="card-body">
        <h4 class="card-title">New blogs</h4>
        <p class="card-description"> All blogs created by users
        </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Title</th>
              <th>View Count</th>
              <th>Content</th>
              <th>Author</th>
              <th><span >Status</span></th>
              <th>Editors pick</th>
              <th><span style="color: transparent">others</span></th>
            </tr>
          </thead>
          <tbody>

              @foreach ($blogs as $blog)

              <div>
                 <tr  class="p-2 w-100"  >
                  <td onclick="replace({{$blog->id}})">{{$blog->title}} </td>
                  <td class="" onclick="replace({{$blog->id}})"><span>{{$blog->view_count}} views</span></td>
                  <td onclick="replace({{$blog->id}})">{{substr($blog->body,0,14)."...";}}</td>
                  <td   onclick="replace({{$blog->id}})" >{{$blog->user->name}}</td>
                  <td onclick="replace({{$blog->id}})">created at {{$blog->created_at}}</td>
                  @if ($blog->editors_pick == true)
                          <td>Yes</td>
                  @else
                  <td>No</td>
                  @endif
                  <td  class=" justify-content-end d-flex">
                    {{-- <button class="btn btn-link btn-warning p-1 col-3 mx-2 " style="transition:1s ease-in-out;" type="submit" title="add to trashed blogs 'blogs will be deleted permanently after 30 days'  "><i class="mdi mdi-delete"></i></button> --}}
                    @if ($blog->editors_pick != true)

                    <form action="{{route('admin.blog.editors_pick',$blog->id)}}" class=" mx-2" method="POST">
                     @method("PUT")
                     @csrf
                     <button class="btn btn-link  p-1 text-primary border-0"  type="submit" title="Mark as editors pick"><i class="mdi mdi-tooltip-edit"></i></button>
                    </form>
                    @else
                    {{-- <i class="mdi mdi-tooltip-edit" title="Editors pick"></i> --}}
                    @endif
                    <button class="btn btn-link text-danger p-1  mx-2 border-0"  type="submit" data-bs-target="#deleteModal" title="Delete Blog  Permanently" data-bs-toggle="modal" onclick="del_insert({{$blog->id}})"><i class='mdi mdi-delete-forever'></i></button>
                    </td>
                </tr>
              </div>

                @endforeach

          </tbody>
        </table>
      </div>
      <div class="card-footer d-flex flex-row">{{$blogs->links()}}</div>
    </div>
  </div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this blog</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="formbody">
                <form action="{{route('admin.blog.delete',$blog->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn p-1 text-danger" type="submit"><i class='mdi mdi-delete'></i></button>
                    </form>
            </div>
        </div>
    </div>
</div>

  @push('scripts')
  <script>

        let replace = (id) =>{
                window.location.replace('/admin-panel/blog/blog/'+id)

        }
        let del_insert = (id) =>{

                document.querySelector(".formbody").innerHTML = `
                <form action="/admin-panel/blog/delete/${id}" method="post">
                    @method('DELETE')
                 @csrf
                 <p class="card-body">
                    Blogs will be deleted forever
                    </p>
                        <button class="btn p-1 mx-2 text-danger card-footer" type="submit"><i class='mdi mdi-delete'></i></button>
                        </form>
                `

        }

  </script>
  @endpush
@else
<p>No blogs have been created</p>
@endif

@stop
