$(function() {

    $('a[data-target="#codeModal"]').click(function() {
        $('#txtCode').val($(this).parent().attr('data-code'));
    });

    $('#btnSubmit').click(function () {

        //var msg = '';

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
        window.location.href = '/console/code?cid=' + $(this).val();
    });

});