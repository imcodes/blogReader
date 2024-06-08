{{-- @dd($post) --}}
<div class="col-lg-4 col-sm-6">
    <article class="card mb-4">
      <div class="post-slider slider-sm">
        <img src="{{asset('storage/blogfiles/'.$post->featured_image)}}" class="card-img-top" alt="post-thumb">
        {{-- <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb"> --}}
      </div>
      <div class="card-body">
        <h3 class="h4 mb-3"><a class="post-title" href="{{route('blog-details',$post->title.'_'.$post->id)}}">{{ucwords($post->title)}}</a></h3>
        <ul class="card-meta list-inline">
          <li class="list-inline-item">
            <a href="{{route('author',$post->user->name."_".$post->user->id)}}" class="card-meta-author">
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
        <p>{{ substr($post->body,0,20) }}...</p>
        <a href="{{route('blog-details',$post->title.'_'.$post->id)}}" class="btn btn-outline-primary">Read More</a>
      </div>
    </article>
  </div>
