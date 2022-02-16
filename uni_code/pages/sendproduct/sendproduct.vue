<template>
	<view>
		<image :src="imgurl" mode=""></image>
		<input type="text" value="" class="sendinput" placeholder="商品名称" v-model="productname"/>
		<input type="text" value="" class="sendinput" placeholder="商品价格" v-model="price"/>
		<input type="text" value="" class="sendinput" placeholder="商品图片链接" v-model="imgurl"/>
		
		<input type="text" value="" class="sendinput" placeholder="商品运费" v-model="yunprice"/>
		<input type="text" value="" class="sendinput" placeholder="库存" v-model="kc"/>
		<input type="text" value="" class="sendinput" placeholder="商品详细介绍链接" v-model="detail"/>
		<button type="default" @click="sendproduct()">发布商品</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'productname':'',
				'price':'',
				'imgurl':'https://hnmy.club/img/logo.jpg',
				'yunprice':'',
				'kc':'',
				'detail':''
			}
		},
		methods: {
			sendproduct(){
				uni.request({
					url:'https://api.api.hnmy.club/product',
					method:'POST',
					data:{
						'productid':Math.round(new Date() / 1000),
						'userid':uni.getStorageSync('username'),
						'productname':this.productname,
						'price':this.price,
						'yunprice':this.yunprice,
						'imgurl':this.imgurl,
						'summary':uni.getStorageSync('shopname'),
						'kc':this.kc,
						'detail':this.detail
					},
					success: (res) => {
						// console.log(res.data)
						if(res.data.code == 200){
							uni.showToast({
								title:'发布成功',
								icon:'success'
							})
						}else{
							uni.showToast({
								title:'发布失败',
								icon:'success',
							})
						}
					}
				})
			}
		}
	}
</script>

<style>
.sendinput{
	/* width: 30px; */
	margin-left: 5%;
	height: 30px;
	margin-top: 10%;
}
image{
	margin-left: 30%;
	width: 60px;
	height: 60px;
}
button{
	margin-top: 20%;
	width: 50%;
}
</style>
