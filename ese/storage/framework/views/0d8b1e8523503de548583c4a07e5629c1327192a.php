<!-- Edit modal child -->
<div class="modal fade" id="modal-child-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật học sinh
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="editChildForm" role="form" data-toggle="validator">
                    <div class="form-group">
                        <label for="inputChildName"
                               class="col-sm-3 control-label">Họ tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputChildName" value=""
                                   required data-required-error="Họ tên không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputChildSex"
                               class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-9 padding-top-7">
                            <label>
                                <input type="radio" name="sex" class="minimal" checked>
                                Nam
                            </label>
                            <label class="margin-left-10">
                                <input type="radio" name="sex" class="minimal">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputChildOld"
                               class="col-sm-3 control-label">Tuổi</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="inputChildOld" value=""
                                   required data-required-error="Tuổi không được trống."
                                   data-type-error="Tuổi phải là định dạng số.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputChildStatus"
                               class="col-sm-3 control-label">Tình trạng</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="inputChildStatus" value=""
                                   required data-required-error="Tình trạng không được trống.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEditDesire"
                               class="col-sm-3 control-label">Mong muốn</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="inputEditDesire" id="inputEditDesire" cols="70" rows="6"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left"
                        data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" id="editChildBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal child -->