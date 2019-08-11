<?php

namespace app\home\controller;

use think\Db;
use clt\Leftnav;
use think\Controller;

class Common extends Controller
{
    protected $pagesize, $changyan;

    public function initialize()
    {
        $sys = cache('System');
        $this->assign('sys', $sys);
        if ($sys['mobile'] == 'open') {
            if (isMobile()) {
                $this->redirect('mobile/index/index');
            }
        }

        if (session('user.id')) {
            $userInfo = db('users')->alias('u')
                ->join(config('database.prefix').'user_level ul','u.level = ul.level_id','left')
                ->where('u.id','=',session('user.id'))
                ->field('u.*,ul.level_name')
                ->find();
            $this->assign('userInfo', $userInfo);
        }

        //获取控制方法
        $action = request()->action();
        $controller = request()->controller();
        $this->assign('action', ($action));
        $this->assign('controller', strtolower($controller));
        define('MODULE_NAME', strtolower($controller));
        define('ACTION_NAME', strtolower($action));
        //导航
        $thisCat = Db::name('category')->where('id', input('catId'))->find();
        $this->assign('title', $thisCat['title']);
        $this->assign('keywords', $thisCat['keywords']);
        $this->assign('description', $thisCat['description']);
        define('DBNAME', strtolower($thisCat['module']));
        $this->pagesize = $thisCat['pagesize'] > 0 ? $thisCat['pagesize'] : '';
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
            if ($controller == $vo['catdir']) {
                $cate[$ko]['selected'] = true;
            }
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
        //友情链接
        $linkList = cache('linkList');
        if (!$linkList) {
            $linkList = Db::name('link')->where('open', 1)->order('sort asc')->select();
            cache('linkList', $linkList, 3600);
        }
        $this->assign('linkList', $linkList);
        //畅言
        $plugin = db('plugin')->where(['code' => 'changyan'])->find();
        $this->changyan = unserialize($plugin['config_value']);
        $this->assign('changyan', $this->changyan);
    }

    public function _empty()
    {
        return $this->error('空操作，返回上次访问页面中...');
    }
}