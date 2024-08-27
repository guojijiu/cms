<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <title>会员中心<?php echo get_seo_suffix();?></title>
	  <meta name="author" content="YzmCMS内容管理系统/QQ:214243830">
	  <link href="<?php echo STATIC_URL;?>iconfont/iconfont.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo STATIC_URL;?>css/yzm-member-index.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>plugin/layer/layer.js"></script>	  
  </head>
  <body>
		<div class="container_box">
			<div class="yzm_member_container head">
			  <div class="right"><a href="<?php echo SITE_URL;?>"><span class="yzm-iconfont">&#xe60d;</span> 返回首页</a></div>
			  欢迎你： <?php echo $username;?>  ，<a href="<?php echo U('member/index/logout');?>">退出登录</a>
			</div>
		</div>
		<div class="nav">
		   <div class="yzm_member_container">
		     <a href="<?php echo U('member/index/init');?>" class="current ucenter">会员中心</a><a href="<?php echo U('member/myhome/init', array('userid'=>$userid));?>" class="set" target="_blank">个人主页</a><a href="<?php echo U('member/messages/system_msg');?>" class="msg">消息中心</a>
		   </div>
		</div>
