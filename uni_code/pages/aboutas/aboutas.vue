<template>
	<view class="page">
		<view class="versions">
			<text>版本v{{appversion}}</text>
		</view>
		<view class="code">
			<image src="../../static/jxjs/jxjsseller.png" mode=""></image>
			<text>扫描二维码，可以下载商家版~</text>
		</view>
		<view class="code">
			<image src="https://hnmy.club/img/app.png" mode=""></image>
			<text>扫描二维码，您的朋友也可以使用或下载商城哦~</text>
		</view>
		<view class="code">
			<image src="https://hnmy.club/img/wechat.png" mode=""></image>
			<text>扫描二维码，可以关注我们的微信公众号哦~</text>
		</view>
		
		<view class="about-list">
				<view class="list" @click="jcgx()">
					<view class="title" >
						<text>检查更新</text>
					</view>
					<view class="more">
						<text class="iconfont icon-more"></text>
					</view>
				</view>
			<view class="list" @click="sybz()">
				<view class="title">
					<text>使用帮助</text>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view>
			<view class="list" @click="yszc()">
				<view class="title">
					<text>隐私政策</text>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view>
		</view>		
		<view class="copyright">
			<!-- <text>Copyright©2020 锦绣疆山商城</text> -->
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'appversion':'1.0',
			};
		},
		methods:{
			//检查更新
			jcgx(){
				uni.request({
					url:'https://api.hnmy.club/app/seller',
					method:'GET',
					success: (res) => {
						if(res.data.data.version>this.appversion){
							uni.showModal({
								title:'软件有更新了',
								content:'是否去更新',
								success: (res) => {
									if(res.confirm){
										void plus.runtime.openURL('https://pc.hnmy.club/src/jxjsseller.apk');
									// void plus.runtime.openURL(res.data.data.url);
									}
								}
							})
						}else{
							uni.showModal({
								title:'提示',
								content:'您已经是最新版本',
								showCancel:false,
							})
						}
					}
				})					
			},
			// 使用帮助
			sybz(){
				uni.setStorage({
					key:'url',
				    data:'https://pc.hnmy.club/sybz',
				});
				uni.navigateTo({
					url:'../web/web',
				})
			},
			// 隐私政策
			yszc(){
				uni.setStorage({
					key:'url',
				    data:'https://pc.hnmy.club/yszc',
				});
				uni.navigateTo({
					url:'../web/web',
				})
			}
		}
	}
</script>

<style scoped lang="scss">
	@import 'AboutUs.scss';
</style>
