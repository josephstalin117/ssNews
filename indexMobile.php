<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/jquery.mobile.min.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/jquery/jquery.mobile.min.js"></script>
        <script>
        var pageIndex=1;
        $(document).ready(function () {
            loadData(pageIndex);
            $('#nextPage').click(function(){
                pageIndex++;
                loadData(pageIndex);
            });
            //reload the page
            $('#recycle').click(function(){
                location.reload();
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
                    listData(g_jsonstr);
                    var key=1;
                },
                error:function(){
                    console.log("fail");
                }
            });
        }
        function listData(g_jsonstr){
            for(var k in g_jsonstr) {
                $('#list').append('<li><a href="./showMobile.php?id='+g_jsonstr[k]['id']+'" class="ui-btn ui-btn-icon-right ui-icon-carat-r"'+'">'+g_jsonstr[k]['title']+'</a></li>');
            }
        }
        </script>
    </head>
    <body>
        <div data-role="page" id="pageone">
            <div data-role="header">
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-recycle ui-btn-icon-left" id="recycle">刷新</a>
                <h1>聚合阅读</h1>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>
            </div>
            <div data-role="content" id="content">
                <ol data-role="listview" id="list">
                </ol>
                <a href="#" class="ui-btn ui-btn-b" id="nextPage">加载更多</a>
            </div>
        </div>
    </body>
</html>