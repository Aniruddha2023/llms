@if (Session::has('global'))
    <div class="container" style="margin-top: 16px">
        <div class="row">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('global') }}
            </div>
        </div>
    </div>
@endif
