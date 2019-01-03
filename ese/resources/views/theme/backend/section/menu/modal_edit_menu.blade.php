<!-- Edit modal menu -->
<div class="modal fade" id="modal-menu-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật menu mới
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
                            <form class="form-horizontal" id="editMenuForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="inputEditName"
                                           class="col-sm-3 control-label">Tên menu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="inputEditName" value=""
                                               required data-required-error="Tên menu không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditPosition"
                                           class="col-sm-3 control-label">Vị trí</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-6 no-padding-left">
                                            <select class="form-control select2" style="width: 100%;" id="inputEditPosition">
                                                <option>Header Menu</option>
                                                <option>Sidebar Menu</option>
                                                <option>Footer Menu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ckbLink"
                                           class="col-sm-3 control-label">Link</label>
                                    <div class="col-sm-9 padding-top-7">
                                        <div>
                                            <input type="radio" name="editLink" class="minimal" id="inputEditLink">
                                        </div>
                                        <div id="ckbEditLink" class="margin-top-10">
                                            <input type="text" class="form-control" name="inputEditLink" id="inputEditLink" value=""
                                                   required data-required-error="Link không được trống.">
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ckbSelect"
                                           class="col-sm-3 control-label">Chọn bài viết</label>
                                    <div class="col-sm-9 padding-top-7">
                                        <div>
                                            <input type="radio" name="editLink" class="minimal" id="inputEditSelect">
                                        </div>
                                        <div id="ckbEditSelect" class="margin-top-10 col-sm-6 no-padding-left">
                                            <select class="form-control select2" style="width: 100%;" id="inputEditSelect"
                                                    required data-required-error="Chọn bài viết không được trống.">
                                                <option>FAQs</option>
                                                <option>Privacy & Terms</option>
                                                <option>About us</option>
                                            </select>
                                        </div>
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
                <button type="button" class="btn btn-primary" id="editMenuBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal menu  -->