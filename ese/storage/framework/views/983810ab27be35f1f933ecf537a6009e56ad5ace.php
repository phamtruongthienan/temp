<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/pages/localization.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="page-header">Quản lý từ vựng</h2>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom posr">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#listLocalization" data-toggle="tab">Danh sách từ vựng</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="listLocalization">
                        <a class="text-green cursor-pointer posa" id="addLocalization">
                            <i class="fa fa-plus-square"></i>
                        </a>
                        <div class="alert alert-danger alert-dismissible" id="error_msg" style="display:none"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Thêm từ vựng thành công.
                                </div>
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg_edit">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Cập nhật từ vựng thành công.
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4 no-padding-left">
                                    <select class="form-control select2" style="width: 100%;" id="inputAddPosition">
                                        <option selected>Tiếng việt</option>
                                        <option>Tiếng anh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('theme.backend.section.localization.table_localization', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.localization.modal_add_localization', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.localization.modal_edit_localization', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <script src="<?php echo e(asset('assets/backend/js/pages/localization.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>