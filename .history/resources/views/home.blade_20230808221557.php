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
                                                <div class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span><span class="icon mdi mdi-airplane"></span><span>Flights</span></div><div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                                                <form class="small" method="post" action="#">
                                                    <div class="row row-20 row-md-23">
                                                    <div class="col-lg-8">
                                                        <div class="form-wrap radio-inline-wrapper">
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" value="radio-1" type="radio" checked="" class="radio-custom"><span class="radio-custom-dummy"></span>Round Trip
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" value="radio-2" type="radio" class="radio-custom"><span class="radio-custom-dummy"></span>One Way
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-wrap">
                                                        <label class="form-label-outside">From</label>
                                                        <!--Select 2-->
                                                        <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                            <option value="1">New Delhi (DEL)</option>
                                                            <option value="2">London (LHR)</option>
                                                            <option value="3">Atlanta (ATL)</option>
                                                            <option value="4">Tokyo (HND)</option>
                                                            <option value="5">Chicago (ORD)</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="2" style="width: 397.763px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-f7yt-container"><span class="select2-selection__rendered" id="select2-f7yt-container" role="textbox" aria-readonly="true" title="New Delhi (DEL)">New Delhi (DEL)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm">
                                                        <div class="form-wrap">
                                                        <label class="form-label-outside">To</label>
                                                        <!--Select 2-->
                                                        <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                            <option value="1" data-select2-id="6">New York (JFK)</option>
                                                            <option value="2">Beijing (PEK)</option>
                                                            <option value="3">Dubai (DXB)</option>
                                                            <option value="4">Los Angeles (LAX)</option>
                                                            <option value="5">Hong Kong (HKG)</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="5" style="width: 397.763px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-23fk-container"><span class="select2-selection__rendered" id="select2-23fk-container" role="textbox" aria-readonly="true" title="New York (JFK)">New York (JFK)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23 align-items-md-end">
                                                        
                                                        <div class="col-12 col-xl-clear-flex align-items-md-end text-center text-xl-end">
                                                            <button class="button button-primary button-sm button-naira button-naira-up" fdprocessedid="7bu7lc"><span class="icon fa-search"></span><span>Search Flight</span></button>
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
