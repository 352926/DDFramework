<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-20
 * Time: 下午5:42
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $website['title'];?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <link href="/public/css/mobile.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/public/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/public/mobile/jquery.mobile-1.2.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/mobile/jquery.mobile-1.2.0.min.css"/>
</head>
<body>
<div data-theme="a" data-role="header">
    <h3>
        这边也就这样子了
    </h3>
</div>

<?php $this->_include();?>

<div data-theme="a" data-role="footer" data-position="fixed">
    <h3>
        底部信息写什么好呢？
    </h3>
</div>
</body>
</html>