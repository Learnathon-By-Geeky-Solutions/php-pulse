<div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel"
     aria-labelledby="v-pills-razorpay-tab">
    <div class="row">
        <div class="col-xl-12 m-auto">
            <div class="wsus__payment_area">
                @php
                    $razorpaySetting = \App\Models\RazorpaySetting::first();
                    $total = getFinalPayableAmount();
                    $payableAmount = round($total * ($razorpaySetting->currency_rate ?? 1), 2);
                @endphp

                @if($razorpaySetting && $razorpaySetting->razorpay_key)
                <form action="{{ route('user.razorpay.payment') }}" method="POST" id="razorpay-form">
                    @csrf
                    <button id="razorpay-button" type="button" class="nav-link common_btn">Pay With Razorpay</button>
                </form>
                @else
                    <p class="text-danger">Razorpay is not properly configured.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const razorpayBtn = document.getElementById("razorpay-button");

        if (razorpayBtn) {
            razorpayBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const options = {
                    key: "{{ $razorpaySetting->razorpay_key }}",
                    amount: "{{ $payableAmount * 100 }}", // in paise
                    currency: "INR",
                    name: "payment",
                    description: "Payment for product",
                    handler: function (response) {
                        // Create a hidden input to send Razorpay payment_id
                        const form = document.getElementById('razorpay-form');
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'razorpay_payment_id';
                        input.value = response.razorpay_payment_id;
                        form.appendChild(input);
                        form.submit();
                    },
                    prefill: {
                        name: "{{ Auth::user()->name }}",
                        email: "{{ Auth::user()->email }}"
                    },
                    theme: {
                        color: "#ff7529"
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            });
        }
    });
</script>
@endpush
