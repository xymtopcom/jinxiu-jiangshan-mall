<template>
	<view>
		<view class="content">
			<image src="https://hnmy.club/img/logo.png" mode="" class="logo"></image>
		</view>
		<button type="default" class="download" style="margin-top: 10%;color: #c9a062; width: 200px;" @click="goto(1)">商城软件版</button>
		<button type="default" class="download" style="margin-top: 10%;color: #c9a062; width: 200px;" @click="goto(2)">商家版</button>
		<button type="default" class="download" style="margin-top: 10%;color: #c9a062; width: 200px;" @click="goto(3)">商城web版</button>
		<button type="default" class="download" style="margin-top: 10%;color: #c9a062; width: 200px;" @click="goto(4)">商家web版</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		methods: {
			goto(id){
				if(id==1){
					uni.navigateTo({
						url:'../home/home'
					})
				}else if(id==2){
					uni.navigateTo({
						url:'../seller/seller',
					})
				}else if(id==3){
					window.location.href="https://m.hnmy.club";   
				}else{
					window.location.href="http://seller.hnmy.club"; 
				}
			}
		}
	}
</script>

<style>
	.{
		
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
