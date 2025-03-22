<div class="tab-pane fade show active" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
<div class="card border">
    <div class="card-body">
        <form action="{{route('admin.generale-setting-update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Site Name</label>
                <input type="text" class="form-control" name="site_name" value="">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
