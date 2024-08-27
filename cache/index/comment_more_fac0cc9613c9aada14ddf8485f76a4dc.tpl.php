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
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>js/jquery.qqFace.js"></script>
	  <script type="text/javascript" src="<?php echo STATIC_URL;?>plugin/layer/layer.js"></script>
  </head>
  <body>
	     <?php include template("index","header"); ?> 
		 <div class="yzm-content-box box">
	 		<div class="yzm-title">
	 			<h2>评论详情</h2>
	 			<span class="yzm-title-right">
	 				当前位置：<a href="<?php echo SITE_URL;?>">首页</a>&gt; <a href="<?php echo $content_data['url'];?>"><?php echo $content_data['title'];?></a> &gt; 评论详情
	 			</span>
	 		</div>
	 		<div class="yzm-comment-more">
	 			<h1><a href="<?php echo $content_data['url'];?>"><?php echo $content_data['title'];?></a></h1>
	 			<div class="yzm-comment-more-box">
	 				<div class="yzm-comment-list-top">共<?php echo $total;?>条评论已通过审核<span class="yzm-comment-explain">(以下网友评论只代表网友个人观点，不代表本站观点)</span></div>
	 				<div class="yzm-comment-list-body">
	 				<ul>
	 					<?php if(is_array($comment_data)) foreach($comment_data as $v) { ?>
	 					<li>
	 						<?php if($v['userid']) { ?>
	 						<a class="user_pic" href="<?php echo U('member/myhome/init', array('userid'=>$v['userid']));?>" target="blank"><img src="<?php if(!empty($v['userpic'])) { ?><?php echo $v['userpic'];?><?php } else { ?><?php echo STATIC_URL;?>images/default.gif<?php } ?>" height="35" width="35"></a>
	 						<?php } else { ?>
	 						<a class="user_pic" href="javascript:;"><img src="<?php echo STATIC_URL;?>images/default.gif" height="35" width="35"></a>
	 						<?php } ?>
	 						<div class="yzm-comm-right">
	 							<?php if($v['userid']) { ?>
	 							<a class="user_name" href="<?php echo U('member/myhome/init', array('userid'=>$v['userid']));?>" target="blank"><?php echo $v['username'];?></a>
	 							<?php } else { ?>
	 							<a class="user_name" href="javascript:;">游客</a>
	 							<?php } ?>
	 							<p><?php echo nl2br($v['content']);?></p>
	 							<p><span class="comm_time"><?php echo date('Y-m-d H:i:s',$v['inputtime']);?></span> <a href="javascript:toreply('<?php echo $v['id'];?>');" class="comm_a">回复</a></p>
	 							<div id="rep_<?php echo $v['id'];?>" class="none">
	 							<form action="<?php echo U('comment/index/init');?>" method="post"  onsubmit="return check_rep(this)">
	 							<input type="hidden" name="modelid" value="<?php echo $modelid;?>">
	 							<input type="hidden" name="catid" value="<?php echo $content_data['catid'];?>">
	 							<input type="hidden" name="id" value="<?php echo $id;?>">
	 							<input type="hidden" name="title" value="<?php echo $content_data['title'];?>">
	 							<input type="hidden" name="url" value="<?php echo $content_data['url'];?>">
	 							<input type="hidden" name="reply" value="<?php echo $v['id'];?>">
	 							<input type="hidden" name="reply_to" value="<?php echo $v['username'];?>">
	 							<textarea name="content" class="textarea textarea2" placeholder="我来说两句~"></textarea>
	 							<?php if($site['comment_code']) { ?>
	 							<span class="yzm-comment-reply-code"><img src="<?php echo U('api/index/code');?>" onclick="this.src=this.src+'?'" title="看不清？点击更换"><input type="text" name="code" placeholder="请输入验证码" required="required"></span>
	 							<?php } ?>
	 							<input type="submit" class="yzm-comment-submit static" name="dosubmit" value="提交">
	 							</form>
	 							</div>
	 						</div>
	 					</li>
	 					<?php } ?>
	 					<?php if(empty($comment_data)) { ?><li>这篇文章还没有收到评论，赶紧来抢沙发吧~</li><?php } ?>
	 				</ul>
	 				</div>

	 				<div id="page">
	 					<?php echo $pages;?>
	 				</div>

	 				<div class="yzm-title">
	 					<h2>我要来说两句</h2>
	 				</div>
	 				<div class="yzm-comment-box">
	 					<div class="yzm-comment-form">
	 					<form action="<?php echo U('comment/index/init');?>" method="post"  onsubmit="return check_comm(this)">
	 					<input type="hidden" name="modelid" value="<?php echo $modelid;?>">
	 					<input type="hidden" name="catid" value="<?php echo $content_data['catid'];?>">
	 					<input type="hidden" name="id" value="<?php echo $id;?>">
	 					<input type="hidden" name="title" value="<?php echo $content_data['title'];?>">
	 					<input type="hidden" name="url" value="<?php echo $content_data['url'];?>">
	 					<textarea class="textarea" id="content" name="content" placeholder="我来说两句~"></textarea>
	 					<p>
	 						<input type="submit" class="yzm-comment-submit" name="dosubmit" value="提交"><span class="emotion">表情</span>
	 						<?php if($site['comment_code']) { ?>
	 						<span class="yzm-comment-code"><img src="<?php echo U('api/index/code');?>" onclick="this.src=this.src+'?'" title="看不清？点击更换"><input type="text" name="code" placeholder="请输入验证码" required="required"></span>
	 						<?php } ?>
	 					</p>
	 					</form>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
		 </div>
		 <script type="text/javascript">
			$(function(){
				// 评论框表情
				$('.emotion').qqFace({
					path:'<?php echo STATIC_URL;?>images/face/'	
				});
			});
		 </script>		  	
 		<?php include template("index","footer"); ?> 