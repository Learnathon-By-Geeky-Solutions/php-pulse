<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.paypal-setting.update', 1) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Paypal Status</label>
                    <select name="status" class="form-control">
                        <option {{ isset($paypalSetting) && $paypalSetting->status === 1 ? 'selected' : '' }} value="1">Enable</option>
                        <option {{ isset($paypalSetting) && $paypalSetting->status === 0 ? 'selected' : '' }} value="0">Disable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Account Mode</label>
                    <select name="mode" class="form-control">
                        <option {{ isset($paypalSetting) && $paypalSetting->mode === 0 ? 'selected' : '' }} value="0">Sandbox</option>
                        <option {{ isset($paypalSetting) && $paypalSetting->mode === 1 ? 'selected' : '' }} value="1">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Country Name</label>
                    <select name="country_name" class="form-control select2">
                        <option value="">Select</option>
                        @foreach (config('settings.country_list') as $country)
                            <option {{ isset($paypalSetting) && $paypalSetting->country_name === $country ? 'selected' : '' }} value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency Name</label>
                    <select name="currency_name" class="form-control select2">
                        <option value="">Select</option>
                      
                        @foreach (config('settings.currecy_list') as $key => $currency)
                        <option {{$currency === $paypalSetting->currency_name ? 'selected' : ''}} value="{{$currency}}">{{$key}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Currency rate (Per {{ $settings->currency_name }})</label>
                    <input type="text" class="form-control" name="currency_rate" value="{{ isset($paypalSetting) ? $paypalSetting->currency_rate : '' }}">
                </div>

                <div class="form-group">
                    <label>Paypal Client Id</label>
                    <input type="text" class="form-control" name="client_id" value="{{ isset($paypalSetting) ? $paypalSetting->client_id : '' }}">
                </div>

                <div class="form-group">
                    <label>Paypal Secret Key</label>
                    <input type="text" class="form-control" name="secret_key" value="{{ isset($paypalSetting) ? $paypalSetting->secret_key : '' }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
