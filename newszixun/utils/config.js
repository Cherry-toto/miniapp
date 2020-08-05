/*
 * 
 * JIZHICMS版微信小程序
 * author: 如沐春
 * organization: 极致资讯小程序  www.jizhicms.cn
 * 开源协议：GPL
 * Copyright (c) 2017 https://www.jizhicms.cn All rights reserved.
 */
//配置域名,域名只修改此处。
var DOMAIN = "mini.jizhicms.cn";

var WEBSITENAME = "极致资讯小程序"; //网站名称

var PAGECOUNT = '10'; //每页文章数目

var ABOUT_ID = 5; //关于我们栏目的ID，公司简介栏目ID

var ZANIMAGEURL = ''; //微信鼓励的图片链接，用于个人小程序的赞赏

var LOGO = "https://mini.jizhicms.cn/static/upload/202008037166.png"; // 网站的logo图片
//设置downloadFile合法域名,不带https ,在中括号([])里增加域名，格式：{id=**,domain:'www.**.com'}，用英文逗号分隔。
//此处设置的域名和小程序与小程序后台设置的downloadFile合法域名要一致。

var DOWNLOADFILEDOMAIN = [{
  id: 1,
  domain: DOMAIN
}]; //首页图标导航
//参数说明：'name'为名称，'image'为图标路径，'url'为跳转的页面，'redirecttype'为跳转的类型，apppage为本小程序的页面，miniapp为其他微信小程序,webpage为web-view的页面
//redirecttype 是 miniapp 就是跳转其他小程序  url 为其他小程序的页面
//redirecttype 为 apppage 就是跳转本小程序的页面，url为本小程序的页面路径
//redirecttype 为 webpage 是跳转网址，是通过web-view打开网址，url就是你要打开的网址，不过这个网址的域名要是业务域名
//'appid' 当redirecttype为miniapp时，这个值为其他微信小程序的appid，如果redirecttype为apppage，webpage时，这个值设置为空。
//'extraData'当redirecttype为miniapp时，这个值为提交到其他微信小程序的参数，如果redirecttype为apppage，webpage时，这个值设置为空。

//type=1 表示排序按 istuijian desc   type=2 表示搜索列表  type=0 正常栏目列表
var INDEXNAV = [{
  id: '1',
  name: '精选推文',
  image: "/static/images/uploads/nav_icon1.png",
  url: '/pages/list/list?type=1',
  redirecttype: 'apppage',
  appid: ' ',
  extraData: ''
}, {
  id: '2',
  name: '建站技术',
  image: "/static/images/uploads/nav_icon2.png",
  url: '/pages/list/list?type=0&tid=1',
  redirecttype: 'apppage',
  appid: ' ',
  extraData: ''
}, {
  id: '3',
  name: '小程序',
  image: "/static/images/uploads/nav_icon4.png",
  url: '/pages/list/list?type=0&tid=3',
  redirecttype: 'apppage',
  appid: ' ',
  extraData: ''
}, {
  id: '4',
  name: '视频教程',
  image: "/static/images/uploads/nav_icon5.png",
  url: '/pages/list/list?type=0&tid=4',
  redirecttype: 'apppage',
  appid: ' ',
  extraData: ''
}];
//自定义底部导航
var TABBAR = [
	{
		"pagePath": "index",
		"iconPath": "/static/images/tab-home.png",
		"selectedIconPath": "/static/images/tab-home-on.png",
		"text": "首页"
	},
	{
		"pagePath": "topic",
		"iconPath": "/static/images/tab-topic.png",
		"selectedIconPath": "/static/images/tab-topic-on.png",
		"text": "专题"
	},
	{
		"pagePath": "hot",
		"iconPath": "/static/images/tab-rank.png",
		"selectedIconPath": "/static/images/tab-rank-on.png",
		"text": "排行"
	},
	{
		"pagePath": "search",
		"iconPath": "/static/images/tab-find.png",
		"selectedIconPath": "/static/images/tab-find-on.png",
		"text": "发现"
	},
	{
		"pagePath": "about",
		"iconPath": "/static/images/tab-my.png",
		"selectedIconPath": "/static/images/tab-my-on.png",
		"text": "关于"
	}];




export default {
  getDomain: DOMAIN,
  getWebsiteName: WEBSITENAME,
  getPageCount: PAGECOUNT,
  getIndexNav: INDEXNAV,
  getTabbar: TABBAR,
  getZanImageUrl: ZANIMAGEURL,
  getLogo: LOGO,
  getDownloadFileDomain: DOWNLOADFILEDOMAIN,
  getAboutId: ABOUT_ID
};