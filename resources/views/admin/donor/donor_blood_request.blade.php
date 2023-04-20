@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Phone')</th>
                                    <th>@lang('Location')</th>
                                    <th>@lang('Request Date')</th> 
                                    <th>@lang('Status')</th>  
                                    <th>@lang('Action')</th>  
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($blood_requests as $request)
                                <tr>
                                    <td data-label="@lang('Name')">
                                        <span>{{__($request->user->name)}}</span><br> 
                                    </td>
                                    <td data-label="@lang('Phone')"> 
                                        <span>{{__($request->user->phone)}}</span>
                                    </td>
                                    <td data-label="@lang('Blood Group - Location')"> 
                                        <span>{{__($request->location)}}</span>
                                    </td>
                                    <td data-label="@lang('Request Date')">
                                        <span>{{__($request->date)}}</span><br> 
                                    </td>
                                    <td data-label="@lang('Request Date')">
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
                                    <td data-label="@lang('Request Date')">
                                        <select class="language-select "   name="change_status" id="change_status">Change Status
                                            <option selected>Change Status</option>
                                            <option value="4">Complete Request</option>
                                            <option value="3">Accept Request</option>
                                            <option value="2">Cancel Request</option>
                                        </select>
                                    </td>

                                    {{-- <td data-label="@lang('Gender - Age')">
                                        <span>@if($donor->gender == 1) @lang('Male') @else @lang('Female') @endif</span><br>
                                        <span>{{Carbon\Carbon::parse($donor->birth_date)->age}} @lang('Years')</span>
                                    </td> --}}

                                     {{-- <td data-label="@lang('Featured Donor')">
                                        @if($donor->featured == 1)
                                            <span class="badge badge--success">@lang('Included')</span>
                                            <a href="javascript:void(0)" class="icon-btn btn--info ml-2 notInclude" data-toggle="tooltip" title="" data-original-title="@lang('Not Include')" data-id="{{ $donor->id }}">
                                                <i class="las la-arrow-alt-circle-left"></i>
                                            </a>
                                        @else
                                            <span class="badge badge--warning">@lang('Not included')</span>
                                            <a href="javascript:void(0)" class="icon-btn btn--success ml-2 include text-white" data-toggle="tooltip" title="" data-original-title="@lang('Include')" data-id="{{ $donor->id }}">
                                                <i class="las la-arrow-alt-circle-right"></i>
                                            </a>
                                        @endif
                                    </td> --}}

                                    {{-- <td data-label="@lang('Status')">
                                        @if($donor->status == 1)
                                            <span class="badge badge--success">@lang('Active')</span>
                                        @elseif($donor->status == 2)
                                            <span class="badge badge--danger">@lang('Banned')</span>
                                        @else
                                            <span class="badge badge--primary">@lang('Pending')</span>
                                        @endif
                                    </td> --}}

                                    
                                    {{-- <td data-label="@lang('Action')">
                                        @if($donor->status == 2)
                                            <a href="javascript:void(0)" class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-original-title="@lang('Approve')" data-id="{{$donor->id}}"><i class="las la-check"></i></a> 
                                        @elseif($donor->status == 1)
                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" data-original-title="@lang('Banned')" data-id="{{$donor->id}}"><i class="las la-times"></i></a> 
                                        @elseif($donor->status == 0)
                                            <a href="javascript:void(0)" class="icon-btn btn--success ml-1 approved" data-toggle="tooltip" data-original-title="@lang('Approve')" data-id="{{$donor->id}}"><i class="las la-check"></i></a> 
                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 cancel" data-toggle="tooltip" data-original-title="@lang('Banned')" data-id="{{$donor->id}}"><i class="las la-times"></i></a> 
                                        @endif
                                        <a href="{{route('admin.donor.edit', $donor->id)}}" class="icon-btn btn--primary ml-1"><i class="las la-pen"></i></a>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{__($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{-- {{ paginateLinks($blood_requests) }} --}}
                </div>
            </div>
        </div>
    </div>
 
@endsection

@push('script')
<script> 
    $("#change_status").on('change', function() {
        
        var status = $(this).val();
        // alert(status);
        if(status){
            $.ajax ({
                type: 'GET',
                url: "{{ route('donor.donor.change.status') }}",
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
 