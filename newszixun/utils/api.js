const webapi = 'https://mini.jizhicms.cn';
const apikey = '111222';
export const jzRequest = (op)=>{
	return new Promise((resolve,reject)=>{
		if(!op.data){
			op.data = {};
		}
		op.data.key = apikey;
		uni.request({
			url: webapi + op.url,
			method: op.method || 'GET',
			data: op.data,
			success: (res)=>{
				if(res.data.code==1){
					return uni.showToast({
						title: '数据获取失败！'
					})
				}
				resolve(res)
			},
			fail: (err)=>{
				uni.showToast({
					title: '网络请求错误！'
				})
				reject(err)
			}
		})
	})
}