<!-- Edit modal ward -->
<div class="modal fade" id="modal-ward-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật phường
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editWardForm" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="inputEditDistrict"
                               class="col-sm-3 control-label">Quận/ Huyện</label>
                        <div class="col-sm-9">
                            <div class="col-sm-6 no-padding-left">
                                <select class="form-control select2" style="width: 100%;" id="inputEditDistrict">
                                    <option>Tân Bình</option>
                                    <option>Bình Thạnh</option>
                                    <option>Cần Giờ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditName"
                               class="col-sm-3 control-label">Tên phường</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputEditName" value=""
                                   required data-required-error="Tên phường không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="editWardBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal ward  -->