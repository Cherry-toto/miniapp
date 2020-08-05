<template>
<view>


<view class="container" :style="'display:' + display">

<view class="entry-title-class">{{pageData.classname}}</view>
    <view class="wrapper">
		
        <view class="excerpt">
          
            <jyf-parser :html="article_article"></jyf-parser>

        </view>
     
       
    </view>
   
      <view class="copyright">
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
      title: '页面内容',
	  article_title: '',
      pageData: {},
	  currentPage:'about',
      pagesList: {},
	  tid: this.$jzconfig.getAboutId,
      display: 'none',
      wxParseData: [],
      dialog: {
        title: '',
        content: '',
        hidden: true
      },
      system: "",
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain,
      article_article: ""
    };
  },

  components: {},
  props: {},
  onLoad: function (options) {
    var self = this;
    this.fetchData();
    wx.getSystemInfo({
      success: function (t) {
        var system = t.system.indexOf('iOS') != -1 ? 'iOS' : 'Android';
        self.setData({
          system: system
        });
      }
    });
  },
  onPullDownRefresh: function () {
    var self = this;
    self.setData({
      display: 'none',
      pageData: {},
      wxParseData: {}
    });
    this.fetchData(); //消除下刷新出现空白矩形的问题。

    wx.stopPullDownRefresh();
  },
  onShareAppMessage: function () {
    return {
      title: '关于“' + this.webSiteName + '”官方小程序',
      path: 'pages/about/about',
      success: function (res) {// 转发成功
      },
      fail: function (res) {// 转发失败
      }
    };
  },
  methods: {
    gotowebpage: function () {
      var self = this;
      var enterpriseMinapp = self.pageData.enterpriseMinapp;
      var url = '';

      if (enterpriseMinapp == "1") {
        url = '../webpage/webpage?';
        wx.navigateTo({
          url: url
        });
      } else {
        self.copyLink(this.$jzconfig.getDomain);
      }
    },
    copyLink: function (url) {
      //this.ShowHideMenu();
      wx.setClipboardData({
        data: url,
        success: function (res) {
          wx.getClipboardData({
            success: function (res) {
              wx.showToast({
                title: '链接已复制',
                image: "/static/images/link.png",
                duration: 2000
              });
            }
          });
        }
      });
    },
    //给a标签添加跳转和复制链接事件
    wxParseTagATap: function (e) {
      var self = this;
      var href = e.currentTarget.dataset.src;
      console.log(href);
      var domain = this.$jzconfig.getDomain; //我们可以在这里进行一些路由处理

      if (href.indexOf(domain) == -1) {
        wx.setClipboardData({
          data: href,
          success: function (res) {
            wx.getClipboardData({
              success: function (res) {
                wx.showToast({
                  title: '链接已复制',
                  //icon: 'success',
                  image: "/static/images/link.png",
                  duration: 2000
                });
              }
            });
          }
        });
      } else {
        var slug = util.GetUrlFileName(href, domain);

        if (slug == 'index') {
          wx.switchTab({
            url: '../index/index'
          });
        } else {
          var getPostSlugRequest = wxRequest.getRequest(Api.getPostBySlug(slug));
          getPostSlugRequest.then(res => {
            var postID = res.data[0].id;
            var openLinkCount = wx.getStorageSync('openLinkCount') || 0;

            if (openLinkCount > 4) {
              wx.redirectTo({
                url: '../detail/detail?id=' + postID
              });
            } else {
              wx.navigateTo({
                url: '../detail/detail?id=' + postID
              });
              openLinkCount++;
              wx.setStorageSync('openLinkCount', openLinkCount);
            }
          });
        }
      }
    },
    async fetchData () {
		var tid = this.tid;
		var self = this;
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'classtype',id: tid} 
		})
		wx.setNavigationBarTitle({
		  title: res.data.data[0].classname,
		  success: function (res) {// success
		  }
		});
		//WxParse.wxParse('article', 'html', response.data.post_content, self, 5)
		var body = res.data.data[0].body.replace( /src=\"([^"]+)\"/,"src=\"https://"+this.$jzconfig.getDomain+"$1\"" );
		setTimeout(() => {
		  self.article_article = body;
		}, 200);
		self.setData({
		  pageData: res.data.data[0]
		});
		self.setData({
		  display: 'block'
		});
     
    }
  }
};
</script>
<style>
@import "./about.css";
</style>