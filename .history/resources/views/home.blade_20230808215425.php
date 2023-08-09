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
                                                        <div class="row row-20 row-md-23">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">From</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="3">New Delhi (DEL)</option>
                                                                <option value="2">London (LHR)</option>
                                                                <option value="3">Atlanta (ATL)</option>
                                                                <option value="4">Tokyo (HND)</option>
                                                                <option value="5">Chicago (ORD)</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="2" style="width: 397.763px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-f7yt-container"><span class="select2-selection__rendered" id="select2-f7yt-container" role="textbox" aria-readonly="true" title="New Delhi (DEL)">New Delhi (DEL)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                            <div class="form-wrap">
                                                            <label class="checkbox-inline">
                                                                <input name="input-group-radio" value="checkbox-1" type="checkbox" class="checkbox-custom"><span class="checkbox-custom-dummy"></span>Add Nearby Airports
                                                            </label>
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
                                                            <div class="form-wrap">
                                                            <label class="checkbox-inline">
                                                                <input name="input-group-radio" value="checkbox-2" type="checkbox" class="checkbox-custom"><span class="checkbox-custom-dummy"></span>Add Nearby Airports
                                                            </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-1-5">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Cabin Class</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="9">Economy</option>
                                                                <option value="2">Premium Economy</option>
                                                                <option value="3">Business</option>
                                                                <option value="4">First</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="8" style="width: 183.875px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-sdlh-container"><span class="select2-selection__rendered" id="select2-sdlh-container" role="textbox" aria-readonly="true" title="Economy">Economy</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23 align-items-md-end">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Departure</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="departure" data-dtp="dtp_8b4hy" id="regula-generated-700172" fdprocessedid="zwqlob"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Return</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="return" data-dtp="dtp_G5orO" id="regula-generated-851818" fdprocessedid="5i07hm"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="row row-20 row-md-23">
                                                            <div class="col-sm-6">
                                                                <div class="form-wrap">
                                                                <label class="form-label-outside">Adults (16+)</label>
                                                                <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="2" data-constraints="@Numeric" id="regula-generated-825879" fdprocessedid="k6awx7"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-wrap">
                                                                <label class="form-label-outside">Children</label>
                                                                <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="0" data-constraints="@Numeric" id="regula-generated-136240" fdprocessedid="z5r5fi"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-xl-clear-flex align-items-md-end text-center text-xl-end">
                                                            <button class="button button-primary button-sm button-naira button-naira-up" fdprocessedid="7bu7lc"><span class="icon fa-search"></span><span>Search Flight</span></button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span><span class="icon mdi mdi-hotel"></span><span>Hotels</span></div><div class="resp-tab-content" aria-labelledby="tab_item-1">
                                                <form class="small" method="post" action="#" autocomplete="off">
                                                    <div class="row row-20 row-md-23">
                                                    <div class="col-lg-8">
                                                        <div class="form-wrap radio-inline-wrapper">
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" value="radio-1" type="radio" checked="" class="radio-custom"><span class="radio-custom-dummy"></span>Work
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="input-group-radio" value="radio-2" type="radio" class="radio-custom"><span class="radio-custom-dummy"></span>Vacation
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Destination</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="12">San Antonio</option>
                                                                <option value="2">Hawaii</option>
                                                                <option value="3">Budapest</option>
                                                                <option value="4">Buenos Aires</option>
                                                                <option value="5">Taipei</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="11" style="width: 397.763px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-1sny-container"><span class="select2-selection__rendered" id="select2-1sny-container" role="textbox" aria-readonly="true" title="San Antonio">San Antonio</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Rooms</label>
                                                            <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="1" data-constraints="@Numeric" id="regula-generated-822341"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1-5">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Star rating</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="13" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="15">5</option>
                                                                <option value="2">4</option>
                                                                <option value="3">3</option>
                                                                <option value="4">2</option>
                                                                <option value="5">1</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="14" style="width: 183.875px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-r2s4-container"><span class="select2-selection__rendered" id="select2-r2s4-container" role="textbox" aria-readonly="true" title="5">5</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23 align-items-md-end">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Arrival</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="departure" data-dtp="dtp_eEDx3" id="regula-generated-678416"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Leave</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="return" data-dtp="dtp_7l46l" id="regula-generated-550721"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="row row-20 row-md-23">
                                                            <div class="col-sm-6">
                                                                <div class="form-wrap">
                                                                <label class="form-label-outside">Adults (16+)</label>
                                                                <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="2" data-constraints="@Numeric" id="regula-generated-983355"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-wrap">
                                                                <label class="form-label-outside">Children</label>
                                                                <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="0" data-constraints="@Numeric" id="regula-generated-169039"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-xl-clear-flex text-center text-xl-end">
                                                            <button class="button button-primary button-sm button-naira button-naira-up"><span class="icon fa-search"></span><span>Search Hotels</span></button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span><span class="icon mdi mdi-car"></span><span>Car Hire</span></div><div class="resp-tab-content" aria-labelledby="tab_item-2">
                                                <form class="small" method="post" action="#" autocomplete="off">
                                                    <div class="row row-20 row-md-23">
                                                    <div class="col-lg-8">
                                                        <div class="form-wrap radio-inline-wrapper">
                                                        <label class="checkbox-inline">
                                                            <input name="input-group-radio" value="checkbox-2" type="checkbox" class="checkbox-custom"><span class="checkbox-custom-dummy"></span>Return car to different location
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Select car</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="16" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="18">Economy (Suzuki Swift)</option>
                                                                <option value="2">Compact (Toyota Corolla)</option>
                                                                <option value="3">Intermediate (KIA Cerato)</option>
                                                                <option value="4">Standard (Hyundai Elantra)</option>
                                                                <option value="5">Full Size (Toyota Camry)</option>
                                                                <option value="6">Premium (Holden SV6)</option>
                                                                <option value="7">Luxury (Holden Caprice V8)</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="17" style="width: 326.462px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-02cg-container"><span class="select2-selection__rendered" id="select2-02cg-container" role="textbox" aria-readonly="true" title="Economy (Suzuki Swift)">Economy (Suzuki Swift)</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">AWD</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text"  placeholder="000-000-000" id="regula-generated-978070"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Car class</label>
                                                            <!--Select 2-->
                                                            <select class="form-input select-filter select2-hidden-accessible" data-minimum-results-search="Infinity" data-select2-id="19" tabindex="-1" aria-hidden="true">
                                                                <option value="1" data-select2-id="21">Hatchback</option>
                                                                <option value="2">Sedan</option>
                                                                <option value="3">Coupe</option>
                                                                <option value="4">MPV</option>
                                                                <option value="5">SUV</option>
                                                                <option value="6">Crossover</option>
                                                                <option value="7">Convertible</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" data-select2-id="20" style="width: 326.462px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-m3y3-container"><span class="select2-selection__rendered" id="select2-m3y3-container" role="textbox" aria-readonly="true" title="Hatchback">Hatchback</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row row-20 row-md-23 align-items-md-end">
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Pick-up Date</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="departure" data-dtp="dtp_Vn3CM" id="regula-generated-642567"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Drop-off Date</label>
                                                            <input class="form-input form-control-has-validation form-control-last-child" type="text" data-time-picker="date" name="return" data-dtp="dtp_4bdG4" id="regula-generated-838401"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xl-3">
                                                            <div class="form-wrap">
                                                            <label class="form-label-outside">Passengers</label>
                                                            <div class="stepper "><input class="form-input stepper-input form-control-has-validation" type="number" min="0" value="2" data-constraints="@Numeric" id="regula-generated-6016"><span class="form-validation"></span><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-xl-clear-flex text-center text-xl-end">
                                                            <button class="button button-primary button-sm button-naira button-naira-up"><span class="icon fa-search"></span><span>Search Cars</span></button>
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
