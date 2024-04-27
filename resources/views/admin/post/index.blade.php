@extends('layout.admin')
@section('page-title',$pageTitle)
@push('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <span></span>Post <i class="mdi mdi-list icon-sm text-primary align-middle"></i>
    </li>
    @endpush

    @push('buttons')
        <button class="btn btn-gradient-primary">Create Post</button>
    @endpush
@section('main')
    <div>Hello this is the post index {{$pageTitle}}</div>
@stop
