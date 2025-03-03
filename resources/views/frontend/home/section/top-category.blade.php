@php
    $popularCategories = json_decode($popularCategory->value, true);

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
                        <H6>Everything</H6>
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
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
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
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>