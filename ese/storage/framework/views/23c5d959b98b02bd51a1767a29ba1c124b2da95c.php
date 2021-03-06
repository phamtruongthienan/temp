<!-- Add modal ward -->
<div class="modal fade" id="modal-ward-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Thêm phường mới
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="addWardForm" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="inputAddDistrict"
                               class="col-sm-3 control-label">Quận/ Huyện</label>
                        <div class="col-sm-9">
                            <div class="col-sm-6 no-padding-left">
                                <select class="form-control select2" style="width: 100%;" id="inputAddDistrict">
                                    <option value="1">Tân Bình</option>
                                    <option value="2">Bình Thạnh</option>
                                    <option value="3">Cần Giờ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddName"
                               class="col-sm-3 control-label">Tên Phường</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputAddName" value=""
                                   required data-required-error="Tên phường không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="addWardBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add modal ward  -->