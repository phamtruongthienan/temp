<!-- Add modal employee -->
<div class="modal fade" id="modal-employee-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-user-graduate"></i>
                    Thêm nhân viên mới
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="addEmployeeForm" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="inputAddUserName"
                               class="col-sm-3 control-label">Tên đăng nhập</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputAddUserName" value=""
                                   required
                                   data-minlength="6" data-error="Tên đăng nhập ít nhất 6 ký tự.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddPassWord"
                               class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="inputAddPassWord" id="inputAddPassWord" value=""
                                   required
                                   data-minlength="6" data-error="Mật khẩu ít nhất 6 ký tự.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddRePassWord"
                               class="col-sm-3 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="inputAddRePassWord" value=""
                                   required data-required-error="Mật khẩu ít nhất 6 ký tự."
                                   data-minlength="6" data-minlength-error="Mật khẩu ít nhất 6 ký tự."
                                   data-match="#inputAddPassWord" data-match-error="Nhập lại mật khẩu không đúng.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddName"
                               class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputAddName" value=""
                                   required data-required-error="Họ tên không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddBirthday"
                               class="col-sm-3 control-label">Ngày sinh</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" name="inputAddBirthday" value=""
                                       required data-required-error="Ngày sinh không được trống."
                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask data-inputmask-clearincomplete="true">
                            </div>
                            <!-- /.input group -->
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddPhone" class="col-sm-3 control-label">Điện thoại</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" class="form-control" id="inputAddPhone"
                                       required data-required-error="Điện thoại không được trống.">
                            </div>
                            <div class="help-block with-errors"></div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddEmail"
                               class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="inputAddEmail" value=""
                                   required data-required-error="Email không được trống."
                                   data-type-error="Email không đúng định dạng.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddPosition"
                               class="col-sm-3 control-label">Vị trí</label>
                        <div class="col-sm-9">
                            <select class="form-control select2" style="width: 100%;" id="inputAddPosition"
                                    required data-required-error="Vị trí không được trống.">
                                <option value="">Chọn vị trí</option>
                                <option value="1">Nhân viên</option>
                                <option value="2">Hiệu trưởng</option>
                                <option value="3">Giám thị</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="addEmployeeBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add modal employee  -->