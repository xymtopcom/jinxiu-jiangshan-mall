<?php
declare (strict_types = 1);

namespace app\controller;
use think\facade\Db;
use think\Request;

class Order extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = $request->param();
        $data = Db::table('dd')->find($data['id']);
        if($data){
            return $this->create($data,'查询成功',200);
        }else{
            return $this->create($data,'查询订单失败',204);
        }
        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();
        $res = Db::name('dd')->insert($data);
        if($res){
            return $this->create([],'添加成功',200);
        }else{
            return $this->create([],'添加失败',204);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $data = Db::table('dd')->find($id);
      return $this->create($data,'查询成功',200);
        
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $data = $request->param();
        $res =Db::name('dd')->update($data);
        // if($res==1){
        //     return $this->create([],'修改成功',200);
        // }else{
        //     return $this->create([],'修改失败',204);
        // }
        return json($res);
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
