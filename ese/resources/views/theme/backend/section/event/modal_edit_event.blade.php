<!-- Edit modal employee -->
<div class="modal fade" id="modal-event-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật sự kiện
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editEventForm" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="inputEditName"
                               class="col-sm-3 control-label">Tên chương trình</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputEditName" value=""
                                   required data-required-error="Tên chương trình không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditObject"
                               class="col-sm-3 control-label">Đối tượng</label>
                        <div class="col-sm-9">
                            <div class="col-sm-6 no-padding-left">
                                <select class="form-control select2" style="width: 100%" id="inputEditObject">
                                    <option></option>
                                    <option>Danh sách trường học</option>
                                    <option>Loại trường</option>
                                    <option>Loại trường</option>
                                    <option>Tất cả khách hàng</option>
                                    <option>Khách hàng được chọn</option>
                                </select>
                            </div>
                            <div class="col-sm-6 no-padding-right">
                                <select class="form-control select2" style="width: 100%" id="edit_listSchool"
                                        name="edit_listSchool[]"
                                        multiple="multiple" data-validate="true"
                                        required data-required-error="Danh sách trường không được trống.">
                                    <option>Trường A</option>
                                    <option>Trường B</option>
                                    <option>Trường C</option>
                                    <option>Trường D</option>
                                    <option>abc@gmail.com</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditTime"
                               class="col-sm-3 control-label">Thời gian</label>
                        <div class="col-sm-9 padding-top-7">
                            <div class="col-sm-6 no-padding-left">
                                <label>
                                    <input type="radio" name="time" class="minimal" checked>
                                    Vĩnh viễn
                                </label>
                            </div>
                            <div class="col-sm-6 no-padding-right">
                                <label>
                                    <input type="radio" name="time" class="minimal">
                                    Khoảng thời gian
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="inputEditTime">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditDiscount"
                               class="col-sm-3 control-label">Giảm giá</label>
                        <div class="col-sm-9 padding-top-7">
                            <label>
                                <input type="radio" name="discount" class="minimal" checked>
                                Giá trị phần trăm
                            </label>
                            <label class="margin-left-10">
                                <input type="radio" name="discount" class="minimal">
                                Giá trị cụ thể
                            </label>
                            <input type="number" class="form-control" name="inputEditDiscount" value=""
                                   required data-required-error="Giảm giá không được trống."
                                   data-type-error="Giảm giá phải là định dạng số.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditCode"
                               class="col-sm-3 control-label">Mã giảm giá</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputEditCode" value="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditContent"
                               class="col-sm-3 control-label">Nội dung</label>
                        <div class="col-sm-9">
                                                <textarea class="form-control textarea" name="inputEditContent" id="inputEditContent" rows="6"
                                                          data-required-error="Nội dung không được trống."
                                                ></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectEditPosition" class="col-sm-3 control-label">Vị trí</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="selectEditPosition" style="width: 100%;">
                                <option value="1">Đầu trang</option>
                                <option value="2">Cuối trang</option>
                                <option value="3">Sidebar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectEditSpecify" class="col-sm-3 control-label">Chỉ định trang</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" id="selectEditSpecify" style="width: 100%;">
                                <option value="1">Tất cả trang</option>
                                <option value="2">Chỉ trang chủ</option>
                                <option value="3">Chỉ trang chi tiết trường</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddShow"
                               class="col-sm-3 control-label">Hiển thị</label>
                        <div class="col-sm-9 padding-top-7">
                            <label>
                                <input type="checkbox" class="minimal">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="editEventBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal employee  -->