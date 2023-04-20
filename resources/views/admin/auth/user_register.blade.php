@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper default-version">
        <div class="form-area bg_img" data-background="{{asset('assets/admin/images/1.jpg')}}">
            <div class="form-wrapper">
                <h4 class="logo-text mb-15">@lang('Welcome to') <strong>{{__($general->sitename)}}</strong></h4>
                <p>{{__($pageTitle)}} @lang('to')  {{__($general->sitename)}} @lang('dashboard')</p>
                <form action="{{ route('user.register') }}" method="POST" class="cmn-form mt-30">
                    @csrf
                    <div class="form-group">
                        <label for="name">@lang('Full Name')</label>
                        <input type="text" name="name" class="form-control b-radius--capsule" id="name" value="{{ old('name') }}" placeholder="@lang('Enter your full name')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('email')</label>
                        <input type="text" name="email" class="form-control b-radius--capsule" id="email" value="{{ old('email') }}" placeholder="@lang('Enter your email')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('phone')</label>
                        <input type="phone" name="phone" class="form-control b-radius--capsule" id="phone" value="{{ old('phone') }}" placeholder="@lang('Enter your phone')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="email">@lang('address')</label>
                        <input type="address" name="address" class="form-control b-radius--capsule" id="address" value="{{ old('phone') }}" placeholder="@lang('Enter your address')">
                        <i class="las la-user input-icon"></i>
                    </div>
                   
                    <div class="form-group">
                        <label for="email">@lang('Username')</label>
                        <input type="text" name="username" class="form-control b-radius--capsule" id="username" value="{{ old('username') }}" placeholder="@lang('Enter your username')">
                        <i class="las la-user input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label for="pass">@lang('Password')</label>
                        <input type="password" name="password" class="form-control b-radius--capsule" minlength="6" id="pass"  placeholder="@lang('Enter your password')">
                        <i class="las la-lock input-icon"></i>
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" class="submit-btn mt-25 b-radius--capsule">@lang('Login') <i class="las la-sign-in-alt"></i></button>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('user.login.form') }}" class="text-muted text--small"><i class="las la-pen"></i>@lang('Or Login Here')</a>
                    </div>
                     
                </form>
            </div>
        </div><!-- login-area end -->
    </div>
@endsection

