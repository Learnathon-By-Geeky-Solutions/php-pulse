@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || Payment
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb" class="py-4 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="fw-bold text-uppercase">Payment</h4>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->

    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__payment_success" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center p-5 bg-white shadow rounded">
                    <div class="mb-3">
                        <i class="fas fa-check-circle text-success display-4"></i>
                    </div>
                    <h1 class="fw-bold text-success">Payment Successful!</h1>
                    <p class="text-muted">Thank you for your purchase. Your payment has been processed successfully.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection
