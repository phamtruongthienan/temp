<!-- Edit modal role -->
<div class="modal fade" id="modal-role-edit" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fas fa-user-shield"></i> Cập nhật quyền</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editRoleForm">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Add role -->
                            <div class="form-group">
                                <label for="inputEditName"
                                       class="col-sm-3 control-label">Tên</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEditName" name="inputEditName"
                                           tabindex="4" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!-- Add role -->
                            <!-- Add Description -->
                            <div class="form-group">
                                <label for="inputEditDescription"
                                       class="col-sm-3 control-label">Mô tả</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="edit_description"
                                           name="edit_description" tabindex="6"
                                           required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!-- Add Description -->
                            <!-- Add permission -->
                            <div class="form-group">
                                <label for="inputEditRole"
                                       class="col-sm-3 control-label">Quyền</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 select-permission-edit" id="edit_permission"
                                            name="edit_permission[]"
                                            multiple="multiple" style="width: 100%;" tabindex="6">
                                        <option value="1">Quản lý tìm kiếm | Xem</option>
                                        <option value="2">Quản lý tìm kiếm | Xóa</option>
                                        <option value="3">Quản lý tìm kiếm | Sửa</option>
                                        <option value="4">Quản lý địa điểm | Xem</option>
                                        <option value="5">Quản lý địa điểm | Xóa</option>
                                        <option value="6">Quản lý địa điểm | Sửa</option>
                                        <option value="7">Quản lý phân quyền | Xem</option>
                                        <option value="8">Quản lý phân quyền | Xóa</option>
                                        <option value="9">Quản lý phân quyền | Sửa</option>
                                        <option value="10">Quản lý nhân viên | Xem</option>
                                        <option value="11">Quản lý nhân viên | Xóa</option>
                                        <option value="12">Quản lý nhân viên | Sửa</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <!-- Add permission -->
                            <!-- Add permission -->
                            <div class="form-group">
                                <label for="chbEditRole" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <div class="col-sm-6 control-label">
                                        <a id="SelectAllBtnEdit"
                                           class="btn btn-block btn-primary">Chọn tât cả</a>
                                    </div>
                                    <div class="col-sm-6 control-label">
                                        <a id="UnselectAllBtnEdit"
                                           class="btn btn-block btn-primary">Bỏ chọn tất cả</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Add permission -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="editRoleBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal role  -->