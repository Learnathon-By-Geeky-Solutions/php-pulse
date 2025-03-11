@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Flash Sale
@endsection

@section('content')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Flash Sale</h4>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">Flash Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->

    <!--============================
            DAILY DEALS DETAILS START
        ==============================-->
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">
                <div class="row"></div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>Flash Sale</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">Ends Time:</span>
                                @if (!empty($flashSaleDate) && !empty($flashSaleDate->end_date))
                                    <div class="simply-countdown simply-countdown-one"></div>
                                @else
                                    <span class="text-danger">No active flash sale</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @php
                        $products = \App\Models\Product::with(['variants', 'category', 'productImageGalleries'])
                            ->whereIn('id', $flashSaleItems ?? [])
                            ->get();
                    @endphp
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!--============================
            DAILY DEALS DETAILS END
        ==============================-->

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        @if (!empty($flashSaleDate) && !empty($flashSaleDate->end_date))
            simplyCountdown('.simply-countdown-one', {
                year: {{ date('Y', strtotime($flashSaleDate->end_date)) }},
                month: {{ date('m', strtotime($flashSaleDate->end_date)) }},
                day: {{ date('d', strtotime($flashSaleDate->end_date)) }},
            });
        @else
            console.warn("Flash sale end date is not available.");
        @endif
    });
</script>
@endpush
