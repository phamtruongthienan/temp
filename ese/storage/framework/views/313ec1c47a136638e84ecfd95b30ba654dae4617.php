<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/pages/place.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="page-header">Quản lý địa điểm</h2>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom posr">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#listPlace" data-toggle="tab">Danh sách địa điểm</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="listPlace">
                        <a class="text-green cursor-pointer posa" id="addCity">
                            <i class="fa fa-plus-square"></i>
                        </a>
                        <div class="alert alert-danger alert-dismissible" id="error_msg" style="display:none"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Thêm tỉnh thành công.
                                </div>
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg_edit">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Cập nhật tỉnh thành công.
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <?php echo $__env->make('theme.backend.section.place.table_place', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_add_city', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_edit_city', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_add_district', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_edit_district', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_add_ward', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.place.modal_edit_ward', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php echo $__env->make('theme.layout.backend.modal_confirm_delete', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/pages/place.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>