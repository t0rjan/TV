<title>欢迎页</title>
{{--<input type="hidden" value="{{csrf_token()}}" id="wecome_token">--}}
{{--<link rel="stylesheet" href="/assets/css/jquery-ui.css"/>--}}
{{--<link rel="stylesheet" href="/assets/css/datepicker.css"/>--}}
{{--<link rel="stylesheet" href="/assets/css/ui.jqgrid.css"/>--}}

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        Home
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            欢迎页
        </small>
    </h1>
</div><!-- /.page-header -->

<script type="text/javascript">
    var scripts = []

    $('.page-content-area').ace_ajax('loadScripts', scripts, function () {
//        $.getScript('/js/admin/index/welcome.js', function () {
//        $.getScript('/js/admin/label/index.js', function () {

//        });
    });
</script>
