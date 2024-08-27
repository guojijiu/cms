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
            <h1><?php echo $title;?></h1>
            <div class="yzm-info">
            <?php echo date("Y-m-d H:i:s",$inputtime);?>&nbsp;&nbsp;浏览：<?php echo $click;?>&nbsp;&nbsp;作者：<?php echo $nickname;?>
            </div>
            <div class="yzm-description">
                <?php echo $description;?>
            </div>
            <div class="yzm-content">
                <?php if($allow_read) { ?>
                    <?php echo $content;?>
                <?php } else { ?>
                    <p class="yzm-content-read-tips">阅读此内容需要您支付<span><?php echo $readpoint;?></span><?php if($paytype==1) { ?>点积分<?php } else { ?>元<?php } ?>，<a href="<?php echo $pay_url;?>">点击支付</a></p>
                <?php } ?>
            </div>
            <div class="yzm-pre-next">
                <p>上一篇：<?php echo $pre;?></p>
                <p>下一篇：<?php echo $next;?></p>
            </div>

            <!-- 评论区开始 -->
            <div class="yzm-content-box">
                <h3 class="yzm-title-btn">评论区</h3>
                <div class="yzm-comment-box">
                    <div class="yzm-comment-form">
                    <form action="<?php echo U('comment/index/init');?>" method="post"  onsubmit="return check_comm(this)">
                    <input type="hidden" name="modelid" value="<?php echo $modelid;?>">
                    <input type="hidden" name="catid" value="<?php echo $catid;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="title" value="<?php echo $title;?>">
                    <input type="hidden" name="url" value="<?php echo $url;?>">
                    <textarea class="textarea" id="content" name="content" placeholder="我来说两句~"></textarea>
                    <p>
                        <?php if($site['comment_code']) { ?>
                        <span class="yzm-comment-code"><img src="<?php echo U('api/index/code');?>" onclick="this.src=this.src+'?'" title="看不清？点击更换"><input type="text" name="code" placeholder="请输入验证码" required="required"></span>
                        <?php } ?>
                        <input type="submit" class="yzm-comment-submit" name="dosubmit" value="提交">
                    </p>
                    </form>
                    </div>
                </div>
                <div class="yzm-comment-list-box">
                    <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'comment_list')) {$data = $tag->comment_list(array('modelid'=>$modelid,'catid'=>$catid,'id'=>$id,'limit'=>'20',));}?>
                    <div class="yzm-comment-list-top">共 <?php echo get_comment_total($id, $catid, $modelid);?> 条评论</div>
                    <div class="yzm-comment-list-body">
                    <ul>
                        <?php if(is_array($data)) foreach($data as $v) { ?>
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
                                <input type="hidden" name="catid" value="<?php echo $catid;?>">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="title" value="<?php echo $title;?>">
                                <input type="hidden" name="url" value="<?php echo $url;?>">
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
                        <?php if(empty($data)) { ?><li>这篇文章还没有收到评论，赶紧来抢沙发吧~</li><?php } ?>
                    </ul>
                    </div>
                </div> 
            </div>
            <!-- 评论区结束 -->

        </div>
        <div class="clearfix"></div>
        <div class="yzm-article-img">
            <h3 class="yzm-title">【随机内容】</h3>
            <ul>
                <?php $tag = yzm_base::load_sys_class('yzm_tag');if(method_exists($tag, 'lists')) {$data = $tag->lists(array('field'=>'id,catid,title,thumb,updatetime,description','modelid'=>$modelid,'order'=>'RAND()','limit'=>'4',));}?>
                <?php if(is_array($data)) foreach($data as $k=>$v) { ?>
                <li>
                    <a href="<?php echo mobile_url($v['catid'], $v['id']);?>">
                        <img src="<?php echo get_thumb($v['thumb']);?>" alt="<?php echo $v['title'];?>">
                    </a>
                    <p><a href="<?php echo mobile_url($v['catid'], $v['id']);?>"><?php echo $v['title'];?></a></p>
                    <span><?php echo date('Y-m-d', $v['updatetime']);?></span>
                </li>
                <?php } ?>
            </ul>
        </div>
        <script type="text/javascript">
            function toreply(obj) {
                if ($("#rep_" + obj).css("display") == "none") {
                    $("#rep_" + obj + " .yzm-comment-reply-code img").attr('src', $("#rep_" + obj + " .yzm-comment-reply-code img").attr("src") + "?");
                    $("#rep_" + obj).css("display", "block");
                } else {
                    $("#rep_" + obj).css("display", "none");
                }
            }

            function check_comm(obj) {
                var content = obj.content.value;
                if (content === '') {
                    alert('你不打算说点什么吗？');
                    return false;
                }
                return true;
            }

            function check_rep(obj) {
                var content = obj.content.value;
                if (content === '') {
                    alert('你不打算说点什么吗？');
                    return false;
                }
                return true;
            }
        </script>
        <?php include template("mobile","footer"); ?>