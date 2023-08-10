@extends('layouts.app')

@section('content')
<style>
.flight-bg {
    background-color: #fefbfb;
    padding: 5px 20px 5px 10px;
    box-shadow: 0px 0px 1px 1px #ddd;
    border-radius: 6px;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}
.agentfare {
    position: absolute;
    right: 0px;
    margin-top: -6px;
    background-color: #003580;
    color: #fff;
    padding: 0px 3px 7px 10px;
    border-radius: 0px 13px 0px 50px;
    z-index: 1;
}
.collapse:not(.show) {
    display: none;
}
.agentfared {
    background-color: #e3e4ff;
    padding: 5px;
    margin: -5px -20px 5px -10px;
    border-radius: 6px 0px 0px 0px;
    font-size: 13px;
}
.flight-bg .col-6, .flight-bg .col-12 {
    padding-left: 5px;
    padding-right: 5px;
}
.flight-bg .flogo {
    width: 55px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0px 3px 3px 0px #d2cece;
}
.flight-bg .ft {
    font-size: 20px;
    margin-top: 5px;
}

.flight-bg span {
    display: block;
}
.flight-bg .price small {
    text-decoration: line-through;
    margin-top: 15px;
    display: block;
}

.small, small {
    font-size: 80%;
    font-weight: 400;
}

