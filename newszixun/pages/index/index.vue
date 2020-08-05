<template>
<view>

<!-- 首次进入引导添加到“我的小程序” -->
<view class="addMyMiniapp" v-if="isFirst" @tap.stop="shutAddMyMiniapp">
	<view>点击加入我的小程序 ↑</view>
	<text>了解"{{webSiteName}}"最新文章</text>
</view>

<!-- 轮播图 -->
<view :style="'display:' + displaySwiper">
	<swiper indicator-dots="true" interval="10000" autoplay="true" indicator-color="rgba(0, 0, 0, .1)" indicator-active-color="rgba(0, 0, 0, .6)">
		<block v-for="(item, index) in postsShowSwiperList" :key="index">
			<swiper-item :id="item.id" :index="index" :data-redicttype="item.type" :data-appid="item.appid" :data-url="item.url" @tap="redictAppDetail">
				<image mode="aspectFill" :src="item.post_full_image"></image>
				<view class="swiper-mask"></view>
				<view class="swiper-desc">
					<text>{{item.post_title}}</text>
				</view>
			</swiper-item>
		</block>
	</swiper>
</view>

<view :style="'display:' + showallDisplay">
	<!-- 图标导航和搜索 -->
	<view :style="'display:' + floatDisplay">

		<!-- 精选栏目 -->
		<view class="selected-nav" v-if="topNav.length != 0">

			<!-- 栏目列表 -->
			<scroll-view scroll-x>
				<view class="top-Nav">
					<block v-for="(item, index) in topNav" :key="index">
						<view class="top-item " @tap.stop="onNavRedirect" :id="item.id" :data-redicttype="item.redirecttype" :data-url="item.url" :data-appid="item.appid" :data-extraData="item.extraData">
							<view>
								<image :src="item.image"></image>
							</view>
							<view>
								<text class="text-blue-title">{{item.name}}</text>
							</view>
						</view>
					</block>

				</view>
			</scroll-view>
		</view>



		<!-- 搜索 -->
		<!-- <form catchsubmit="formSubmit" catchreset="formReset" id="search-form">
      <view class="search-box">
        <input value="" id="search-input" name="input" confirm-type="search" class="search-input" placeholder="搜索你感兴趣的内容..." bindconfirm="formSubmit"></input>
        <button class="search-button" form-type="submit" size="mini" plain="true">
          <icon type="search" color="#959595" size="16" />
        </button>
      </view>
    </form> -->

	</view>
	<!-- 文章列表 -->
	<view class="container">
		<!-- 列表template模板 -->
		<block data-type="template" data-is="tempCommonList" data-attr="postsList:postsList,listAdsuccess:listAdsuccess">

  <view class="post-list">
    <block v-for="(item, index) in postsList" :key="index">
      <view class="post-item" :index="index" :id="item.id" @tap="redictDetail">
        <image :src="item.post_medium_image" mode="aspectFill" class="post-img"></image>
        <view class="post-desc">
          <view class="post-title">
            <text>{{item.title}}</text>
          </view>
		  <view class="post-des">
		    <text>{{item.description}}</text>
		  </view>
          <view class="post-data">
            <image src="/static/images/calendar.png"></image>
            <text>{{item.date}}</text>
          
            <image src="/static/images/pageviews.png"></image>
            <text class>{{item.pageviews}}</text>
          </view>
        </view>
      </view>
    </block>
  </view>
</block>
		<view :style="'display:' + (isLoading?'block':'none')">
			<template is="tempLoading"></template>
		</view>
		<!-- 无更多文章提示 -->
		<view class="loadingmore" :style="'display:' + floatDisplay">

			<view class="no-more" :hidden="!isLastPage">- 无更多文章 -</view>
		</view>
		<!-- 版权信息template模板 -->
		<view class="copyright" :style="'display:' + floatDisplay">
			<block data-type="template" data-is="tempCopyright" data-attr="webSiteName:webSiteName,domain:domain">
<view>  © 2020 {{webSiteName}} {{domain}} </view>
<view></view>
<view></view>
<view></view>
</block>
		</view>
	</view>
</view>

<!-- 无法访问网络 -->
<view class="showerror" :style="'display:' + showerror">
	<image src="/static/images/cry80.png" style="height:100rpx;width:100rpx"></image>
	<view class="errortext">
		暂时无法访问网络，下拉重试...
	</view>
</view>

<tabBar :currentPage="currentPage"></tabBar>
</view>
</template>

