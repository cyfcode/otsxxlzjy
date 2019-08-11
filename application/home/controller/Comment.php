<?php
namespace app\home\controller;
use think\Db;
use think\Controller;
class Comment extends Controller
{
    public function initialize()
    {
        $userId = session('user.id');
        if($userId){
            $this->userInfo = db('users')->alias('u')
                ->join(config('database.prefix') . 'user_level ul', 'u.level = ul.level_id', 'left')
                ->where('u.id', '=', $userId)
                ->field('u.*,ul.level_name')
                ->find();
        }
    }
    //评论
    public function add() {
        $userId = session('user.id');
        $cid = input('cid');
        if (!$userId) {
            return json_encode([
                'code' => -1
            ]);
        }
        $data = array(
            'content' => input("post.content"),
            'add_time' => time(),
            'cid' => $cid,
            'pid' => input('post.pid', 0),
            'userid' => $userId,
        );

        $result = db("comment")->insert($data);
        return json_encode([
            'code' => $result
        ]);
    }

    public function del(){
        $id = input('post.id');
        if($this->userInfo){
            if($this->userInfo['level'] == 11){
                $result = db('comment')->delete($id);
                return json_encode([
                    'code' => $result
                ]);
            } else {
                json_encode([
                    'code' => -2
                ]);
            }
        } else {
            return json_encode([
                'code' => -1
            ]);
        }
    }

    public function index(){
        $cid = input('cid');
        $list = $this->getList($cid);
        return json_encode($list);
    }
    //评论列表
    private function getList($cid, $pid = 0, &$commentList = array(), $spac = 0) {
        static $i = 0;
        $spac = $spac + 1; //初始为1级评论
        $List = db('comment')->alias('c')
            ->where(array('c.pid' => $pid, 'c.cid' => $cid))
            ->join(config('database/prefix').'users u', 'c.userid = u.id', 'left')
            ->field('c.*, u.id as userid, u.avatar, u.username, u.sex')
            ->order("c.id DESC")
            ->select();
        foreach ($List as $k => $v) {
            $commentList[$i]['level'] = $spac;
            $commentList[$i]['id'] = $v['id'];
            $commentList[$i]['userid'] = $v['userid'];
            $commentList[$i]['avatar'] = $v['avatar'];
            $commentList[$i]['username'] = $v['username'];
            $commentList[$i]['sex'] = $v['sex'];
            $commentList[$i]['cid'] = $v['cid'];
            $commentList[$i]['pid'] = $v['pid'];
            $commentList[$i]['content'] = $v['content'];
            $commentList[$i]['time'] = toDate($v['add_time'], 'Y年m月d日 H:i:s');
            $i++;
            $this->getList($cid, $v['id'], $commentList, $spac);
        }
        return $commentList;
    }
}