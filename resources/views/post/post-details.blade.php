@extends('layout.main')

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<!-- /navigation -->
{{-- @dd($blog[0]->comment) --}}
@php
    $comment = $blog[0]->comment;
@endphp
{{-- <div class="py-4"></div> --}}
@section('content')
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
          <article>
            <div class="post-slider mb-4">
              <img src="{{asset('storage/blogfiles/'.$blog[0]->featured_image)}}" class="card-img" alt="post-thumb">
            </div>

            <h1 class="h2">{{ucwords($blog[0]->title)}} </h1>
            <ul class="card-meta my-3 list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="images/john-doe.jpg">
                  <span>{{ucwords($blog[0]->user->name)}}</span>
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
                  <li class="list-inline-item"><a href="tags.html">{{ucwords(slug_to_string($blog[0]->category[0]->category_name))}}</a></li>
                </ul>
              </li>
            </ul>
            <div class="content">
                {!! $blog[0]->body !!}
            </div>
          </article>

        </div>

        <div class="col-lg-9 col-md-12">
            <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>
                    @foreach ($comment as $item)
                    <div class="media d-block d-sm-flex mb-4 pb-4">
                        <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                            <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                        </a>
                        <div class="media-body">
                            <a href="#!" class="h4 d-inline-block mb-3">{{username($item->user_id)}}</a>

                            <p>{{$item->body}}</p>

                            <span class="text-black-800 mr-3 font-weight-600">{{ date('d M Y - H:i:s', $item->created_at->timestamp) }}</span>
                        </div>
                    </div>
                    @endforeach
            </div>

            <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form method="POST" action="{{route('comment')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control shadow-none" name="body" rows="7" placeholder="Comment here ....." required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control shadow-none" name='user_id' value="{{Auth::user()->id}}" type="hidden" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control shadow-none" name='blog_id' value="{{$blog[0]->id}}" type="hidden" placeholder="Name" required>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Comment Now</button>
                </form>
            </div>
        </div>

      </div>
    </div>
  </section>

@stop
