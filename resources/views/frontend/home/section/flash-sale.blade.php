<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url({{asset('frontend/images/flash_sell_bg.jpg')}})">
                    @if (!empty($flashSaleDate) && !empty($flashSaleDate->end_date))
                        <div class="wsus__flash_coundown">
                            <span class="end_text">Flash Sale</span>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <a class="common_btn" href="{{route('flash-sale')}}">see more <i class="fas fa-caret-right"></i></a>
                        </div>
                    @else
                        <div class="wsus__flash_coundown">
                            <span class="end_text text-danger">No active flash sale</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row flash_sell_slider">
            @php
                $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                    ->with(['variants', 'category', 'productImageGalleries'])->whereIn('id', $flashSaleItems)->get();
            @endphp


            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
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
