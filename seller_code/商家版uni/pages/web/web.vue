<template>
	<view>
		<web-view :src="url"></web-view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				'url':'',
			}
		},
		methods: {
			geturl(){
				this.url = uni.getStorageSync('url')
			}
		}
	}
</script>

<style>

</style>
