<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <title><?php echo $seo_title;?></title>
    <meta name="author" content="YzmCMS内容管理系统">
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <link href="<?php echo STATIC_URL;?>css/yzm-mobile-index.css?v=yzmcms" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-mobile-simpler-sidebar.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-mobile-scroll.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-mobile-scrollload.js"></script>
</head>

<body>
    <!--网站容器-->
    <div class="yzm-container">
        <?php include template("mobile","header"); ?>
        <div class="clearfix"></div>
        <!--焦点图-->
        <div class="yzm-toppic">
            <div class="yzm-imgslidemain">
                <div id="imgSlide" class="yzm-imgslide">
                    <ul>
                    	<!-- 此处为功能演示，调取模型id为1的且有缩略图的内容 -->
                        <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,thumb','modelid'=>'1','thumb'=>'1','limit'=>'3',));}?>
                        <?php if(is_array($data)) foreach($data as $v) { ?>
                        <li>
                        	<a href="<?php echo mobile_url($v['catid'], $v['id']);?>"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>"></a>
                            <p><?php echo $v['title'];?></p>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <ul class="yzm-navslide">
                    <li class="i_point active">
                    <li class="i_point">
                    <li class="i_point">
                </ul>
            </div>
        </div>
        <!--主要内容-->
        <div id="main">
            <div class="yzm-news-list">
                <h3 class="yzm-title">【最近更新】</h3>
                <ul>
                    <!-- 此处仅为功能演示，不分栏目，调取模型ID(modelid)为1的所有内容 -->
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,color','modelid'=>'1','limit'=>'20',));}?>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <li><a href="<?php echo mobile_url($v['catid'], $v['id']);?>" title="<?php echo $v['title'];?>"><?php echo title_color($v['title'], $v['color']);?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="yzm-news-list">
                <h3 class="yzm-title">【小编推荐】</h3>
                <ul>
                    <!-- 此处为功能演示，调取内容属性为“推荐”的内容 -->
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,color','modelid'=>'1','flag'=>'4','limit'=>'10',));}?>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <li><a href="<?php echo mobile_url($v['catid'], $v['id']);?>" title="<?php echo $v['title'];?>"><?php echo title_color($v['title'], $v['color']);?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="yzm-news-img">
                <h3 class="yzm-title">【图文资讯】</h3>
                <ul>
                    <!-- 此处仅为功能演示，调用模型ID为1且有缩略图的内容 -->
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,thumb','modelid'=>'1','thumb'=>'1','limit'=>'6',));}?>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <li>
                    	<a href="<?php echo mobile_url($v['catid'], $v['id']);?>"><img src="<?php echo $v['thumb'];?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>">
                            <p><?php echo $v['title'];?></p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php include template("mobile","footer"); ?>