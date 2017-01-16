$(function() {

    $('a[data-target="#codeModal"]').click(function() {
        $('#txtCode').val($(this).parents('tr').attr('data-code'));
    });

    $('a[data-target="#sendModal"]').click(function() {
        var tr = $(this).parents('tr');
        $('#txtSubject').val('关于您购买的【' + tr.attr('data-pname') + '】');
        $('#txtKeyword').val(domain + 'jetbrains/activation/' + tr.attr('data-keyword'));
        $('#txtBody').val('您好！<br>关于您购买的【'
            + tr.attr('data-pname')
            + '】，以下是您的发货信息！<br><br>请访问以下网址：'
            + $('#txtKeyword').val()
            + '<br>根据说明步骤激活。<br><br>请不要删除本邮件！以防系统重装后，找不到激活信息!<br>感谢您的惠顾，欢迎下次光临！<br>');
    });
    
    $('#btnSendEmail').click(function () {

        var msg = '';

        if($('#txtEmail').val().length < 1){
            msg = '请填写邮箱地址';
        }

        if(msg != ''){
            alert(msg);
            return;
        }

        var params = $('#frmSendModal').serialize();
        $.post('/console/log/send_email',
            params,
            function (data) {
                if(data.status == 'err'){
                    alert(data.msg);
                    return;
                }

                alert('操作成功!');
            }, 'json');
    });


    $('#btnSubmit').click(function () {
        var params = $('#frmCode').serialize();
        $.post('/console/code/save',
            params,
            function (data) {
                if(data.status == 'err'){
                    alert(data.msg);
                    return;
                }

                alert('操作成功!');
            }, 'json');
    });

    $('#product').change(function () {
        window.location.href = '/console/log?pid=' + $(this).val();
    });

});