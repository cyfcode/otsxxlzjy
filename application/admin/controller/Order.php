<?php
namespace app\admin\controller;
use think\facade\Request;
class Order extends Common
{
    //预约列表
    public function index(){
        if(Request::isAjax()) {
            $key=input('post.key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = db('order')->alias('a')
                ->join(config('database/prefix').'car c', 'a.car_id = c.id', 'left')
                ->join(config('database/prefix').'address adf', 'a.from_address_id = adf.id', 'left')
                ->join(config('database/prefix').'address adt', 'a.from_address_id = adt.id', 'left')
                ->field('a.*, c.title, c.brand, adf.id as from_address_id, adt.id as to_address_id, adf.title as from_address, adt.title as to_address')
                ->where('user_name', 'like', "%" . $key . "%")
                ->whereOr('tel', 'like', "%" . $key . "%")
                ->order('a.id desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            foreach ($list['data'] as $k=>$v){
                $list['data'][$k]['from_time'] = date('Y-m-d H:s',$v['from_time']);
                $list['data'][$k]['to_time'] = date('Y-m-d H:s',$v['to_time']);
                $list['data'][$k]['createtime'] = date('Y-m-d H:s',$v['createtime']);
                $list['data'][$k]['updatetime'] = date('Y-m-d H:s',$v['updatetime']);
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        return $this->fetch();
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
        $data['from_time'] = date('Y-m-d H:s',$data['from_time']);
        $data['to_time'] = date('Y-m-d H:s',$data['to_time']);
        $data['createtime'] = date('Y-m-d H:s',$data['createtime']);
        $data['updatetime'] = date('Y-m-d H:s',$data['updatetime']);
        $this->assign('info', $data);
        $this->assign('carInfo', $carInfo);
        $this->assign('userInfo', $userInfo);
        $this->assign('title','预约详情');
        return $this->fetch('detail');
    }
    public function toStep(){
        $state = input('post.step');
        $orderId = input('post.orderId');
        $result = db('order')->update([
            id => $orderId,
            status => $state
        ]);
        return $result;
    }
    public function toDel(){
        db('order')->where(array('id'=>input('id')))->delete();
        return json_encode(['code'=>1,'msg'=>'删除成功！']);
    }
    public function delall(){
        $map[] =array('id','in',input('param.ids/a'));
        db('donation')->where($map)->delete();
        $result['msg'] = '删除成功！';
        $result['code'] = 1;
        $result['url'] = url('index');
        return $result;
    }
}