@extends('layout.admin')

{{-- @section('page-title','HELLO') --}}

    @section('main')


            <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Posts<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$blogs}}</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total engagements<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{count($comment) + $viewcount}}</h2>
                    <h6 class="card-text">Engagements (Views and Comments ) .</h6>
                </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Users<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>

                    <h2 class="mb-5">
                        {{$users}}
                    </h2>
                    <h6 class="card-text">All users below your level</h6>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            {{-- <div class="col-md-7 grid-margin stretch-card">
                <div class="card"> --}}
                {{-- <div class="card-body">
                    <div class="clearfix">
                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div> --}}
                {{-- </div>
            </div> --}}
            {{-- <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Messages</h4>
                    <canvas id="traffic-chart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                </div>
                </div>
            </div> --}}
            </div>
            <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Tickets</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Assignee </th>
                            <th> Subject </th>
                            <th> Status </th>
                            <th> Last Update </th>
                            <th> Tracking ID </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <img src="admin/assets/images/faces/face1.jpg" class="me-2" alt="image"> David Grey
                            </td>
                            <td> Fund is not recieved </td>
                            <td>
                            <label class="badge badge-gradient-success">DONE</label>
                            </td>
                            <td> Dec 5, 2017 </td>
                            <td> WD-12345 </td>
                        </tr>
                        <tr>
                            <td>
                            <img src="admin/assets/images/faces/face2.jpg" class="me-2" alt="image"> Stella Johnson
                            </td>
                            <td> High loading time </td>
                            <td>
                            <label class="badge badge-gradient-warning">PROGRESS</label>
                            </td>
                            <td> Dec 12, 2017 </td>
                            <td> WD-12346 </td>
                        </tr>
                        <tr>
                            <td>
                            <img src="admin/assets/images/faces/face3.jpg" class="me-2" alt="image"> Marina Michel
                            </td>
                            <td> Website down for one week </td>
                            <td>
                            <label class="badge badge-gradient-info">ON HOLD</label>
                            </td>
                            <td> Dec 16, 2017 </td>
                            <td> WD-12347 </td>
                        </tr>
                        <tr>
                            <td>
                            <img src="admin/assets/images/faces/face4.jpg" class="me-2" alt="image"> John Doe
                            </td>
                            <td> Loosing control on server </td>
                            <td>
                            <label class="badge badge-gradient-danger">REJECTED</label>
                            </td>
                            <td> Dec 3, 2017 </td>
                            <td> WD-12348 </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            {{-- <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                    <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                        <i class="mdi mdi-account-outline icon-sm me-2"></i>
                        <span>jack Menqu</span>
                    </div>
                    <div class="d-flex align-items-center text-muted font-weight-light">
                        <i class="mdi mdi-clock icon-sm me-2"></i>
                        <span>October 3rd, 2018</span>
                    </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-6 pe-1">
                        <img src="admin/assets/images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="admin/assets/images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image">
                    </div>
                    <div class="col-6 ps-1">
                        <img src="admin/assets/images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                        <img src="admin/assets/images/dashboard/img_3.jpg" class="mw-100 w-100 rounded" alt="image">
                    </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                    <img src="admin/assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image">
                    <div class="mb-0 flex-grow">
                        <h5 class="me-2 mb-2">School Website - Authentication Module.</h5>
                        <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                    </div>
                    <div class="ms-auto">
                        <i class="mdi mdi-heart-outline text-muted"></i>
                    </div>
                    </div>
                </div>
                </div>
            </div> --}}
            </div>
            <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Your recent posts</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>
                                <td>ID</td>
                                <td></td>
                                <td></td>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)

                            <tr>
                                <th> {{$item->id}} </th>
                                <th> {{$item->title}} </th>
                                <th> {{strip_tags(substr($item->body,0,20,))}}</th>
                                <th> {{$item->created_at}} </th>
                                {{-- <th> Progress </th> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-white">Todo</h4>
                    <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                    <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
                    </div>
                    <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked> Call John </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Create invoice </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Print Statements </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                        </div>
                        <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>

    @stop



   @push('scripts')


        <!-- Custom js for this page -->
        <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
        <script src="{{asset('admin/assets/js/todolist.js')}}"></script>
   @endpush
    <!-- End custom js for this page -->

@push('sidebar')
<li class="nav-item">
    <a class="nav-link" href="pages/tables/basic-table.html">
      <span class="menu-title">MarketPlace</span>
      <i class="mdi mdi-table-large menu-icon"></i>
    </a>
  </li>
@endpush

