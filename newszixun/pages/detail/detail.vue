<template>
<view>






<view>


	<!-- 文章 -->
	<view class="detail-content" :style="'display:' + display">
		<!-- 标题 -->
		<view class="entry-title">{{detail.title}}</view>
		<!-- 文章互动数据 -->
		<view class="entry-data">
			<image src="/static/images/calendar.png"></image>
			<text>{{detailDate}}</text>

			<image src="/static/images/pageviews.png"></image>
			<text>{{detail.hits}}</text>

		</view>
		<!-- 文章正文 -->
		<view class="entry-summary" id="entry-summary">
			
			
		
			
			 <view v-if="isvideo" class="uni-padding-wrap uni-common-mt">
				<view>
					<video id="myVideo" :src="video"
						@error="videoErrorCallback"  enable-danmu danmu-btn controls></video>
				</view>
				
			</view>
			<jyf-parser :html="article_article"   :use-cache="true"	></jyf-parser>
			

		</view>




		<!-- 猜你喜欢 -->
		<view v-if="postList.length != 0" class="relatedPost" :style="'display:' + display">
			<view class="subTitle">猜你喜欢</view>
			<view class="subTitle_line"></view>
			<block v-for="(item, index) in postList" :key="index">
				<navigator :url="'../detail/detail?id=' + item.id" open-type="redirect" hover-class="relatedNavigator">
					<view class="relatedText">{{index+1}}. {{item.title}}</view>
				</navigator>
			</block>
		</view>

	</view>



	<view class="ditail-copyright" :style="'display:' + display">
		<block data-type="template" data-is="tempCopyright" data-attr="webSiteName:webSiteName,domain:domain">
<view>  © 2020 {{webSiteName}} {{domain}} </view>
</block>
	</view>



	<!-- 无法访问网络时 -->
	<view class="showerror" :style="'display:' + showerror">
		<image src="/static/images/cry80.png" style="height:100rpx;width:100rpx"></image>
		<view class="errortext">{{errMessage}}</view>
	</view>

</view>
<tabBar :currentPage="currentPage"></tabBar>
</view>
</template>

<script>


var util = require("../../utils/util.js");

var wxApi = require("../../utils/wxApi.js");
var wxRequest = require("../../utils/wxRequest.js");
const innerAudioContext = wx.createInnerAudioContext();
let isFocusing = false;

let rewardedVideoAd = null;

