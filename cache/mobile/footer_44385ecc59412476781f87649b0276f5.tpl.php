<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?>		<div class="yzm-back">
			<a href="#top"><img src="<?php echo STATIC_URL;?>images/yzm-back-top.png" alt="返回顶部" title="返回顶部"></a>
		</div>
		<!--底部导航-->
		<div class="yzm-footer-nav">
			<ul>
				<li><a href="<?php echo U('guestbook/index/init');?>">留言板</a></li>
				<?php if(is_array($nav_data)) foreach($nav_data as $v) { ?>
				<li>
					<a href="<?php if($v['type']!=2) { ?><?php echo U('mobile/index/lists', array('catid'=>$v['catid']));?><?php } else { ?><?php echo $v['pclink'];?><?php } ?>"><?php echo $v['mobname'];?></a>
				</li>
				<?php } ?>				 
			</ul>	 
		</div>
		<!--网站底部-->
		<footer class="yzm-footer">
		   <a href="<?php echo SITE_URL;?>index.php?m=mobile">手机版</a> | <a href="<?php echo SITE_URL;?>">电脑版</a> <?php echo $site['site_code'];?>
		  <p><?php echo $site['site_copyright'];?></p>
		  <p>Powered by <a href="http://www.yzmcms.com" target="_blank">YzmCMS</a> © 2014-<?php echo date('Y');?></p>
		  <!-- 为了支持YzmCMS的发展,请您保留YzmCMS内容管理系统的链接信息,谢谢! -->	
		</footer>
    </div>
  </body>
</html>