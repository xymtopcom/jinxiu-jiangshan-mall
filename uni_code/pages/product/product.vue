<template>
	<view>
		<uni-card :title="item.productname" :thumbnail="item.imgurl" extra="锦绣疆山商城" note="请不要随便删除商品!" mode="style" v-for="item in product">
			<h3>商品id: {{item.productid}}</h3>
			<h3>价格: {{item.price}}</h3>
			<h3>运费: {{item.yunprice}}</h3>
			<h3>库存: {{item.kc}}</h3>
			<button type="default" @click="deleteproduct(item.productid)">删除</button>
		</uni-card>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'product':[],
			}
		},
		onShow() {
			this.getdata()
		},
		methods: {
			getdata(){
				uni.request({
					url:'https://api.api.hnmy.club/product',
					method:'GET',
					data:{
						'username':uni.getStorageSync('username'),
					},
					success: (res) => {
						// console.log(res.data.data)
						this.product = res.data.data;
					}
				})
			},
			deleteproduct(id){
				uni.request({
					url:'https://api.api.hnmy.club/product',
					method:'DELETE',
					data:{
						'productid':id,
					},
					success: (res) => {
						// console.log(res.data);
						this.getdata();
						uni.showToast({
							title:res.data.msg,
							icon:'success',
						})
					}
				})
			}
		}
	}
</script>

<style>

</style>
