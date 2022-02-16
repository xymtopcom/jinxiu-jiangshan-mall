<template>
	<view class="content">
		<image src="https://hnmy.club/img/logo.png" mode="" class="logo"></image>
		<view class="">
		 <h2 style="margin-left: 30%;">锦绣疆山商城商家版</h2>
		</view>
		<view class="">
			<image src="https://pc.hnmy.club/src/appimg/1.jpg" mode="" style="width: 200px; height: 250px;margin-left: 30px;margin-top: 40px;"></image>
			<image src="https://pc.hnmy.club/src/appimg/2.jpg" mode="" style="width: 200px; height: 250px;margin-left: 30px;margin-top: 20px;"></image>
			<image src="https://pc.hnmy.club/src/appimg/3.jpg" mode="" style="width: 200px; height: 250px;margin-left: 30px;margin-top: 20px;"></image>
			<image src="https://pc.hnmy.club/src/appimg/4.jpg" mode="" style="width: 200px; height: 250px;margin-left: 30px;margin-top: 20px;"></image>
		</view>
		
		<button type="default" class="download" style="margin-top: 25%;color: #c9a062;" @click="download()">下载</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		onLoad() {

		},
		methods: {
           download(){
			
			 window.open("https://pc.hnmy.club/src/jxjsseller.apk") 
		   }
		}
	}
</script>

<style>
 *{
	 /* background-color: #007AFF; */
 }
  .content{
	  margin-top: 20px;
  }
  
 .logo{
	 width: 80px;
	 height: 80px;
	 margin-left: 40%;
 }
</style>
