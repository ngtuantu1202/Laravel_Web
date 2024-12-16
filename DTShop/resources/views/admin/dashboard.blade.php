@extends('layout_admin')
@section('admin_content')
    <h3>Chào mừng bạn đến với trang quản lý hệ thống</h3>

    <div class="agil-info-calendar">
        <!-- calendar -->
        <div class="col-md-6 agile-calendar">
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Lịch</span>
                </div>
                <!-- grids -->
                <div class="agile-calendar-grid">
                    <div class="page">

                        <div class="w3l-calendar-left">
                            <div class="calendar-heading">

                            </div>
                            <div class="monthly" id="mycalendar"></div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //calendar -->
    </div>
@endsection
