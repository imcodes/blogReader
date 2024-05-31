@extends('layout.admin')
@section('page-title','Blog')
@section('main')
    {{-- {{dd($blog[0]->featured_image)}} --}}
    <a href="{{route('admin.blog.index')}}" class="back btn btn-link">&lAarr;</a>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                            <i class="mdi mdi-account-outline icon-sm me-2"></i>
                            <span>{{ucwords($blog[0]->user->name)}}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted font-weight-light">
                            <i class="mdi mdi-clock icon-sm me-2"></i>
                            <span>{{$blog[0]->created_at}}</span>
                        </div>
                    </div>
                    <img src="{{asset('storage/blogfiles/'.$blog[0]->featured_image)}}" class='' alt="" width="400px" height="400px">
                    <div class="d-flex mt-5 align-items-top">
                <i class="img-sm rounded-circle me-3 mdi mdi-face"></i>
                <div class="mb-0 flex-grow">
                  <h5 class="me-2 mb-2">{{$blog[0]->title}}</h5>
                  <p class="mb-0 font-weight-light">{{$blog[0]->body}}</p>
                </div>
                <div class="ms-auto">
                  <i class="mdi mdi-heart-outline text-muted"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
