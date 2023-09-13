@if ($message = Session::get('success'))
    <div class="container-xl mt-4 py-3">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="container-xl mt-4 py-3">
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    </div>
@endif
