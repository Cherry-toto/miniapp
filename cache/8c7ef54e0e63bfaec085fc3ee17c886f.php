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
	   .cache-s{
	   width:6rem !important;
	   }
	   .layui-form-label{width:150px;text-align:left;}
	   </style>
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
       <div class="layui-card">
	   <div class="layui-card-body">
        <fieldset class="layui-elem-field">
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <form class="layui-form " action="">
					  
					  <div class="layui-form-item" >
						<label class="layui-form-label">数据缓存</label>
						<div class="layui-form-mid layui-word-aux cache-s">
							<?php echo $datacache ?> kb
						</div>
						
						<div class="layui-input-inline  cache-s">
						<input lay-skin="primary"   type="checkbox" name="cache_data[]" value="data"   checked>
						</div>
						<div class="layui-form-mid layui-word-aux">
							  文件夹cache/data，主要是网站内容缓存，栏目，详情页等
						</div>
						
					  </div>
					   <div class="layui-form-item" >
						<label class="layui-form-label">Session</label>
						<div class="layui-form-mid layui-word-aux  cache-s">
							<?php echo $logincache ?> kb
						</div>
						
						<div class="layui-input-inline  cache-s">
							<input lay-skin="primary"  type="checkbox" name="cache_data[]" value="login"   >
						</div>
						<div class="layui-form-mid layui-word-aux">
							  文件夹cache/tmp，主要是服务器session文件缓存，当前session将不会被清空
						</div>
						
					  </div>
					   <div class="layui-form-item" >
						<label class="layui-form-label">日志缓存</label>
						<div class="layui-form-mid layui-word-aux  cache-s">
							 <?php echo $logcache ?> kb
						</div>
						<div class="layui-input-inline  cache-s">
							<input lay-skin="primary"  type="checkbox" name="cache_data[]" value="log"   >
						</div>
						<div class="layui-form-mid layui-word-aux">
							  文件夹cache/log，包括错误日志、支付日志、登录日志等
						</div>
						
					  </div>
					  
					  <div class="layui-form-item" >
						<label class="layui-form-label">模板缓存</label>
						<div class="layui-form-mid layui-word-aux  cache-s">
							 <?php echo $tplcache ?> kb
						</div>
						<div class="layui-input-inline  cache-s">
							<input lay-skin="primary"  type="checkbox" name="cache_data[]" value="tpl"   checked>
						</div>
						<div class="layui-form-mid layui-word-aux">
							  文件夹cache，主要是程序执行时生成的模板编译文件
						</div>
					  </div>
					  
					  <div class="layui-form-item" >
						<label class="layui-form-label">缩略图缓存</label>
						<div class="layui-form-mid layui-word-aux  cache-s">
							 <?php echo $imagecache ?> kb
						</div>
						<div class="layui-input-inline  cache-s">
							<input lay-skin="primary"  type="checkbox" name="cache_data[]" value="image"   >
						</div>
						<div class="layui-form-mid layui-word-aux">
							  文件夹image，主要是程序执行时生成的自定义缩略图
						</div>
					  </div>
					  
					
					  <div class="layui-form-item">
						<div class="layui-input-block">
						  <button class="layui-btn" lay-submit lay-filter="formDemo">立即清空</button>
						 
						</div>
					  </div>
					</form>
                </div>
            </div>
        </fieldset>
        </div>
		</div>
       
    </div>
        <script>
		layui.use(['laydate','form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form
              ,layer = layui.layer;
			  laydate = layui.laydate;
			  var upload = layui.upload;
			     //监听提交
              form.on('submit(formDemo)', function(data){
				if(JSON.stringify(data.field)=="{}"){
					layer.msg('请选择清空目标！');
				}	
				$.post("<?php echo U('Index/cleanCache') ?>",data.field,function(r){
					//console.log(r);return false;
					var r = JSON.parse(r);
					if(r.code==0){
						layer.confirm('清理成功！', function(){
						
							window.location.reload();
						});
					
						
					}else{
						layer.alert(r.msg, {icon: 5});
					}
				});
				
               
                return false;
              });
		})

        </script>
    </body>
</html>