.button-sm {
    padding: 14px 39px 13px;
    font-size: 14px;
}
.flight-bg .book {
    background-color: #c62a82;
    color: #fff;
    display: block;
    padding: 8px 5px;
    border-radius: 55px;
    margin-top: 20px;
    transition: all .4s;
}
.flight-detail-bg {
    padding: 10px 0px 5px;
    border-top: 1px solid #e0e0e0;
    margin-top: 10px;
}
.flight-detail-bg h2 {
    font-size: 15px;
    margin: 0px;
}
.flight-detail-bg .details {
    float: right;
    color: #5c5a5a;
    font-size: 13px;
}
.flight-detail-bg .details {
    float: right;
    color: #5c5a5a;
    font-size: 13px;
}
.flight-search
{
    background-color: #c62a82;
    color: #fff;
    display: block;
    padding: 8px 5px;
    border-radius: 55px;
    margin-top: 20px;
    transition: all .4s;
    margin-top: 24px;
    width: 100%;
}
.flight-price-bg {
    padding: 0px 15px 5px;
    border-bottom: 1px solid #e0e0e0;
    margin-top: 10px;
    /* text-align: left; */
}
.price
{
    text-align: left;
}
.flight-price-number>div {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
span.total-price
{
    color: #2cb8e2;
    font-weight: 800;
    font-size: 20px;

}
.package-disclaimer
{
    font-size: 12px;
    color: #555;
    display: inline-block;
    width: 100%;
}
.partial-price {
    font-weight: 400;
    font-size: 1em;
}
.dep-div
{
    padding-top: 15px;
}
.duration
{
    padding-bottom:5px;
}

</style>
<?php
use Carbon\Carbon;
?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section inner-banner-section bg-overlay-black bg_img" style="background-image:url({{ asset('assets/images/bg/inner-bg.png')}} )" 
            >
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="banner-content">
                            <h1 class="title">Flights</h1>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Flights</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

     <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <a href="#" class="scrollToTop">
            <i class="las la-dot-circle"></i>
            <span>Top</span>
        </a>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Blog
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <section class="blog-section ptb-50">
            <div class="container">
            <form id="contact_form" class="small" method="post" action="#">

                <div class="search"> 
                    <div class="row">
                         @csrf
                            <div class="col-md-3">
                                <label class="form-label-outside">From</label>
                                <!--Select 2-->
                                <select name="tr_from" id="tr_from" class="form-input" tabindex="-1" aria-hidden="true">
                                    <option value="">Select From</option>
                                    @foreach ($airports as $airport)
                                        @php
                                            $selected = ( request()->get('d1') && $airport->code == request()->get('d1'))? 'selected' : '';
                                        @endphp
                                    <option {{ $selected }} value="{{ $airport->code }}">{{ $airport->name, $airport->city, $airport->country_code }}</option>
                                    @endforeach
                                </select>
                                <span id="tr_from_error" class="error" style="color:red"></span>
                            </div>
                            <div class="col-md-3 ">
                                <label class="form-label-outside">To</label>
                                <!--Select 2-->
                                <select name="tr_to" id="tr_to" class="form-input" tabindex="-1" aria-hidden="true">
                                <option value="">Select To</option>
                                    @foreach ($airports as $airport)
                                        @php
                                            $selected = ( request()->get('r1') && $airport->code == request()->get('r1'))? 'selected' : '';
                                        @endphp
                                        <option {{ $selected }} value="{{ $airport->code }}">{{ $airport->name, $airport->city, $airport->country_code }}</option>
                                    @endforeach
                                </select>
                                <span id="tr_to_error" class="error" style="color:red"></span>
                            </div>
                            <div class="col-md-3">
                                
                                    <label class="form-label-outside">Flight Type</label>
                                    <!--Select 2-->
                                    <select name="flight_type" id="flight_type" class="form-input" tabindex="-1" aria-hidden="true" style="width: 100%;">
                                        <option value="">Select </option>
                                        <option  @if(request()->get('tripType') == 'ROUNDTRIP') selected  @endif value="ROUNDTRIP">Round Trip</option>
                                        <option  @if(request()->get('tripType') == 'ONEWAYTRIP') selected  @endif value="ONEWAYTRIP">One Way</option>
                                    </select>
                                    <span id="flight_type_error" class="error" style="color:red"></span>
                            </div>
                            <div class="col-md-3"> 
                                <button type="submit"  id="btn-submit" class="flight-search" ><i style="display:none" id="spin" class="fa fa-spinner" aria-hidden="true"></i>Search</button>     
                            </div>
                    </div>
                </div>
            </form>
                <div class="row justify-content-center mb-30-none">
                    @if($flights)
                    @foreach ($flights as $flight)
                        <div class="col-xl-12 col-lg-12 mb-30">
                            <div class="justify-content-center mb-30-none">
                                <div class="flight-bg">
                                    <div class="flight-price-bg">
                                        <div class="row " >

                                            <div class="col-md-8 flight-price-number full-line-price">
                                                
                                                <div>
                                                    @if($tripType !='ONEWAYTRIP')
                                                        <span class="partial-price"> {{ $flight->outbound_price? '$'.$flight->outbound_price : ''}} </span>
                                                        <span class="text">+</span>
                                                        <span class="partial-price"> {{ $flight->return_price? '$'.$flight->return_price : ''}} </span>
                                                        <span class="text"> =</span>
                                                    @endif
                                                    <span class="total-price">
                                                        ${{ $flight->outbound_price+$flight->return_price }}                  
                                                    </span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row dep-div">
                                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                                            <img src="{{asset('assets/images/flight/').'/'.$flight->outbound_airlines_image}}" class="flogo" alt="">
                                            
                                        </div>
                                        <div class="col-6 col-sm-2 col-md-2 col-lg-2 price">
                                            <h5>{{ $flight->outbound_airlines_name }}</h5>
                                            <span>Flight {{ $flight->outbound_flight_number }}</span>
                                        </div>
                                        <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                            <?php 

                                            $outbound_departure_time = Carbon::parse($flight->outbound_departure_time);
                                            $arr = Carbon::parse($flight->outbound_departure_time);
                                            $arrival_time = $arr->addMinute($flight->outbound_duration);

                                            // Get Timezone - Departure
                                            $outbound_departure_timezone = new DateTimeZone( $flight->outbound_departure_timezone );

                                            // Set time
                                            $arrival_time = new DateTime( $flight->outbound_departure_time, $outbound_departure_timezone );
                                            $arrival_time->add(new DateInterval('PT' . $flight->outbound_duration . 'M'));


                                            // Get Timezone - Arrival

                                            $arrival_Timezone = new DateTimeZone( $flight->outbound_arrival_timezone );
                                            $arrival_time->setTimeZone( $arrival_Timezone );        ?>
                                            <h5 >{{ $outbound_departure_time->format('G:ia'); }}</h5>
                                            <b>{{ $flight->outbound_airport_from }} ({{ $flight->outbound_departure }})</b>
                                        </div>
                                        <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                            <span class="duration">{{ intdiv($flight->outbound_duration, 60).'H : '. ($flight->outbound_duration % 60).'M' }} </span>
                                            <p>duration</p>
                                        </div>
                                        <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                            <h5 >{{ $arrival_time->format('G:ia'); }}</h5>
                                            <b>{{ $flight->outbound_airport_to }} ({{ $flight->outbound_arrival }})</b>
                                        </div>
                                        
                                    </div>
                                    @if($tripType!='ONEWAYTRIP')
                                        <div class="flight-detail-bg">
                                            <div class="row">
                                                <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                                                    <img src="{{asset('assets/images/flight/').'/'.$flight->return_airlines_image}}" class="flogo" alt="">
                                                    
                                                </div>
                                                <div class="col-6 col-sm-2 col-md-2 col-lg-2 price">
                                                    <h5>{{ $flight->return_airlines_name }}</h5>
                                                    <span>Flight {{ $flight->return_flight_number }}</span>
                                                </div>
                                                <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                                    <?php 

                                                    $return_departure_time = Carbon::parse($flight->return_departure_time);
                                                    $arr = Carbon::parse($flight->return_departure_time);
                                                    $arrival_time = $arr->addMinute($flight->return_duration);

                                                    // Get Timezone - Departure
                                                    $return_departure_timezone = new DateTimeZone( $flight->return_departure_timezone );

                                                    // Set time
                                                    $arrival_time = new DateTime( $flight->return_departure_time, $return_departure_timezone );
                                                    $arrival_time->add(new DateInterval('PT' . $flight->return_duration . 'M'));


                                                    // Get Timezone - Arrival

                                                    $arrival_Timezone = new DateTimeZone( $flight->return_arrival_timezone );
                                                    $arrival_time->setTimeZone( $arrival_Timezone );        ?>
                                                    <h5 >{{ $return_departure_time->format('G:ia'); }}</h5>
                                                    <b>{{ $flight->return_airport_from }} ({{ $flight->return_departure }})</b>
                                                </div>
                                                <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                                    <span class="duration">{{ intdiv($flight->return_duration, 60).'H : '. ($flight->return_duration % 60).'M' }} </span>
                                                    <p>duration</p>
                                                </div>
                                                <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                                    <h5 >{{ $arrival_time->format('G:ia'); }}</h5>
                                                    <b>{{ $flight->return_airport_to }} ({{ $flight->return_arrival }})</b>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                    
                </div>
                
                <nav>
                    {{ $flights->appends(request()->input())->links(); }}
                    <!-- <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="#" rel="prev" aria-label="Prev &raquo;">PREV</a>
                        </li>
                        <li class="page-item active" aria-current="page"><span class="page-link">01</span></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                        <li class="page-item"><a class="page-link" href="#">05</a></li>
                        <li class="page-item next">
                            <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">NEXT</a>
                        </li>
                    </ul> -->
                </nav>
            </div>
        </section>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Blog
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@endsection