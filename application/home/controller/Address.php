<?php
namespace app\home\controller;
use think\Db;
use think\Controller;

class Address extends Controller
{
    public function getList(){
        $list = db('address')->select();
        $result = array();
        foreach ($list as $item){
            array_push($result, array(
                "id" => $item['id'],
                "name" => $item['title'],
            ));
        }
        return json_encode($result);
    }

    public function detail(){
        $id=input('id');
        $data = db('order')->alias('a')
            ->join(config('database/prefix').'address adf', 'a.from_address_id = adf.id', 'left')
            ->join(config('database/prefix').'address adt', 'a.from_address_id = adt.id', 'left')
            ->field('a.*, adf.id as from_address_id, adt.id as to_address_id, adf.title as from_address, adt.title as to_address')
            ->where('a.id', $id)
            ->find();
        $carInfo = db('car')->where('id', $data['car_id'])->find();
        $userInfo = db('users')->where('id', $data['user_id'])->find();
        $data['from_time'] = date('Y-m-d H:s',$data['addtime']);
        $data['to_time'] = date('Y-m-d H:s',$data['addtime']);
        $data['createtime'] = date('Y-m-d H:s',$data['addtime']);
        $data['updatetime'] = date('Y-m-d H:s',$data['addtime']);
        $this->assign('info', $data);
        $this->assign('carInfo', $carInfo);
        $this->assign('userInfo', $userInfo);
        $this->assign('title','预约详情');
        return $this->fetch('detail');
    }
}