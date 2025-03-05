@php
<<<<<<< Updated upstream
    $popularCategories = json_decode($popularCategory->value, true);

=======
    if (isset($popularCategory) && $popularCategory) {
        $popularCategories = json_decode($popularCategory->value, true);
    } else {
        $popularCategories = [];
    }
>>>>>>> Stashed changes
@endphp

<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="wsus__monthly_top_banner">
                    <div class="wsus__monthly_top_banner_img">
                        <img src="images/month ly_top_img3.jpg" alt="img"class="img-fluid w-100">
                        <span></span>
                    </div>
                    <div class="wsus__monthly_top_banner_text">
                        <h4>Black Friday Sale</h4>
                        <h3>Up To <span>70% Off</span></h3>
                        <h6>Everything</h6>
                        <a class="shop_btn" href="#">shop now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">
<<<<<<< Updated upstream
                        <button class=" active" data-filter="*">All</button>

                        @php
                            $products = [];
                        @endphp
                        
                        @foreach ($popularCategories as $popularCategory)
                            @php 
                                $lastKey = [];
                                foreach ($popularCategory as $key => $category) {
                                    if ($category == null) {
                                        break;
                                    }
                                    $lastKey[] = [$key => $category];
                                }
        
                                // Ensure the array has the appropriate key before accessing it
                                if (array_key_exists('category', $lastKey[0])=='category') {
                                    $category = \App\Models\Category::find($lastKey[0]['category']);
                                    $products[] = \App\Models\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get(); 
                                } elseif (array_key_exists('sub_category', $lastKey[0])) {
                                    $category = \App\Models\SubCategory::find($lastKey[0]['sub_category']);
                                    $products[] = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->get();
                                } elseif (array_key_exists('child_category', $lastKey[0])) {
                                    $category = \App\Models\ChildCategory::find($lastKey[0]['child_category']);
                                    $products[] = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->get();
                                } else {
                                    // Handle case when none of the keys exist, if necessary
                                    $category = null;
                                }
                               
                            @endphp
                            @if ($category)
                                <button data-filter=".cloth">{{$category->name}}</button>
                            @endif
=======
                        
                        @php
                            $products= [];
                        @endphp
                        @foreach ($popularCategories as $key=>$popularCategory)
                           @php


                                $lastkey = [];
                                foreach($popularCategory as $key=> $category){
                                    if($category===null){
                                        break;
                                    }
                                    $lastkey = [$key=>$category];
                                }

                                if(array_keys($lastkey)[0]==='category'){
                                    $category = \App\Models\Category::find($lastkey['category']);
                                    $products[] = \App\Models\product::where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                }else if(array_keys($lastkey)[0]==='sub_category'){
                                    $category = \App\Models\SubCategory::find($lastkey['sub_category']);
                                    $products[] = \App\Models\product::where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                }else{
                                    $category = \App\Models\ChildCategory::find($lastkey['child_category']);
                                    $products[] = \App\Models\product::where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                                }
                                
                                
                                // $lastKey = array_key_last($popularCategory);
                                // $categoryId = $popularCategory[$lastKey];

                                // // Find the appropriate category model
                                // if ($lastKey === 'category') {
                                //     $category = \App\Models\Category::find($categoryId);
                                // } elseif ($lastKey === 'sub_category') {
                                //     $category = \App\Models\SubCategory::find($categoryId);
                                // } elseif ($lastKey === 'child_category') {
                                //     $category = \App\Models\ChildCategory::find($categoryId);
                                // } else {
                                //     $category = null;
                                // }

                               
                            @endphp 
                                <button class="{{ $loop->index === 0 ? 'auto_click active' : ''}}" data-filter=".category-{{$loop->index}}">{{$category->name}}</button>
>>>>>>> Stashed changes
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
<<<<<<< Updated upstream
                    @foreach ($products as $product)
                    <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3  elec cam wat">
                        <a class="wsus__hot_deals__single" href="#">
                            <div class="wsus__hot_deals__single_img">
                                <img src="images/pro8_8.jpg" alt="bag" class="img-fluid w-100">
                            </div>
                            <div class="wsus__hot_deals__single_text">
                                <h5>wemen's one pcs</h5>
                                <p class="wsus__rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                   </i> <i class="fas fa-star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </p>
                                <p class="wsus__tk">$120.20 <del>130.00</del></p>
                            </div>
                        </a>
                    </div>
=======
                    @foreach ($products as $key=>$product)
                        @foreach ($product as $item)
                        <div class="col-xl-3 col-6 col-sm-6 col-md-4 col-lg-3 category-{{$key}}">
                            <a class="wsus__hot_deals__single" href="#">
                                <div class="wsus__hot_deals__single_img">
                                    <img src="{{asset($item->thumb_image)}}" alt="bag" class="img-fluid w-100">
                                </div>
                                <div class="wsus__hot_deals__single_text">
                                    <h5>{!!limitText($item->name, )!!}</h5>
                                    <p class="wsus__rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </p>
                                    @if (checkDiscount($item))
                                            <p class="wsus__tk">{{$settings->currency_icon}}{{$item->offer_price}} <del>{{$settings->currency_icon}}{{$item->price}}</del></p>
                                        @else
                                            <p class="wsus__tk">{{$settings->currency_icon}}{{$item->price}}</p>
                                        @endif
                                </div>
                            </a>
                        </div>
                        @endforeach    
>>>>>>> Stashed changes
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
