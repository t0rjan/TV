$(function ($) {
    var grid_selector = "#channel-grid-table";
    var pager_selector = "#channel-grid-pager";
    var token = $('#channel_token').val();


    //resize to fit page size
    $(window).on('resize.jqGrid', function () {
        $(grid_selector).jqGrid('setGridWidth', $(".page-content").width());
    })
    //resize on sidebar collapse/expand
    var parent_column = $(grid_selector).closest('[class*="col-"]');
    $(document).on('settings.ace.jqGrid', function (ev, event_name, collapsed) {
        if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
            //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
            setTimeout(function () {
                $(grid_selector).jqGrid('setGridWidth', parent_column.width());
            }, 0);
        }
    })



    //grid参数控制
    $(grid_selector).jqGrid({
        url: "/anonymous/channel/index",
        mtype: "POST",
        json: "json",
        postData: {'_token': token},
        //direction: "rtl",
        //关闭单行的+号
        subGrid: false,
        datatype: "json",
        subGridOptions: {
            plusicon: "ace-icon fa fa-plus center bigger-110 blue",
            minusicon: "ace-icon fa fa-minus center bigger-110 blue",
            openicon: "ace-icon fa fa-chevron-right center orange"
        },
        jsonReader: {
            root: "data",
            //当前页
            page: "current_page",
            //总页
            total: "last_page",
            //数据总数
            records: "total"
        },
        height: 550,
        colNames: [' ', 'ID', '频道名称', '创建用户', '创建时间', '更新时间', '状态'],
        colModel: [
            {
                name: '', index: '', width: 80, fixed: true, sortable: false, resize: false,
                formatter: 'actions',
                formatoptions: {
                    keys: true,
                    extraparam:{
                        '_token': token
                    },
                    //delbutton: false,//disable delete button
                    delOptions: {recreateForm: true, beforeShowForm: beforeDeleteCallback},
                    //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
                },
                editable: false,
                search: false,
            },
            {
                name: 'id',
                index: 'id',
                width: 150,

                //排序和编辑
                sortable: true,
                editable: false,
                sortname: 'id',
                sorttype: 'integer',


                //搜索
                stype: 'text',
                searchrules: {
                    required: true,
                    number: true,
                },
                searchoptions: {
                    sopt: ['eq']
                }

            },
            {
                name: 'channel_name',
                index: 'channel_name',
                width: 60,

                //排序和编辑
                sortable: false,
                editable: true,
                editrules: {
                    required: true,
                    maxlength: 20,
                    minlength: 2
                },

                //搜索
                stype: 'text',
                searchrules: {
                    required: true
                },
                searchoptions: {
                    sopt: ['eq'],
                }
            },
            {
                name: 'create_user',
                index: 'create_user',
                width: 90,

                //排序和编辑
                sortable: false,
                editable: false,
                //搜索
                search: false,
            },
            {
                name: 'created_at',
                index: 'created_at',
                width: 150,

                //排序和编辑
                sortname: 'created_at',
                sortable: true,
                editable: false,
                sorttype: 'date',
                unformat: pickDate,
                //搜索
                searchrules: {
                    required: true,
                    date: true,
                },
                searchoptions: {
                    dataInit: function (element) {
                        datepcker_search_text(element);
                    },
                    //等于,小于,大于
                    sopt: ['eq', 'lt', 'gt']
                }
            },
            {
                name: 'updated_at',
                index: 'updated_at',
                width: 70,
                //排序和编辑
                sortname: 'updated_at',
                sortable: true,
                editable: false,
                sorttype: "date",
                unformat: pickDate,
                //搜索
                search: false,
            },
            {
                name: 'is_status',
                index: 'is_status',
                width: 90,

                formatter: status_format,

                //排序和编辑
                sortable: false,
                sorttype: 'date',
                editable: true,
                edittype: 'select',
                editoptions: {value: {0: '禁用', 1: '启用'}, defaultValue: 1},
                editrules: {
                    required: true,
                    maxValue: 1
                },

                //搜索
                stype: 'select',
                searchrules: {
                    required: true,
                    maxValue: 1
                },
                searchoptions: {
                    sopt: ['eq'],
                    value: {0: '禁用', 1: '启用'},
                    dataInit: function (element) {
                        $(element).val(1);
                    }
                }
            },
        ],
        sortname: "id",
        loadtext: "加载中,骚年稍等哦,不行也可先去撸一把...",
        sortorder: "desc",
        viewrecords: true,
        rowNum: 10,
        rowList: [10, 20, 30],
        pager: pager_selector,
        altRows: true,
        gridview: true,
        autoencode: true,
        loadComplete: function () {
            var table = this;
            setTimeout(function () {
                styleCheckbox(table);
                updateActionIcons(table);
                updatePagerIcons(table);
                enableTooltips(table);
            }, 0);
        },
        editurl: "/anonymous/channel/oper",//nothing is saved
        multiselect: true,
        caption: "频道列表",
        autowidth: true


    });


    $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

    //switch element when editing inline
    function aceSwitch(cellvalue, options, cell) {
        setTimeout(function () {
            $(cell).find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
        }, 0);
    }

    //enable datepicker
    function pickDate(cellvalue, options, cell) {
        setTimeout(function () {
            $(cell).find('input[type=text]')
                .datepicker({format: 'yyyy-mm-dd h:i:s', autoclose: true});
        }, 0);
    }

    //搜索界面中有的列需要时间搜索,那么就可以用上这个
    function datepcker_search_text(element) {
        $(element).datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            orientation: 'bottom',
            language: 'cn'
        });
        $(element).val(new Date().toLocaleDateString());
    }

    //自定义显示
    function status_format(cellvalue, options, rowObject) {
        if (cellvalue == 1) {
            return '启用';
        }
        if (cellvalue == 0) {
            return '禁用';
        }
        return '未知';

    }


    //navButtons
    $(grid_selector).jqGrid('navGrid', pager_selector,
        { 	//navbar options
            edit: true,
            editicon: 'ace-icon fa fa-pencil blue',
            add: true,
            addicon: 'ace-icon fa fa-plus-circle purple',
            del: true,
            delicon: 'ace-icon fa fa-trash-o red',
            search: true,
            searchicon: 'ace-icon fa fa-search orange',
            refresh: true,
            refreshicon: 'ace-icon fa fa-refresh green',
            view: true,
            viewicon: 'ace-icon fa fa-search-plus grey',
        },
        {
            //edit record form
            closeAfterEdit: true,
            //width: 700,
            recreateForm: true,
            editData: {'_token': token},
            beforeShowForm: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            afterSubmit: function (response) {
                window.alert(response.responseJSON.msg);
                return response;
            }
        },
        {
            //new record form
            //width: 700,
            closeAfterAdd: true,
            editData: {'_token': token},
            recreateForm: true,
            viewPagerButtons: false,
            beforeShowForm: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            },
            afterSubmit: function (response) {
                window.alert(response.responseJSON.msg);
                return response;
            }
        },
        {
            //delete record form
            recreateForm: true,
            delData: {'_token': token},
            beforeShowForm: function (e) {
                var form = $(e[0]);
                if (form.data('styled')) return false;

                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);

                form.data('styled', true);
            },
            onClick: function (e) {
                //alert(1);
            },
            afterSubmit: function (response) {
                window.alert(response.responseJSON.msg);
                return response;
            }
        },
        {
            //search form
            recreateForm: true,
            afterShowSearch: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function () {
                style_search_filters($(this));
            },
            multipleSearch: true,
        },
        {
            //view record form
            recreateForm: true,
            beforeShowForm: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            }
        }
    )




    function style_edit_form(form) {


        //enable datepicker on "sdate" field and switches for "stock" field
//                form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})

//                form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');

        //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
        //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
        buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')


        buttons = form.next().find('.navButton a');
        buttons.find('.ui-icon').hide();
        buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
        buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
        buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }

    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
    }

    function beforeDeleteCallback(e) {
        var form = $(e[0]);
        if (form.data('styled')) return false;

        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_delete_form(form);

        form.data('styled', true);
    }

    function beforeEditCallback(e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_edit_form(form);
    }

//it causes some flicker when reloading or navigating grid
//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
//or go back to default browser checkbox styles for the grid
    function styleCheckbox(table) {
        /**
         $(table).find('input:checkbox').addClass('ace')
         .wrap('<label />')
         .after('<span class="lbl align-top" />')


         $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
         .find('input.cbox[type=checkbox]').addClass('ace')
         .wrap('<label />').after('<span class="lbl align-top" />');
         */
    }

//unlike navButtons icons, action icons in rows seem to be hard-coded
//you can change them like this in here if you want
    function updateActionIcons(table) {
        /**
         var replacement =
         {
             'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
             'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
             'ui-icon-disk' : 'ace-icon fa fa-check green',
             'ui-icon-cancel' : 'ace-icon fa fa-times red'
         };
         $(table).find('.ui-pg-div span.ui-icon').each(function(){
				var icon = $(this);
				var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
				if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
			})
         */
    }

//replace icons with FontAwesome icons like above
    function updatePagerIcons(table) {
        var replacement =
        {
            'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
            'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
            'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
            'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
        };
        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

            if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
        })
    }

    function enableTooltips(table) {
        $('.navtable .ui-pg-button').tooltip({container: 'body'});
        $(table).find('.ui-pg-div').tooltip({container: 'body'});
    }

//var selr = $(grid_selector).jqGrid('getGridParam','selrow');

    $(document).one('ajaxloadstart.page', function (e) {
        $(grid_selector).jqGrid('GridUnload');
        $('.ui-jqdialog').remove();
    });


})
;



