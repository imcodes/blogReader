@extends('layout.main')


 {{-- // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
  GITHUB: https://github.com/themefisher/

   navigation --}}


@section('content')
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-4">
          <h1 class="h2 mb-4">Search results for
            <mark>{{str_replace(' ','+',trim($keyword))}}</mark>
          </h1>
        </div>
        <div class="col-lg-10">
            @foreach ($result as $item)

            <article class="card mb-4">
              <div class="row card-body">
                <div class="col-md-4 mb-4 mb-md-0">
                  <div class="post-slider slider-sm">
                    <img src="{{asset('storage/blogfiles/'.$item->featured_image)}}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                  </div>
                </div>
                <div class="col-md-8">
                  <h3 class="h4 mb-3"><a class="post-title" href="{{route('blog-details',str_replace(' ','-',$item->title).'-'.$item->id)}}">{{$item->title}}</a></h3>
                  <ul class="card-meta list-inline">
                    <li class="list-inline-item">
                      <a href="{{route('author',str_replace(' ','-',$item->user->name)."-".$item->user->id)}}" class="card-meta-author">
                        <img src="images/john-doe.jpg" alt="John Doe">
                        <span>{{$item->user->name}}</span>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <i class="ti-timer"></i>3 Min To Read
                    </li>
                    <li class="list-inline-item">
                      <i class="ti-calendar"></i>{{date( 'd M Y H:i:s',$item->created_at->timestamp)}}
                    </li>
                    <li class="list-inline-item">
                      <ul class="card-meta-tag list-inline">
                        {{-- @dd(count($item->category)) --}}
                        @if (count($item->category) == 0)

                        <li class="list-inline-item">No category</li>
                        @else
                        <li class="list-inline-item"><a href="{{route('category',str_replace('_','-',$item->category[0]->category_name))}}">{{$item->category[0]->category_name}}</a></li>
                        @endif
                      </ul>
                    </li>
                  </ul>
                  <p>{!!substr(strip_tags($item->body),0,200)!!}...</p>
                  <a href="{{route('blog-details',str_replace(' ','-',$item->title).'-'.$item->id)}}" class="btn btn-outline-primary">Read More</a>
                </div>
              </div>
            </article>
            @endforeach
        </div>
      </div>
    </div>
  </section>

@stop
