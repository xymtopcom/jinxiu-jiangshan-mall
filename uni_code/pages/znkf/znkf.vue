<template>
	<view>
		<view class="chatfather" style="margin-top: 10%;">
			<uni-card title="客服回复" thumbnail="https://hnmy.club/img/logo.jpg" extra="锦绣疆山商城" note="">
				{{reply}}
			</uni-card>
		</view>
		<view class="botton">
			<input type="text" value="" placeholder="说点什么吧"  v-model="keyword" class="textinput"/>
			<button type="default" @click="chat()" class="send">发送</button>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'keyword':'',
				'reply':'这里是智能客服的回复哦',
			}
		},
		methods: {
			chat(text){
				uni.request({
					url:'https://api.hnmy.club/app',
					method:'POST',
					data:{
						'text':this.keyword,
					},
					success: (res) => {
						// console.log(res.data.data.post)
						this.reply = res.data.data.post;
					}
				})
			}
		
		},
		onShow() {
			// this.chat()
		}
	}
</script>

<style>
@import url("./znkf.css");
</style>
