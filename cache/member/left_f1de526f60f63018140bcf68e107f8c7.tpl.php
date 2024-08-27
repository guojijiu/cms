<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><div class="main_left">
	<dl>
		<dt> <span class="yzm-iconfont">&#xe603;</span> 内容管理</dt>
		<dd><a href="<?php echo U('member/member_content/init');?>"<?php if(ROUTE_C=='member_content' && ROUTE_A=='init') { ?> class="left_cur" <?php } ?>>在线投稿</a></dd>
		<dd><a href="<?php echo U('member/member_content/pass');?>"<?php if(ROUTE_A=='pass') { ?> class="left_cur" <?php } ?>>已通过的稿件</a></dd>
		<dd><a href="<?php echo U('member/member_content/not_pass');?>"<?php if(ROUTE_A=='not_pass') { ?> class="left_cur" <?php } ?>>未通过的稿件</a></dd>
		<dd><a href="<?php echo U('member/member_content/comment_list');?>"<?php if(ROUTE_A=='comment_list') { ?> class="left_cur" <?php } ?>>我的评论</a></dd>
		<dd><a href="<?php echo U('member/member_content/favorite');?>"<?php if(ROUTE_A=='favorite') { ?> class="left_cur" <?php } ?>>收藏夹</a></dd>
	</dl>
	<dl>
		<dt> <span class="yzm-iconfont">&#xe63d;</span> 账号设置</dt>
		<dd><a href="<?php echo U('member/index/account');?>"<?php if(ROUTE_A=='account') { ?> class="left_cur" <?php } ?>>修改资料</a></dd>
		<dd><a href="<?php echo U('member/index/user_pic');?>"<?php if(ROUTE_A=='user_pic') { ?> class="left_cur" <?php } ?>>修改头像</a></dd>
		<dd><a href="<?php echo U('member/index/password');?>"<?php if(ROUTE_A=='password') { ?> class="left_cur" <?php } ?>>修改密码</a></dd>
		<dd><a href="<?php echo U('member/index/email');?>"<?php if(ROUTE_A=='email') { ?> class="left_cur" <?php } ?>>邮箱/安全问题</a></dd>
	</dl>
	<dl>
		<dt> <span class="yzm-iconfont">&#xe61c;</span> 财务中心</dt>
		<dd><a href="<?php echo U('member/member_pay/pay');?>"<?php if(ROUTE_C=='member_pay' && ROUTE_A=='pay') { ?> class="left_cur" <?php } ?>>在线充值</a></dd>
		<dd><a href="<?php echo U('member/member_pay/order_list');?>"<?php if(ROUTE_C=='member_pay' && ROUTE_A=='order_list') { ?> class="left_cur" <?php } ?>>订单管理</a></dd>
		<dd><a href="<?php echo U('member/member_pay/init');?>"<?php if(ROUTE_C=='member_pay' && ROUTE_A=='init') { ?> class="left_cur" <?php } ?>>入账记录</a></dd>
		<dd><a href="<?php echo U('member/member_pay/spend_record');?>"<?php if(ROUTE_A=='spend_record') { ?> class="left_cur" <?php } ?>>消费记录</a></dd>
	</dl>
	<dl>
		<dt> <span class="yzm-iconfont">&#xe604;</span> 我的关注</dt>
		<dd><a href="<?php echo U('member/index/follow');?>" <?php if(ROUTE_A=='follow') { ?> class="left_cur" <?php } ?>>我的关注</a></dd>
		<dd><a href="<?php echo U('member/index/fans');?>" <?php if(ROUTE_A=='fans') { ?> class="left_cur" <?php } ?>>我的粉丝</a></dd>
		<dd><a href="<?php echo U('member/index/follow_dynamic');?>" <?php if(ROUTE_A=='follow_dynamic') { ?> class="left_cur" <?php } ?>>TA的动态</a></dd>
	</dl> 
	<dl>
		<dt> <span class="yzm-iconfont">&#xe617;</span> 消息中心</dt>
		<dd><a href="<?php echo U('member/messages/new_messages');?>"<?php if(ROUTE_A=='new_messages') { ?> class="left_cur" <?php } ?>>发信息</a></dd>  
		<dd><a href="<?php echo U('member/messages/outbox');?>"<?php if(ROUTE_A=='outbox') { ?> class="left_cur" <?php } ?>>发件箱</a></dd>
		<dd><a href="<?php echo U('member/messages/inbox');?>"<?php if(ROUTE_A=='inbox') { ?> class="left_cur" <?php } ?>>收件箱<span>(<?php echo $inbox_msg;?>)</span></a></dd>
		<dd><a href="<?php echo U('member/messages/system_msg');?>"<?php if(ROUTE_A=='system_msg') { ?> class="left_cur" <?php } ?>>系统消息<span>(<?php echo $system_msg;?>)</span></a></dd>
	</dl>
</div>