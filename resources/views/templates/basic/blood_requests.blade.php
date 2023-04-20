@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')

<section class="pt-50 pb-50 shade--bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 d-md-block d-none">
                @php 
                    echo advertisements('220x474') 
                @endphp

                @php 
                    echo advertisements('220x303') 
                @endphp

                @php 
                    echo advertisements('220x474') 
                @endphp

                @php 
                    echo advertisements('220x474') 
                @endphp
            </div>
            <div class="col-xl-8 col-lg-9 col-md-8">
                <div class="row gy-4">
                    @forelse($blood_requests as $request)
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="donor-item has--link">
                                <div class="donor-item__content">
                                    <h5 class="donor-item__name">NAME:{{__($request->name)}}</h5>
                                    <p class="donor-item__name">GENDER:{{__($request->gender)}}</p>
                                    <p class="donor-item__name">PHONE:{{__($request->phone)}}</p>
                                    <h5 class="donor-item__name">Medical:{{__($request->medical_name)}}</h5>
                                    <ul class="donor-item__list mt-2">
                                        <li class="text-truncate">
                                            <i class="las la-map-marker-alt"></i> @lang('Location') : {{__($request->location)}}
                                            <i class="las la-map-marker-alt"></i> @lang('City') : {{__($request->city)}}
                                            <i class="las la-tint"></i>@lang('Blood Group') : <span class="text--base">({{__($request->blood)}})</span>
                                        </li>
                                        <li>
                                            <i class="las la-tint"></i>@lang('Blood Unite') : <span class="text--base">({{__($request->unit)}})Bags</span>
                                            <i class="las la-tint"></i>@lang('Date') : <span class="text--base">{{ Carbon\Carbon::parse($request->donate_date)->format('d-m-Y h:i:a') }}</span>
                                            <i class="las la-la-map-marker-alt"></i>@lang('Address'):<span class="text--base">{{ $request->address}}</span>
                                            
                                        </li>
                                        <li>
                                            <i class="las la-tint"></i>@lang('Request Status') : <span class="text--base">{{ ($request->status == 1) ? "Completed" : "Pending" }}</span>
                                            
                                        </li>
                                    </ul>
                                   
                                    
                                    @if (auth()->guard('user')->id() == $request->user_id)
                                    @if ($request->status == 0)
                                    <a href="{{route('complete_request',$request->id)}}" class="text--base fs--14px text-decoration-underline">@lang('Complete Request')</a>
                                    @endif
                                        
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">{{$emptyMessage}}</h3>
                    @endforelse
                </div>
                <nav class="mt-4 pagination-md">
                {{-- {{$donors->links()}} --}}
                </nav>
            </div>
            <div class="col-xl-2 d-xl-block d-none">
                @php 
                    echo advertisements('220x474') 
                @endphp

                @php 
                    echo advertisements('220x315') 
                @endphp

                @php 
                    echo advertisements('220x474') 
                @endphp

                @php 
                    echo advertisements('220x474') 
                @endphp
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    (function($){
        "use strict";

        $('select[name=city_id]').on('change',function() {
            $('select[name=location_id]').html('<option value="" selected="" disabled="">@lang('Select One')</option>');
            var locations = $('select[name=city_id] :selected').data('locations');
            var html = '';
            locations.forEach(function myFunction(item, index) {
                html += `<option value="${item.id}">${item.name}</option>`
            });
            $('select[name=location_id]').append(html);
        });
        
    })(jQuery)
</script>
@endpush