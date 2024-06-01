@extends('layout.admin')
@section('main')
    {{-- @push('auth-title')
    Sign-up
    @endpush --}}
    @section('page-title','Create User')
    <div class="card">
        {{-- @php $act=route('validate-sign-up'); @endphp --}}
        <div class="card-body">

            <x-form.form :action="route('validate-sign-up-admin')">
              <x-form.input label="username" type="text" placeholder="username" name="name" value="{{old('name')}}">
                  @error('name')
                      <span style="color: red">{{$errors->first('name')}}</span>
                  @enderror
              </x-form.input>
              <x-form.input label="email" type="email" placeholder="your email e.g example@gmail.com" name="email">
                  @error('email')
                      <span style="color: red">{{$errors->first('email')}}</span>
                  @enderror
            </x-form.input>
              <x-form.input label="password"  type="password" placeholder="password" name="password">
                  @error('password')
                  <span style="color: red">{{$errors->first('password')}}</span>
                  @enderror
              </x-form.input>

              <x-form.input label="password confirm" type="password" placeholder="confifm password" name="confirm_password">
                  @error('confirm_password')
                  <span style="color: red">{{$errors->first('confirm_password')}}</span>
                  @enderror
              </x-form.input>
              <x-form.remember/>
              <x-form.alternative auth="login"/>
              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </x-form.form>
        </div>
    </div>
@stop
