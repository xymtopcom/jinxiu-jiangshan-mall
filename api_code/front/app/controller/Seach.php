<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Seach as ModelSeach;
use think\Request;
use think\facade\Db;

class Seach extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($word)
    {
      $data = Db::name('product')->where('productname','like','%'.$word.'%')->select();
      return $this->create($data,'搜索成功',200);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
  
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
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
