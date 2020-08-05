<template>
<view>
<view class="container">
  <view class="showerror" :style="'display:' + showerror">
    <image src="/static/images/cry80.png" style="height:100rpx;width:100rpx"></image>

    <view class="errortext">
      暂时无法访问网络
      <view class>
        <button class="more-button" @tap="reload" size="mini">重新加载</button>
      </view>
    </view>
  </view>

  <view :style="'display:' + showallDisplay">

    <view class="post-list">
      <block v-for="(item, index) in postsList" :key="index">
        <view class="post-item" :index="index" :id="item.id" @tap="redictDetail">
          <image :src="item.post_medium_image" mode="aspectFill" class="post-img"></image>
          <view class="post-desc">
            <view class="post-title">
              <text>{{item.title}}</text>
            </view>
			<view class="post-des">
			  <text>{{item.title}}</text>
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
<tabBar :currentPage="currentPage"></tabBar>
  </view>

  <view class="copyright" :style="'display:' + floatDisplay">
    <block data-type="template" data-is="tempCopyright" data-attr="webSiteName:webSiteName,domain:domain">
<view>  © 2020 {{webSiteName}} {{domain}} </view>
</block>
  </view>
</view>
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
      title: '文章列表',
      postsList: {},
      pagesList: {},
      categoriesList: {},
      postsShowSwiperList: {},
      isLastPage: false,
	  currentPage:'hot',
      page: 1,
      search: '',
      categories: 0,
      categoriesName: '',
      categoriesImage: "",
      showerror: "none",
      isCategoryPage: "none",
      isSearchPage: "none",
      showallDisplay: "block",
      displaySwiper: "block",
      floatDisplay: "none",
      searchKey: "",
      topBarItems: [// id name selected 选中状态
      {
        id: '1',
        name: '浏览数',
        selected: true
      }],
      tab: '1',
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain
    };
  },

  components: {},
  props: {},
  onShareAppMessage: function () {
    var title = "分享“" + webSiteName + "”的热度排行。";
    var path = "pages/hot/hot";
    return {
      title: title,
      path: path,
      success: function (res) {// 转发成功
      },
      fail: function (res) {// 转发失败
      }
    };
  },
  onLoad: function (options) {
    var self = this;
    this.getArticle();
  },
 
 
  methods: {
    formSubmit: function (e) {
      var url = '../list/list';

      if (e.detail.value.input != '') {
        url = url + '?search=' + e.detail.value.input;
      }

      wx.navigateTo({
        url: url
      });
    },
    reload: function (e) {
      var self = this;
      self.getArticle();
    },
  
   async getArticle(){
   		var self = this;
   		
   		self.setData({
   		  isLoading: true
   		});
   		const res = await this.$jzRequest({
   			'url': '/GetData/index',
   			'data': {model:'article',orders:'hits desc',isshow:1,limit:this.$jzconfig.getPageCount} 
   		})
   		
   		
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
		var postsList = [];
   		for(var i=0;i<len;i++){
   			var date = new Date(parseInt(res.data.data[i].addtime)*1000);
   			console.log(res.data.data[i].addtime);
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
   		
   		self.setData({
   		  isLoading: false
   		});
   	
   		
   	},
   
	// 跳转至查看文章详情
    redictDetail: function (e) {
      // console.log('查看文章');
      var id = e.currentTarget.id,
          url = '../detail/detail?id=' + id;
      wx.navigateTo({
        url: url
      });
    }
  }
};
</script>
<style>
@import "./hot.css";
</style>