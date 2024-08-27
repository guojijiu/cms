<?php defined('IN_YZMPHP') or exit('No permission resources.'); ?><?php include template("member","header"); ?> 
<div class="yzm_member_container main">
<?php include template("member","left"); ?> 
  <div class="main_right">
	<div class="tit"><h3>订单管理</h3></div>
	<div class="main_cont">
		<table class="tablelist">
			<thead>
			<tr>
			<th>订单编号</th>
			<th>金额</th>
			<th>订单详情</th>
			<th>支付方式</th>
			<th>下单时间</th>
			<th>状态</th>
			<th>操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)) foreach($data as $val) { ?>			
			<tr>
			<td><?php echo $val['order_sn'];?></td>
			<td><?php echo $val['money'];?>元</td>
			<td><?php echo $val['desc'];?></td>
			<td><?php if($val['paytype'] == 1) { ?>支付宝<?php } else { ?>微信<?php } ?></td>
			<td><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
			<td><?php if($val['status'] == 1) { ?><span class="green">已支付</span><?php } else { ?><span style="color:red">未支付</span><?php } ?></td>
			<td><?php if($val['status'] == 0) { ?><a href="<?php echo U('order_pay', array('id'=>$val['id']));?>" class="yzm-xs-btn yzm-btn-primary" target="_blank">付款</a><?php } ?></td>
			</tr> 
			<?php } ?>				
			</tbody>
		</table>
		<div id="page"><?php echo $pages;?></div>
	</div>
  </div>		  
</div> 
<?php include template("member","footer"); ?> 