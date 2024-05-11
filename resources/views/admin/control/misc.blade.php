@extends('layout.admin')
@section('main')
  {{-- <p>{{$user->id}}</p>
  <p>{{$user->email}}</p>
  <p>{{$user->name}}</p>
  <p>{{$user->created_at}}</p>
  <p>{{$user->updated_at}}</p> --}}
<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Icon size</h4>
                        <p class="card-description"> Add class <code>.icon-lg</code>, <code>.icon-md</code>, <code>.icon-sm</code>
                        </p>
                        <div class="row">
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">
                              <i class="mdi mdi-compass icon-lg text-warning"></i>
                              <p class="mb-0 ms-1"> Icon-lg </p>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">
                              <i class="mdi mdi-compass icon-md text-success"></i>
                              <p class="mb-0 ms-1"> Icon-md </p>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-center">
                            <div class="d-flex flex-row align-items-center">
                              <i class="mdi mdi-compass icon-sm text-danger"></i>
                              <p class="mb-0 ms-1"> Icon-sm </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection
