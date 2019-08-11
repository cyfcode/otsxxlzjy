<?php
namespace app\user\controller;
use think\Db;
use clt\Leftnav;
use think\Input;
use think\Controller;
class Common extends Controller{
    protected $userInfo;
    public function initialize(){
        define('MODULE_NAME',strtolower(request()->controller()));
        define('ACTION_NAME',strtolower(request()->action()));
        if (!session('user.id')) {
            $this->redirect('login/index');
        } else {
            $this->userInfo=db('users')->alias('u')
                ->join(config('database.prefix').'user_level ul','u.level = ul.level_id','left')
                ->where('u.id','=',session('user.id'))
                ->field('u.*,ul.level_name')
                ->find();
            $this->assign('userInfo',$this->userInfo);

            $this->sys = cache('System');
            $this->assign('sys',$this->sys);

            // 获取缓存数据
            $cate = cache('cate');
            if (!$cate) {
                $column_one = Db::name('category')->where([['parentid', '=', 0], ['ismenu', '=', 1]])->order('sort')->select();
                $column_two = Db::name('category')->where('ismenu', 1)->order('sort')->select();
                $tree = new Leftnav ();
                $cate = $tree->index_top($column_one, $column_two);
                cache('cate', $cate, 3600);
            }
            foreach ($cate as $ko => $vo) {
                foreach ($vo['sub'] as $k => $v) {
                    $cate[$ko]['sub'][$k]['url'] = url('home/' . $vo['catdir'] . '/index', ['catId' => $v['id']]);
                }
                $cate[$ko]['url'] = url('home/' . $vo['catdir'] . '/index', ['catId' => $vo['id']]);
            }
            $this->assign('category', $cate);

            //广告
            $adList = cache('adList');
            if (!$adList) {
                $adList = Db::name('ad')->where(['open' => 1])->order('sort asc')->select();
                cache('adList', $adList, 3600);
            }
            $this->assign('adList', $adList);
        }
    }
    public function _empty(){
        return $this->error('空操作，返回上次访问页面中...');
    }
    //退出登陆
    public function logout(){
        session('user',null);
        $this->redirect('login/index');
    }
}