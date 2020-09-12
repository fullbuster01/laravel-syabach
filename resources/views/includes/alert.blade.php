@if (session()->has('succes'))
        <div class="container p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('succes') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>
            </div>
        </div>
@endif