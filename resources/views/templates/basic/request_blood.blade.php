@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
<section class="pt-100 pb-100 position-relative z-index section--bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{route('blood.request.store')}}" class="contact-form bg-white p-sm-5 p-3 rounded-3 position-relative" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-3">@lang('Patient Information')</h5>
                    <div class="row mb-4">
                        <div class="form-group col-lg-6">
                            <label for="name">@lang('Name') <sup class="text--danger">*</sup></label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="@lang('Full name')" class="form--control" maxlength="80" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="name">@lang('Medical Name') <sup class="text--danger">*</sup></label>
                            <input type="text" name="medical_name" id="name" value="{{old('medical_name')}}" placeholder="@lang('Medical Name')" class="form--control" maxlength="80" required="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="phone">@lang('Phone') <sup class="text--danger">*</sup></label>
                            <input type="text" name="phone" id="phone" value="{{old('phone')}}" placeholder="@lang('Enter Phone')" class="form--control" maxlength="40" required="">
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="city">@lang('City') <sup class="text--danger">*</sup></label>
                            <select name="city" id="city" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->name}}" data-locations="{{json_encode($city->location)}}">{{__($city->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="location">@lang('Location') <sup class="text--danger">*</sup></label>
                            <select name="location" id="location" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="address">@lang('Address') <sup class="text--danger">*</sup></label>
                            <input type="text" name="address" id="address" value="{{old('address')}}" placeholder="@lang('Enter Address')" class="form--control" maxlength="255" required="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="gender">@lang('Gender') <sup class="text--danger">*</sup></label>
                            <select name="gender" id="gender" class="select" required="">
                                <option value="" selected="" disabled="">@lang('Select One')</option>
                                <option value="Male">@lang('Male')</option>
                                <option value="Female">@lang('Female')</option>
                            </select>
                        </div>

                    </div>
                    

                    <div class="row">
                        <h5 class="mb-3">@lang('Blood Information')</h5>
                        <div class="form-group col-lg-6">
                            <label for="blood_id">@lang('Blood Group') <sup class="text--danger">*</sup></label>
                            <select name="blood" id="blood_id" class="select" required="">
                               <option value="" selected="" disabled="">@lang('Select One')</option>
                               @foreach($bloods as $blood)
                                <option value="{{$blood->name}}">{{__($blood->name)}}</option>
                               @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="last_donate">@lang('Blood Unit/Bag') <sup class="text--danger">*</sup></label>
                            <input type="number" name="unit" id="unit" value="{{old('unit')}}" data-language="en" placeholder="@lang('')" class="form--control">
                        </div>
                         <div class="form-group col-lg-6">
                            <label for="last_donate">@lang('Donate Date') <sup class="text--danger">*</sup></label>
                            <input type="datetime-local" name="donate_date" id="last_donate" value="{{old('donate')}}" data-language="en" placeholder="@lang(' Blood Donate Date')" class="form--control ">
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn--base w-100">@lang('Request Now')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include($activeTemplate.'sections.faq')

@endsection


@push('style-lib')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/datepicker.min.css')}}">
@endpush
@push('script-lib')
    <script src="{{asset($activeTemplateTrue.'frontend/js/datepicker.min.js') }}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
  <script>
    (function($){
        "use strict";
        $('.datepicker-here').datepicker({
            autoClose: true,
            dateFormat: 'yyyy-mm-dd',
        });

        $('select[name=city]').on('change',function() {
            $('select[name=location]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.name}">${item.name}</option>`
            });
            $('select[name=location]').append(html);
        });
    })(jQuery)
  </script>
@endpush
