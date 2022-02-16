<template>
	<view>
		<view class="senddd">
		<h2 class="ddh">订单号</h2>
		<h2 class="ddh2">{{orderid}}</h2>
		<h2>
		<input type="text" value="" placeholder="请输入快递单号" class="put" v-model="esmid"/>
		</h2>
		<button type="default" @click="send()">发货</button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'orderid':uni.getStorageSync('orderid'),
				'esmid':'',
			}
		},
		methods: {
			
			send(){
				uni.request({
					url:'https://api.hnmy.club/dd/update',
					method:'PUT',
					data:{
						'id':this.orderid,
						'emsid':this.esmid,
						'actionm':'已发货',
					},
					success: (res) => {
						// console.log(res.data.code)
						if(res.data.code == 200){
						uni.showToast({
							title:'发货成功',
							icon:'success'
						})
						 }else{
							uni.showToast({
								title:'发货失败',
								icon:'success'
							}) 
						 }
					}
				})
			}
		}
	}
</script>

<style>
	button{
		margin-top: 20%;
		width: 50%;
		
	}
	.senddd{
		margin-top: 35%;
	}
	.ddh{
		margin-top: 30%;
		margin-left: 35%;
	}
	.ddh2{
		margin-top: 10%;
		margin-left: 25%;
	}
	.put{
		margin-top: 10%;
		margin-left: 30%;
		margin-right: 10%;
	}
*{
	/* background-color: #007AFF; */
}
</style>
