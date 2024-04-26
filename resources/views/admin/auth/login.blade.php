@extends('layout.auth-layout')
@section('form')
    @push('auth-title')
    Login
    @endpush
      <x-auth.form-fields label="email" Type="email" placeholder="your email e.g example@gmail.com" name="email"/>
      <x-auth.form-fields label="password" Type="password" placeholder="password" name="password"/>
      <x-auth.remember/>
      <x-auth.alternative auth="signup"/>
      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
@stop