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
            <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'search')) {$data = $tag->search(array('field'=>'id,catid,title,updatetime,thumb,url,color,flag,description','keyword'=>$q,'siteid'=>$siteid,'modelid'=>$modelid,'limit'=>'10','page'=>'page',));$pages = $tag->pages();}?>
            
            <div class="yzm-search-title">
                <h2>共<span><?php echo $tag->total;?></span>条搜索结果</h2>
            </div>
            <div class="yzm-news-list">
                <ul>
                    <?php if(is_array($data)) foreach($data as $v) { ?>
                    <?php $v['title'] = preg_replace("/$q/i", "<span style='color:red;'>$q</span>", $v['title']);?>
                    <li>
                    	<span class="date">[<?php echo date('m-d',$v['updatetime']);?>]</span>
                    	<a href="<?php echo mobile_url($v['catid'], $v['id']);?>">
                            <?php if(strstr($v['flag'],'1')) { ?><em class="yzm-flag">顶</em><?php } ?>
                            <?php echo title_color($v['title'], $v['color']);?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="page"><?php echo $pages;?></div>
        </div>
        <?php include template("mobile","footer"); ?>