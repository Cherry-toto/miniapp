<?php if (!defined('CORE_PATH')) exit();?><!doctype html>
<html lang="en">
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
<body >
  <div class="layui-rows" style="    margin: 10px;">
    <form class="layui-form layui-form-pane" action="">
	<!--表单必须要携带ID-->
	<blockquote class="layui-elem-quote">生成多种尺寸的缩略图，如果设置了固定尺寸，则不按照比例处理图片</blockquote>
	<input name="id" value="<?php echo $plugins['id'] ?>" type="hidden">
	
    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
              <ul class="layui-tab-title">
                <li class="layui-this">中等图</li>
                <li>小图</li>
                <li>大图</li>
                <li>其他</li>
              </ul>
             
              <div class="layui-tab-content" >
			    <div class="layui-tab-item layui-show">
				<div class="layui-form-item">
				   <div class="layui-inline">
					<label class="layui-form-label">尺寸比例</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="default_rate_x" placeholder="宽" value="<?php echo $config['default_rate_x'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">:</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="default_rate_y" placeholder="高"  value="<?php echo $config['default_rate_y'] ?>"  autocomplete="off" class="layui-input">
					</div>
				  </div>
				  <div class="layui-inline">
					<label class="layui-form-label">固定尺寸</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="default_value_x" placeholder="宽"  value="<?php echo $config['default_value_x'] ?>"  autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="default_value_y" placeholder="高" value="<?php echo $config['default_value_y'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
				  </div>
				  <div class="layui-form-item" pane>
					<label class="layui-form-label">开关</label>
					<div class="layui-input-block">
						<input type="radio" name="default_open" value="0" title="关" <?php if(isset($config['default_open']) && $config['default_open']==0){ ?>checked<?php } ?>>
						<input type="radio" name="default_open" value="1" title="开" <?php if(!isset($config['default_open']) || $config['default_open']==1){ ?>checked<?php } ?>>
					</div>
				  </div>
				  
				  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        使用栏目
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>

						<?php $v_n=0;foreach( $classtypetree as $v){ $v_n++;?>
						<?php if($v['pid']==0){ ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="tids_1[]" lay-skin="primary" value="<?php echo $v['id'] ?>" title="<?php echo $v['classname'] ?>" <?php if(strpos($config['tids_1'],','.$v['id'].',')!==false){ ?>checked<?php } ?> >
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                    <?php   $children = get_children($v,$classtypetree,5); ?>
                                    <?php $vv_n=0;foreach( $children as $vv){ $vv_n++;?>
                                        <input name="tids_1[]" lay-skin="primary" type="checkbox" title="<?php echo $vv['classname'] ?>" value="<?php echo $vv['id'] ?>" <?php if(strpos($config['tids_1'],','.$vv['id'].',')!==false){ ?>checked<?php } ?>> 
                                    <?php } ?>
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
						<?php } ?>
                           
                        </tbody>
                    </table>
                  </div>
				  
				
				</div>
				</div>
				
				
				<div class="layui-tab-item">
				<div class="layui-form-item">
					<div class="layui-inline">
					<label class="layui-form-label">尺寸比例</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="small_rate_x" placeholder="宽" value="<?php echo $config['small_rate_x'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">:</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="small_rate_y" placeholder="高" value="<?php echo $config['small_rate_y'] ?>" autocomplete="off" class="layui-input">
					</div>
				  </div>
				  <div class="layui-inline">
					<label class="layui-form-label">固定尺寸</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="small_value_x" placeholder="宽" value="<?php echo $config['small_value_x'] ?>"  autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="small_value_y" placeholder="高"  value="<?php echo $config['small_value_y'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
				  </div>
				  <div class="layui-form-item" pane>
					<label class="layui-form-label">开关</label>
					<div class="layui-input-block">
						<input type="radio" name="small_open" value="0" title="关" <?php if(isset($config['small_open']) && $config['small_open']==0){ ?>checked<?php } ?>>
						<input type="radio" name="small_open" value="1" title="开" <?php if(!isset($config['small_open']) || $config['small_open']==1){ ?>checked<?php } ?>>
					</div>
				  </div>
				  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        使用栏目
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>

						<?php $v_n=0;foreach( $classtypetree as $v){ $v_n++;?>
						<?php if($v['pid']==0){ ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="tids_2[]" lay-skin="primary" value="<?php echo $v['id'] ?>" title="<?php echo $v['classname'] ?>" <?php if(strpos($config['tids_2'],','.$v['id'].',')!==false){ ?>checked<?php } ?> >
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                    <?php   $children = get_children($v,$classtypetree,5); ?>
                                    <?php $vv_n=0;foreach( $children as $vv){ $vv_n++;?>
                                        <input name="tids_2[]" lay-skin="primary" type="checkbox" title="<?php echo $vv['classname'] ?>" value="<?php echo $vv['id'] ?>" <?php if(strpos($config['tids_2'],','.$vv['id'].',')!==false){ ?>checked<?php } ?>> 
                                    <?php } ?>
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
						<?php } ?>
                           
                        </tbody>
                    </table>
                  </div>
				  
				  
				</div>
				</div>
				
				
				<div class="layui-tab-item">
				<div class="layui-form-item">
				 <div class="layui-inline">
					<label class="layui-form-label">尺寸比例</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="large_rate_x" placeholder="宽" value="<?php echo $config['large_rate_x'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">:</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="large_rate_y" placeholder="高" value="<?php echo $config['large_rate_y'] ?>" autocomplete="off" class="layui-input">
					</div>
				  </div>
				  <div class="layui-inline">
					<label class="layui-form-label">固定尺寸</label>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="large_value_x" placeholder="宽" value="<?php echo $config['large_value_x'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
					<div class="layui-input-inline" style="width: 100px;">
					  <input type="number" name="large_value_y" placeholder="高" value="<?php echo $config['large_value_y'] ?>" autocomplete="off" class="layui-input">
					</div>
					<div class="layui-form-mid">px</div>
				  </div>
				  <div class="layui-form-item" pane>
					<label class="layui-form-label">开关</label>
					<div class="layui-input-block">
						<input type="radio" name="large_open" value="0" title="关"  <?php if(isset($config['large_open']) && $config['large_open']==0){ ?>checked<?php } ?>>
						<input type="radio" name="large_open" value="1" title="开" <?php if(!isset($config['large_open']) || $config['large_open']==1){ ?>checked<?php } ?>>
					</div>
				  </div>
				  <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        使用栏目
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>

						<?php $v_n=0;foreach( $classtypetree as $v){ $v_n++;?>
						<?php if($v['pid']==0){ ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="tids_3[]" lay-skin="primary" value="<?php echo $v['id'] ?>" title="<?php echo $v['classname'] ?>" <?php if(strpos($config['tids_3'],','.$v['id'].',')!==false){ ?>checked<?php } ?> >
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                    <?php   $children = get_children($v,$classtypetree,5); ?>
                                    <?php $vv_n=0;foreach( $children as $vv){ $vv_n++;?>
                                        <input name="tids_3[]" lay-skin="primary" type="checkbox" title="<?php echo $vv['classname'] ?>" value="<?php echo $vv['id'] ?>" <?php if(strpos($config['tids_3'],','.$vv['id'].',')!==false){ ?>checked<?php } ?>> 
                                    <?php } ?>
                                        
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
						<?php } ?>
                           
                        </tbody>
                    </table>
                  </div>
				  
				  
				  
				</div>
				</div>
				
				<div class="layui-tab-item">
				<div class="layui-form-item">
				<div class="layui-form-item" pane>
					<label class="layui-form-label" style="width:140px">是否处理gif图片</label>
					<div class="layui-input-inline" style="margin-left:140px">
						<input type="radio" name="gif_open" value="0" title="关" <?php if(isset($config['gif_open']) && $config['gif_open']==0){ ?>checked<?php } ?>>
						<input type="radio" name="gif_open" value="1" title="开" <?php if(!isset($config['gif_open']) || $config['gif_open']==1){ ?>checked<?php } ?>>
					</div>
					<div class="layui-form-mid layui-word-aux">gif图片被截取后是无法呈现动态的</div>
				 </div>
				</div>
				</div>
				
				
			  </div>

	 
	 
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>

    </div>
  </div>
</form>
</div>

    <script>
        $(function  () {
			
            layui.use('form', function(){
              var form = layui.form;
             
              //监听提交
              form.on('submit(formDemo)', function(data){
           
				$.post("<?php echo U('setconf') ?>",data.field,function(res){
				    //console.log(res);return false;
					 var res = JSON.parse(res);
					 if(res.code==1){
						layer.msg(res.msg);
					 }else{
						layer.msg(res.msg, {icon: 6,time: 2000},function(){
						window.location.reload();
						});
                     
						
						 
					 }
				})
				
                return false;
              });
            });
        })

        
    </script>

    
 
</body>
</html>