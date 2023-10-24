@if ($message = Session::get('message'))
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    </div>
@endif

