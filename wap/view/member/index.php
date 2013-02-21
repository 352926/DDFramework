<!DOCTYPE html>
<html>
<head>
    <title>aaa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <link href="" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/public/js/jquery.base64.min.js"></script>
    <script type="text/javascript" src="/public/js/md5-min.js"></script>
    <script type="text/javascript" src="/public/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/public/mobile/jquery.mobile-1.2.0.min.js"></script>
    <script type="text/javascript" src="/public/js/dd.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/mobile/jquery.mobile-1.2.0.min.css"/>
    <style>
        .footer {
            position: fixed;
            margin-top: 75px;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="body">
    <form id="loginForm">
        <ul data-role="listview">
            <li>
                欢迎进入财务系统手机版，请登录！
            </li>
            <li data-role="fieldcontain">
                <table border="0">
                    <tr>
                        <td><label for="username">用&nbsp;户&nbsp;名：</label></td>
                        <td><input type="text" name="username" id="username" value=""/></td>
                    </tr>
                </table>
            </li>
            <li data-role="fieldcontain">
                <table border="0">
                    <tr>
                        <td><label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label></td>
                        <td><input type="password" name="password" id="password" value=""/></td>
                    </tr>
                </table>
            </li>
            <li data-role="fieldcontain">
                <table border="0">
                    <tr>
                        <td><label for="autologin">自动登录：</label></td>
                        <td>
                            <select name="autologin" id="autologin" data-role="slider">
                                <option value="off">Off</option>
                                <option value="on">On</option>
                            </select>
                        </td>
                        <td>
                            <select name="logtime" id="logtime" data-mini="true">
                                <option value="day">一天</option>
                                <option value="week">一周</option>
                                <option value="month">一月</option>
                                <option value="year">一年</option>
                                <option value="all">永久登录</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </li>
            <li data-role="fieldcontain">
                <div data-role="controlgroup" data-type="horizontal" style="margin: 0 auto;width: 260px;">
                    <a name="login" data-role="button">登录</a>
                    <a href="javascript:void(0);" data-role="button">注册</a>
                    <a href="javascript:void(0);" data-role="button">忘记</a>
                </div>
            </li>
        </ul>
    </form>
</div>
<div class="footer" data-role="footer">
    <div data-role="navbar" data-iconpos="left">
        <ul>
            <li><a href="#" class="ui-btn-active">登录</a></li>
            <li><a href="javascript:alert('请登录！');">列表</a></li>
            <!--            <li><a href="about.php" data-role="button" data-rel="dialog" data-icon="home">作者</a></li>-->
            <li><a href="" onclick="if(!confirm('你确定要访问\nwww.huangdingding.cn\n吗？'))return false;" data-role="button" data-icon="home">作者博客</a>
            </li>
        </ul>
    </div>
    <!-- /navbar -->
</div>
</body>
</html>