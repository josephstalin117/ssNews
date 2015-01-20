$(document).ready(function () {
    var pageIndex=1;
    loadData(pageIndex);
    $('#nextPage').click(function(){
        pageIndex++;
        console.log(pageIndex);
        loadData(pageIndex);
    });
});

function loadData(page) {
    $.ajax({
        type: "POST",
        url: "loadData.php",
        data: "page=" + page,
        success: function (msg) {
            $('#wrapper').append(msg);
        },
        error:function(){
            console.log("fail");
        }
    });
}


