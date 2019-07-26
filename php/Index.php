<?php
namespace app\index\controller;
use think\Db;
class Index
{
    public function index()
    {
        return "00";
    }

//    登陆
    public  function  login($num ,$password){
        header('Access-Control-Allow-Origin:*');
        $res = db::table("user")->where("num",$num)->find();
        if($res['password'] == md5($password)){
            return json(['code'=>'200','mes'=>"ok"]);
        }else{
        return json(['code'=>'0','mes'=>'error']);
        }
    }

//    注册
    public  function  register($num,$password,$apassword){
        header('Access-Control-Allow-Origin:*');
      $check =  db::table("user")->where("num",$num)->find();
      $time =date("Y-m-d H:i:s");
      if($check){
        return json(['code'=>'111','mes'=>'the num is already set']);
       }else{
        $data=[
            'addtime'=>$time,
            'num'=>$num,
            'password'=>md5($password)

        ];
      $res=  db::table("user")->insert($data);
    if($res){
        return json(['code'=>'200','mes'=>'success']);
    }
       }

    }

//    修改id映射
    public  function changeredis($num ,$uid){
        header('Access-Control-Allow-Origin:*');
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        //$redis->auth('');
        $res = $redis->set($num,$uid);
    if($res){
        return json(['set uid ok']);
    }
    }

//    图片上chuang
    public  function  upload(){
        header('Access-Control-Allow-Origin:*');
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../public/uploads');
        if($info){
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
           // echo $info->getSaveName();

            return json(['code'=>0,'url'=>"http://localhost/workman/public/uploads/". $info->getSaveName()]);

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }

//    修改头像
    public  function  changeface($num,$imgurl){
        header('Access-Control-Allow-Origin:*');
   $res = db::table("user")->where("num",$num)->update(['face' =>$imgurl]);
    if($res){
    return json(['code'=>0,"mes"=>"ok"]);
    }else{
        return json(['code'=>1,"mes"=>"error"]);

    }

    }

//    个人信息
    public  function  getmes($num){
        header('Access-Control-Allow-Origin:*');
    $res = db::table("user")->where("num",$num)->find();
    if($res){
        return json(['code'=>0,'mes'=>$res]);
    }else{
        return json(['code'=>1,'mes'=>"error"]);
    }

    }

//    好友关系

    public  function  getfir($num){
        header('Access-Control-Allow-Origin:*');
    $res =db::table("fir")->where("a",$num)->field('b')->select();
    $arr=[];
//    var_dump($res);
        foreach ($res as $key =>$a){
        $res1 = db::table("user")->where("num",$a['b'])->find();
        array_push($arr,$res1);
        }
   return json(['code'=>0,'mes'=>$arr]);
    }


    public  function  test(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379);
        //$redis->auth('');
        $redis->set('key','TK');

    }


}