<title>频道列表</title>
<input type="hidden" value="{{csrf_token()}}" id="channel_token">
<link rel="stylesheet" href="/assets/css/jquery-ui.css"/>
<link rel="stylesheet" href="/assets/css/datepicker.css"/>
<link rel="stylesheet" href="/assets/css/ui.jqgrid.css"/>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        频道管理
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            频道列表
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <table id="channel-grid-table"></table>
        <div id="channel-grid-pager"></div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->


<script type="text/javascript">
    var scripts = ['/assets/js/date-time/bootstrap-datepicker.js', '/assets/js/jqGrid/jquery.jqGrid.src.js', '/assets/js/jqGrid/i18n/grid.locale-cn.js'];

    $('.page-content-area').ace_ajax('loadScripts', scripts, function () {
        $.getScript('/js/admin/channel/index.js', function () {

        });
    });
</script>

