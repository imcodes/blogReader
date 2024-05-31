
<div class="col-lg-4 col-sm-6">
    <article class="card mb-4">
      <div class="post-slider slider-sm">
        <img src="{{asset('storage/blogfiles/'.$pot->featured_image)}}" class="card-img-top" alt="post-thumb">
        <img src="images/post/post-1.jpg" class="card-img-top" alt="post-thumb">
      </div>
      <div class="card-body">
        <h3 class="h4 mb-3"><a class="post-title" href="post/elements/">{{ucwords($pot->title)}}</a></h3>
        <ul class="card-meta list-inline">
          <li class="list-inline-item">
            <a href="author-single.html" class="card-meta-author">
              <img src="images/john-doe.jpg" alt="John Doe">
              <span>John Doe</span>
            </a>
          </li>
          <li class="list-inline-item">
            <i class="ti-timer"></i>3 Min To Read
          </li>
          <li class="list-inline-item">
            <i class="ti-calendar"></i>15 jan, 2020
          </li>
          <li class="list-inline-item">
            <ul class="card-meta-tag list-inline">
              <li class="list-inline-item"><a href="tags.html">Demo</a></li>
              <li class="list-inline-item"><a href="tags.html">Elements</a></li>
            </ul>
          </li>
        </ul>
        <p>Heading example Here is example of hedings. You can use this heading by …</p>
        <a href="post/elements/" class="btn btn-outline-primary">Read More</a>
      </div>
    </article>
  </div>
