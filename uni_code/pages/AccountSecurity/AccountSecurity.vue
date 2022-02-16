<template>
	<view class="page">
		<!-- 安全设置列表 -->
		<view class="security-list">
			<!-- <view class="list">
				<view class="content">
					<view class="title">
						<text>实名认证</text>
					</view>
					<view class="describe">
						<text>完成实名认证，尊享更多服务</text>
					</view>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view> -->
			<!-- <view class="list" @click="onSecurity('relevance')"> -->
				<!-- <view class="content"> -->
					<!-- <view class="title">
						<text>账号关联</text>
					</view> -->
				<!-- 	<view class="describe">
						<text>可用使用微信快速登录</text>
					</view> -->
				<!-- </view> -->
				<!-- <view class="more"> -->
					<!-- <text class="iconfont icon-more"></text> -->
				<!-- </view> -->
			<!-- </view> -->
			<view class="list" @click="password(userdata.phone)">
				<view class="content">
					<view class="title">
						<text>修改登录密码</text>
					</view>
					<view class="describe">
						<text>建议您定期更改密码以保护账户安全</text>
					</view>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view>
			<view class="list" @click="phone()">
				<view class="content">
					<view class="title">
						<text>修改手机号</text>
					</view>
					<view class="describe">
						<text>若手机更换请尽快修改</text>
					</view>
				</view>
				<view class="more">
					<!-- <text>{{userdata.phone}}</text> -->
					<text class="iconfont icon-more"></text>
				</view>
			</view>
			<view class="list" @click="email()">
				<view class="content">
					<view class="title">
						<text>关联邮箱</text>
					</view>
					<view class="describe">
						<text>可用于账号登录/身份认证等</text>
					</view>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view>
		</view>
		<!-- 账户申诉列表 -->
		<view class="appeal-list">
			<!-- <view class="list" @click="onAppeal('appeal')">
				<view class="title">
					<text>账户申诉</text>
				</view>
				<view class="more">
					<text>无法验证身份？试试自助申诉</text>
					<text class="iconfont icon-more"></text>
				</view>
			</view> -->
			<view class="list">
				<view class="title" @click="zhuxiao()">
					<text>注销账号</text>
				</view>
				<view class="more">
					<text class="iconfont icon-more"></text>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
			 userdata:[],
			};
		},
		onShow() {
			this.note();
		},
		onLoad() {
			this.getdata(uni.getStorageSync('username'));
		
		},
		onInit() {
			this.getdata(uni.getStorageSync('username'));
		},
		onReady() {
			this.getdata(uni.getStorageSync('username'));
		},
		methods:{
			// 检查用户登录状态
			note(){
				let username = uni.getStorageSync('username');
				if(!username){
					uni.showModal({
						title:'您还没有登录!',
						showCancel:false,
						success: (res) => {
							if(res.confirm){
								uni.navigateTo({
									url:'../login/login',
								})
							}
						}
					})
				}
			},
			//注销账号
			zhuxiao(id){
				uni.showModal({
					title:'注意',
					content:'您确定要注销吗?注销后所有资料(包括订单信息)将被清空',
					success: (res) => {
						if(res.confirm){
							// console.log('zx');
							uni.request({
								url:'https://api.hnmy.club/user',
								method:'DELETE',
								data:{
									id:uni.getStorageSync('username'),
								},
								success: (res) => {
									if(res.data.data.code==200){
										uni.showModal({
											title:res.data.msg,
											showCancel:false,
										})
									}else{
										uni.removeStorageSync('username');
										uni.showModal({
											title:res.data.msg,
											showCancel:false,
											success: (res) => {
												if(res.confirm){
													uni.navigateTo({
														url:'../home/home',
													})
												}
											}
										})
									}
								}
							})
						}
					}
				})
			},
			//获取用户数据
			getdata(username){
				uni.request({
					url:'https://api.hnmy.club/user',
					method:'GET',
					data:{
						'pass':'jxjs',
						'id':username,
					},
					success: (res) => {
						// console.log(res.data.data);
						console.log(uni.getStorageSync('username'));
						this.userdata = res.data.data;
						uni.showModal({
							title:res,
						})
					}
				})
				
			},
			password(){
				uni.navigateTo({
					url:'../ChangePassword/ChangePassword',
				})
			},
		  phone(){
		  	uni.navigateTo({
		  		url:'../ModifyPhone/ModifyPhone'
		  	})
		  },
		  email(){
		  	uni.navigateTo({
		  		url:'../AssociatedmMailbox/AssociatedmMailbox'
		  	})
		  },
	
			/**
			 * 申诉列表点击
			 * @param {String} tyep
			 */
			onAppeal(tyep){
				switch (type){
					case 'appeal':
						
						break;
				}
			}
		}
	}
</script>

<style lang="scss" scoped>
	@import 'AccountSecurity.scss';
</style>
