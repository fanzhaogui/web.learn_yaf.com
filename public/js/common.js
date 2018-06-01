$(function () {

    // 删除数据按钮
    $(".btn-delete").click(function () {
        var url = $(this).attr("data-href");
        var msg = $(this).attr("data-msg");
        var successMsg = $(this).attr("data-successMsg");

        msg = msg ? msg : "您确定要删除该选项吗";
        if (confirm(msg)) {
            deleteRecord(url, successMsg);
        }

        return false;
    });

    // 提交数据按钮
    $("#btn-submit").click(function () {
        var url = $(this).data("href");
        var msg = $(this).data("msg");
        var successMsg = $(this).data("successMsg");
        var data = $(this).parents("form").first().serialize();
        msg = msg ? msg : "您确定要删除该选项吗";
        if (confirm(msg)) {
            deleteRecord(url, successMsg, data);
        }
        return false;
    });
});


// 删除记录
function deleteRecord(url, msg, data) {
    $.post(url, data, function (responseString) {
    	// console.log(responseString)
    	// console.log(typeof responseString)
    	// return ;
        try {
            var response = $.parseJSON(responseString);
        } catch (e) {
            alert("返回数据解析出错");
            return;
        }
        if (response.status === '0000') { // 成功
            if (msg) {
                alert(msg);
            }
            // window.location.reload();
            alert(response.msg);
        } else { // 失败
            alert(response.msg);
        }

    }, 'text');
}
