$(function() {

    $('#divDownloads').delegate('a', 'click', function() {
        $('#divDownloads').prepend(item, {}, null);
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

});