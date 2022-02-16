<template>
	<view class="page">
		<!-- 选择反馈类型 -->
		<view class="feedback-type">
			<view class="title">
				<text>{{TypeArray[TypeIndex]}}</text>
			</view>
			<view class="picker">
				<picker @change="FeedbackTypeCh" :value="TypeIndex" :range="TypeArray">
						<view class="uni-input">{{TypeArray[TypeIndex]}}</view>
				</picker>
			</view>
			<view class="more">
				<text class="iconfont icon-more1"></text>
			</view>
		</view>
		<!-- 反馈内容 -->
		<view class="feedback-data">
			<view class="content">
				<textarea value="" placeholder="请输入反馈的内容" @input="content" v-model="content"/>
			</view>
			<!-- <view class="voucher-img">
				<view class="list">
					<image src="/static/voucher_bg.png"></image>
				</view>
				<view class="list">
					<image src="/static/img/yf_01.png"></image>
				</view>
				<view class="list">
					<image src="/static/img/yf_01.png"></image>
				</view>
			</view> -->
		</view>
		<!-- 联系方式 -->
		<view class="contact-way">
			<input type="text" placeholder="手机/邮箱/QQ" @input="contact" v-model="contact">
		</view>
		<!-- 提交 -->
		<view class="submit-btn" @click="fk()">
			<text>提交</text>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				content:'',
				contact:'',
				TypeArray: ['商品相关', '物流状况', '客户服务', '优惠活动',
				'产品体验','产品功能','其他问题'],
				TypeIndex: 0,
			};
		},
		methods:{
			// 点击提交
			fk(){
				let category =this.TypeIndex;
				if(category==0){
					category ='商品相关';
				}else if(category==1){
					category ='物流状况';
				}else if(category==2){
					category ='客户服务';
				}else if(category==3){
					category ='优惠活动';
				}else if(category==4){
					category ='产品体验';
				}else if(category==5){
					category ='产品功能';
				}else if(category==6){
					category ='其他问题';
				}
				uni.request({
					url:'https://api.hnmy.club/fk',
					method:'POST',
					data:{
						'time':Math.round(new Date() / 1000),
						'id':Math.round(new Date() / 1000),
						'username':uni.getStorageSync('username'),
						'content': this.content ,
						'category':category,
						'contact':this.contact,
					},
					success: (res) => {
						uni.showModal({
							title:res.data.msg,
							showCancel:false,
							
						})
					}
				})
				// console.log(this.category)
			},
			/**
			 * 反馈类型
			 * @param {Object} val
			 */
			FeedbackTypeCh(val){
				console.log(val);
				this.TypeIndex = val.detail.value;
			}
		}
	}
</script>

<style scoped lang="scss">
	@import 'Feedback.scss';
</style>
