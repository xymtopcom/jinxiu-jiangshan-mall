<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\Db;
class Anounce
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($pass,$id)
    {
        if($pass =='4ba1e11a8fab123571b67ac035bbfe6b'){
            //获取数据列表
               $data = Db::table('anouce')->where('anouceid',$id)->find();
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
