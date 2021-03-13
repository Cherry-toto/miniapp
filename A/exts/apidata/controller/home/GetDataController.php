<?php

// +----------------------------------------------------------------------
// | JiZhiCMS { 极致CMS，给您极致的建站体验 }  
// +----------------------------------------------------------------------
// | Copyright (c) 2018-2099 http://www.jizhicms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 留恋风 <2581047041@qq.com>
// +----------------------------------------------------------------------
// | Date：2019/10/08
// +----------------------------------------------------------------------


namespace Home\plugins;

use Home\c\CommonController;
use FrPHP\lib\Controller;
use FrPHP\Extend\Page;

class GetDataController extends CommonController
{
	function _init(){
	    header('Access-Control-Allow-Origin:*');
		parent::_init();
		$apidata = M('plugins')->find(['filepath'=>'apidata','isopen'=>1]);
		if(!$apidata){
			JsonReturn(['code'=>1,'msg'=>'插件未开启！']);
		}
		$this->config = json_decode($apidata['config'],1);
		
		$this->checkIp();
		$this->checkKey();
	}
	
	//获取数据处理
	/**
	
		model: 模块名，必填
		key:访问秘钥，必填
		where:查询条件，默认查询该模块所有内容，根据请求，自动获取
		orders:查询排序，默认id倒序，字符串格式： 'addtime desc' ，可以不填
		limit:显示条数，默认查询所有，数字，正整数，可以不填
		fields:获取字段，默认查询所有，字符串格式： 'id,classname,tid' ，可以不填
	
	**/
	function index(){
		
		$tables = explode(',',$this->config['tables']);
		$table = $this->frparam('model',1,false);
		if($table && is_array($tables) && in_array($table,$tables)){
			$model = $this->frparam('model',1,false);
			
			$orders = $this->frparam('orders',1,' id desc ');
			$limit = $this->frparam('limit',0,10);
			$fields = $this->frparam('fields',1,null);
			$page = $this->frparam('page',0,1);
			if(!$model){
				JsonReturn(['code'=>1,'msg'=>'model参数错误！']);
			}
			if($page>1){
			    $limit = ($page-1)*$limit.','.$limit;
			}
			if($model=='sysconfig'){
				$limit = null;
			}
			
			$data = $this->frparam();
			unset($data['model']);
			unset($data['orders']);
			unset($data['limit']);
			unset($data['fields']);
			unset($data['key']);
			$where = null;
			foreach($data as $k=>$v){
				$where[$k] = $this->frparam($k,1);
			}
			$res = M($model)->findAll($where,$orders,$fields,$limit);
			JsonReturn(['code'=>0,'data'=>$res]);
			
		}else{
			JsonReturn(['code'=>1,'msg'=>'数据不存在！']);
		}
		
	}
	
	function getDataPage(){
	    $tables = explode(',',$this->config['tables']);
		$table = $this->frparam('model',1,false);
		if($table && is_array($tables) && in_array($table,$tables)){
			$model = $this->frparam('model',1,false);
			
			$orders = $this->frparam('orders',1,' id desc ');
			$limit = $this->frparam('limit',0,10);
			$fields = $this->frparam('fields',1,null);
			$page = $this->frparam('page',0,1);
			if(!$model){
				JsonReturn(['code'=>1,'msg'=>'model参数错误！']);
			}
			
			$data = $this->frparam();
			unset($data['model']);
			unset($data['orders']);
			unset($data['limit']);
			unset($data['fields']);
			unset($data['key']);
		
			$classtypedata = classTypeData();
    		foreach($classtypedata as $k=>$v){
    			$classtypedata[$k]['children'] = get_children($v,$classtypedata);
    		}
			$sql = ' isshow=1 ';
		    if($this->frparam('tid')){
		        $sql .= ' and tid in ('.implode(',',$classtypedata[$this->frparam('tid')]['children']['ids']).') ';
		    }else{
		        $sql = null;
    			foreach($data as $k=>$v){
    				$sql[$k] = $this->frparam($k,1);
    			}
		    }
		
			$obj = new Page($model);
			$res = $obj->where($sql)->orderby($orders)->limit($limit)->page($page)->go();
			
			JsonReturn(['code'=>0,'data'=>$res]);
			
		}else{
			JsonReturn(['code'=>1,'msg'=>'数据不存在！']);
		}
	}
	
