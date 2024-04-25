@extends('layout.main');

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->


  {{-- <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="index.html">
        <img class="img-fluid" width="100px" src="images/logo.png"
          alt="Reader | Hugo Personal Blog Template">
      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              homepage <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index-full.html">Homepage Full Width</a>

              <a class="dropdown-item" href="index-full-left.html">Homepage Full With Left Sidebar</a>

              <a class="dropdown-item" href="index-full-right.html">Homepage Full With Right Sidebar</a>

              <a class="dropdown-item" href="index-list.html">Homepage List Style</a>

              <a class="dropdown-item" href="index-list-left.html">Homepage List With Left Sidebar</a>

              <a class="dropdown-item" href="index-list-right.html">Homepage List With Right Sidebar</a>

              <a class="dropdown-item" href="index-grid.html">Homepage Grid Style</a>

              <a class="dropdown-item" href="index-grid-left.html">Homepage Grid With Left Sidebar</a>

              <a class="dropdown-item" href="index-grid-right.html">Homepage Grid With Right Sidebar</a>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              About <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">

              <a class="dropdown-item" href="about-me.html">About Me</a>

              <a class="dropdown-item" href="about-us.html">About Us</a>

            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Pages <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">

              <a class="dropdown-item" href="author.html">Author</a>

              <a class="dropdown-item" href="author-single.html">Author Single</a>

              <a class="dropdown-item" href="advertise.html">Advertise</a>

              <a class="dropdown-item" href="post-details.html">Post Details</a>

              <a class="dropdown-item" href="post-elements.html">Post Elements</a>

              <a class="dropdown-item" href="tags.html">Tags</a>

              <a class="dropdown-item" href="search-result.html">Search Result</a>

              <a class="dropdown-item" href="search-not-found.html">Search Not Found</a>

              <a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a>

              <a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a>

              <a class="dropdown-item" href="404.html">404 Page</a>

            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="shop.html">Shop</a>
          </li>
        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        <select class="m-2 border-0 bg-transparent" id="select-language">
          <option id="en" value="" selected>En</option>
          <option id="fr" value="">Fr</option>
        </select>

        <!-- search -->
        <form class="search-bar">
          <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
        </form>

        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

    </nav>
  </div> --}}

<!-- /navigation -->
@section('banner')
    <x-contacts-banner/>
@stop
{{-- @section('banner')
  <x-aboutme-banner/>
@stop --}}
@section('content')
<section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">

          <div class="content mb-5">
            <h2 id="we-would-love-to-hear-from-you">We would Love To Hear From You&hellip;.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Velit massa vitae felis augue. In venenatis scelerisque accumsan egestas mattis. Massa feugiat in sem pellentesque.</p>
          </div>

          <form method="POST" action="#">
            <div class="form-group">
              <label for="name">Your Name (Required)</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email Address (Required)</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="johndoe@gmail.com" required>
            </div>
            <div class="form-group">
              <label for="email">Reason For Contact</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Advertising">
            </div>
            <div class="form-group">
              <label for="message">Your Message Here</label>
              <textarea name="message" id="message" class="form-control" placeholder="Lorem ipsum dolor sit amet..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Now</button>
          </form>
        </div>
      </div>
    </div>
  </section>
@stop





  <!-- JS Plugins -->
  {{-- <script src="plugins/jQuery/jquery.min.js"></script>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>

  <script src="plugins/slick/slick.min.js"></script>

  <script src="plugins/instafeed/instafeed.min.js"></script> --}}


  {{-- <!-- Main Script -->
  <script src="js/script.js"></script> --}}

