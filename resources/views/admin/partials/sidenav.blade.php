<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
     data-background="{{getImage('assets/admin/images/sidebar/2.jpg','400x800')}}">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            @if(auth()->guard('admin')->check())
                <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                        src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')"></a>
                <a href="{{route('admin.dashboard')}}" class="sidebar__logo-shape"><img
                        src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
                <button type="button" class="navbar__expand"></button>
            @elseif (auth()->guard('donor')->check())
                <a href="{{route('donor.dashboard')}}" class="sidebar__main-logo"><img
                        src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')"></a>
                <a href="{{route('donor.dashboard')}}" class="sidebar__logo-shape"><img
                        src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
                <button type="button" class="navbar__expand"></button>
            @endif
        </div>
        @if(auth()->guard('admin')->check())
        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>


                <li class="sidebar-menu-item  {{menuActive('admin.city.index')}}">
                    <a href="{{route('admin.city.index')}}" class="nav-link"
                       data-default-url="{{ route('admin.city.index') }}">
                        <i class="menu-icon las la-city"></i>
                        <span class="menu-title">@lang('Manage City') </span>
                    </a>
                </li>


                 <li class="sidebar-menu-item  {{menuActive('admin.location.index')}}">
                    <a href="{{route('admin.location.index')}}" class="nav-link"
                       data-default-url="{{ route('admin.location.index') }}">
                        <i class="menu-icon las la-location-arrow"></i>
                        <span class="menu-title">@lang('Manage Location') </span>
                    </a>
                </li>


                <li class="sidebar-menu-item  {{menuActive('admin.blood.index')}}">
                    <a href="{{route('admin.blood.index')}}" class="nav-link"
                       data-default-url="{{ route('admin.blood.index') }}">
                        <i class="menu-icon las la-syringe"></i>
                        <span class="menu-title">@lang('Blood Group') </span>
                    </a>
                </li>


                 <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.donor*',3)}}">
                        <i class="menu-icon las la-user"></i>
                        <span class="menu-title">@lang('Manage Donor') </span>
                        @if(0 < $pending_donor_count)
                            <span class="menu-badge pill bg--primary ml-auto">
                                <i class="fa fa-exclamation"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.donor*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.donor.index')}} ">
                                <a href="{{route('admin.donor.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.donor.pending')}} ">
                                <a href="{{route('admin.donor.pending')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if($pending_donor_count)
                                        <span
                                            class="menu-badge pill bg--primary ml-auto">{{$pending_donor_count}}</span>
                                    @endif
                                </a>
                            </li>

                             <li class="sidebar-menu-item {{menuActive('admin.donor.approved')}} ">
                                <a href="{{route('admin.donor.approved')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>

                             <li class="sidebar-menu-item {{menuActive('admin.donor.banned')}} ">
                                <a href="{{route('admin.donor.banned')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

               

                




                <li class="sidebar__menu-header">@lang('Settings')</li>

                <li class="sidebar-menu-item {{menuActive('admin.setting.index')}}">
                    <a href="{{route('admin.setting.index')}}" class="nav-link">
                        <i class="menu-icon las la-life-ring"></i>
                        <span class="menu-title">@lang('General Setting')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.setting.logo.icon')}}">
                    <a href="{{route('admin.setting.logo.icon')}}" class="nav-link">
                        <i class="menu-icon las la-images"></i>
                        <span class="menu-title">@lang('Logo & Favicon')</span>
                    </a>
                </li>


                <li class="sidebar-menu-item {{menuActive('admin.seo')}}">
                    <a href="{{route('admin.seo')}}" class="nav-link">
                        <i class="menu-icon las la-globe"></i>
                        <span class="menu-title">@lang('SEO Manager')</span>
                    </a>
                </li>

               


                <li class="sidebar__menu-header">@lang('Frontend Manager')</li>

               

                

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.frontend.sections*',3)}}">
                        <i class="menu-icon la la-html5"></i>
                        <span class="menu-title">@lang('Manage Section')</span>
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.frontend.sections*',2)}} ">
                        <ul>
                            @php
                               $lastSegment =  collect(request()->segments())->last();
                            @endphp
                            @foreach(getPageSections(true) as $k => $secs)
                                @if($secs['builder'])
                                    <li class="sidebar-menu-item  @if($lastSegment == $k) active @endif ">
                                        <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                                            <i class="menu-icon las la-dot-circle"></i>
                                            <span class="menu-title">{{__($secs['name'])}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach


                        </ul>
                    </div>
                </li>

                <li class="sidebar__menu-header">@lang('Extra')</li>


                <li class="sidebar-menu-item {{menuActive('admin.setting.cookie')}}">
                    <a href="{{route('admin.setting.cookie')}}" class="nav-link">
                        <i class="menu-icon las la-cookie-bite"></i>
                        <span class="menu-title">@lang('GDPR Cookie')</span>
                    </a>
                </li>
                
                <li class="sidebar-menu-item  {{menuActive('admin.system.info')}}">
                    <a href="{{route('admin.system.info')}}" class="nav-link"
                       data-default-url="{{ route('admin.system.info') }}">
                        <i class="menu-icon las la-server"></i>
                        <span class="menu-title">@lang('System Information') </span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.setting.custom.css')}}">
                    <a href="{{route('admin.setting.custom.css')}}" class="nav-link">
                        <i class="menu-icon lab la-css3-alt"></i>
                        <span class="menu-title">@lang('Custom CSS')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item {{menuActive('admin.setting.optimize')}}">
                    <a href="{{route('admin.setting.optimize')}}" class="nav-link">
                        <i class="menu-icon las la-broom"></i>
                        <span class="menu-title">@lang('Clear Cache')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item  {{menuActive('admin.request.report')}}">
                    <a href="{{route('admin.request.report')}}" class="nav-link"
                       data-default-url="{{ route('admin.request.report') }}">
                        <i class="menu-icon las la-bug"></i>
                        <span class="menu-title">@lang('Report & Request') </span>
                    </a>
                </li>
            </ul>
            
        </div>
        @elseif(auth()->guard('donor')->check())
        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('donor.dashboard')}}">
                    <a href="{{route('donor.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>
                <li class="sidebar__menu-header">@lang('Requests')</li>
                <li class="sidebar-menu-item {{menuActive('donor.donor.request')}}">
                    <a href="{{route('donor.donor.request')}}" class="nav-link ">
                        <i class="menu-icon las la-syringe"></i>
                        <span class="menu-title">@lang('Requests')</span>
                    </a>
                </li>
            </ul>
            <div class="text-center mb-3 text-uppercase">
                <span class="text--primary">{{__(systemDetails()['name'])}}</span>
                {{-- <span class="text--success">@lang('V'){{systemDetails()['version']}} </span> --}}
            </div>
        </div>
        @endif
    </div>
</div>
<!-- sidebar end -->
