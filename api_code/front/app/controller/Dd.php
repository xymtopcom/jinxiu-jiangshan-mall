<?php
declare (strict_types = 1);

namespace app\controller;

use app\Request as AppRequest;
use think\facade\Db;
use think\Request;
class Dd extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $data = $request->param();
        $res = Db::query('select * from dd where username='.$data['username']);
        return json($res);
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
    public function update(Request $request)
    {
        $data = $request->param();
        $update = Db::name('dd')->where('id', $data['id'])->update($data);
        if($update){
            return $this->create($data,'修改成功',200);
        }else{
            return $this->create([],'修改失败',204);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        $data = $request->param();
        // Db::name('dd')->where('id', $data['id'])->delete();
         $res = Db::name('dd')->where('id', $data['id'])->delete();
         if($res){
             return $this->create([],'删除成功',200);
         }else{
             return $this->create([$data['id']],'删除失败',204);
         }
    }
}
