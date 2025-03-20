<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.email-setting-update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{optional($emailSettings)->email}}">
                </div>

                <div class="form-group">
                    <label>Mail Host</label>
                    <input type="text" class="form-control" name="host" value="{{optional($emailSettings)->host}}">
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Smtp username</label>
                            <input type="text" class="form-control" name="username" value="{{optional($emailSettings)->username}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Smtp password</label>
                            <input type="text" class="form-control" name="password" value="{{optional($emailSettings)->password}}">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail port</label>
                            <input type="text" class="form-control" name="port" value="{{optional($emailSettings)->port}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Encryption</label>
                            <select name="encryption" id="" class="form-control">
                                    <option {{optional($emailSettings)->encryption == 'tls' ? 'selected' : ''}} value="tls">TLS</option>
                                    <option {{optional($emailSettings)->encryption == 'ssl' ? 'selected' : ''}} value="ssl">SSL</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
