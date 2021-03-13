<?php if (!defined('CORE_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
      
      <meta charset="UTF-8">
        	<title><?php echo webConf('web_name') ?></title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="author" content="留恋风,2581047041@qq.com"> 
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/font.css">
	<link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/xadmin.css?v=1">
	<link rel="stylesheet" href="<?php echo Tpl_style ?>/style/css/style.css">
    <script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/jquery.min.js"></script>
    <script src="<?php echo Tpl_style ?>/style/lib/layui/layui.js?v=123" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Tpl_style ?>/style/js/xadmin.js"></script>
	
	<?php  
	
	switch($webconf['admintpl']){
		case 'tpl':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_page.js"></script>';
		break;
		case 'default':
		echo '<script type="text/javascript" src="'.Tpl_style.'/style/js/target_window.js"></script>';
		break;
	}
	
	
	 ?>

    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>系统设置</cite></a>
              <a><cite>数据库管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
        </div>
        <div class="x-body">
            <div class="layui-card">
		    <div class="layui-card-body">
            <xblock>
			 <?php if(checkAction('Index/backup')){ ?>
			<button class="layui-btn" onclick="beifen();"><i class="layui-icon">&#xe608;</i>备份数据库</button>
			<?php } ?>
			<span class="x-right" style="line-height:40px">共有：<?php echo count($lists) ?> 个备份</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            数据库备份名
                        </th>
                        <th>
                            大小
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
				<?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
                    <tr>
                       <td><?php echo $v ?></td>
                       
                       <td><?php echo get_file_byte('backup/'.$v) ?></td>
                       
                        <td class="td-manage">
                        <?php if(strpos($v,'_v')!==false){ ?>
                            <a title="备份副本"  href="javascript:;" 
                            class="ml-5" style="text-decoration:none">
                                <button class="layui-btn layui-btn-disabled">备份副本</button>
                            </a>
                        <?php }else{ ?>
						<?php if(checkAction('Index/huanyuan')){ ?>
                            <a title="还原数据" onclick="huanyuan('<?php echo $v ?>')" href="javascript:;" 
                            class="ml-5" style="text-decoration:none">
                                <button class="layui-btn">还原数据</button>
                            </a>
						<?php } ?>
						<?php if(checkAction('Index/shanchu')){ ?>
                            <a title="删除备份" onclick="shanchu('<?php echo $v ?>')"  href="javascript:;"  
                            style="text-decoration:none">
                               <button class="layui-btn layui-btn-danger">删除备份</button>
                            </a>
						<?php } ?>
                        <?php } ?>
                        </td>
                    </tr>
				<?php } ?>
                </tbody>
            </table>
			</div>
			</div>
            
        </div>
       
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element;//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

            });

           
			 
			 function huanyuan(file){
				layer.confirm('还原数据库将覆盖现有的数据库，您确认要还原数据库吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                   // layer.msg('删除成功', {icon: 1});
				  // console.log(file);
				  window.location.href="<?php echo U('Index/huanyuan') ?>?file="+file;
                });
			 }
			  function shanchu(file){
				layer.confirm('您确定要删除备份数据库吗？删除后将不可找回！',function(index){
                    //捉到所有被选中的，发异步进行删除
                   // layer.msg('删除成功', {icon: 1});
				   //console.log(file);
				    window.location.href="<?php echo U('Index/shanchu') ?>?file="+file;
                });
			 }
			 
			 
			 function beifen(){
				window.location.href="<?php echo U('Index/backup') ?>";
			 }

            
            </script>
           
    </body>
</html>