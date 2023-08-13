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

  .flight-bg .col-6,
  .flight-bg .col-12 {
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

  .small,
  small {
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

  .flight-search {
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

  .price {
    text-align: left;
  }

  .flight-price-number>div {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  span.total-price {
    color: #2cb8e2;
    font-weight: 800;
    font-size: 20px;
  }

  .package-disclaimer {
    font-size: 12px;
    color: #555;
    display: inline-block;
    width: 100%;
  }

  .partial-price {
    font-weight: 400;
    font-size: 1em;
  }

  .dep-div {
    padding-top: 15px;
  }

  .duration {
    padding-bottom: 5px;
  }

  .filter-bg
  {
    background-color: #fefbfb;
    padding: 5px 20px 5px 10px;
    box-shadow: 0px 0px 1px 1px #ddd;
    border-radius: 6px;
    margin-bottom: 20px;
    position: relative;
  }
  .f-head
  {
    font-size: 16px;
    color: #000;
    font-weight: 600;
    margin-bottom: 10px;
  }
  .filters-section
  {
    padding: 0px 15px 5px;
    margin-top: 10px;
  }
  .main-airlines-section {
    padding-bottom: 5px;
  }
  
.middle3px {
    margin-top: -3px;
}
.airln-ck
{
    width: 15px;
    height: 15px;
    vertical-align: bottom;
    position: relative;
    top: -14px;
}
.airln-lb
{
    padding-left: 20px;
    text-indent: -15px;
    display: inline-block;
}
.cost-search {
    background-color: #c62a82;
    color: #fff;
    display: block;
    padding: 8px 5px;
    border-radius: 55px;
    transition: all .4s;
    width: 100%;
}
</style> 
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="banner-section inner-banner-section bg-overlay-black bg_img" style="background-image:url({{ asset('assets/images/bg/inner-bg.png')}} )">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
      <div class="col-xl-12 text-center">
        <div class="banner-content">
          <h1 class="title">Flights</h1>
          <div class="breadcrumb-area">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index-2.html">Home</a>
                </li>
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
    
      <div class="search">
        <div class="row justify-content-center mb-30-none">
           <div class="col-xl-8 col-lg-8 mb-30">
                    <form id="contact_form" class="small" method="post" action="#">
                      @csrf 
                      <div class="row">
                          <div class="col-md-4">
                              <label class="form-label-outside">From</label>
                              <!--Select 2-->
                              <select name="tr_from" id="tr_from" class="form-input" tabindex="-1" aria-hidden="true">
                              <option value="">Select From</option>
                              @if(!$airports->isEmpty())
                               @foreach ($airports as $airport)
                                @php $selected = ( request()->get('d1') && $airport->code == request()->get('d1'))? 'selected' : ''; @endphp 
                                <option {{ $selected }} value="{{ $airport->code }}">{{ $airport->name, $airport->city, $airport->country_code }}</option> 
                               @endforeach
                              @endif
                              </select>
                              <span id="tr_from_error" class="error" style="color:red"></span>
                          </div>
                          <div class="col-md-4 ">
                              <label class="form-label-outside">To</label>
                              <!--Select 2-->
                              <select name="tr_to" id="tr_to" class="form-input" tabindex="-1" aria-hidden="true">
                              <option value="">Select To</option>
                              @if(!$airports->isEmpty()) 
                              @foreach ($airports as $airport)
                               @php $selected = ( request()->get('r1') && $airport->code == request()->get('r1'))? 'selected' : ''; @endphp
                                <option {{ $selected }} value="{{ $airport->code }}">{{ $airport->name, $airport->city, $airport->country_code }}</option> 
                              @endforeach
                              @endif
                              </select>
                              <span id="tr_to_error" class="error" style="color:red"></span>
                          </div>
                          <div class="col-md-2">
                              <label class="form-label-outside">Flight Type</label>
                              <!--Select 2-->
                              <select name="flight_type" id="flight_type" class="form-input" tabindex="-1" aria-hidden="true" style="width: 100%;">
                              <option value="">Select </option>
                              <option @if(request()->get('tripType') == 'ROUNDTRIP') selected @endif value="ROUNDTRIP">Round Trip</option>
                              <option @if(request()->get('tripType') == 'ONEWAYTRIP') selected @endif value="ONEWAYTRIP">One Way</option>
                              </select>
                              <span id="flight_type_error" class="error" style="color:red"></span>
                          </div>
                          <div class="col-md-2">
                              <button type="submit" id="btn-submit" class="flight-search">
                              <i style="display:none" id="spin" class="fa fa-spinner" aria-hidden="true"></i>Search </button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="col-xl-4 col-lg-4 mb-30">
                        <label class="form-label-outside">Sort By</label>
                        <!--Select 2-->
                        <select name="sort_by" id="sort_by" class="form-input" tabindex="-1" aria-hidden="true">
                          <option value="">Select From</option> 
                          <option  value="1">Cheapest</option> 
                          <option  value="2">Duration</option>
                        </select>
                        <span id="tr_from_error" class="error" style="color:red"></span>
                    </div>
                
            </div>
        </div>
    

    <div class="row mb-30-none"> 
        <input type="hidden" name="d1" id="d1" value="{{ request()->get('d1') }}">
        <input type="hidden" name="r1" id="r1" value="{{ request()->get('r1') }}">
        <input type="hidden" name="tripType" id="tripType" value="{{ request()->get('tripType') }}">
        <input type="hidden" name="csrf_token" id="csrf_token" value="{{ csrf_token() }}">
        <div class="col-xl-4 col-lg-4 mb-30">
          
              <div class="row">
                  @if(!$airlines->isEmpty()) 
                    <div class="col-xl-12 col-lg-12 mb-30">
                        <div class="filter-bg">
                            <div class="flight-price-bg">
                                <span class="f-head">Filter by Airline</span>
                            </div>
                            <div class="filters-section">
                              <div class="row">
                                @foreach ($airlines as $airline) 
                                  <div class="col-md-12">
                                    <input type="checkbox" @if( !empty($airlines_selected) && in_array($airline->code, $airlines_selected) ) checked @endif name="airline" id="airline_{{ $airline->code }}"  class="airln-ck middle3px arlne" value="{{ $airline->code }}"> 
                                    <label for="{{ $airline->code }}" class="airln-lb">{{ $airline->name }}</label>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                        </div>
                    </div>
                  @endif
                  <form id="cost_form" class="small" method="post" action="#">
                      @csrf 
                  <div class="col-xl-12 col-lg-12 mb-30">
                      <div class="filter-bg">
                          <div class="flight-price-bg">
                              <span class="f-head">Filter by Cost</span>
                          </div>
                          <div class="filters-section">
                            <div class="row">
                                <div class="col-md-12 mb-10">
                                  <input type="text" name="min_cost" id="min_cost" class="middle3px arlne" min="0" placeholder="Mininum amount"> 
                                  <span id="min_cost_error" class="error" style="color:red"></span>
                                </div>
                                <div class="col-md-12 mb-10">
                                  <input type="text" name="max_cost" id="max_cost" class="middle3px arlne" min="0" placeholder="MAximum amount"> 
                                  <span id="max_cost_error" class="error" style="color:red"></span>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="btn-csubmit" class="cost-search">
                                    <i style="display:none" id="cspin" class="fa fa-spinner" aria-hidden="true"></i>Search </button>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  </form>

              </div>
            
        </div>
        <div class="col-xl-8 col-lg-8 mb-30" id="f-div1">
            <span style="display: none;" id="spin1"><i class="fa fa-2x fa-spin fa-spinner"></i></span>
            @include('include.flight')
        </div>    
    </div>
    
  </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Blog
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~--> 
@endsection