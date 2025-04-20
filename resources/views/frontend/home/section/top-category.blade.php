@php
    $popularCategories = isset($popularCategory) && $popularCategory ? json_decode($popularCategory->value, true) : [];
@endphp

<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                @if ($homepage_secion_banner_one->banner_one->status == 1)
                <div class="wsus__monthly_top_banner">
                    <a href="{{$homepage_secion_banner_one->banner_one->banner_url}}">
                        <img class="img-fluid" src="{{asset($homepage_secion_banner_one->banner_one->banner_image)}}" alt="">
                    </a>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">
                        @php $products = []; @endphp
                        @foreach ($popularCategories as $index => $categoryData)
                            @php
                                $category = null;
                                if (isset($categoryData['category'])) {
                                    $category = \App\Models\Category::find($categoryData['category']);
                                    $products[$index] = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                } elseif (isset($categoryData['sub_category'])) {
                                    $category = \App\Models\SubCategory::find($categoryData['sub_category']);
                                    $products[$index] = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                } elseif (isset($categoryData['child_category'])) {
                                    $category = \App\Models\ChildCategory::find($categoryData['child_category']);
                                    $products[$index] = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                }
                            @endphp
                            @if ($category)
                                <button class="{{ $loop->first ? 'auto_click active' : '' }}" data-filter=".category-{{$index}}">{{$category->name}}</button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    @foreach ($products as $key => $productList)
                        @foreach ($productList as $item)
                            <div class="col-xl-3 col-6 col-sm-6 col-md-4 col-lg-3 category-{{$key}}">
                                <a class="wsus__hot_deals__single" href="#">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="{{ asset($item->thumb_image) }}" alt="product" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5>{{ Str::limit($item->name, 20) }}</h5>
                                        <p class="wsus__rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->reviews_avg_rating)
                                                <i class="fas fa-star"></i>
                                                @else
                                                <i class="far fa-star"></i>
                                                @endif
                                            @endfor
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
