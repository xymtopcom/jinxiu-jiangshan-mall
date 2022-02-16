<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\RobotAdd as ModelRobotAdd;
use think\Request;
use think\facade\Db;

class RobotAdd
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        include("robot.php");
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
        $data = [ 'get' => $request['get'], 
        'post' => $request['post'],
        ];
        $res = Db::name('reply')->insert($data);
        if($res){
            echo('训练成功!');
        }else{
            echo('训练失败,请检查!');
        }
        $data2=Db::table('reply')->select();
       return json(['已经训练的计划',$data2]);
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
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
