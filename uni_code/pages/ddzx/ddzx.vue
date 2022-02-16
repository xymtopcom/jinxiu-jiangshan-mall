<template>
    <view class="warp">
        <view class="box">
            <t-table border="2" border-color="#95b99e">
                <t-tr font-size="14" color="#95b99e" align="left">
                    <t-th align="left">订单号</t-th>
                    <t-th align="left">姓名</t-th>
                    <t-th align="left">手机号</t-th>
                    <t-th align="center">地址</t-th>
					<t-th align="left">商品名称</t-th>
					<t-th align="left">状态</t-th>
					<t-th align="left">操作或快递单号</t-th>
                </t-tr>
                <t-tr font-size="12" color="#5d6f61" align="right" v-for="item in tableList" :key="item.id">
                    <t-td align="left">{{ item.id }}</t-td>
                    <t-td align="left">{{ item.name }}</t-td>
					<t-td align="left">{{ item.phone }}</t-td>
					<t-td align="left">{{ item.address }}</t-td>
					<t-td align="left">{{ item.productname }}</t-td>
					<t-td align="left">{{ item.action }}</t-td>
					<t-td align="left" v-show="item.emsid">{{ item.emsid }}</t-td>
                    <t-td align="left"><button @click="edit(item.id)" v-show="!item.emsid">发货</button></t-td>
                </t-tr>
            </t-table>
        </view>
    </view>
</template>
<script>
	import tTable from '@/components/t-table/t-table.vue';
	    import tTh from '@/components/t-table/t-th.vue';
	    import tTr from '@/components/t-table/t-tr.vue';
	    import tTd from '@/components/t-table/t-td.vue';
	    export default {
	        components: {
	            tTable,
	            tTh,
	            tTr,
	            tTd
	        },
	        data() {
	            return {
	                tableList: []
	            };
	        },
			onShow() {
				this.getdata()
			},
	        methods: {
				getdata(){
					uni.request({
						url:'https://api.api.hnmy.club/order',
						method:'GET',
						data:{
							'username':uni.getStorageSync('username'),
						},
						success: (res) => {
							// console.log(res.data.data)
							this.tableList = res.data.data;
						}
					})
				},
	            change(e) {
	                console.log(e.detail);
	            },
	            edit(id) {
	               uni.setStorage({
	               	key:'orderid',
					data:id,
					success() {
						uni.navigateTo({
							url:'../senddd/senddd'
						})
					}
	               })
	            }
	        }
	    };
</script>