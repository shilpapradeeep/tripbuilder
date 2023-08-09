@extends('layouts.app')

@section('content')
 <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Overview
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    
    <div class="overview-section" style="background-image:url({{ asset('assets/images/bg/bg-photo.jpg')}})" >
            <div class="container-fluid">
                <div class="overview-area">
                    <div class="overview-tab">
                        
                         <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            Start Book-form
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <section class="book-form-section ptb-30">
                                    <div class="container container-wide section-70 section-xxl-top-200 section-xxl-bottom-220">
                                        <div class="row justify-content-sm-center" style="background: #fff">
                                        <div class="col-lg-11 col-xl-9 col-xxl-6">
                                            <div class="responsive-tabs text-lg-start nav-custom-dark view-animate fadeInUpSmall active" data-type="horizontal" style="display: block; width: 100%;">
                                            <!-- Responsive-tabs-->
                                            <ul class="nav-custom-tabs resp-tabs-list">
                                                <li class="nav-item resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab"><span class="icon mdi mdi-airplane"></span><span>Flights</span></li>
                                                <li class="nav-item resp-tab-item" aria-controls="tab_item-1" role="tab"><span class="icon mdi mdi-hotel"></span><span>Hotels</span></li>
                                            </ul>
                                            <div class="resp-tabs-container nav-custom-tab nav-custom-wide">

                                                @if ($message = Session::get('error'))
                                                <div class="alert alert-danger alert-block" style="display: none;">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                                    <strong class="alert-danger-message">{{ $message }}</strong>
                                                </div>
                                                @endif
                                                
                                                @if ($message = Session::get('warning'))
                                                <div class="alert alert-warning alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @endif
                                                
                                                @if ($message = Session::get('info'))
                                                <div class="alert alert-info alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @endif
                                                
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                                    Please check the form below for errors
                                                </div>
                                                @endif 
                                                <div class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span><span class="icon mdi mdi-airplane"></span><span>Flights</span></div><div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                                                <form id="contact_form" class="small" method="post" action="#">
                                                    <div class="row row-20 row-md-23">
                                                    <div class="col-lg-8">
                                                        <div class="form-wrap radio-inline-wrapper">
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" name="flight-type" value="radio-1" type="radio" checked="" class="radio-custom"><span class="radio-custom-dummy"></span>Round Trip
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" name="flight-type" value="radio-2" type="radio" class="radio-custom"><span class="radio-custom-dummy"></span>One Way
                                                        </label>
                                                        </div>
                                                        <span id="name_error" class="error" style="color:red"></span>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-wrap">
                                                        <label class="form-label-outside">From</label>
                                                        <!--Select 2-->
                                                        <select name="tr_from" class="form-input" tabindex="-1" aria-hidden="true">
                                                            <option value="1">New Delhi (DEL)</option>
                                                            <option value="2">London (LHR)</option>
                                                            <option value="3">Atlanta (ATL)</option>
                                                            <option value="4">Tokyo (HND)</option>
                                                            <option value="5">Chicago (ORD)</option>
                                                        </select>
                                                        <span id="tr_from_error" class="error" style="color:red"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm">
                                                        <div class="form-wrap">
                                                        <label class="form-label-outside">To</label>
                                                        <!--Select 2-->
                                                        <select name="tr_to" class="form-input" tabindex="-1" aria-hidden="true">
                                                            <option value="1">New York (JFK)</option>
                                                            <option value="2">Beijing (PEK)</option>
                                                            <option value="3">Dubai (DXB)</option>
                                                            <option value="4">Los Angeles (LAX)</option>
                                                            <option value="5">Hong Kong (HKG)</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23 align-items-md-end">
                                                        
                                                        <div class="col-12 col-xl-clear-flex align-items-md-end text-center text-xl-end">
                                                            <button id="btn-submit" class="button button-primary button-sm button-naira button-naira-up" fdprocessedid="7bu7lc"><span class="icon fa-search"></span><span>Search Flight</span></button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            </section>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            End Book-form
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    </div>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Overview
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
