@php
    $categoryProductSliderSectionThree = json_decode($categoryProductSliderSectionThree->value);
@endphp
<section id="wsus__weekly_best" class="home2_wsus__weekly_best_2 ">
    <div class="container">
        <div class="row">
            @foreach ($categoryProductSliderSectionThree as $sliderSectionThree)
                        @php
                            $category = null;
                            if (isset($categoryData['category'])) {
                                $category = \App\Models\Category::find($categoryData['category']);
                                $products = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                            } elseif (isset($categoryData['sub_category'])) {
                                $category = \App\Models\SubCategory::find($categoryData['sub_category']);
                                $products = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                            } elseif (isset($categoryData['child_category'])) {
                                $category = \App\Models\ChildCategory::find($categoryData['child_category']);
                                $products = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                            }
                        @endphp
                        <div class="col-xl-6 col-sm-6">
                            <div class="wsus__section_header">
                                <h3>{{optional($category)->name}}</h3>
                            </div>
                            <div class="row weekly_best2">
                                {{-- <div class="col-xl-4 col-lg-4">
                                    <a class="wsus__hot_deals__single" href="#">
                                        <div class="wsus__hot_deals__single_img">
                                            <img src="images/pro9.jpg" alt="bag" class="img-fluid w-100">
                                        </div>
                                        <div class="wsus__hot_deals__single_text">
                                            <h5>men's sholder bag</h5>
                                            <p class="wsus__rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </p>
                                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                                        </div>
                                    </a>
                                </div> --}}
                                @if(isset($products) && $products->count() > 0)
                                @foreach ($products as $item)
                                    <div class="col-xl-4 col-lg-4">
                                        <a class="wsus__hot_deals__single" href="{{route('product-detail', $item->slug)}}">
                                            <div class="wsus__hot_deals__single_img">
                                                <img src="{{ asset($item->thumb_image) }}" alt="product" class="img-fluid w-100">
                                            </div>
                                            <div class="wsus__hot_deals__single_text">
                                                <h5>{{ Str::limit($item->name, 20) }}</h5>
                                                <p class="wsus__rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </p>
                                                <p class="wsus__tk">
                                                    @if (checkDiscount($item))
                                                        {{$settings->currency_icon}}{{$item->offer_price}} <del>{{$settings->currency_icon}}{{$item->price}}</del>
                                                    @else
                                                        {{$settings->currency_icon}}{{$item->price}}
                                                    @endif
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            
                            </div>
                        </div>
            @endforeach

        </div>
    </div>
</section>