<title>添加内容</title>

{{--<link rel="stylesheet" href="/assets/css/jquery-ui.custom.css" />--}}
<link rel="stylesheet" href="/lib/ue/themes/default/css/umeditor.min.css"/>


<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        内容管理
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            添加内容
        </small>
    </h1>
</div><!-- /.page-header -->


<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <form class="form-horizontal content-add-form" role="form" method="post" action="/anonymous/content/add">
            <!-- #section:elements.form -->
            <!--内容标题 -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="">内容标题</label>

                <div class="col-sm-9">
                    <input type="text" name="" id="" placeholder="内容标题" class="col-xs-10 col-sm-5"/>
                </div>
            </div>
            <div class="space-2"></div>

            <!--内容频道 -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 内容频道 </label>

                <div class="col-sm-9">
                    <select class="chosen-select col-xs-12 col-sm-5" id="" data-placeholder="Choose a State...">
                        <option value=""></option>
                        @foreach($channel as $v)
                            <option value="{{$v['id']}}">{{$v['channel_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="space-2"></div>

            <!--内容标签 -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 内容标签 </label>

                <div class="col-sm-9">
                    <select class="chosen-select col-xs-12 col-sm-5" id="" data-placeholder="Choose a State...">
                        <option value=""></option>
                        @foreach($label as $v)
                            <option value="{{$v['id']}}">{{$v['channel_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="space-2"></div>

            <!--内容 -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for=""> 内容 </label>

                <div class="col-sm-9">
                    <script type="text/plain" id="myEditor" style="width:1000px;height:240px;"><p>这里我可以写一些输入提示</p>
                    </script>
                </div>
            </div>
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

            <!-- /section:elements.form -->
        </form>


        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->


<!-- page specific plugin scripts -->
<script type="text/javascript">

    var scripts = ['/lib/jquery/jquery.validate.min.js', '/lib/ue/umeditor.config.js']

    $('.page-content-area').ace_ajax('loadScripts', scripts, function () {

        $.getScript('/lib/ue/umeditor.min.js', function () {

            $(function ($) {
                UM.getEditor('myEditor');


//            $('.content-add-form').validate({
//                rules: {
//                    channel_add_name: {
//                        required: true,
//                        minlength: 2
//                    }
//                },
//                messages: {
//                    channel_add_name: {
//                        required: '频道名称必须填写!',
//                        minlength: jQuery.validator.format("至少需要填写 {0} 个字符!")
//                    }
//                },
//                submitHandler: function (form) {
//                    $.post('/anonymous/channel/add', $(form).serializeArray(), function (result) {
//                        if (result.code == 1) {
//
//                        }
//                        window.alert(result.msg);
//                    });
//                    //;
//                }
//
//            });


        });
        });
    });

</script>
