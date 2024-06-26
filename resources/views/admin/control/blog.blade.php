@extends('layout.admin')
@section('page-title','Blog')
@section('main')
    {{-- {{dd($blog[0]->category[0]->category_name)}} --}}
    <div class="w-25 row">
        <a href="{{route('admin.blog.index')}}" class=" col-6 btn btn-link p-1">Go Back &lAarr;</a>
        @if (Auth::user()->user_level != 4)
            
        <button data-bs-target="#modal" data-bs-toggle="modal" class="btn btn-primary p-1 col-6">category</button>
        @endif
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card p-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                            <i class="img-sm rounded-circle me-3 mdi mdi-face"></i>
                            <span>{{ucwords($blog[0]->user->name)}}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted font-weight-light">
                            <i class="mdi mdi-clock icon-sm me-2"></i>
                            <span>{{$blog[0]->created_at}}</span>
                        </div>
                    </div>
                    <img src="{{asset('storage/blogfiles/'.$blog[0]->featured_image)}}" class='card-img' alt="" >
                    <div class="d-flex mt-5 align-items-top">
                <div class="mb-0 flex-grow">
                  <h5 class="me-2 mb-2">TITLE : {{$blog[0]->title}}</h5>
                  <p class="mb-0 font-weight-light">{!!$blog[0]->body!!}</p>
                </div>
                <div class="ms-auto">
                  <i class="mdi mdi-heart-outline text-muted"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content card ">
                <div class="modal-header card-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="formbody card-body">
                <p>Blog belongs to category <b>{{$blog[0]->category[0]->category_name}}</b>,<br>
                    do you want to change it.</p>
                    <button class="btn btn-primary btn-sm" onclick="categoryList({{$blog[0]->id}})">yes</button>
                </div>
              </div>
            </div>
          </div>
          {{-- @foreach ($collection as $item)

          @endforeach --}}
          @push('scripts')
          <script>
            let categoryList = (id) =>{
                document.querySelector('.formbody').innerHTML = `
                <button class='btn btn-link btn-sm' style="font-familly:cursive" onclick="back()">back</button>
                <form action='/admin-panel/blog/change_category/${id}' method='post'>
                    @method('PUT')
                    @csrf
                    <select name='name'>
                        @foreach ($category as $item)
                        <option>{{$item->category_name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary">change</button>
                </form>
                `
            }
            let back = () =>{
                document.querySelector('.formbody').innerHTML=`
                <p>Blog belongs to category <b>{{$blog[0]->category[0]->category_name}}</b>,<br>
                    do you want to change it.</p>
                    <button class="btn btn-primary btn-sm" onclick="categoryList({{$blog[0]->id}})">yes</button>
                `
            }
          </script>
          @endpush
@endsection
