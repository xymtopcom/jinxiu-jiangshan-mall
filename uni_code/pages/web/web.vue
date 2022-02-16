<template>
    <view>
        <web-view :webview-styles="webviewStyles" :src="url"></web-view>
    </view>
</template>

<script>
    export default {
        data() {
            return {
				// url:uni.getStorageSync('url'),
				url:uni.getStorageSync('url'),
                webviewStyles: {
                    progress: {
                        color: '#3ecfff'
                    }
                }
            }
        },
		onLoad() {
			
		},
		methods:{
			
		}
    }
</script>

<style>

</style>