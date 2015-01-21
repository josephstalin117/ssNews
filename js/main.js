var pageIndex = 1;
$(document).ready(function () {
    loadData(pageIndex);
    $('#nextPage').click(function () {
        pageIndex++;
        loadData(pageIndex);
    });
    //search the title
    $('#searchButton').click(function () {
        console.log($('#searchContent').val());
        loadSearchData($('#searchContent').val());
    });
    //reflash the list
    $('#recycle').click(function(){
        location.reload(false);
    });
});
// load the data
function loadData(page) {
    $.ajax({
        type: "POST",
        url: "fatchData.php",
        data: "page=" + page,
        success: function (msg) {
            var g_jsonstr = JSON.parse(msg);
            for (var k in g_jsonstr) {
                $('#list').append('<li><a href="./showMobile.php?id=' + g_jsonstr[k]['id'] + '" class="ui-btn ui-btn-icon-right ui-icon-carat-r" rel="external"' + '">' + g_jsonstr[k]['title'] + '</a></li>');
            }
        },
        error: function () {
            console.log("load fail");
        }
    });
}

function loadSearchData(searchData) {
    $.ajax({
        type: "POST",
        url: "fatchData.php",
        data: "search=" + searchData,
        success: function (msg) {
            var g_jsonstr = JSON.parse(msg);
            for (var k in g_jsonstr) {
                $('#searchList').append('<li><a href="./showMobile.php?id=' + g_jsonstr[k]['id'] + '" class="ui-btn ui-btn-icon-right ui-icon-carat-r" rel="external"' + '">' + g_jsonstr[k]['title'] + '</a></li>');
            }
        },
        error: function () {
            console.log("search fail");
        }
    });
}