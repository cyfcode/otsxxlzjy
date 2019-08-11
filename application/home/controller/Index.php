<?php
namespace app\home\controller;
use clt\Lunar;
class Index extends Common{
    public function initialize(){
        parent::initialize();
    }
    public function index(){
        return $this->fetch('entry');
    }
    public function main(){
        $order = input('order','createtime');
        $list=db('car')->alias('a')
            ->join(config('database.prefix').'category c','a.catid = c.id','left')
            ->field('a.*,c.catdir,c.catname')
            ->order($order.' asc')
            ->limit('15')
            ->select();
        foreach ($list as $k=>$v){
            $list[$k]['time'] = toDate($v['createtime']);
            $list[$k]['url'] = url('home/'.$v['catdir'].'/info',array('id'=>$v['id'],'catId'=>$v['catid']));
        }
        $this->assign('list', $list);

        $articleList = db('page')
         ->alias('a')
         ->join(config('database.prefix').'category c','a.id = c.arrchildid','left')
        ->where('a.id', 'in', '38,39,40,41,51')
        ->order('c.sort asc')->field('a.*')->select();
        $this->assign('articleList', $articleList);
        return $this->fetch('index');
    }
    public function senmsg(){
        $data = input('post.');
        $data['addtime'] = time();
        $data['ip'] = getIp();
        db('message')->insert($data);
        $result['status'] = 1;
        return $result;
    }
}