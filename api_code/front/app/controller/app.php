<?php
declare (strict_types = 1);


namespace app\controller;

// use think\Request;
use think\facade\Db;
use think\Request;

class app extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       return $this->create([
         'type'=>'5',
         'money'=>'9.9',
         'img'=>'https://hnmy.club/img/logo.jpg',
        'title'=>'公告',
          'version'=>'2.6',
          'desc'=>'1.添加视频树洞,可以让您在看视频的同时发现好商品
          2.添加智能客服页面
          3.添加快递查询入口
          4.添加订单和收藏删除功能
          5.优化支付完成后app的调起
          6.可以直接在订单页面查询快递信息
          7.本次更新版本不会强制更新',
          'url'=>'https://pc.hnmy.club/src.jxjs.apk',
          'content'=>'锦绣疆山商城商家版内测了!',
          'show'=>true,
       ]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
       $data = $request->param('text');
    //    $text = '\''.$data.'\'';
    //    $res = Db::query('seleect `post` from `reply` where `get` like'.$text);
    $res=Db::table('reply')->where('get','like',$data)->find();
       if($res){
       return $this->create($res,'成功',200);
       }else{
           return $this->create([
               'post'=>'抱歉,我还不能回答您这个问题哦'
           ],'失败',204);
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

    public function seller()
    {
        return $this->create([
            'type'=>'3',
            'money'=>'9.9',
            'img'=>'https://hnmy.club/img/logo.jpg',
           'title'=>'公告',
             'version'=>'1.1',
             'desc'=>'1.添加视频树洞,可以让您在看视频的同时发现好商品
             2.添加智能客服页面
             3.添加快递查询入口
             4.添加订单和收藏删除功能
             5.优化支付完成后app的调起
             6.可以直接在订单页面查询快递信息
             7.本次更新版本不强制更新
             8.添加商家入驻入口',
             'url'=>'https://pc.hnmy.club/src.jxjs.apk',
             'content'=>'您见过你们好看的公告吗',
             'show'=>true,
          ]);
    }
}
