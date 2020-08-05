<template>
<view>
<template name="tempCommonList">

  <view class="post-list">
    <block v-for="(item, index) in postsList" :key="index">
    <view class="list-item-ad" :index="index" v-if="index%item.listAdEvery ==0  && index!=0 && item.listAd =='1' && item.listAdId !=''  && listAdsuccess">
        <block v-if="(index/item.listAdEvery)%2==0">
					<ad :unit-id="item.videoAdId" ad-type="video" ad-theme="white" @error="adbinderror"></ad>
				</block>
        <block v-else>
        <ad :unit-id="item.listAdId" ad-intervals="30" @error="adbinderror"></ad>
        </block>
      </view>
      <view class="post-item" :index="index" :id="item.id" @tap="redictDetail">
        <image :src="item.post_medium_image" mode="aspectFill" class="post-img"></image>
        <view class="post-desc">
          <view class="post-title">
            <text>{{item.title.rendered}}</text>
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
</template>
</view>
</template>


	<script> 
		
		export default {
			props: []
		}
    </script> 
    
									