<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="shortcut icon" href=""/>

    <title><?php echo isset($title) ? $title : ''; ?></title>

    <?php
    echo \Asset::css([
        'http://cdn.bootcss.com/tether/1.3.7/css/tether.min.css',
        'http://cdn.bootcss.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css',
        'http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css'
    ]);
    ?>

    <style type="text/css">
        body{
            background-color: #efefef;
        }
        .hide{
            display: none;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-inverse">
    <a class="navbar-brand" href="javascript:;"><?= $product->display_name; ?>激活教程</a>
    <ul class="nav navbar-nav hide">
        <li class="nav-item active">
            <a class="nav-link" role="window" href="javascript:;">Windows环境 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="mac" href="javascript:;">Mac环境</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" role="linux" href="javascript:;">Linux环境</a>
        </li>
        <li class="nav-item">
            <?php $action = \Uri::segment(2) == 'setup' ? 'activation' : 'setup';?>
            <a class="nav-link" href="/jetbrains/<?= $action; ?>/<?= $item->license_id?>"><?= $action == 'setup' ? '安装' : '激活'; ?>教程</a>
        </li>
    </ul>
</nav>

<?= isset($content) ? $content : ''; ?>

<?php
echo \Asset::render('css-files');
echo \Asset::render('before-script');
echo \Asset::js([
    'http://cdn.bootcss.com/tether/1.3.7/js/tether.min.js',
    'http://lib.sinaapp.com/js/jquery/1.10.2/jquery-1.10.2.min.js',
    'http://cdn.bootcss.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js',
]);
echo \Asset::render('js-files');
echo \Asset::render('after-script');

?>
</body>

</html>