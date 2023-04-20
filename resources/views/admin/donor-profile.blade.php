@extends('admin.layouts.app')

@section('panel')
 @if(auth()->guard('admin')->check())
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">

            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        
                        <div class="avatar avatar--lg">
                            <img src="{{ getImage(imagePath()['profile']['admin']['path'].'/'. $admin->image,imagePath()['profile']['admin']['size'])}}" alt="@lang('Image')">
                        </div>
                        <div class="pl-3">
                            <h4 class="text--white">{{__($admin->name)}}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Name')
                            <span class="font-weight-bold">{{__($admin->name)}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span  class="font-weight-bold">{{__($admin->username)}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span  class="font-weight-bold">{{$admin->email}}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('Profile Information')</h5>

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf



                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ getImage(imagePath()['profile']['admin']['path'].'/'.auth()->guard('admin')->user()->image,imagePath()['profile']['admin']['size']) }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b> @lang('Image will be resized into 400x400px') </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" value="{{ auth()->guard('admin')->user()->name }}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{ auth()->guard('admin')->user()->email }}" >
                                </div>
                            </div> --}}

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@elseif (auth()->guard('donor')->check())
<div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">

            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        
                        <div class="avatar avatar--lg">
                            <img  src="{{getImage('assets/images/donor/'. auth()->guard('donor')->user()->image) }}}}" alt="@lang('Image')">
                        </div>
                        <div class="pl-3">
                            <h4 class="text--white">{{__($admin->name)}}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Name')
                            <span class="font-weight-bold">{{__($admin->name)}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Username')
                            <span  class="font-weight-bold">{{__($admin->username)}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span  class="font-weight-bold">{{$admin->email}}</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('Profile Information')</h5> 
                    <form action="{{ route('donor.donor.update',$admin->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div  class="profilePicPreview" style="background-image: url({{ getImage('assets/images/donor/'. auth()->guard('donor')->user()->image) }}">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg'), @lang('jpg').</b> @lang('Image will be resized into 400x400px') </small>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-12">

                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                    <input class="form-control" type="text" name="name" value="{{$admin->name}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{$admin->email}}" >
                                </div>

                                <div class="form-group">
                                    <label for="phone">@lang('Phone')</label>
                                    <input type="text" name="phone" id="phone" value="{{$admin->phone}}" placeholder="@lang('Enter Phone')" class="form-control" maxlength="40" required="">
                                </div> 
                                 
                                <div class="form-group col-lg-3 col-sm-6">
                                    <label for="city">@lang('City')</label>
                                    <select name="city" id="city" class="select" required="">
                                        <option  value="" selected="" disabled="">@lang('Select One')</option>
                                        @foreach($cities as $city)
                                            <option @if ($admin->city_id == $city->id)
                                                selected
                                                @endif  value="{{$city->id}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                {{-- @dd($admin) --}}
                                <div class="form-group col-lg-3 col-sm-6">
                                    <label for="location">@lang('Location')</label>
                                    <select name="location" id="location" class="select" required="">
                                        <option value="" selected="" disabled="">@lang('Select One')</option>
                                        <option selected value="{{$location->id}}" data-locations="{{json_encode($city->location)}}">{{__($location->id)}}</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                   <label for="address">@lang('Address') <sup class="text--danger">*</sup></label>
                                    <input type="text" name="address" id="address" value="{{$admin->address}}" placeholder="@lang('Enter Address')" class="form-control" maxlength="255" required="">
                                </div> 

                            </div> 
                        </div>
                         
                        <div class="row"> 
                            <div class="form-group col-lg-3 col-sm-6">
                                <label for="facebook">@lang('Facebook Url') <sup class="text--danger">*</sup></label>
                                <div class="custom-icon-field">
                                    <i class="lab la-facebook-f"></i>
                                    <input type="text" name="facebook" id="facebook" value="{{ $admin->socialMedia->facebook }}" placeholder="@lang('Enter Facebook Url')" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <label for="twitter">@lang('Twitter Url') <sup class="text--danger">*</sup></label>
                                <div class="custom-icon-field">
                                    <i class="lab la-twitter"></i>
                                    <input type="text" name="twitter" id="twitter" value="{{ $admin->socialMedia->twitter }}" placeholder="@lang('Enter Twitter Url')" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <label for="linkedinIn">@lang('Linkedin Url') <sup class="text--danger">*</sup></label>
                                <div class="custom-icon-field">
                                    <i class="lab la-linkedin-in"></i>
                                    <input type="text" name="linkedinIn" id="linkedinIn" value="{{ $admin->socialMedia->linkedinIn }}" placeholder="@lang('Enter Linkedin Url')" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group col-lg-3 col-sm-6">
                                <label for="instagram">@lang('Instagram Url') <sup class="text--danger">*</sup></label>
                                <div class="custom-icon-field">
                                    <i class="lab la-instagram"></i>
                                    <input type="text" name="instagram" id="instagram" value="{{ $admin->socialMedia->instagram }}" placeholder="@lang('Enter Instagram Url')" class="form-control" required="">
                                </div>
                            </div>
                        </div> 

                        <div class="row"> 
                            <div class="form-group col-lg-6">
                                <label for="blood_id">@lang('Blood Group') <sup class="text--danger">*</sup></label>
                                <select name="blood" id="blood_id" class="select" required="">
                                   <option value="" selected="" disabled="">@lang('Select One')</option>
                                   @foreach($bloods as $blood)
                                    <option @if ($admin->blood_id == $blood->id)
                                        selected
                                    @endif value="{{$blood->id}}">{{__($blood->name)}}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="gender">@lang('Gender') <sup class="text--danger">*</sup></label>
                                <select name="gender" id="gender" class="select" required="">
                                    <option value="" selected="" disabled="">@lang('Select One')</option>
                                    <option @if ($admin->gender == 1)
                                        selected
                                    @endif value="1">@lang('Male')</option>
                                    <option @if ($admin->gender == 2)
                                        selected
                                    @endif value="2">@lang('Female')</option>
                                </select>
                            </div>
    
                            <div class="form-group col-lg-6">
                                <label for="religion">@lang('Religion') <sup class="text--danger">*</sup></label>
                                <input type="text" name="religion" id="religion" value="{{$admin->religion}}" placeholder="@lang('Enter Religion')" class="form-control" maxlength="40" required="">
                            </div>
    
                             <div class="form-group col-lg-6">
                                <label for="profession">@lang('Profession') <sup class="text--danger">*</sup></label>
                                <input type="text" name="profession" id="profession" value="{{$admin->profession}}" placeholder="@lang('Enter Profession')" class="form-control" maxlength="80" required="">
                            </div>
    
                            <div class="form-group col-lg-6">
                                <label for="donate">@lang('Total Donate') <sup class="text--danger">*</sup></label>
                                <input type="number" name="total_donate" id="donate" value="{{$admin->total_donate}}" placeholder="@lang('Enter total blood donate')" class="form-control">
                            </div>
     
                            <div class="form-group col-lg-6">
                                <label for="date_birth">@lang('Date Of Birth') <sup class="text--danger">*</sup></label>
                                <input type="text" id="date_birth" name="birth_date" value="{{$admin->birth_date}}" data-language="en" placeholder="@lang('Enter Date Of Birth')" class="form-control datepicker-here" maxlength="255" required="">
                            </div>
    
                             <div class="form-group col-lg-6">
                                <label for="last_donate">@lang('Last Donate') <sup class="text--danger">*</sup></label>
                                <input type="text" name="last_donate" id="last_donate" value="{{$admin->last_donate}}" data-language="en" placeholder="@lang('Last Blood Donate Date')" class="form-control datepicker-here">
                            </div>
    
                            <div class="form-group col-lg-12">
                                <label for="about_details">@lang('About You') <sup class="text--danger">*</sup></label>
                                <textarea name="details" id="about_details" placeholder="@lang('Enter Details')" class="form-control">{{$admin->details}}</textarea>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@push('breadcrumb-plugins')
    <a href="{{route('admin.password')}}" class="btn btn-sm btn--primary box--shadow1 text--small" ><i class="fa fa-key"></i>@lang('Password Setting')</a>
@endpush
@push('script')
  <script>
    (function($){
        "use strict"; 
        $('select[name=city]').on('change',function() {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location]').append(html);
        });
    })(jQuery)
  </script>
@endpush