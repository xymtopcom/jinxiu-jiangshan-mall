<script>
export default {
	onLaunch: function() {
	  uni.onNetworkStatusChange(function (res) {
	      console.log(res.isConnected);
	      console.log(res.networkType);
	  });
	},
	onShow: function() {
		uni.getNetworkType({
		    success: function (res) {
		        console.log(res.networkType);
		    }
		});
	},
	onHide: function() {
		console.log('App Hide');
	}
};
</script>

<style>

</style>