<script>
/*
 * 
 * JIZHICMS版微信小程序
 * author: 如沐春
 * organization: 极致资讯小程序  www.jizhicms.cn
 * 开源协议：GPL
 * Copyright (c) 2017 https://www.jizhicms.cn All rights reserved.
 */

var util = require("../../utils/util.js");
var wxApi = require("../../utils/wxApi.js");
var wxRequest = require("../../utils/wxRequest.js");

export default {
  data() {
    return {
		currentPage:'index',
      postsList: [],
      postsShowSwiperList: [],
      isLastPage: false,
      page: 1,
      search: '',
      categories: 0,
      showerror: "none",
      showCategoryName: "",
      categoryName: "",
      showallDisplay: "block",
      displayHeader: "none",
      displaySwiper: "none",
      floatDisplay: "block",
      displayfirstSwiper: "none",
      topNav: this.$jzconfig.getIndexNav,
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain,
      isFirst: false,
      // 是否第一次打开,
      isLoading: false
    };
  },

  components: {},
  props: {},
  onShareAppMessage: function () {
    return {
      title: '“' + webSiteName + '”小程序,基于极致CMS构建',
      path: 'pages/index/index',
      success: function (res) {// 转发成功
      },
      fail: function (res) {// 转发失败
      }
    };
  },
  onPullDownRefresh: function () {
    var self = this;
    self.setData({
      showerror: "none",
      showallDisplay: "block",
      displaySwiper: "block",
      floatDisplay: "block",
      isLastPage: false,
      page: 1,
      postsShowSwiperList: []
    });
    this.getCollect();
    this.getArticle(self);
  },
  onReachBottom: function () {
    var self = this;
    if (!self.isLastPage) {
      self.setData({
        page: self.page + 1
      });
      console.log('当前页' + self.page);
      this.getArticle(self);
    } else {
      console.log('最后一页');
    }
  },
  onLoad: function (options) {
    var self = this;
    self.getCollect();
	this.getArticle(self)
	
    //self.fetchPostsData(self); // 判断用户是不是第一次打开，弹出添加到我的小程序提示
    var isFirstStorage = wx.getStorageSync('isFirst'); // console.log(isFirstStorage);
    if (!isFirstStorage) {
      self.setData({
        isFirst: true
      });
      wx.setStorageSync('isFirst', 'no'); // console.log(wx.getStorageSync('isFirst'));

      setTimeout(function () {
        self.setData({
          isFirst: false
        });
      }, 5000);
	  
    }
  },
  onShow: function (options) {
    wx.setStorageSync('openLinkCount', 0);
    var nowDate = new Date();
    nowDate = nowDate.getFullYear() + "-" + (nowDate.getMonth() + 1) + '-' + nowDate.getDate();
    nowDate = new Date(nowDate).getTime();
  },
  methods: {
    formSubmit: function (e) {
      var url = '../list/list';
      var key = '';

      if (e.currentTarget.id == "search-input") {
        key = e.detail.value;
      } else {
        key = e.detail.value.input;
      }

      if (key != '') {
        url = url + '?search=' + key;
        wx.navigateTo({
          url: url
        });
      } else {
        wx.showModal({
          title: '提示',
          content: '请输入内容',
          showCancel: false
        });
      }
    },
	async getCollect(){
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'collect',tid:1,isshow:1} 
		})
		
		var itemlist = [];
		var len = res.data.data.length;
		for(var i=0;i<len;i++){
			itemlist[i] = {
				post_full_image: res.data.data[i].litpic.indexOf('https://')==-1 ? 'https://'+this.$jzconfig.getDomain+res.data.data[i].litpic : res.data.data[i].litpic,
				url: res.data.data[i].url,
				id: res.data.data[i].id,
				post_title: res.data.data[i].title,
				type: 'webpage'
				}
		}
		this.postsShowSwiperList = itemlist
		this.displaySwiper = 'block'
		
	},
	async getArticle(data){
		var self = this;
		if (!data) data = {};
		if (!data.page) data.page = 1;
		if (!data.categories) data.categories = 0;
		if (!data.search) data.search = '';
		
		if (data.page === 1) {
		  self.setData({
		    postsList: []
		  });
		}
		
		;
		self.setData({
		  isLoading: true
		});
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'article',orders:'orders desc,addtime desc',isshow:1,page:data.page,limit:this.$jzconfig.getPageCount} 
		})
		
		var postsList = this.postsList;
		var len = res.data.data.length;
		if(len==0){
			if (data.page == 1) {
			  self.setData({
			    showerror: "block",
			    floatDisplay: "none"
			  });
			} else {
			 self.setData({
			   isLastPage: true,
			   isLoading: false,
			   floatDisplay: 'block'
			 });
			 wx.showToast({
			   title: '没有更多内容',
			   mask: false,
			   duration: 1500
			 });
			}
			return;
		
		}
		for(var i=0;i<len;i++){
			var date = new Date(parseInt(res.data.data[i].addtime)*1000);
			
			postsList.push({
				post_medium_image: res.data.data[i].litpic.indexOf('https://')==-1 ? 'https://'+this.$jzconfig.getDomain+res.data.data[i].litpic : res.data.data[i].litpic,
				url: res.data.data[i].url,
				id: res.data.data[i].id,
				title: res.data.data[i].title,
				pageviews: res.data.data[i].hits,
				date: date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate(),
				description: res.data.data[i].description
				})
		}
		this.postsList = postsList;
		wx.hideLoading();
		self.setData({
		  isLoading: false
		});
		wx.stopPullDownRefresh();
		
	},
   //加载分页
    loadMore: function (e) {
      var self = this;

      if (!self.isLastPage) {
        self.setData({
          page: self.page + 1
        }); //console.log('当前页' + self.data.page);

        //this.fetchPostsData(self);
		this.getArticle(self)
      } else {
        wx.showToast({
          title: '没有更多内容',
          mask: false,
          duration: 1000
        });
      }
    },
    // 跳转至查看文章详情
    redictDetail: function (e) {
      // console.log('查看文章');
      var id = e.currentTarget.id,
          url = '../detail/detail?id=' + id;
      wx.navigateTo({
        url: url
      });
    },
    //首页图标跳转
    onNavRedirect: function (e) {
      var redicttype = e.currentTarget.dataset.redicttype;
      var url = e.currentTarget.dataset.url == null ? '' : e.currentTarget.dataset.url;
      var appid = e.currentTarget.dataset.appid == null ? '' : e.currentTarget.dataset.appid;
      var extraData = e.currentTarget.dataset.extraData == null ? '' : e.currentTarget.dataset.extraData;

      if (redicttype == 'apppage') {
        //跳转到小程序内部页面         
        wx.navigateTo({
          url: url
        });
      } else if (redicttype == 'webpage') //跳转到web-view内嵌的页面
        {
          url = '../webpage/webpage?url=' + url;
          wx.navigateTo({
            url: url
          });
        } else if (redicttype == 'miniapp') //跳转到其他app
        {
          wx.navigateToMiniProgram({
            appId: appid,
            envVersion: 'release',
            path: url,
            extraData: extraData,

            success(res) {// 打开成功
            },

            fail: function (res) {
              console.log(res);
            }
          });
        }
    },
    // 跳转至查看小程序列表页面或文章详情页
    redictAppDetail: function (e) {
      // console.log('查看文章');
      var id = e.currentTarget.id;
      var redicttype = e.currentTarget.dataset.redicttype;
      var url = e.currentTarget.dataset.url == null ? '' : e.currentTarget.dataset.url;
      var appid = e.currentTarget.dataset.appid == null ? '' : e.currentTarget.dataset.appid;

      if (redicttype == 'detailpage') //跳转到内容页
        {
          url = '../detail/detail?id=' + id;
          wx.navigateTo({
            url: url
          });
        }

      if (redicttype == 'apppage') {
        //跳转到小程序内部页面         
        wx.navigateTo({
          url: url
        });
      } else if (redicttype == 'webpage') //跳转到web-view内嵌的页面
        {
          url = '../webpage/webpage?url=' + url;
          wx.navigateTo({
            url: url
          });
        } else if (redicttype == 'miniapp') //跳转到其他app
        {
          wx.navigateToMiniProgram({
            appId: appid,
            envVersion: 'release',
            path: url,

            success(res) {// 打开成功
            },

            fail: function (res) {
              console.log(res);
            }
          });
        }
    },
    //返回首页
    redictHome: function (e) {
      //console.log('查看某类别下的文章');  
      var id = e.currentTarget.dataset.id,
          url = '/pages/index/index';
      wx.switchTab({
        url: url
      });
    }
  }
};
</script>
<style>
@import "./index.css";
</style>