export default {
  data() {
    return {
      detail: {
        content: {
          rendered: ""
        },
        title: {},
        acf: {}
      },
      content: {
        rendered: ""
      },
      title: {},
	  isvideo: false,
	  video: '',
      acf: {},
	  tid: 0,
	  currentPage:'details',
      defaultskin: this.$jzconfig.getskin,
      skin: this.$jzconfig.getskin,
      title: '文章内容',
      webSiteName: this.$jzconfig.getWebsiteName,
      html: " ",
      detailDate: '',
      display: 'none',
      showerror: 'none',
      page: 1,
      isLastPage: false,
      parentID: "0",
      scrollHeight: 0,
      postList: [],
      link: '',
      dialog: {
        title: '',
        content: '',
        hidden: true
      },
      content: '',
      flag: 1,
	   tagStyle: {
	      img: "height:auto!important;display:block"
	    },
      enableComment: true,
      isLoading: false,
      total_comments: 0,
      userInfo: {},
      shareImagePath: '',
      fristOpen: false,
      domain: this.$jzconfig.getDomain,
      platform: '',
      tagStyle: {},
      errMessage: "",
      commentCount: "",
      likeCount: "",
      postID: "",
      postImageUrl: "",
      commentsList: "",
      article_article: ""
    };
  },

  components: {},
  props: {},
  onShow: function (options) {
    var that = this;
    var skin = wx.getStorageSync('skin');

    if (skin != '') {
      that.setData({
        skin: skin
      });
    }
  },
  onLoad: function (options) {
    var self = this;
	if(!options.id){
		this.setData({
			showerror: 'block',
			errMessage: '链接错误！'
		})
		return false;
	}
    self.fetchDetailData(options.id);
    var that = this;
    var skin = wx.getStorageSync('skin');
	
    if (skin != '') {
      that.setData({
        skin: skin
      });
    }
  },
  onUnload: function () {},
  onShareAppMessage: function (res) {
    return {
      title: this.detail.title.rendered,
      path: 'pages/detail/detail?id=' + this.detail.id,
      imageUrl: this.detail.post_full_image,
      success: function (res) {
        // 转发成功
        console.log(res);
      },
      fail: function (res) {
        console.log(res); // 转发失败
      }
    };
  },
  methods: {
	     videoErrorCallback: function(e) {
	              uni.showModal({
	                  content: '视频无法播放',
	                  showCancel: false
	              })
	          },
    BackPage() {
      wx.navigateBack({
        delta: 1
      });
    },

    toHome() {
      wx.reLaunch({
        url: '/pages/index/index'
      });
    },

    gotowebpage: function () {
      var self = this;
      var url = '../webpage/webpage';
      wx.navigateTo({
        url: url + '?url=' + self.link
      });
    },
    copyLink: function (url) {
      wx.setClipboardData({
        data: url,
        success: function (res) {
          wx.getClipboardData({
            success: function (res) {
              wx.showToast({
                title: '链接已复制',
                image: "/static/images/uploads/link.png",
                duration: 2000
              });
            }
          });
        }
      });
    },
    copyText: function (e) {
      console.log(e);
      wx.setClipboardData({
        data: e.currentTarget.dataset.text,
        success: function (res) {
          wx.getClipboardData({
            success: function (res) {
              wx.showToast({
                title: '复制成功'
              });
            }
          });
        }
      });
    },
    gourl: function () {
      var url = '../webpage/webpage';
      wx.navigateTo({
        url: url + '?url=' + e.currentTarget.dataset.text
      });
    },
    goHome: function () {
      wx.switchTab({
        url: '../index/index'
      });
    },
	async putview(id,hits){
		const res = await this.$jzRequest({
			'url': '/GetData/savedata',
			'data': {model:'article',id: id,hits:hits } 
		})
	},
    async getRelative(){
		var self = this;
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'article',isshow:1,tid:self.tid,limit:5} 
		})
		if(res.data.data.code==1){
			self.setData({
			  showerror: 'block',
			  display: 'none',
			  errMessage: res.data.msg
			});
			return false;
		}
		this.postList = res.data.data;
	},
	async fetchDetailData(id){
		var self = this;
		const res = await this.$jzRequest({
			'url': '/GetData/index',
			'data': {model:'article',isshow:1,id:id} 
		})
		if(res.data.data.code==1){
			self.setData({
			  showerror: 'block',
			  display: 'none',
			  errMessage: res.data.msg
			});
			return false;
		}
		wx.setNavigationBarTitle({
		  title: res.data.data[0].title
		});
		if(res.data.data[0].video){
			
			self.setData({
				isvideo: true,
				video: res.data.data[0].video
			})
		}
		
		//let imgStrs = res.data.data[0].body.match(/<img.*?>/g);
		//var body = res.data.data[0].body.replace( /src=\"([^"]+)\"/,"src=\"https://"+this.$jzconfig.getDomain+"$1\"" );
		var reg = /src=\"([^"]+)\"/;
		var www = self.$jzconfig.getDomain;
		var body= res.data.data[0].body.replace(reg,function(a){
			//如果包含http ，indexOf方法如果包含返回0,所以加上!
		
		    if(a.indexOf('//')==-1){
		    	return a.replace( /src=\"([^"]+)\"/,"src=\"https://"+www+"$1\"" );
		    }
		    
		});
		
		
		setTimeout(() => {
		  self.article_article = body;
		}, 200);
		self.setData({
		  commentCount: "有" + res.data.data[0].comment_num + "条评论"
		});
		var date = new Date(parseInt(res.data.data[0].addtime)*1000);
		self.setData({
		  detail: res.data.data[0],
		  likeCount: 0,
		  postID: id,
		  link: '',
		  tid: res.data.data[0].tid,
		  detailDate: date.getFullYear()+'-'+date.getMonth()+'-'+date.getDate(),
		  display: 'block',
		  hits: res.data.data[0].hits,
		  total_comments: res.data.data[0].comment_num,
		  postImageUrl: res.data.data[0].litpic.indexOf('http')==-1 ? 'https://'+this.$jzconfig.getDomain+res.data.data[0].litpic : res.data.data[0].litpic
		});
		var hits = parseInt(res.data.data[0].hits)+1;
		this.putview(id,hits);
		this.getRelative();
		return res.data.data[0];
		
	}
	
  }
};
</script>
<style>
@import "./detail.css";
</style>