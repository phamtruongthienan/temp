<!-- Add modal customer -->
<div class="modal fade" id="modal-course-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Thêm khóa học mới
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
                            <form class="form-horizontal" id="addCourseForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="inputAddName"
                                           class="col-sm-2 control-label">Tên khóa học</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="inputAddName[]" id="tagCourse" multiple="multiple"
                                                required data-required-error="Tên khóa học không được trống." style="width: 100%">
                                            <option selected="selected">Kerry</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddName"
                                           class="col-sm-2 control-label">Tên lớp học</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="inputAddName[]" id="tagClass" multiple="multiple"
                                                required data-required-error="Tên lớp học không được trống." style="width: 100%">
                                            <option selected="selected">Kerry</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddOld"
                                           class="col-sm-2 control-label padding-top-7">Độ tuổi</label>
                                    <div class="col-sm-10 padding-top-7">
                                        <div class="col-sm-10 no-padding-left">
                                            <input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="12"
                                                   data-slider-step="1" data-slider-value="[6,10]" data-slider-orientation="horizontal"
                                                   data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                                        </div>
                                        <div class="col-sm-2 no-padding-right no-padding-left">/ tháng</div>
                                        <div class="col-sm-10 no-padding-left">
                                            <input type="text" value="" class="slider form-control" data-slider-min="1" data-slider-max="50"
                                                   data-slider-step="1" data-slider-value="[6,10]" data-slider-orientation="horizontal"
                                                   data-slider-selection="before" data-slider-tooltip="show" data-slider-id="blue">
                                        </div>
                                        <div class="col-sm-2 no-padding-right no-padding-left">/ tuổi</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddName"
                                           class="col-sm-2 control-label">Sỉ số</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="inputAddNumber" value=""
                                               required data-required-error="Sỉ số không được trống."
                                               data-type-error="Sỉ số phải là định dạng số.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddName"
                                           class="col-sm-2 control-label">Tỷ lệ giáo viên</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="inputAddNumberTeacher" value=""
                                               required data-required-error="Tỷ lệ giáo viên không được trống."
                                               data-type-error="Tỷ lệ giáo viên phải là định dạng số.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddDescribe"
                                           class="col-sm-2 control-label">Miêu tả</label>
                                    <div class="col-sm-10">
                                                            <textarea class="textarea form-control" name="inputAddDescribe" placeholder="" style="width: 100%;" rows="6"
                                                                      required data-required-error="Miêu tả không được trống."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddDateOpen"
                                           class="col-sm-2 control-label">Ngày mở</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="inputAddDateOpen" value=""
                                                   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddDateClose"
                                           class="col-sm-2 control-label">Ngày kết thúc</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="inputAddDateClose" value=""
                                                   data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddRoom"
                                           class="col-sm-2 control-label">Phòng</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2 select-room-add" id="add_room"
                                                name="add_room[]"
                                                style="width: 100%;">
                                            <option>Phòng vi tính 1</option>
                                            <option>Phòng vi tính 2</option>
                                            <option>Phòng anh văn 1</option>
                                            <option>Phòng anh văn 2</option>
                                        </select>
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
                <button type="button" class="btn btn-primary" id="addCourseBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add modal employee  -->