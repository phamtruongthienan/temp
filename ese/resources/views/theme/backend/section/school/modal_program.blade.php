<!-- Add modal program -->
<div class="modal fade" id="modal-program-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Thêm chương trình học mới
                </h4>
            </div>
            <div class="modal-body">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_vn_edit" data-toggle="tab">Tiếng việt</a></li>
                        <li><a href="#tab_en_edit" data-toggle="tab">Tiếng anh</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_vn_edit">
                            <form class="form-horizontal" id="addProgramForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="inputAddName"
                                           class="col-sm-3 control-label">Tên giáo trình</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="inputAddName" value=""
                                               required data-required-error="Tên giáo trình không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddTime"
                                           class="col-sm-3 control-label">Thời gian</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-4 no-padding-left">
                                            <input type="text" class="form-control" name="inputAddTime" value=""
                                                   required data-required-error="Thời gian không được trống.">
                                        </div>
                                        <div class="col-sm-4">
                                            <select class="form-control select2 select-timeunit-add" id="add_time_unit"
                                                    name="add_time_unit[]"
                                                    style="width: 100%;">
                                                <option>Tiếng</option>
                                                <option>Buổi</option>
                                                <option>Ngày</option>
                                                <option>Tuần</option>
                                                <option>Tháng</option>
                                                <option>Năm</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 no-padding-right posr">
                                            <span class="posa icon-slat">/</span>
                                            <select class="form-control select2 select-timeunit-add" id="add_time_unit"
                                                    name="add_time_unit[]"
                                                    style="width: 100%;">
                                                <option>Tiếng</option>
                                                <option>Buổi</option>
                                                <option>Ngày</option>
                                                <option>Tuần</option>
                                                <option>Tháng</option>
                                                <option>Năm</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddIntro"
                                           class="col-sm-3 control-label">Giới thiệu</label>
                                    <div class="col-sm-9">
                                                            <textarea class="textarea form-control" name="inputAddIntro" placeholder="" style="width: 100%;" rows="15"
                                                                      required data-required-error="Giới thiệu không được trống."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="addProgramBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add modal program  -->