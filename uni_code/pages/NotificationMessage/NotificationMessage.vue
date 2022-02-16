<template>
	<view class="page">
		<view class="inform-list">
			<view class="list" v-for="(item,index) in tz" :key="index">
				<view class="date">
					<text>09.13 09:20</text>
				</view>
				<view class="item" @click="gototz(item.url)">
					<view class="title">
						<text class="one-omit">{{item.title}}</text>
					</view>
					<view class="describe">
						<text class="two-omit">{{item.context}}</text>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				tz:[],
			};
		},
			
		methods:{
			// 查看详情
			gototz(url){
				uni.setStorage({
					key:'url',
				    data:url,
				});
				uni.navigateTo({
					url:'../web/web',
				})
			},
			//获取通知信息
			gettz(){
				uni.request({
					url:'https://api.hnmy.club/tz/seller',
					method:'POST',
					data:{
						'username':uni.getStorageSync('username'),
					},
					success: (res) => {
						this.tz = res.data;
						// console.log(res.data[0].)
					}
				})
			}
		},
		onShow() {
			this.gettz();
		},
	}
</script>

<style scoped lang="scss">
	@import 'NotificationMessage.scss';
</style>
