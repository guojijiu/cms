<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <title><?php echo $seo_title;?></title>
	  <meta name="author" content="YzmCMS内容管理系统">
	  <meta name="keywords" content="<?php echo $keywords;?>" />
	  <meta name="description" content="<?php echo $description;?>" />
	  <link href="<?php echo STATIC_URL;?>css/yzm-common.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo STATIC_URL;?>css/yzm-style.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/yzm-front.js"></script>
  </head>
  <body>
	    <?php include template("index","header"); ?> 
		 <div class="yzm-content-box yzm-main-left yzm-news-list">
		 	    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'search')) {$data = $tag->search(array('field'=>'id,catid,title,updatetime,thumb,url,color,flag,description','keyword'=>$q,'siteid'=>$siteid,'modelid'=>$modelid,'catid'=>$catid,'limit'=>'10','page'=>'page',));$pages = $tag->pages();}?>

		 		<div class="yzm-title">
		 			<h2>“<?php echo $q;?>” 的搜索结果，共<?php echo $tag->total;?>条</h2>
		 		</div>
		 		
		 		<?php if(is_array($data)) foreach($data as $v) { ?>
		 		<?php $v['color_title'] = str_ireplace($q, "<span style='color:red;'>$q</span>", $v['title']);?>
		 		<?php $v['description'] = str_ireplace($q, "<span style='color:red;'>$q</span>", $v['description']);?>
		 		<div class="yzm-news">
		 			<a href="<?php echo $v['url'];?>" class="yzm-news-img">
		 				<img src="<?php echo get_thumb($v['thumb']);?>" alt="<?php echo $v['title'];?>" title="<?php echo $v['title'];?>" />
		 			</a>
		 			<div class="yzm-news-right">
		 				<?php if(strstr($v['flag'],'1')) { ?><em>顶</em><?php } ?> <!-- 内容属性 -->
		 				<a href="<?php echo $v['url'];?>"><?php echo $v['color_title'];?></a>
		 				<p><?php echo $v['description'];?></p>
		 				<div class="yzm-news-tags">
		 					<?php $tag_data = content_list_tag($v['catid'], $v['id']);?>
 							<?php if(is_array($tag_data)) foreach($tag_data as $val) { ?>	
 							<a href="<?php echo tag_url($val['id']);?>" target="_blank" ><?php echo $val['tag'];?></a>
 							<?php } ?>
		 				</div>
		 			</div>
		 		</div>		
		 		<?php } ?>						

				<div id="page"><?php echo $pages;?></div>
		  </div>
		  
		 <div class="yzm-main-right">	
		 	<div class="yzm-content-box">
				<div class="yzm-title">
		 			<h2>点击排行</h2>
		 		</div>
		 	    <ul class="yzm-ranking">
		 			<?php $tag_cache_name = 'tag_cache_'.md5(implode('&',array('field'=>'title,url,color,inputtime','modelid'=>'1','limit'=>'10','cache'=>'3600',)));if(!$data = getcache($tag_cache_name)){$tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'hits')) {$data = $tag->hits(array('field'=>'title,url,color,inputtime','modelid'=>'1','limit'=>'10','cache'=>'3600',));}if(!empty($data)){setcache($tag_cache_name, $data, 3600);}}?>
					<?php if(is_array($data)) foreach($data as $k=>$v) { ?>
					<?php $k=$k+1;?>
					   <li><em><?php echo $k;?></em><span class="date"><?php echo date('m-d',$v['inputtime']);?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank"><?php echo title_color($v['title'], $v['color']);?></a></li>	
					<?php } ?>						
		 		</ul>		 		
		 	</div>	
 		 	<div class="yzm-line"></div>
		 	<div class="yzm-content-box">
				<div class="yzm-title">
		 			<h2>最近更新</h2>
		 		</div>
		 	    <ul class="yzm-like-list">
		 			<?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'title,url,color,inputtime','modelid'=>'1','limit'=>'10',));}?>
					<?php if(is_array($data)) foreach($data as $v) { ?>
					   <li><span class="date"><?php echo date('m-d',$v['inputtime']);?></span><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank"><?php echo title_color($v['title'], $v['color']);?></a></li>	
					<?php } ?>						
		 		</ul>		 		
		 	</div>	
 		 	<div class="yzm-line"></div>
						 
		 </div>			  	
 		<?php include template("index","footer"); ?> 
