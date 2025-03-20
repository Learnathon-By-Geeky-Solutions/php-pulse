@php
    $lastKey = [];

    if (is_array($categoryProductSliderSectionOne)) {
        foreach($categoryProductSliderSectionOne as $key => $category) {
            if ($category === null) {
                break;
            }
            $lastKey = [$key => $category];
        }
    }


    // $products = collect(); // Default empty collection
    // $category = null;

    if (array_keys($lastKey)[0] === 'category') {
        $category = \App\Models\Category::find($lastKey['category']);
        $products = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
    } elseif (array_keys($lastKey)[0] === 'sub_category') {
        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
        $products = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
    } else {
        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
        $products = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
    }

    // // যদি $category null না হয় তাহলে query চালানো হবে
    // if ($category) {
    //     $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
    //         ->with(['variants', 'category', 'productImageGalleries'])
    //         ->when(array_keys($lastKey)[0] === 'category', function ($query) use ($category) {
    //             return $query->where('category_id', $category->id);
    //         })
    //         ->when(array_keys($lastKey)[0] === 'sub_category', function ($query) use ($category) {
    //             return $query->where('sub_category_id', $category->id);
    //         })
    //         ->when(array_keys($lastKey)[0] === 'child_category', function ($query) use ($category) {
    //             return $query->where('child_category_id', $category->id);
    //         })
    //         ->orderBy('id', 'DESC')->take(12)->get();
    // }
@endphp



<section id="wsus__electronic2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{optional($category)->name}}</h3>
                    <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($products as $product)
                <div class="col-xl-3 col-sm-6 col-lg-4 {{ @$key }}">
                    <div class="wsus__product_item">
                        <span class="wsus__new">{{productType($product->product_type)}}</span>
                        @if(checkDiscount($product))
                            <span class="wsus__minus">-{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                        @endif
                        <a class="wsus__pro_link" href="{{route('product-detail', $product->slug)}}">
                            <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="
                            @if(isset($product->productImageGalleries[0]->image))
                                {{asset($product->productImageGalleries[0]->image)}}
                            @else
                                {{asset($product->thumb_image)}}
                            @endif
                            " alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="show_product_modal" data-id="{{ $product->id }}"><i class="far fa-eye"></i></a></li>
                            <li><a href="" class="add_to_wishlist" data-id="{{$product->id}}"><i class="far fa-heart"></i></a></li>
                            {{-- <li><a href="#"><i class="far fa-random"></i></a> --}}
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">
                                {{ $product->category?->name ?? 'No Category' }}
                            </a>
                
                            <p class="wsus__pro_rating">
                
                
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $product->reviews_avg_rating)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                @endfor
                
                                <span>({{$product->reviews_count}} review)</span>
                            </p>
                            <a class="wsus__pro_name" href="{{route('product-detail', $product->slug)}}"></a>
                            @if(checkDiscount($product))
                                <p class="wsus__price">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></p>
                            @else
                                <p class="wsus__price">{{$settings->currency_icon}}{{$product->price}}</p>
                            @endif
                            <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                @foreach ($product->variants as $variant)
                                @if ($variant->status != 0)
                                    <select class="d-none" name="variants_items[]">
                                        @foreach ($variant->productVariantItems as $variantItem)
                                            @if ($variantItem->status != 0)
                                                <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                                @endforeach
                                <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                <button class="add_cart" type="submit">add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
