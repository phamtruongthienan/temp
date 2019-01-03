<!-- Edit modal employee -->
<div class="modal fade" id="modal-news-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fas fa-child"></i>
                    Cập nhật bài viết
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
                            <form class="form-horizontal" id="editNewsForm" role="form" data-toggle="validator">
                                <div class="form-group">
                                    <label for="inputEditName"
                                           class="col-sm-3 control-label">Tên bài viết</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="inputEditName" id="inputEditName" placeholder="Tên bài viết" value=""
                                               required data-required-error="Tên bài viết không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditSEO"
                                           class="col-sm-3 control-label">SEO url</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="inputEditSEO" id="inputEditSEO" placeholder="SEO url" value=""
                                               required data-required-error="SEO url không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputKeyWord" class="col-sm-3 control-label">Meta Key word</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputKeyWord" placeholder="Meta Key word"
                                               required data-required-error="Meta Key word không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription" class="col-sm-3 control-label">Meta description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputDescription" placeholder="Meta description"
                                               required data-required-error="Meta description không được trống.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditContent"
                                           class="col-sm-3 control-label">Nội dung</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control textarea" name="inputEditContent" id="inputEditContent" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ckbLayout"
                                           class="col-sm-3 control-label">Layout</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-6 no-padding-left">
                                            <select class="form-control select2" style="width: 100%;" id="inputEditLayout"
                                                    required data-required-error="Chọn layout không được trống.">
                                                <option>One Column</option>
                                                <option>Two Column</option>
                                                <option>Three Column</option>
                                            </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEditStatus"
                                           class="col-sm-3 control-label">Hiển thị trang chủ</label>
                                    <div class="col-sm-9 padding-top-7">
                                        <input type="checkbox" name="editStatus" class="minimal">
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
                <button type="button" class="btn btn-primary" id="editNewsBtn"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> ">
                    <i class="fas fa-plus"></i> Lưu</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit modal employee  -->