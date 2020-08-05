<template>
<view>

<!--<import src="../../templates/common-list.wxml"></import>-->
<!--<import src="../../templates/copyright.wxml"></import>-->
<!--<import src="../../templates/loading.wxml"></import>-->

<view class="topic-common-list" :style="'display:' + isCategoryPage">
  
</view>


<view class="topic-common-list" :style="'display:' + isSearchPage">
  <view class="topic-list-item">
    <image src="/static/images/website-search.png" class="cover" mode="aspectFill"></image>
    <view class="topic-content-brief">
      <view class="topic-content-title">
        <text>搜索关键字：</text>
        <text class="searchKey">{{searchKey}}</text>
      </view>
      <text class="search-tips">* 本搜索是全文搜索</text>
    </view>
  </view>
</view>

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
    <block data-type="template" data-is="tempCommonList" data-attr="postsList">

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

    <view class="loadingmore" :style="'display:' + floatDisplay">
      <view class="no-more" :hidden="!isLastPage">- 无更多文章 -</view>
    </view>

  </view>

  <view class="copyright" :style="'display:' + floatDisplay">
   <block data-type="template" data-is="tempCopyright" data-attr="webSiteName:webSiteName,domain:domain">
<view>  © 2020 {{webSiteName}} {{domain}} </view>
</block>
  </view>
</view>

<tabBar :currentPage="currentPage"></tabBar>

</view>
</template>

<script>


var util = require("../../utils/util.js");
var wxApi = require("../../utils/wxApi.js");
var wxRequest = require("../../utils/wxRequest.js");


export default {
  data() {
    return {
	  currentPage: 'index',
      title: '文章列表',
      postsList: {},
      pagesList: {},
      categoriesList: {},
      postsShowSwiperList: {},
      isLastPage: false,
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
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain,
      isLoading: false,
	  type: 0
    };
  },

  components: {},
  props: {},
  onShareAppMessage: function () {
    var title = "分享“" + webSiteName + "”";
    var path = "";

    if (this.categories && this.categories != 0) {
      title += "的专题：" + this.categoriesList.name;
      path = 'pages/list/list?type=0&tid=' + this.categoriesList.id;
    } else {
      title += "的搜索内容：" + this.searchKey;
      path = 'pages/list/list?type=2&search=' + this.searchKey;
    }

    return {
      title: title,
      path: path,
      success: function (res) {// 转发成功
      },
      fail: function (res) {// 转发失败
      }
    };
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
    var self = this; // 设置插屏广告

	if(options.type==1){
		 self.setData({
			 showallDisplay: "block",
			 type: options.type
		 })
		
		 this.getArticle(self);
	}else if(options.type==2){
		if (options.search && options.search != '') {
		  wx.setNavigationBarTitle({
		    title: "搜索"
		  });
		  self.setData({
		    search: options.search,
		    isSearchPage: "block",
		    searchKey: options.search,
			currentPage: 'search',
			type: options.type
		  });
		  this.getArticle(self);
		}
	}else{
		if (options.tid && options.tid != 0) {
		  self.setData({
		    categories: options.tid,
		    isCategoryPage: "block",
			type: options.type
		  });
		  self.fetchCategoriesData(options.tid);
		}
		
		
		
	}
    
	
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

      if (self.categories && self.categories != 0) {
        self.setData({
          isCategoryPage: "block",
          showallDisplay: "none",
          showerror: "none"
        });
        self.fetchCategoriesData(self.categories);
      }

      if (self.search && self.search != '') {
        self.setData({
          isSearchPage: "block",
          showallDisplay: "none",
          showerror: "none",
          searchKey: self.search
        });
      }

      self.getArticle(self);
    },
    //加载分页
    loadMore: function (e) {
      var self = this;

      if (!self.isLastPage) {
        self.setData({
          page: self.page + 1
        });
        console.log('当前页' + self.page);
        this.getArticle(self);
      } else {
        wx.showToast({
          title: '没有更多内容',
          mask: false,
          duration: 1000
        });
      }
    },
    //获取文章列表数据
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
			if(this.type==0){
				//栏目
				var postdata = {model:'article',tid: data.categories,orders:'orders desc,addtime desc',isshow:1,page:data.page,limit:this.$jzconfig.getPageCount};
				var url = '/GetData/getDataPage';
			}else if(this.type==1){
				//推荐
				var postdata =  {model:'article',orders:'istuijian desc,orders desc',isshow:1,page:data.page,limit:this.$jzconfig.getPageCount};
				var url = '/GetData/getDataPage';
			}else{
				//搜索
				var postdata =  {model:'article',isshow:1,page:data.page,limit:this.$jzconfig.getPageCount,search: 'title,body',word: this.searchKey};
				var url = '/GetData/getDataSearch';
			}
			
			const res = await this.$jzRequest({
    			'url': url,
    			'data': postdata 
    		})
    		console.log(res);
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
			//检查条数
			if(len<this.$jzconfig.getPageCount){
				self.setData({
				  floatDisplay: 'block',
				  isLastPage: true
				});
			}
			
    		this.postsList = postsList;
    		wx.hideLoading();
    		self.setData({
    		  isLoading: false
    		});
    		wx.stopPullDownRefresh();
    		
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
	//获取分类列表
	async fetchCategoriesData(id){
		var self = this;
		self.setData({
		  categoriesList: []
		});
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'classtype',isshow:1,id: id} 
		})
		if(res.data.data){
			self.setData({
			  categoriesList: res.data.data,
			  categoriesImage: res.data.data[0].litpic.indexOf('https')==-1 ?  this.$jzconfig.getDomain+res.data.data[0].litpic : res.data.data[0].litpic,
			  categoriesName: res.data.data[0].classname
			});
			uni.setNavigationBarTitle({
			    title: res.data.data[0].classname
			});
		}
		self.getArticle(self);
		
	}
    
   
  }
};
</script>
<style>
@import "./list.css";
</style>