@extends('layouts.app')

@section('content')
 <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Overview
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="overview-section" data-background="assets/images/bg/bg-photo.jpg">
            <div class="container-fluid">
                <div class="overview-area">
                    <div class="overview-element" data-aos="fade-up" data-aos-duration="1200">
                        <img src="assets/images/element/element-6.png" alt="element">
                    </div>
                    <div class="overview-tab">
                        
                         <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                            Start Book-form
                        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <section class="book-form-section ptb-30">
                                <div class="container">
                                    <div class="book-form-area bg-overlay-black bg_img" data-background="assets/images/bg/bg-3.png">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-12 text-center">
                                                <div class="section-header white">
                                                    <span class="sub-title text-white"><span>Trip Builder</span> Book</span>
                                                    <h2 class="section-title">Book A Personal Flight</h2>
                                                </div>
                                                <form class="book-form">
                                                    <div class="row justify-content-center mb-20-none">
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                                                            <div class="book-select">
                                                                <label>From</label>
                                                                <div class="book-form-icon">
                                                                    <i class="icon-from-airplane"></i>
                                                                </div>
                                                                <select class="book-select form--control">
                                                                    <option value="dhaka" selected>Dhaka</option>
                                                                    <option value="london">London</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                                                            <div class="book-select">
                                                                <label>To</label>
                                                                <div class="book-form-icon">
                                                                    <i class="icon-to-airplane"></i>
                                                                </div>
                                                                <select class="book-select form--control">
                                                                    <option value="london" selected>London</option>
                                                                    <option value="dhaka">Dhaka</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                                                            <div class="book-select">
                                                                <label>Date</label>
                                                                <div class="book-form-icon">
                                                                    <i class="icon-schedule-icon"></i>
                                                                </div>
                                                                <select class="book-select form--control">
                                                                    <option value="25/12/2021" selected>25/12/2021</option>
                                                                    <option value="30/12/2021">30/12/2021</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 form-group">
                                                            <label>Passenger</label>
                                                            <div class="book-quantity">
                                                                <div class="book-plus-minus">
                                                                    <div class="dec qtybutton">-</div>
                                                                    <input class="book-plus-minus-box qty" type="text" name="qty" value="1"
                                                                        readonly>
                                                                    <div class="inc qtybutton">+</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 form-group">
                                                            <button type="submit" class="btn--base ml-auto mr-auto mt-30"><i
                                                                    class="icon-btn-icon"></i> Book Now</button>
                                                        </div>
                                                    </div>
                                                </form>
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
