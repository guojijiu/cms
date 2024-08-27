<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><?php include template("member","header"); ?>
<div class="yzm_member_container main">
    <?php include template("member","left"); ?>
    <div class="main_right">
        <div class="tit">
            <h3>基本资料</h3>
        </div>
        <div class="main_cont">
			<div class="yzm-member-center">
				<div class="yzm-member-left">
					<a href="<?php echo U('user_pic');?>" title="修改头像"><img src="<?php if($userpic) { ?><?php echo $userpic;?><?php } else { ?><?php echo STATIC_URL;?>images/default.gif<?php } ?>"></a>
				</div>
				<div class="yzm-member-right">
					<div class="yzm-row">
						<label>用户名：</label> <?php echo $username;?> <?php if($vip) { ?><img src="<?php echo STATIC_URL;?>images/vip.png" class="vip" title="vip用户">vip到期时间：<?php echo date('Y-m-d H:i:s',$overduedate);?><?php } ?> 
						<a href="<?php echo U('account');?>" class="yzm-member-edit"><span class="yzm-iconfont">&#xe628;</span>修改资料</a>
					</div>
					<div class="yzm-row">
						<label>注册时间：</label> <?php echo date('Y-m-d H:i:s',$regdate);?>
					</div>
					<div class="yzm-row">
						<label>绑定邮箱：</label> <?php echo $email;?> <?php if($email_status) { ?><span class="green">[已验证]</span><?php } ?>
					</div>
					<div class="yzm-row">
						<label>登录次数：</label> <?php echo $loginnum;?> 次
					</div>
					<div class="yzm-row">
						<label>上次登录：</label> <?php echo date('Y年m月d日 H:i:s',$lastdate);?> [ IP地址： <?php echo $lastip;?> ] 
					</div>
				</div>
			</div>
			<div class="yzm-member-center">
				<div class="yzm-item">
					<div class="yzm-item-console yzm-balance"><span class="yzm-iconfont">&#xe646;</span></div>
					<cite>账户余额</cite>
					<p><?php echo $amount;?>元</p>
				</div>
				<div class="yzm-item">
					<div class="yzm-item-console yzm-point"><span class="yzm-iconfont">&#xe60e;</span></div>
					<cite>剩余积分</cite>
					<p><?php echo $point;?>点</p>
				</div>
				<div class="yzm-item">
					<div class="yzm-item-console yzm-grade"><span class="yzm-iconfont">&#xe634;</span></div>
					<cite>会员等级</cite>
					<p><?php echo $groupinfo['name'];?></p>
				</div>
				<div class="yzm-item">
					<div class="yzm-item-console yzm-experience"><span class="yzm-iconfont">&#xe60c;</span></div>
					<cite>我的经验</cite>
					<p><?php echo $experience;?>点</p>
				</div>
				<div class="yzm-item">
					<div class="yzm-item-console yzm-fans"><span class="yzm-iconfont">&#xe688;</span></div>
					<cite>我的粉丝</cite>
					<p><?php echo $fans;?>个</p>
				</div>
			</div>
        </div>
    </div>
</div>
<?php include template("member","footer"); ?>