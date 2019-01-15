<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/pages/visiter.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="page-header">Quản lý khách tham quan</h2>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom posr">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#listVisiter" data-toggle="tab">Danh sách khách tham quan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="listVisiter">
                        <a class="text-green cursor-pointer posa" id="exportVisiter">
                            <i class="fa fa-file-excel"></i>
                        </a>
                        <a class="text-green cursor-pointer posa" id="addVisiter">
                            <i class="fa fa-plus-square"></i>
                        </a>
                        <div class="alert alert-danger alert-dismissible" id="error_msg" style="display:none"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible no-display" id="alert_visiter_msg">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Thêm khách tham quan thành công.
                                </div>
                                <div class="alert alert-success alert-dismissible no-display" id="alert_visiter_msg_edit">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Cập nhật khách tham quan thành công.
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <?php echo $__env->make('theme.backend.section.vister.table_vister', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.vister.modal_add_vister', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.vister.modal_edit_vister', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.vister.table_note', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('theme.backend.section.vister.modal_reply_vister', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <script src="<?php echo e(asset('assets/backend/js/pages/visiter.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.layout.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>