<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <title><?php echo $username;?>_个人主页<?php echo get_seo_suffix();?></title>
	  <meta name="author" content="YzmCMS内容管理系统/QQ:214243830">
	  <meta name="keywords" content="<?php echo $username;?>,<?php echo $username;?>个人主页,YzmCMS会员个人主页" />
	  <meta name="description" content="<?php echo get_config('site_description');?>" />
	  <link href="<?php echo STATIC_URL;?>css/yzm-member-myhome.css" rel="stylesheet" type="text/css" />
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery-1.8.2.min.js"></script>
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>plugin/layer/layer.js"></script>
  </head>
  <body>
    <div id="container">	
		<div id="toppic"><?php echo $username;?>_个人主页</div>
		<div id="top">
			<div class="feeb">
				<img src="<?php if($userpic) { ?><?php echo $userpic;?><?php } else { ?><?php echo STATIC_URL;?>images/default.gif<?php } ?>" alt="<?php echo $username;?>" title="<?php echo $username;?>"/>
			</div>
			<div class="userinfo">
				<div class="username"><?php echo $username;?><span class="grade">[<?php echo $groupinfo['name'];?>] <?php if($groupinfo['icon']) { ?><img src="<?php echo STATIC_URL;?>images/icon/<?php echo $groupinfo['icon'];?>"><?php } ?> <?php if($vip) { ?><img src="<?php echo STATIC_URL;?>images/vip.png" class="vip" title="vip用户"><?php } ?></span></div>
				<div class="userinfo_userdata">
					<span class="qianming"><b>个性签名：</b> <?php if($motto) { ?><?php echo $motto;?><?php } else { ?>暂无<?php } ?></span>
					<span class="fangkeshu"><b>空间访问量：</b> <?php echo $guest;?></span>
				</div>
			</div>
			<div class="userinfo_shortcut">
				<a href="<?php echo U('index/index/init');?>">返回首页</a> |
				<a href="<?php echo U('member/index/init');?>">会员中心</a>
			</div>		
		</div>
		<div class="clearfix"></div>
		<div id="main">
		  <div id="main_left">
		     <h1>内容列表</h1>
			 <ul class="list">
			 <?php if(is_array($data)) foreach($data as $val) { ?>
			 <li><span><?php echo date('Y-m-d H:i:s',$val['inputtime']);?></span><a href="<?php echo $val['url'];?>" target="_blank" title="<?php echo $val['title'];?>"><?php echo $val['title'];?></a></li>
			 <?php } ?>
			 </ul>
			 <div id="page"><?php echo $pages;?></div>			 
		  </div>
		  <div id="main_right">
		    <div class="jianjie">
			 <h2 class="right_title">个人简介</h2>
			 <p><?php if($introduce) { ?><?php echo $introduce;?><?php } else { ?><span style="color:#aaa">这家伙很懒，什么都没写呢~</span><?php } ?></p>
			</div>			
		    <div class="jianjie">
			 <h2 class="right_title">其他操作</h2>
			 <p><a href="<?php echo U('member/messages/new_messages', array('username'=>$username));?>">发信息</a> | <a href="javascript:;" id="follow" onclick="follow('<?php echo $userid;?>');">加关注</a></p>
			</div>	
		    <div class="laifang">
			 <h2 class="right_title">最近访客</h2>
			 <ul>
			 <?php if(is_array($guest_data)) foreach($guest_data as $val) { ?>
			 <li>
			 	<a href="<?php echo U('myhome/init', array('userid'=>$val['guest_id']));?>">
			 		<img src="<?php echo get_memberavatar($val['guest_id']);?>" alt="<?php echo $val['guest_name'];?>" title="<?php echo $val['guest_name'];?>"/>
			 	</a>
			 	<p><?php echo date('m月d日',$val['inputtime']);?></p>
			 </li>
			 <?php } ?>			 
			 </ul>
			</div>			
		  </div>		  
		</div>
    </div>	
  </body>
	<script type="text/javascript">
	check_follow();
	function follow(userid) {
		$.ajax({
			type: 'POST',
			url: "<?php echo U('member/index/public_follow');?>", 
			data: 'userid='+userid,
			success: function (msg) {
				if(msg == 1){
					$("#follow").html('已关注');
					layer.msg("关注成功！\n以后对方发布新文章时，会在您的会员中心显示哦！", {icon:1});
				}else if(msg == 2){
					$("#follow").html('加关注');
					layer.msg("已取消关注", {icon:1});
				}else if(msg == 0){
					layer.msg('请先登录！', {icon:2});
				}else if(msg == -3){
					layer.msg('不能关注自己哦~', {icon:2});
				}else if(msg == -1){
					layer.msg('该用户不存在！', {icon:2});
				}else{
					layer.msg('非法操作！', {icon:2});
				}
			}
		});
	}

	function check_follow() {
		$.ajax({
			type: 'GET',
			url: "<?php echo U('api/index/check_follow', array('userid'=>$userid));?>", 
			dataType: "json", 
            success: function (msg) {
				if(msg.status == 1){
					$("#follow").html(msg.message);       
			    }
            }
		});
	}
	</script>
</html>