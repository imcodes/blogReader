@extends('layout.main')
{{-- @dd($editors_pick) --}}
<!-- start of banner -->
@php
    $category = implode(',',$category);
@endphp
@section('banner')
  <x-homebanner data={{$category}}/>
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
            <h3 class="h4 mb-3"><a class="post-title" href="{{route('blog-details',str_replace(' ','-',$editors_pick[0]->title).'-'.$editors_pick[0]->id)}}">{{$editors_pick[0]->title}}</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="{{route('author',$editors_pick[0]->user->name."-".$editors_pick[0]->user->id)}}" class="card-meta-author">
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
            <a href="{{route('blog-details',str_replace(' ','-',$editors_pick[0]->title).'-'.$editors_pick[0]->id)}}" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Trending Post</h2>
        @foreach ($trendingPost as $item)

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="{{asset('storage/blogfiles/'.$item->featured_image)}}">
            <div class="ml-3">
              <h4><a href="{{route('blog-details',str_replace(" ","-",$item->title).'-'.$item->id)}}" class="post-title">{{$item->title}}</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>{{date('d M Y H:i:s',$item->created_at->timestamp)}}
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
        @endforeach
      </div>

      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Popular Post</h2>
        @php
            $post = $popularPosts[0];
        @endphp

        {{-- @include('include.post-item',['post'=>$popularPosts[0]]) --}}
        <article class="card mb-4">
            <div class="post-slider slider-sm">
              <img src="{{asset('storage/blogfiles/'.$post->featured_image)}}" class="card-img-top" alt="post-thumb">
              {{-- <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb"> --}}
            </div>
            <div class="card-body">
              <h3 class="h4 mb-3"><a class="post-title" href="{{route('blog-details',$post->title.'_'.$post->id)}}">{{ucwords($post->title)}}</a></h3>
              <ul class="card-meta list-inline">
                <li class="list-inline-item">
                  <a href="{{route('author',$post->user->name."-".$post->user->id)}}" class="card-meta-author">
                    <img src="{{asset("images/john-doe.jpg")}}" alt="John Doe">
                    <span>{{$post->user->name}}</span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <i class="ti-timer"></i>3 Min To Read
                </li>
                <li class="list-inline-item">
                  <i class="ti-calendar"></i>{{ date('d M Y - H:i:s', $post->created_at->timestamp) }}
                </li>
                <li class="list-inline-item">
                 @if (count($post->category) > 0)
                 <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="{{route('category',$post->category[0]->category_name)}}">{{$post->category[0]->category_name}}</a></a></li>
                  </ul>
                  @else
                  <span>uncatigorised</span>
                 @endif

                </li>
              </ul>
              <p>{!! substr($post->body,0,20) !!}...</p>
              <a href="{{route('blog-details',str_replace(' ','-',$post->title).'-'.$post->id)}}" class="btn btn-outline-primary">Read More</a>
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
            {{$recentPost->links()}}
         </div>

  </div>

</div>
  </div>
</section>
@stop
