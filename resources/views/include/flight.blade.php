
<?php
use Carbon\Carbon;
?>
@if( !$flights->isEmpty() ) 
    @foreach ($flights as $flight) 
        <div class="col-xl-12 col-lg-12 mb-50">
            <div class="justify-content-center mb-30-none">
                <div class="flight-bg">
                        <div class="flight-price-bg">
                            <div class="row ">
                                <div class="col-md-8 flight-price-number full-line-price">
                                <div> @if($tripType !='ONEWAYTRIP') <span class="partial-price"> {{ $flight->outbound_price? '$'.$flight->outbound_price : ''}} </span>
                                    <span class="text">+</span>
                                    <span class="partial-price"> {{ $flight->return_price? '$'.$flight->return_price : ''}} </span>
                                    <span class="text"> =</span> @endif <span class="total-price"> ${{ $flight->outbound_price+$flight->return_price }}
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
                                <h5>{{ $outbound_departure_time->format('G:ia'); }}</h5>
                                <b>{{ $flight->outbound_airport_from }} ({{ $flight->outbound_departure }})</b>
                            </div>
                            <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                <span class="duration">{{ intdiv($flight->outbound_duration, 60).'H : '. ($flight->outbound_duration % 60).'M' }} </span>
                                <p>duration</p>
                            </div>
                            <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                <h5>{{ $arrival_time->format('G:ia'); }}</h5>
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
                                <h5>{{ $return_departure_time->format('G:ia'); }}</h5>
                                <b>{{ $flight->return_airport_from }} ({{ $flight->return_departure }})</b>
                                </div>
                                <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                <span class="duration">{{ intdiv($flight->return_duration, 60).'H : '. ($flight->return_duration % 60).'M' }} </span>
                                <p>duration</p>
                                </div>
                                <div class="col-6 col-sm-2 col-md-2 col-lg-2">
                                <h5>{{ $arrival_time->format('G:ia'); }}</h5>
                                <b>{{ $flight->return_airport_to }} ({{ $flight->return_arrival }})</b>
                                </div>
                            </div>
                        </div> 
                        @endif
                </div>
            </div>
        </div> 
    @endforeach 

    <div class="col-xl-12 col-lg-12 mb-30">
        <div class="justify-content-center mb-30-none">
        {{ $flights->appends(request()->input())->links(); }}
        </div>
    </div>
@else
<div class="col-xl-12 col-lg-12 mb-30 mt-30">
    <p style="text-align:center">No data available</p>
</div>
@endif 