	function getDataSearch(){
	    $tables = explode(',',$this->config['tables']);
		$table = $this->frparam('model',1,false);
		if($table && is_array($tables) && in_array($table,$tables)){
			$model = $this->frparam('model',1,false);
			
			$orders = $this->frparam('orders',1,' id desc ');
			$limit = $this->frparam('limit',0,10);
			$fields = $this->frparam('fields',1,null);
			$page = $this->frparam('page',0,1);
			if(!$model){
				JsonReturn(['code'=>1,'msg'=>'model参数错误！']);
			}
			
			$data = $this->frparam();
			unset($data['model']);
			unset($data['orders']);
			unset($data['limit']);
			unset($data['fields']);
			unset($data['key']);
		
			$classtypedata = classTypeData();
    		foreach($classtypedata as $k=>$v){
    			$classtypedata[$k]['children'] = get_children($v,$classtypedata);
    		}
			$sql = ' isshow=1 ';
			
			$search = $this->frparam('search',1);
			$word = $this->frparam('word',1);
			if($search && $word){
			    $s = explode(',',$search);
			    $sql.= ' and (';
			    $sqx = [];
			    foreach ($s as $v){
			        $sqlx[] =" ".$v." like '%".$word."%' ";
			    }
			    $sql.= implode(' or ',$sqlx);
			    $sql.=' ) ';
			}
			
			
		    if($this->frparam('tid')){
		        $sql .= ' and tid in ('.implode(',',$classtypedata[$this->frparam('tid')]['children']['ids']).') ';
		    }
		
			$obj = new Page($model);
			$res = $obj->where($sql)->orderby($orders)->limit($limit)->page($page)->go();
			
			JsonReturn(['code'=>0,'data'=>$res]);
			
		}else{
			JsonReturn(['code'=>1,'msg'=>'数据不存在！']);
		}
	}
	
	//新增/修改
	function savedata(){
		$tables = explode(',',$this->config['tables']);
		$table = $this->frparam('model',1,false);
		if($table && is_array($tables) && in_array($table,$tables)){
			$id = $this->frparam('id',0);
			$w = [];
			
			if($id){
			    
			    $w = $this->frparam();
			    foreach ($w as $k=>$v){
			        if($k=='body'){
			            $w[$k] = $this->frparam($k,4);
			        }else{
			            $w[$k] = $this->frparam($k,1);
			        }
			        
			    }
			    
			    
			    $r = M($table)->update(['id'=>$id],$w);
			}else{
			    	switch($table){
    				case 'article':
    				$w = $this->frparam();
    				$w['title'] = $this->frparam('title',1);
    				$w['seo_title'] = $this->frparam('seo_title',1) ? $this->frparam('seo_title',1) : $w['title'];
    				$w['description'] = $this->frparam('description',1,'');
    				$w['keywords'] = $this->frparam('keywords',1,'');
    				$w['body'] = $this->frparam('body',4);
    				$w['tid'] = $this->frparam('tid',0,0);
    				if($w['tid']){
    					$w['htmlurl'] = $this->classtypedata[$w['tid']]['htmlurl'];
    				}
    			
    				$w = get_fields_data($w,'article');
    				
    				
    				break;
    				case 'product':
    				$w = $this->frparam();
    				$w['title'] = $this->frparam('title',1);
    				$w['seo_title'] = $this->frparam('seo_title',1) ? $this->frparam('seo_title',1) : $w['title'];
    				$w['description'] = $this->frparam('description',1,'');
    				$w['keywords'] = $this->frparam('keywords',1,'');
    				$w['body'] = $this->frparam('body',4);
    				$w['price'] = $this->frparam('price',3,0);
    				$w['stock_num'] = $this->frparam('stock_num',0,20);
    				$w['tid'] = $this->frparam('tid',0,0);
    				if($w['tid']){
    					$w['htmlurl'] = $this->classtypedata[$w['tid']]['htmlurl'];
    				}
    				$w = get_fields_data($w,'product');
    				
    				
    				
    				
    				break;
    				default:
    				
    				$w = $this->frparam();
    				$w = get_fields_data($w,$table);
    				
    				break;
    			}
    			$r = M($table)->add($w);
			}
		
			if($r){
				JsonReturn(['code'=>0,'msg'=>'操作成功！']);
			}else{
				JsonReturn(['code'=>1,'msg'=>'操作失败！']);
			}
		
			
		}else{
			JsonReturn(['code'=>1,'msg'=>'模块参数错误，操作失败！']);
		}
	}
	
	//IP审核
	function checkIp(){
		$ip = GetIP();//获取IP
		if($this->config['ischeckip']==1){
			$iplist = explode('||',$this->config['iplist']);
			if(!is_array($iplist) || !in_array($ip,$iplist)){
				JsonReturn(['code'=>1,'msg'=>'IP不在白名单！']);
			}
		}
		
	}
	//秘钥审核
	function checkKey(){
		$key = $this->config['key'];
		$current_key = $this->frparam('key',1);
		if($key!=$current_key){
			JsonReturn(['code'=>1,'msg'=>'秘钥错误！']);
		}
	}
	
	
}