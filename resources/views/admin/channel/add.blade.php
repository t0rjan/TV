<title>添加频道</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        频道管理
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            添加频道
        </small>
    </h1>
</div><!-- /.page-header -->


<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <form class="form-horizontal channel-add-form" role="form" method="post" action="/anonymous/channel/add">
            <!-- #section:elements.form -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="channel-add-name"> 频道名称 </label>

                <div class="col-sm-9">
                    <input type="text" name="channel_add_name" id="channel-add-name" placeholder="频道名称"
                           class="col-xs-10 col-sm-5"/>
                </div>
            </div>

            <!-- /section:elements.form -->
            <div class="space-4"></div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">

                    {{ csrf_field() }}
                    <button class="btn btn-info " type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        添加
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>

            <div class="hr hr-24"></div>
        </form>


        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->


<!-- page specific plugin scripts -->
<script type="text/javascript">
    var scripts = ['/lib/jquery/jquery.validate.min.js']
    $('.page-content-area').ace_ajax('loadScripts', scripts, function () {
        //inline scripts related to this page

        $(function ($) {
            $('.channel-add-form').validate({
                rules: {
                    channel_add_name: {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    channel_add_name: {
                        required: '频道名称必须填写!',
                        minlength: jQuery.validator.format("至少需要填写 {0} 个字符!")
                    }
                },
                submitHandler: function (form) {
                    $.post('/anonymous/channel/add', $(form).serializeArray(), function (result) {
                        if (result.code == 1) {

                        }
                        window.alert(result.msg);
                    });
                    //;
                }

            });

        });
    });

</script>
