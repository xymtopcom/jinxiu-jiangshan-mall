<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\Collect as ModelCollect;
use think\Request;
use think\facade\Db;

class Collect extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id,$pass)
    {
        if($pass =='4ba1e11a8fab123571b67ac035bbfe6b'){
            //获取数据列表
            $data = Db::query('select * from collect where userid='.$id);
            //    $data = Db::table('collect')->where('userid',$id)->find();
            // $data = ModelCollect::find(1);
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
        $data = $request->param();
        $data2 =[
            'userid'=>$data['userid'],
            'productid'=>$data['productid'],
            'imgurl'=>$data['imgurl'],
            'name'=>'锦绣疆山',
            'price'=>$data['price'],
            'gg'=>$data['gg'],
            'num'=>1,
            'id'=>$data['id']
       ];
        $res = Db::name('collect')->insert($data);
        if($res){
            return $this->create([],'添加成功！',200);
        }else{
            return $this->create([],'添加失败！',204);
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
        $update = Db::name('collect')->where('id', $data['id'])->update($data);
        if($update){
            return $this->create([],'修改成功!',200);
        }else{
            return $this->create([],'修改失败,请检查!',204);
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
         $res = Db::name('collect')->where('id', $data['id'])->delete();
         if($res){
             return $this->create([],'删除成功',200);
         }else{
             return $this->create([$data['id']],'删除失败',204);
         }
    }
}
