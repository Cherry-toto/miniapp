<template>



<view>

<form catchsubmit="formSubmit" catchreset="formReset" id="search-form">
	<view class="cu-bar search bg-white">

		<view class="search-form round">
			<text class="cuIcon-search"></text>
			<input type="text" input="onKeyInput" id="search-input" name="input" confirm-type="search" placeholder="搜索文章、图片和视频" @confirm="formSubmit"></input>
		</view>
	 

	</view>
</form>
<tabBar :currentPage="currentPage"></tabBar>
</view>
</template>

<script>


var util = require("../../utils/util.js");

var wxApi = require("../../utils/wxApi.js");
var wxRequest = require("../../utils/wxRequest.js");

const app = getApp();

export default {
  data() {
    return {
      isArticlesList: true,
      shareTitle: this.$jzconfig.getWebsiteName,
      pageTitle: '搜索',
      articlesList: [],
      postype: "post",
	   currentPage:'search',
      webSiteName: this.$jzconfig.getWebsiteName,
      domain: this.$jzconfig.getDomain
    };
  },

  components: {},
  props: {},
  onShow: function () {},

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var postype = 'post';

    if (options.postype) {
      postype = options.postype;
    }

    this.setData({
      postype: postype
    });
  },
  onReady: function () {
    wx.setNavigationBarTitle({
      title: this.pageTitle
    });
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
        url = url + '?type=2&search=' + key;
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
    // 跳转至查看文章详情
    redictDetail: function (e) {
      Adapter.redictDetail(e, "post");
    }
  }
};
</script>
<style>
@import "./search.css";
</style>