<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <title><?php echo $seo_title;?></title>
    <meta name="author" content="YzmCMS内容管理系统">
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <link href="<?php echo STATIC_URL;?>css/yzm-mobile-category.css?v=yzmcms" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-mobile-simpler-sidebar.min.js"></script>
</head>

<body>
    <!--网站容器-->
    <div class="yzm-container">
        <?php include template("mobile","header"); ?>
        <!--主要内容-->
        <div class="yzm-main-article">
            <div class="yzm-content">
                <h1><?php echo $title;?></h1>
                <?php echo $content;?>
            </div>
        </div>
        <?php include template("mobile","footer"); ?>