function xoa()
{
    if (confirm("Bạn có chắc chắn muốn xóa chuyên mục này?")) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function()
{
    var type = $("#type").val();

    if (type == 0) {
        $("#price").attr('disabled', 'disabled');
        $("#preview").attr('disabled', 'disabled');
    }
    $("#type").change(function(){
        var type = $("#type").val();

        if (type == 0) {
            $("#price").attr('disabled', 'disabled');
            $("#preview").attr('disabled', 'disabled');
        } else {
            $('#price').removeAttr('disabled');
            $('#preview').removeAttr('disabled');
        }
    })
})
