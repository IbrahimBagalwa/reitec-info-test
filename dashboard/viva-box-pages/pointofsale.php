<div class="container-fluid p-3">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            <div class="card card-outline card-default col-lg-8">
                <div class="card-header">
                    <h3 class="card-title">
                        Add new product in stock
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">   
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="reload" data-toggle="tooltip" title="reload">
                            <i class="fa fa-cogs"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pad">
                    <form action="#" method="post" id="scanner-form">
                        <div class="form-group">
                            <label for="input-scaner"><span class="text-danger">*</span>  Value of scanner <br> 
                                <small class="ml-3">Just scann the product it will be automaticaly sent</small>
                            </label>
                            <input type="text" class="form-control" id="input-scaner" name="scannedResult" autofocus>
                            <button class="btn btn-default w-100 my-2 border-0 d-none btn-loader" type="button">
                                <span class="spinner-grow spinner-grow-sm"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Recently added product
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">   
                            <i class="fa fa-logout"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body pad">
                    <table class="table">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
