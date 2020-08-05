<template>
<view>
<!--<import src="../../templates/copyright.wxml"></import>-->


<view class="topic-list clearfix">
  <block v-for="(item, index) in categoriesList" :key="index">
    <view class="list-item">
      <view>
        <image :src="item.litpic" class="topic-img" :data-item="item.classname" :data-id="item.id" @tap="redictIndex" mode="aspectFill"></image>
      </view>
      <view class="topic-name-box" :data-item="item.classname" :data-id="item.id" @tap="redictIndex">
        <view class="topic-name">
          <text>{{item.classname}}</text>
        </view>
        
      </view>
      <view class="topic-brief" :data-item="item.classname" :data-id="item.id">
        <text>{{item.description}}</text>
      </view>
    </view>
  </block>
</view>

<!-- 未登录时弹出的登录框 -->

<!-- 版权信息 -->
<view class="copyright" :style="'display:' + floatDisplay">
   <block data-type="template" data-is="tempCopyright" data-attr="webSiteName:webSiteName,domain:domain">
<view>  © 2020 {{webSiteName}} {{domain}} </view>
</block>
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
      text: "Page topic",
      categoriesList: {},
	   currentPage:'topic',
      floatDisplay: "none",
      userInfo: {},
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain
    };
  },

  components: {},
  props: {},
  onLoad: function (options) {
    wx.setNavigationBarTitle({
      title: '模板'
    });
    this.getClass();
  },
  onShow: function () {},
  onShareAppMessage: function () {
    return {
      title: '分享“' + config.getWebsiteName + '”的模板栏目.',
      path: 'pages/topic/topic',
      success: function (res) {// 转发成功
      },
      fail: function (res) {// 转发失败
      }
    };
  },
  methods: {
    //获取分类列表
    async getClass() {
      var self = this;
      self.setData({
        categoriesList: []
      });
	  const res = await this.$jzRequest({
	  	'url': '/GetData/index',
	  	'data': {model:'classtype',orders:'id asc',isshow:1,pid:0,molds: 'article'} 
	  })
	  var len = res.data.data.length;
	  if(len){
		  var newclass = []
		  console.log(res.data.data);
		  for(var i=0;i<len;i++){
			  newclass[i] = res.data.data[i]
			  newclass[i].litpic = 'https://'+this.$jzconfig.getDomain+res.data.data[i].litpic;
		  }
	  }
	  
	  self.setData({
	    floatDisplay: "block",
		categoriesList: newclass
	  })
     
    },
    reloadData: function (id) {
      var self = this;
      var newCategoriesList = [];
      var categoriesList = self.categoriesList;

      for (var i = 0; i < categoriesList.length; i++) {
        if (categoriesList[i].id == id) {}

        newCategoriesList.push(categoriesList[i]);
      }

      if (newCategoriesList.length > 0) {
        self.setData({
          categoriesList: newCategoriesList
        });
      }
    },
    //跳转至某分类下的文章列表
    redictIndex: function (e) {
      //console.log('查看某类别下的文章');  
      var id = e.currentTarget.dataset.id;
      var name = e.currentTarget.dataset.item;
      var url = '../list/list?type=0&tid=' + id;
      wx.navigateTo({
        url: url
      });
    }
  }
};
</script>
<style>
@import "./topic.css";
</style>