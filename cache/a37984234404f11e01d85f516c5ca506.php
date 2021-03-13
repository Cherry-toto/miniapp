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

   <style>
	.btn-jz{
		margin-left:0px !important;
	}
	span.jzspan {
		width: 45px;
	}

   </style>
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/">首页</a>
        <a >插件管理</a>
        <a><cite>插件列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="iconfont" style="line-height:30px">&#xe6aa;</i></a>
    </div>
    <div class="x-body">
	
		<div class="layui-card">
			<div class="layui-card-body">
			
			  <div class="layui-row">
	  <form class="layui-form layui-col-md12 x-so" method="get" id="myform">
	    <a href="<?php echo U('plugins/index') ?>" class="layui-btn layui-btn-primary">全部</a>
		<a href="<?php echo U('plugins/index',['isdown'=>1]) ?>" class="layui-btn">已安装</a>
		<a href="<?php echo U('plugins/index',['isdown'=>2]) ?>" class="layui-btn layui-btn-normal">未安装</a>
		<a href="<?php echo U('plugins/index',['isdown'=>3]) ?>" class="layui-btn layui-btn-warm">云插件</a>
		<input type="text" name="title" value="<?php echo $title ?>" placeholder="请输入插件名字" autocomplete="off" class="layui-input">
		  <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
		</form>
      </div>
		
      
		
        <table border="1" rules="all"  class="layui-table layui-form">
        <thead>
          <tr>
            
            <th>插件名</th>
            <th>版本</th>
            <th >作者</th>
			<th >平台</th>
            <th style="width:200px;">简介</th>
            <th>插件文件</th>
            <th>开关</th>
            <th>安装说明</th>
            <th style="width:150px;">操作</th>
        </thead>
        <tbody>
		 <?php $v_n=0;foreach( $lists as $v){ $v_n++;?>
          <tr>
            <td><?php echo $v['name'] ?></td>
            <td>v<?php echo $v['version'] ?><?php if($v['isupdate']){ ?><span style="cursor:pointer;" title="点击查看" onclick="x_all_show('更新说明','<?php echo U('Plugins/update',array('filepath'=>$v['filepath'])) ?>')" class="layui-badge">新</span><?php } ?></td>
            <td><?php echo $v['author'] ?></td>
			<td><?php if($v['official']==1){ ?><span class="layui-badge layui-bg-green jzspan">官方</span><?php }else if($v['official']==2){ ?><span class="layui-badge layui-bg-orange jzspan">本地</span><?php }else{ ?><span class="layui-badge layui-bg-orange jzspan">第三方</span><?php } ?></td>
            <td ><?php echo $v['description'] ?></td>
			
            <td><?php echo $v['filepath'] ?></td>
           
            <td class="td-status">
			<?php if(checkAction('Plugins/change_status')){ ?>
				<?php if($v['isinstall']){ ?>
				<input type="checkbox" value="<?php echo $v['filepath'] ?>" name="switch" lay-filter="status"   lay-text="开|停"  lay-skin="switch" <?php if($v['isopen']==1){ ?>checked<?php } ?>>
				<?php }else{ ?>
				-
				<?php } ?>
			<?php }else{ ?>
				-
			<?php } ?>
			
			</td>
			<td>
			<?php if(checkAction('Plugins/desc') && $v['exists']){ ?>
			<button type="button" onclick="x_all_show('安装说明','<?php echo U('Plugins/desc',array('filepath'=>$v['filepath'])) ?>')" class="layui-btn  layui-btn-xs">安装说明</button>
			<?php }else{ ?>
			-
			<?php } ?>
			</td>
            <td class="td-manage">
			<?php if(checkAction('Plugins/action_do')){ ?>
				<?php if($v['isinstall']){ ?>
				<a onclick="x_all_show('配置','<?php echo U('Plugins/setconf',array('id'=>$v['id'])) ?>')" class="layui-btn layui-btn-normal layui-btn-xs btn-jz">配置</a>
				<a href="<?php echo U('plugins/output',['filepath'=>$v['filepath']]) ?>" class="layui-btn btn-jz  layui-btn-xs">导出</a> 
				<a onclick="actionDo('<?php echo $v['filepath'] ?>',0)" class="layui-btn layui-btn-warm btn-jz layui-btn-xs">卸载</a> 
				<a onclick="actionDo('<?php echo $v['filepath'] ?>',2)" class="layui-btn layui-btn-danger  btn-jz layui-btn-xs">删除</a> 
								
				<?php }else if($v['exists']){ ?>
				<a onclick="actionDo('<?php echo $v['filepath'] ?>',1)" class="layui-btn  layui-btn-xs">安装</a>
				<a onclick="actionDo('<?php echo $v['filepath'] ?>',2)" class="layui-btn layui-btn-danger  layui-btn-xs">删除</a> 
				<?php }else{ ?>
				<form class="layui-form" action="">
				<a lay-submit  lay-filter="down" data-<?php echo $v['filepath'] ?>-size="0" data-<?php echo $v['filepath'] ?>-url="<?php echo $v['downurl'] ?>" data="<?php echo $v['filepath'] ?>" id="<?php echo $v['filepath'] ?>-downbutton" class="layui-btn  layui-btn-xs layui-btn-warm">下载</a>
				<div class="layui-progress  layui-progress-big"   id="<?php echo $v['filepath'] ?>-down-action" lay-showpercent="true" lay-filter="demo-<?php echo $v['filepath'] ?>-progress" style="margin: 30px;display:none;">
				  <div class="layui-progress-bar" lay-percent="0%"></div>
				</div>
				</form>
				<?php } ?>
			<?php }else{ ?>
			-
			<?php } ?>
			
             
              </a>
            </td>
          </tr>
		  <?php } ?>
        </tbody>
      </table>
	  <div class="page">
		<?php echo $pages ?>
	  </div>
 
			
			
			</div>
		</div>
	
	
     
    </div>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
       
		form.on('switch(status)', function (data) {
		
			$.post("<?php echo U('change_status') ?>",{filepath:data.elem.value},function(r){});
		});
		form.on('submit(down)', function (data) {
			var filepath = $(data.elem).attr('data');
			var download_url = $(data.elem).attr('data-'+filepath+'-url');
			$("#"+filepath+"-downbutton").hide();
			$("#"+filepath+"-down-action").show();
			var othis = $("#"+filepath+"-down-action");
          	var DISABLED = 'layui-btn-disabled';
		    if(othis.hasClass(DISABLED)) return;
			//获取文件大小
			$.post({
				url:"<?php echo U('plugins/update') ?>",
				data:{action:'prepare-download',filepath:filepath,download_url:download_url},
				async : false,
				type : "POST",
				dataType:'json',
				success:function(res){
					 if(res.code==0){
						$(data.elem).attr('data-'+filepath+'-size',res.size);
					 }else{
					  layer.alert('获取文件大小失败，请检查网络！');return false;	
					 }
				}
			});
			
		    $.post("<?php echo U('plugins/update') ?>",{action:'start-download',filepath:filepath,download_url:download_url},function(res){
			    //开始下载
			    console.log(res);
			},'json');
			
		      //模拟loading
		    var n = 0, timer = setInterval(function(){ 
		        $.post("<?php echo U('plugins/update') ?>",{action:'get-file-size',filepath:filepath,download_url:download_url},function(res){
		        	console.log(res);
				    var cur_size = parseInt(res.size);
				    console.log(cur_size);
				    var filesize = parseInt($(data.elem).attr('data-'+filepath+'-size'));
				    n = Math.round(cur_size/filesize)*100;
				    if(n>=100){
					  n = 90;//只加载到90%，剩下10%解压
			          //$("#down-text").html('插件下载完成');
					  console.log('插件下载完成，正在解压~');
			          clearInterval(timer);
			          othis.removeClass(DISABLED);
			          element.progress('demo-'+filepath+'-progress', n+'%');
					  $.post("<?php echo U('plugins/update') ?>",{filepath:filepath,download_url:download_url,'filesize':$(data.elem).attr('data-'+filepath+'-size'),'action':'file-upzip'},function(res){
				        	if(res.code==0){
				        		//$("#down-text").html('插件已下载完毕！');
								console.log('插件已解压完毕！');
				        		element.progress('demo-'+filepath+'-progress', '100%');
								window.location.reload();
				        	}else{
				        		
				        		layer.msg(res.msg);return false;
				        	}

						   
						},'json');
			          

			        }
			        element.progress('demo-'+filepath+'-progress', n+'%');
				},'json');

		       
		    }, 1000);
			
			 return false;
			})
		
		
      });

	  function actionDo(path,type){
			  $.ajax({
				 url:"<?php echo U('action_do') ?>",
				 dataType:"json",
				 async:true,
				 data:{path:path,type:type},
				 type:"POST",
				 beforeSend:function(){
					//请求前的处理
					if(parseInt(type)==1){
						layer.msg('正在安装中，请稍等~');
					}else if(parseInt(type)==-1){
						layer.msg('正在删除中，请稍等~');
					}else{
						layer.msg('正在卸载中，请稍等~');
					}
					
					},
				 success:function(res){
					layer.closeAll();
				//请求成功时处理
						if(res.code==0){
							layer.msg(res.msg,{icon: 1,time:1000},function(){
								window.location.reload();
							})
						}else{
							layer.alert(res.msg);
							
						}
				},
				 complete:function(){
				//请求完成的处理
				},
				 error:function(){
				//请求出错处理
				}

						
				
			})
			  
		 
	  }

    



    </script>
   
  </body>

</html>