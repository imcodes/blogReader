@extends('layout.auth')
@section('form')
    @push('auth-title')
    Sign-up
    @endpush
      <x-form.form action=''>
        <x-form.input label="username" type="text" placeholder="username" name="username"/>
        <x-form.input label="email" type="email" placeholder="your email e.g example@gmail.com" name="email"/>
        <x-form.input label="password" type="password" placeholder="password" name="password"/>
        <x-form.input label="password confirm" type="password" placeholder="confifm password" name=""/>
        <x-form.remember/>
        <x-form.alternative auth='login'/>
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
      </x-form.form>
@stop