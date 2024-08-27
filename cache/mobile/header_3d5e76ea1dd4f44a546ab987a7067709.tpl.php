<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><header class="yzm-header" name="top">
	<img src="<?php echo STATIC_URL;?>images/menu.png" class="yzm-menu">
	<img src="<?php echo STATIC_URL;?>images/search.png" class="yzm-search">
	<h2><?php echo $seo_title;?></h2>	
	<div class="yzm-search-form">
		<form method="get" action="<?php echo U('search/index/init');?>">
			<input name="q" type="text" placeholder="输入关键字" required class="yzm-input">
			<input type="submit" class="yzm-submit" value="搜索">
		</form>
	</div>	 
</header>
<nav class="yzm-nav">
	<ul>
		<li><a href="<?php echo U('mobile/index/init');?>" <?php if(!isset($catid)) { ?> class="current" <?php } ?>>网站首页</a></li>
		<?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'nav')) {$nav_data = $tag->nav(array('field'=>'mobname,catid,type,pclink','where'=>"parentid=0",'limit'=>'20','return'=>'nav_data',));}?>
		<?php if(is_array($nav_data)) foreach($nav_data as $v) { ?>
		<li>
			<a <?php if(isset($catid) && $v['catid']==$catid) { ?> class="current" <?php } ?> href="<?php if($v['type']!=2) { ?><?php echo U('mobile/index/lists', array('catid'=>$v['catid']));?><?php } else { ?><?php echo $v['pclink'];?><?php } ?>"><?php echo $v['mobname'];?></a>
		</li>
		<?php } ?>
	</ul>
</nav>
<script type="text/javascript">
	$(function() {
		$(".yzm-nav").simplerSidebar({
			opener: '.yzm-menu',
			sidebar: {
				align: 'left',
				width: 250
			}
		});

		$(".yzm-search").click(function(){
			$(".yzm-search-form").slideToggle(100);
		});
	});
</script>	