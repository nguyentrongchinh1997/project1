function notification()
{
    alert("Tài liệu này mất phí nên bạn cần nạp tiền vào tài khoản");
}

function login()
{
    if (confirm('Bạn cần đăng nhập để tải tài liệu này')) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function(){
    $('.search').keyup(function(){
        var keyWord = $('.search').val();
        if (keyWord != '') {
            $.get('search/' + keyWord, function(data){
                $('.result').html(data);
                $('.result').show();
            });
        } else {
            $('.result').hide();
        }
    })
})
