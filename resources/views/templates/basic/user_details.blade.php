@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
    $breadcrumb = getContent('breadcrumb.content', true);
    @endphp
    <div class="profile-header dark--overlay bg_img"
        style="background-image: url({{ getImage('assets/images/frontend/breadcrumb/' . @$breadcrumb->data_values->background_image, '1920x1440') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="donor-profile">
                        <div class="donor-profile__thumb">
                            {{-- <img src="{{getImage('assets/images/donor/'. $donor->image, imagePath()['donor']['size'])}}" alt="@lang('image')"> --}}
                        </div>
                        <div class="donor-profile__content">
                            <h3 class="donor-profile__name">{{ __($user->name) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blood-donor-info-area">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="dono-info-item d-flex align-items-center justify-content-center">
                            <h5 class="text-white me-3"><i class="las la-tint"></i> @lang('Blood Group') : </h5>
                            <p class="text--base">o+</p>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 mt-lg-0 mt-3">
                        <div class="dono-info-item d-flex align-items-center justify-content-center">
                            <h5 class="text-white me-3"><i class="las la-clipboard-list"></i> @lang('Total Accepted') : </h5>
                            {{-- <p class="text--base">{{__($donor->total_donate)}}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-100 pb-50 shade--bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pe-lg-5">
                    <h3>@lang('User Details')</h3>
                    <div class="mt-4">
                        @php
                            echo advertisements('820x213');
                        @endphp
                    </div>
                    <ul class="caption-list-two mt-4">
                        <li>
                            <span class="caption">@lang('Name')</span>
                            <span class="value">{{ __($user->name) }}</span>
                        </li>
                        {{-- <li>
						<span class="caption">@lang('Gender')</span>
						<span class="value">@if ($donor->gender == 1) @lang('Male') @else @lang('Female') @endif</span>
					</li> --}}
                        {{-- <li>
						<span class="caption">@lang('Date of Birth')</span>
						<span class="value">{{showDateTime($donor->birth_date, 'd M Y')}}</span>
					</li> --}}
                        {{-- <li>
						<span class="caption">@lang('Age')</span>
						<span class="value">{{Carbon\Carbon::parse($donor->birth_date)->age}} @lang('Years')</span>
					</li> --}}
                        {{-- <li>
						<span class="caption">@lang('Religion')</span>
						<span class="value">{{__($donor->religion)}}</span>
					</li> --}}
                        <li>
                            <span class="caption">@lang('Email')</span>
                            <span class="value">{{ __($user->email) }}</span>
                        </li>
                        <li>
                            <span class="caption">@lang('Phone')</span>
                            <span class="value">{{ __($user->phone) }}</span>
                        </li>
                        {{-- <li>
						<span class="caption">@lang('Profession')</span>
						<span class="value">{{__($donor->profession)}}</span>
					</li> --}}

                        {{-- <li>
						<span class="caption">@lang('Address')</span>
						<span class="value">{{__($donor->address)}}</span>
					</li> --}}
                    </ul>

                    <div class="mt-4">
                        @php
                            echo advertisements('820x213');
                        @endphp
                    </div>

                </div>

            </div>
            <div class="row">
                <h5>Blood Requests</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Date</th>
                            <th scope="col">location</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user->bloodRequest as $request)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $request->donor->name }}</td>
                                <td>
                                    @php
                                        $blood = DB::table('bloods')
                                            ->where('id', $request->donor->blood_id)
                                            ->pluck('name')
                                            ->first();
                                    @endphp
                                    {{ $blood }}
                                </td>
                                <td>{{ date_format(new DateTime($request->date), 'Y/m/d') }}</td>
                                <td>{{ $request->location }}</td>
                                <td>
                                    @if ($request->status == 1)
                                        Pending
                                    @elseif($request->status == 2)
                                        Canceled
                                    @elseif($request->status == 3)
                                        Accepted
                                    @else
                                        Completed
                                    @endif
                                </td>
                                <td>
									
                                    <select class="language-select " style="background: coral" name="change_status" id="change_status">Change Status
										<option selected>Change Status</option>
										<option value="4">Complete Request</option>
                                        @if ($request->status != 4)
                                        <option value="2">Cancel Request</option> 
                                        @endif 
									</select>
									<a href="{{ route('user.request.blood.delete',$request->id) }}" class="btn btn-sm btn-danger" id="delete" onclick="confirm('Are You Sure?');"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </section>
	
@endsection
@push('script')
<script> 
    $("#change_status").on('change', function() {
        
        var status = $(this).val();
        // alert(status);
        if(status){
            $.ajax ({
                type: 'GET',
                url: "{{ route('user.change.status') }}",
                data: { status: '' + status + '' },
                success : function(status) {
                    // $('#opt_lesson_list').html(htmlresponse);
                    console.log(status);
                    if(status == 1){
                        location.reload(true);
                    }else if(status == 2){
                        alert("You have already canceled the request");
                    }
                }
            });
        }
    }); 
 
 
</script>
@endpush