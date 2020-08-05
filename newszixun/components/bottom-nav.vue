<template>
	<view class="tabBar">
		<view
		 v-for="(item,index) in tabBar" 
		 :key="item.pagePath" 
		 class="tabbar_item" 
		 :class="{'active':item.pagePath == currentPage}"
		 @click="navTo(item)"
		 >
			<image v-if="item.pagePath == currentPage" :src="item.selectedIconPath" mode=""></image>
			<image v-else :src="item.iconPath" mode=""></image>
			<view class="text">{{item.text}}</view>
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
	import config from "../utils/config.js";
	export default {
		props:{
			currentPage:{
				type:String,
				default:'index'
			}
		},
		data() {
			return {
				tabBar:config.getTabbar
			};
		},
		created() {
			uni.hideTabBar({})
		},
		computed:{
			
		},
		methods:{
			navTo(item){
				console.log(item);
				if(item.pagePath !== this.currentPage){
					var isUrl = '/pages/'+item.pagePath+'/'+item.pagePath;
					const that = this
					uni.navigateTo({
						url: isUrl
					})
				} else{
					this.$parent.toTop()
				}
			}
		}
	}
</script>

<style lang="scss" scoped>
	//导航栏设置
		$isRadius:0upx; //左上右上圆角
		$isWidth:100vw; //导航栏宽度
		$isBorder:0px solid white; //边框 不需要则设为0px
		$isBg:white; //背景
	
	// 选中设置
		$chooseTextColor:#50B7EA; //选中时字体颜色
		$chooseBgColor:transparent; //选中时背景颜色 transparent为透明
	
	//未选中设置
		$normalTextColor:#999; //未选中颜色
	.tabBar{
		width: $isWidth;
		height: 100upx;
		position: fixed;
		bottom: 0;
		left: 0;
		right: 0;
		box-shadow: 0upx -2upx 10upx rgba(89,125,172,.4);
		margin:0 auto;
		z-index: 998;
		background-color: $isBg;
		color: $normalTextColor;
		border-left: $isBorder;
		border-top: $isBorder;
		border-right: $isBorder;
		display: flex;
		justify-content: space-around;
		border-top-right-radius: $isRadius;
		border-top-left-radius: $isRadius;
		box-sizing: border-box;
		overflow: hidden;
		.tabbar_item{
			width: 25%;
			font-size: 12px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			&.active{
				border-left: $isBorder;
				border-top: $isBorder;
				background: $chooseBgColor;
				color: $chooseTextColor;
			}
		}
		image{
			width: 48upx;
			height:48upx;
			margin-left: 5upx;
		}
	}
</style>
