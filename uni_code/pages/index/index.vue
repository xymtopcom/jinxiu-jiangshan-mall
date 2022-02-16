<template>
	<view>
		<view class="header">
			<view class="bg">
				<view class="box">
					<view class="box-hd">
						<view class="avator">
							<img :src="userdata.imgurl">
						</view>
						<view class="phone-number">{{userdata.shopname}}</view>
					</view>
					<view class="box-bd">
						<view class="item" @click="mytz()">
							<view class="icon"><img src="../../static/user/message.png"></view>
							<view class="text">我的通知</view>
						</view>
						<!-- <view class="item">
							<view class="icon"><img src="../../static/user/favorite.png"></view>
							<view class="text">我的收藏</view>
						</view> -->
						<view class="item" @click="znkf()">
							<view class="icon"><img src="../../static/jxjs/znkf.png"></view>
							<view class="text">智能客服</view>
						</view>
						<view class="item" @click="mykf()">
							<view class="icon"><img src="../../static/user/service.png"></view>
							<view class="text">我的客服</view>
						</view>
						
					</view>
				</view>
			</view>
		</view>
		<view class="list-content">
		<!-- 	<view class="list">
				<view class="li noborder" >
					<view class="icon"><image src="../../static/user/card.png"></image></view>
					<view class="text">我的名片</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
			</view> -->
			<view class="list">
				<view class="li " @click="ddzx()">
					<view class="icon"><image src="../../static/jxjs/ddzx.png"></image></view>
					<view class="text">订单中心</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
				<view class="li " @click="sendproduct()">
					<view class="icon"><image src="../../static/jxjs/fbsp.png"></image></view>
					<view class="text">发布商品</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
				<view class="li " @click="product()">
					<view class="icon"><image src="../../static/jxjs/tjsp.png"></image></view>
					<view class="text">我的商品</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
				<view class="li " @click="aboutas()">
					<view class="icon"><image src="../../static/user/about.png"></image></view>
					<view class="text">关于我们</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
				<view class="li " @click="yjfk()">
					<view class="icon"><image src="../../static/user/opinion.png"></image></view>
					<view class="text">意见反馈</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
			</view>
			<view class="list" @click="xtsz()">
				<view class="li noborder" >
					<view class="icon"><image src="../../static/user/set.png"></image></view>
					<view class="text">系统设置</view>
					<image class="to" src="../../static/user/to.png"></image>
				</view>
			</view>
		</view>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				'userdata':[],
			};
		},
		onShow() {
			this.node()
			this.getdata()
		},
		onLoad() {
		},
		methods: {
			node(){
				if(!uni.getStorageSync('username')){
					uni.showToast({
						title:'您还没有登录哦!',
						icon:'loading',
					})
					uni.navigateTo({
						url:'../login/login'
					})
				}
			},
			getdata(){
				uni.request({
					url:'https://api.api.hnmy.club/login/read',
					method:'GET',
					data:{
						'username':uni.getStorageSync('username'),
					},
					success: (res) => {
						this.userdata = res.data.data[0];
					}
				})
			},
			product(){
				uni.navigateTo({
					url:'../product/product'
				})
			},
			ddzx(){
				uni.navigateTo({
					url:'../ddzx/ddzx'
				})
			},
			sendproduct(){
				uni.navigateTo({
					url:'../sendproduct/sendproduct'
				})
			},
			mytz(){
				uni.navigateTo({
					url:'../NotificationMessage/NotificationMessage'
				})
			},
			mykf(){
				//联系qq
			plus.runtime.openURL('mqq://im/chat?chat_type=wpa&uin=2283761246&version=1&src_type=web ');
			},
			znkf(){
				uni.navigateTo({
					url:'../znkf/znkf'
				})
			},
			aboutas(){
				uni.navigateTo({
					url:'../aboutas/aboutas'
				})
			},
			yjfk(){
				uni.navigateTo({
					url:'../fk/fk'
				})
			},
			xtsz(){
				uni.showModal({
					title:'提示',
					 content:'抱歉,商家版内测期间不能修改您的信息',
					 showCancel:false
				})
			}
		}
	}
</script>

<style lang="scss">
page{
	background-color:#f1f1f1;
	font-size: 30upx;
}
.header{
	background: #fff;
	height: 290upx;
	padding-bottom: 110upx;
	.bg{
		width: 100%;
		height:200upx;
		padding-top:100upx;
		background-color:#ffffff;
	}
}
.box{
	width: 650upx;
	height: 280upx;
	border-radius: 20upx;
	margin: 0 auto;
	background: #fff;
	box-shadow: 0 5upx 20upx 0upx rgba(0, 0, 150, .2); 
	.box-hd{
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
		justify-content: center;
		.avator{
			width: 160upx;
			height: 160upx;
			background: #fff;
			border: 5upx solid #fff;
			border-radius: 50%;
			margin-top: -80upx;
			overflow: hidden;
			img{
				width: 100%;
				height: 100%;
			}
		}
		.phone-number{
			width: 100%;
			text-align: center;
		}
	}
	.box-bd{
		display: flex;
		flex-wrap: nowrap;
		flex-direction: row;
		justify-content: center;
		.item{
			flex: 1 1 auto;
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: center;
			border-right: 1px solid #f1f1f1;
			margin: 15upx 0;
			&:last-child{
				border: none;
			}
			.icon{
				width: 60upx;
				height: 60upx;
				img{
					width: 100%;
					height: 100%;
				}
			}
			.text{
				width: 100%;
				text-align: center;
				margin-top: 10upx;
			}
		}
	}
}
.list-content{
	background: #fff;
}
.list{
	width:100%;
	border-bottom:15upx solid  #f1f1f1;
	background: #fff;
	&:last-child{
		border: none;
	}
	.li{
		width:92%;
		height:100upx;
		padding:0 4%;
		border-bottom:1px solid rgb(243,243,243);
		display:flex;
		align-items:center;
	&.noborder{
		border-bottom:0
		}
		.icon{
			flex-shrink:0;
			width:50upx;
			height:50upx;
			image{
				width:50upx;
				height:50upx;
			}
		}
		.text{
			padding-left:20upx;
			width:100%;
			color:#666;
		}
		.to{
			flex-shrink:0;
			width:40upx;
			height:40upx;
		}
	}
}
</style>
