<!-- Edit modal employee -->
<div class="modal fade" id="modal-school-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật trường trong danh sách tìm kiếm
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
                            <form class="form-horizontal" id="editTypePriorityForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="inputEditSchool"
                                           class="col-sm-2 control-label">Tên trường</label>
                                    <div class="col-sm-10">
                                        <select class="form-control single-select2" name="inputEditSchool"
                                                required data-required-error="Tên trường không được trống." style="width: 100%">
                                            <option></option>
                                            <option value="1">Nguyen Du High School</option>
                                            <option value="2">Trường Mầm non Bảo Ngọc</option>
                                            <option value="3">Trường Mầm non Ngôi Sao</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditSort"
                                           class="col-sm-2 control-label">Thứ tự</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="inputEditSort" value=""
                                               data-type-error="Thứ tự phải là định dạng số.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditActive"
                                           class="col-sm-2 control-label">Hiển thị</label>
                                    <div class="col-sm-10 padding-top-7">
                                        <input type="checkbox" name="editActive" class="minimal">
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
                <button type="button" class="btn btn-primary" id="editTypePriorityBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal employee  -->