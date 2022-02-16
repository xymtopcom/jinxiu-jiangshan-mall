<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Product as ModelProduct;
use think\Request;
use think\Facade\Db;

class Product 
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = $request->param();
        if($data['pass'] =='4ba1e11a8fab123571b67ac035bbfe6b'){
            //获取数据列表
              $data = Db::table('product')->where('productid',$data['id'])->find();
              //查询所有数据
            }else{
                $data='秘钥不正确,无权操作!';
            }
            return json($data); 
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function newproduct()
    {
        $data = ModelProduct::field('productid,productname,price,imgurl,oldprice')->paginate(300);
        return json($data);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
