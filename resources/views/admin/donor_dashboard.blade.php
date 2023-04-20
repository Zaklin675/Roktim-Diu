@extends('admin.layouts.app')
@section('panel')
    <div class="row mt-50 mb-none-30">
         
        <div class="col-xl-3 col-lg-6 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--18 b-radius--10 box-shadow">
                <div class="icon">
                   <i class="las la-user-circle"></i>
                </div>
                 
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $pending_request_blood }}</span>
                    </div>
                    <div class="desciption">
                        <span>@lang('Total Pending Request')</span>
                    </div>
                    {{-- <a href="#" class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a> --}}
                </div>
            </div>
        </div>
 
    </div>
@endsection