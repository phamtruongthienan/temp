@extends('theme.layout.backend.main')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/pages/level.min.css')}}">
@endsection

@section('content')
    @include('theme.layout.backend.language')
    <h2 class="page-header">Quản lý cấp trường</h2>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom posr">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#listLevel" data-toggle="tab">Danh sách cấp trường</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="listLevel">
                        <a class="text-green cursor-pointer posa" id="addLevel">
                            <i class="fa fa-plus-square"></i>
                        </a>
                        <div class="alert alert-danger alert-dismissible" id="error_msg" style="display:none"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Thêm cấp bậc trường thành công.
                                </div>
                                <div class="alert alert-success alert-dismissible no-display" id="alert_msg_edit">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i class="icon fa fa-check"></i> Cập nhật cấp bậc trường thành công.
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        @include('theme.backend.section.level_school.table_level_school')
                        @include('theme.backend.section.level_school.modal_level_school')
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @include('theme.layout.backend.modal_confirm_delete')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/pages/level.min.js')}}"></script>
@endsection