<ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#blog-links" aria-expanded="false" aria-controls="blog-links">
        <span class="menu-title">Blogs</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
      </a>
      <div class="collapse" id="blog-links">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.index')}}"> View</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.create')}}">Create</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.category.index')}}">Category</a></li>

          {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.blog.category')}}">Category</a></li> --}}
          {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.control.user')}}">user</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.control.blog')}}">blogs</a></li> --}}
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#user-links" aria-expanded="false" aria-controls="user-links">
        <span class="menu-title">User</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
      </a>
      <div class="collapse" id="user-links">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.control.user')}}">user</a></li>
        </ul>
      </div>
      <div class="collapse" id="user-links">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.control.createuser')}}">Create user</a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-3"> <i class="mdi mdi-face"></i><a href="{{route('profile.index',Auth::user()->id)}}"> Profile</a></h6>
        </div>
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>

      </span>
    </li>
    @stack('sidebar')
  </ul>
