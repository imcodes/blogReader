@extends('layout.admin')
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
<div class="">
@foreach($blogandUsers as $data)
<article class="card my-2 ">
    <div class="post-slider slider-sm">
      <img src="{{asset("images/post/post-1.jpg")}}" class="card-img-top" alt="post-thumb">
    </div>

    <div class="card-body">
      <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{$data->title}}</a></h3>
      <p class="h1 mb-2">
        {{$data->body}}
      </p>
      <ul class="card-meta list-inline">
        <li class="list-inline-item">
          <a href="author-single.html" class="card-meta-author">
            <span></span>
          </a>
        </li>
        <li class="list-inline-item">
          <i class="ti-timer"></i>2 Min To Read
        </li>
        <li class="list-inline-item">
          <i class="ti-calendar"></i>{{Carbon\Carbon::parse($data['date'])->diffForHumans()}}
        </li>
        <li class="list-inline-item">
          <ul class="card-meta-tag list-inline">
            <li class="list-inline-item"><a href="tags.html">Color</a></li>
            <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
            <li class="list-inline-item"><a href="tags.html">Fish</a></li>
          </ul>
        </li>
      </ul>
      <p></p>
      <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
    </div>
  </article>
  @endforeach
</div>
@stop
