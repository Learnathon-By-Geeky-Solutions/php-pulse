@php
    // Ensure sliderSectionTwo is properly decoded and set
    $sliderSectionTwo = isset($sliderSectionTwo) ? json_decode($sliderSectionTwo->value) : null;
@endphp

<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.product-slider-section-two')}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_one" class="form-control main-category">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option 
                                        @if($sliderSectionTwo && $category->id == $sliderSectionTwo->category) 
                                            selected 
                                        @endif 
                                        value="{{$category->id}}">{{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                // Check if sliderSectionTwo exists before fetching subcategories
                                $subCategories = $sliderSectionTwo && isset($sliderSectionTwo->category) 
                                    ? \App\Models\SubCategory::where('category_id', $sliderSectionTwo->category)->get() 
                                    : [];
                            @endphp

                            <label>Sub Category</label>
                            <select name="sub_cat_one" class="form-control sub-category">
                                <option value="">select</option>
                                @foreach ($subCategories as $subCategory)
                                    <option 
                                        @if($sliderSectionTwo && $subCategory->id == $sliderSectionTwo->sub_category) 
                                            selected 
                                        @endif 
                                        value="{{$subCategory->id}}">{{ $subCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                // Check if sliderSectionTwo exists before fetching child categories
                                $childCategories = $sliderSectionTwo && isset($sliderSectionTwo->sub_category)
                                    ? \App\Models\ChildCategory::where('sub_category_id', $sliderSectionTwo->sub_category)->get()
                                    : [];
                            @endphp
                            <label>Child Category</label>
                            <select name="child_cat_one" class="form-control child-category">
                                <option value="">select</option>
                                @foreach ($childCategories as $childCategory)
                                    <option 
                                        @if($sliderSectionTwo && $childCategory->id == $sliderSectionTwo->child_category) 
                                            selected 
                                        @endif 
                                        value="{{$childCategory->id}}">{{ $childCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
