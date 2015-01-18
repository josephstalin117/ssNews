<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/jquery.mobile.min.css" type="text/css">
        <script src="public/js/jquery/jquery.min.js" type="text/javascript">
        </script>
        <script src="public/js/jquery/jquery.mobile.min.js" type="text/javascript">
        </script>
        <script src="./js/main.js" type="text/javascript">
        </script>
        <title></title>
    </head>
    <body>
        <!-- main page -->
        <div data-role="page" id="mainList">
            <div data-role="panel" id="searchPanel"> 
                <h2>搜索</h2>
                <input type="text" id="searchContent" placeholder="搜索新闻..."/>
                <a href="#searchListPage" id="search" class="ui-btn">搜索</a>
            </div> 
            <div data-role="header">
                <a href="#searchPanel" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">搜索</a>
                <h1>
                聚合阅读
                </h1>
            </div>
            <div data-role="content" id="content">
                <ol data-role="listview" id="list"></ol><a href="#" class="ui-btn ui-btn-b" id="nextPage">加载更多</a>
            </div>
        </div>
        <!-- search result list -->
        <div data-role="page" id="searchListPage">
            <div data-role="header">
                <a href="#mainList" data-transition="slide" data-direction="reverse" class="ui-btn ui-corner-all ui-shadow ui-icon-arrow-l ui-btn-icon-left">返回</a>
                <h1>
                搜索结果
                </h1>
            </div>
            <div data-role="content" id="content2">
                <ol data-role="listview" id="searchList"></ol>
                <p>已无结果</p>
            </div>
        </div>
    </body>
</html>