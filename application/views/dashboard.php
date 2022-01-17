<?php date_default_timezone_set('Asia/Jayapura'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<!-- Content Row -->
<div class="row">

    <!-- Total Barang -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format(count_table('barang'),0,'','.'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Customer -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Customer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format(count_table('customer'),0,'','.'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Invoice -->
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Invoice</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= number_format(count_table('invoice'),0,'','.'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-bottom-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?=base_url('/uploads/');?><?=_app('logo');?>" alt="Home" height="340">
                </div>
            </div>
        </div>
    </div>

</div>