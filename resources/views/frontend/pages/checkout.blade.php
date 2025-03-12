@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Checkout
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
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <div class="d-flex">
                                <h5>Shipping Details </h5>
                            <a href="javascript:;" style="margin-left:auto;" class="common_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                new address</a>
                            </div>

                            <div class="row">
                                @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input shipping_address" data-id="{{$address->id}}" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Select Address
                                            </label>
                                        </div>
                                        <ul>
                                            <li><span>name :</span> {{$address->name}}</li>
                                            <li><span>Phone :</span> {{$address->phone}}</li>
                                            <li><span>email :</span> {{$address->email}}</li>
                                            <li><span>country :</span> {{$address->country}}</li>
                                            <li><span>district :</span> {{$address->district}}</li>
                                            <li><span>upazila :</span> {{$address->upazila}}</li>
                                            <li><span>zip code :</span> {{$address->zip}}</li>
                                            <li><span>address :</span> {{$address->address}}</li>
                                          </ul>
                                          
                                          <div class="wsus__address_btn">
                                           <!-- Edit Button -->
                                           <a href="javascript:;" class="common_btn edit-address" data-bs-toggle="modal" data-bs-target="#addressModal"
                                           data-id="{{$address->id}}"
                                           data-name="{{$address->name}}"
                                           data-phone="{{$address->phone}}"
                                           data-email="{{$address->email}}"
                                           data-country="{{$address->country}}"
                                           data-district="{{$address->district}}"
                                           data-upazila="{{$address->upazila}}"
                                           data-zip="{{$address->zip}}"
                                           data-address="{{$address->address}}">
                                            <i class="fal fa-edit"></i> Edit
                                        </a>
                                            <!-- Delete Button -->
                                            <a href="javascript:;" class="common_btn delete-item" data-id="{{$address->id}}">
                                                <i class="fal fa-trash-alt"></i> Delete
                                            </a>
                                        </div>
                                        
<div>
    
    
    </div> 
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Methods</p>
                            @foreach ($shippingMethods as $method)
                                @if ($method->type === 'min_cost' && getCartTotal() >= $method->min_cost)
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                        </label>
                                    </div>
                                @elseif ($method->type === 'flat_cost')
                                    <div class="form-check">
                                        <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios1"
                                            value="{{$method->id}}" data-id="{{$method->cost}}">
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{$method->name}}
                                            <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach

                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                                <p>shipping fee(+): <span id="shipping_fee">{{$settings->currency_icon}}0</span></p>
                                <p>coupon(-): <span>{{$settings->currency_icon}}{{getCartDiscount()}}</span></p>
                                <p><b>total:</b> <span><b id="total_amount" data-id="{{getMainCartTotal()}}">{{$settings->currency_icon}}{{getMainCartTotal()}}</b></span></p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">

                            </form>
                            <a href="" id="submitCheckoutForm" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>
<!-- Add/Edit Address Modal -->
<div class="wsus__popup_address">
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="wsus__check_form p-3">
                        <form id="addressForm" action="{{ route('user.checkout.address.create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Name *" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Phone *" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" placeholder="Email *" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="country">
                                            <option value="">Country*</option>
                                            @foreach (config('settings.country_list') as $key => $county)
                                                <option value="{{ $county }}">{{ $county }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <select class="select_2" name="district">
                                            <option value="">District/Region *</option>
                                            @foreach (config('settings.district_list') as $district)
                                                <option value="{{ $district }}">{{ $district }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Upazila / City *" name="upazila" value="{{ old('upazila') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Zip *" name="zip" value="{{ old('zip') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Address *" name="address" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__check_single_form">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{route('user.checkout.address.create')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{old('phone')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{old('email')}}">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option value="">Country*</option>
                                                @foreach (config('settings.country_list') as $key => $county)
                                                    <option {{$county === old('country') ? 'selected' : ''}} value="{{$county}}">{{$county}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <div class="wsus__topbar_select">
                                                <select class="select_2" name="district">
                                                    <option value="">District/Region *</option>
                                                    @foreach (config('settings.district_list') as $district)
                                                    <option {{$county === old('district') ? 'selected' : ''}} value="{{$district}}">{{$district}}</option>
                                                       @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Upazila / City *" name="upazila" value="{{old('upazila')}}">
                                           
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{old('zip')}}">
                                        </div>
                                    </div>
    
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[type="radio"]').prop('checked', false);
        $('#shipping_method_id').val("");
        $('#shipping_address_id').val("");

        $('.shipping_method').on('click', function(){
            let shippingFee = $(this).data('id');
            let currentTotalAmount = $('#total_amount').data('id')
            let totalAmount = currentTotalAmount + shippingFee;

            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("{{$settings->currency_icon}}"+shippingFee);

            $('#total_amount').text("{{$settings->currency_icon}}"+totalAmount)
        })

        $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
        })

        // submit checkout form
        $('#submitCheckoutForm').on('click', function(e){
            e.preventDefault();
            if($('#shipping_method_id').val() == ""){
                toastr.error('Shipping method is requred');
            }else if ($('#shipping_address_id').val() == ""){
                toastr.error('Shipping address is requred');
            }else if (!$('.agree_term').prop('checked')){
                toastr.error('You have to agree website terms and conditions');
            }else {
                $.ajax({
                    url: "{{route('user.checkout.form-submit')}}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    beforeSend: function(){
                        $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>')
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            $('#submitCheckoutForm').text('Place Order')
                            // redirect user to next page
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }



        });
         // Handle edit address button click
    $('body').on('click', '.edit-address', function(){
        let addressId = $(this).data('id');
        let name = $(this).data('name');
        let phone = $(this).data('phone');
        let email = $(this).data('email');
        let country = $(this).data('country');
        let district = $(this).data('district');
        let upazila = $(this).data('upazila');
        let zip = $(this).data('zip');
        let address = $(this).data('address');

        // Populate the modal fields with the existing address data
        $('#addressModal input[name="name"]').val(name);
        $('#addressModal input[name="phone"]').val(phone);
        $('#addressModal input[name="email"]').val(email);
        $('#addressModal select[name="country"]').val(country).trigger('change');
        $('#addressModal select[name="district"]').val(district).trigger('change');
        $('#addressModal input[name="upazila"]').val(upazila);
        $('#addressModal input[name="zip"]').val(zip);
        $('#addressModal input[name="address"]').val(address);

        // Change the form action to the update route
        $('#addressForm').attr('action', "{{ route('user.checkout.address.update', '') }}/" + addressId);
    });

    // Reset the form action when the modal is hidden
    $('#addressModal').on('hidden.bs.modal', function () {
        $('#addressForm').attr('action', "{{ route('user.checkout.address.create') }}");
        $('#addressForm')[0].reset(); // Reset the form fields
    });
         // Handle delete item click event
         $('body').on('click', '.delete-item', function(event){
            event.preventDefault();

            let addressId = $(this).data('id'); // Get address ID
            let deleteUrl = "{{ route('user.checkout.destroy', '') }}/" + addressId; // Construct the delete URL

            // Show confirmation popup
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        success: function(data){
                            if(data.status == 'success'){
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                );
                                location.reload(); // Reload the page after successful delete
                            } else {
                                Swal.fire(
                                    'Cant Delete',
                                    data.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }
                    });
                }
            });
        });
    });
</script>
@endpush