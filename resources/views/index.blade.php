@extends('layout.main')
{{-- @dd($category) --}}
<!-- start of banner -->
@php
    $category = implode(',',$category);
@endphp
@section('banner')
  <x-homebanner data={{$category}} />
@stop
<!-- end of banner -->

@section('content')

<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Editors Pick</h2>
        <article class="card">
          <div class="post-slider slider-sm">
            <img src="{{asset('storage/blogfiles/'.$editors_pick[0]->featured_image)}}" class="card-img-top" alt="post-thumb">
          </div>

          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="{{route('blog-details',$editors_pick[0]->title.'_'.$editors_pick[0]->id)}}">{{$editors_pick[0]->title}}</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="{{route('author',$editors_pick[0]->user->name."_".$editors_pick[0]->user->id)}}" class="card-meta-author">
                  <img src="images/john-doe.jpg">
                  {{-- {{dd($editors_pick[0]->user)}} --}}
                  <span>{{$editors_pick[0]->user->name}}</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                @php
                    $category = $editors_pick[0]->category
                @endphp
                <ul class="card-meta-tag list-inline">
                        @foreach ($category as $item)

                        <li class="list-inline-item"><a href="tags.html">{{$item->category_name}}</a></li>
                        @endforeach
                    </ul>
              </li>
            </ul>
            <p>{{substr($editors_pick[0]->body,20)}}...</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Trending Post</h2>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/post/post-3.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">Advice From a Twenty Something</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/post/post-2.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">The Design Files - Homes Minimalist</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="images/post/post-4.jpg">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">The Skinny Confidential</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>

      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Popular Post</h2>

        <article class="card">
          <div class="post-slider slider-sm">
            <img src="images/post/post-5.jpg" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes and Cashmere Recipe At Home</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="images/kate-stone.jpg" alt="Kate Stone">
                  <span>Kate Stone</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">City</a></li>
                  <li class="list-inline-item"><a href="tags.html">Food</a></li>
                  <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-12">
        <div class="border-bottom border-default"></div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mb-5 mb-lg-0">
          <h2 class="h5 section-title">Recent Post</h2>
          <div class="row">
            {{-- @dd($recentPost) --}}
            @foreach ($recentPost as $post)
                @include('include.post-item',['post'=>$post])

            @endforeach
         </div>

  </div>

</div>
  </div>
</section>
@stop
