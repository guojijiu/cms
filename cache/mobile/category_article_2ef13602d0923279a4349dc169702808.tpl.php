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
        <div id="main">
            <div class="yzm-news-list">
                <ul>
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,inputtime,color,flag','catid'=>$catid,'limit'=>'20','page'=>'page',));$pages = $tag->pages();}?>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <li>
                    	<span class="date">[<?php echo date('m-d',$v['inputtime']);?>]</span>
                    	<a href="<?php echo mobile_url($v['catid'], $v['id']);?>">
                            <?php if(strstr($v['flag'],'1')) { ?><em class="yzm-flag">顶</em><?php } ?>
                            <?php echo title_color($v['title'], $v['color']);?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="page"><?php echo $pages;?></div>
            <div class="clearfix"></div>
            <div class="yzm-news-list">
                <h3 class="yzm-title">【点击排行】</h3>
                <ul>
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'hits')) {$data = $tag->hits(array('field'=>'id,catid,title,inputtime,color','catid'=>$catid,'limit'=>'10',));}?>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <li>
                    	<span class="date">[<?php echo date('m-d',$v['inputtime']);?>]</span>
                    	<a href="<?php echo mobile_url($v['catid'], $v['id']);?>"><?php echo title_color($v['title'], $v['color']);?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php include template("mobile","footer"); ?>