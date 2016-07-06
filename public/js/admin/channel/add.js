jQuery(function ($) {
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
