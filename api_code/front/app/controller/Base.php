<?php
namespace app\controller;
use think\response;
abstract class Base
{
protected function create($data, $msg = '', $code = 200, $type = 'json')
{
//返回 api 结果
$result = [
//状态码
'code' => $code,
//自定义消息
'msg' => $msg,
//数据返回
'data' => $data
];
//将数据返回成指定格式，默认 json
return Response::create($result, $type);
}
}