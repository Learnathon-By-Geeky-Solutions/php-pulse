@php
    $categoryProductSliderSectionOne = json_decode($categoryProductSliderSectionOne->value, true); // Ensure an associative array
    $lastKey = [];

    foreach ($categoryProductSliderSectionOne as $key => $category) {
        if ($category === null) {
            break;
        }
        $lastKey = [$key => $category]; // Overwrites with the last valid key-value pair
    }

    $products = collect(); // Initialize as an empty collection
    $category = null; // Initialize category to avoid errors

    if (!empty($lastKey)) {
        $keyName = array_keys($lastKey)[0]; // Safe access

        if ($keyName === 'category') {
            $category = \App\Models\Category::find($lastKey[$keyName]);
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('category_id', $category->id ?? null)->orderBy('id', 'DESC')->take(12)->get();
        } elseif ($keyName === 'sub_category') {
            $category = \App\Models\SubCategory::find($lastKey[$keyName]);
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('sub_category_id', $category->id ?? null)->orderBy('id', 'DESC')->take(12)->get();
        } elseif ($keyName === 'child_category') {
            $category = \App\Models\ChildCategory::find($lastKey[$keyName]);
            $products = \App\Models\Product::withAvg('reviews', 'rating')->withCount('reviews')
                ->with(['variants', 'category', 'productImageGalleries'])
                ->where('child_category_id', $category->id ?? null)->orderBy('id', 'DESC')->take(12)->get();
        }
    }
@endphp

@if ($category)
<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{ $category->name }}</h3>
                    <a class="see_btn" href="{{ route('products.index', ['category' => $category->slug]) }}">see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
@endif
