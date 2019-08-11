<?php
namespace app\user\controller;
use think\Input;
use think\Db;
use clt\Form;
use think\facade\Request;
class Share extends Common{
    public function initialize(){
        parent::initialize();
        $this->mod = cache('Mod');
        $this->moduleid = $this->mod['article'];
        $this->dao = db('article');
        $fields = cache($this->moduleid.'_Field');
        foreach($fields as $key => $res){
            $res['setup']=string2array($res['setup']);
            $this->fields[$key]=$res;
        }
        unset($fields);
        unset($res);
        $this->catid = 47;
        $this->assign ('fields',$this->fields);
    }
    public function index(){
        if(Request::isAjax()){
            $request = Request::instance();
            $modelname = "article";
            $model = db($modelname);
            $keyword=input('post.key');
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $order = "sort asc,id desc";
            $catid = $this->catid;
            $cinfo= db('category')->where(array('id'=>input($catid)))->field('catdir,is_show')->find();
            if(!empty($keyword) ){
                $map[]=array('title','like','%'.$keyword.'%');
            }
            $prefix=config('database.prefix');
            $Fields=Db::getConnection()->getFields($prefix.$modelname);
            foreach ($Fields as $k=>$v){
                $field[$k] = $k;
            }
            if(in_array('catid',$field)){
                $map[]=array('catid','in',$catid);
            }
            $userId = $this->userInfo['id'];
            $map[] = array('userid','eq',$userId);
            $list = $model
                ->where($map)
                ->order($order)
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            $rsult['code'] = 0;
            $rsult['msg'] = "获取成功";
            $lists = $list['data'];
            foreach ($lists as $k=>$v ){
                $lists[$k]['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
                $lists[$k]['catdir'] =  $cinfo['catdir'];
                $lists[$k]['is_show'] =  $cinfo['is_show'];
                $lists[$k]['url'] = url('home/'.$cinfo['catdir'].'/info',['id'=>$v['id'],'catId'=>$v['catid']]);
            }
            $rsult['data'] = $lists;
            $rsult['count'] = $list['total'];
            $rsult['rel'] = 1;
            return $rsult;
        }else{
            return $this->fetch ();
        }
    }

    public function edit(){
        $id = input('id');
        $request = Request::instance();
        $info = db('article')->where('id',$id)->find();
        $form=new Form($info);
        $returnData['vo'] = $info;
        $returnData['form'] = $form;
        $this->assign ('info', $info );
        $this->assign ( 'form', $form );
        $this->assign ( 'title', '编辑内容' );
        return $this->fetch();
    }

    function update(){
        $request = Request::instance();
        $model = $this->dao;
        $fields = $this->fields;
        $data = $this->checkfield($fields,Request::except('file'));
        if(isset($data['code'])){
            return ['code'=>0,'msg'=>$data['msg']];
        }
        if(isset($fields['updatetime'])) {
            $data['userid'] = session('aid');
        }

        if(isset($fields['updatetime'])) {
            $data['updatetime'] = time();
        }

        $title_style ='';
        if (isset($data['style_color'])) {
            $title_style .= 'color:' . $data['style_color'].';';
            unset($data['style_color']);
        }else{
            $title_style .= 'color:#222;';
        }
        if (isset($data['style_bold'])) {
            $title_style .= 'font-weight:' . $data['style_bold'].';';
            unset($data['style_bold']);
        }else{
            $title_style .= 'font-weight:normal;';
        }
        if($fields['title']['setup']['style']==1) {
            $data['title_style'] = $title_style;
        }
        unset($data['aid']);
        unset($data['pics_name']);
        //编辑多图和多文件
        foreach ($fields as $k=>$v){
            if($v['type']=='files' ){
                if(!$data[$k]){
                    $data[$k]='';
                }
                $data[$v['field']] = $data['images'];
            }
            if($v['type']=='images'){
                if(!isset($data[$k])){
                    $data[$k]='';
                }
                if($data[$k]){
                    $data[$v['field']] = implode(';',$data[$k]);
                }
            }
        }
        $list=$model->strict(false)->update($data);
        if (false !== $list) {
            $result['url'] = url(index);
            $result['msg'] = '修改成功!';
            $result['code'] = 1;
            return $result;
        } else {
            $result['msg'] = '修改失败!';
            $result['code'] = 0;
            return $result;
        }
    }

    public function add(){
        $form=new Form();
        $this->assign ( 'form', $form );
        $this->assign ( 'title', '添加内容' );
        return $this->fetch('edit');
    }

    function checkfield($fields,$post){
        foreach ( $post as $key => $val ) {
            if(isset($fields[$key])){
                $setup=$fields[$key]['setup'];
                if(!empty($fields[$key]['required']) && empty($post[$key])){
                    $result['msg'] = $fields[$key]['errormsg']?$fields[$key]['errormsg']:'缺少必要参数！';
                    $result['code'] = 0;
                    return $result;
                }
                if(isset($setup['multiple'])){
                    if(is_array($post[$key])){
                        $post[$key] = implode(',',$post[$key]);
                    }
                }
                if(isset($setup['inputtype'])){
                    if($setup['inputtype']=='checkbox'){
                        $post[$key] = implode(',',$post[$key]);
                    }
                }
                if(isset($setup['fieldtype'])){
                    if($fields[$key]['type']=='checkbox'){
                        $post[$key] = implode(',',$post[$key]);
                    }
                }
                if($fields[$key]['type']=='datetime'){
                    $post[$key] =strtotime($post[$key]);
                }elseif($fields[$key]['type']=='textarea'){
                    $post[$key]=addslashes($post[$key]);
                }elseif($fields[$key]['type']=='linkage'){
                    if($post[$key][0]){
                        $post[$key] = implode(',',$post[$key]);
                    }else{
                        unset($post[$key]);
                    }
                }elseif($fields[$key]['type']=='editor'){
                    if(isset($post['add_description']) && $post['description'] == '' && isset($post['content'])) {
                        $content = stripslashes($post['content']);
                        $description_length = intval($post['description_length']);
                        $post['description'] = str_cut(str_replace(array("\r\n","\t",'[page]','[/page]','&ldquo;','&rdquo;'), '', strip_tags($content)),$description_length);
                        $post['description'] = addslashes($post['description']);
                    }
                    if(isset($post['auto_thumb']) && $post['thumb'] == '' && isset($post['content'])) {
                        $content = $content ? $content : stripslashes($post['content']);
                        $auto_thumb_no = intval($post['auto_thumb_no']) * 3;
                        if(preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)) {
                            $post['thumb'] = $matches[$auto_thumb_no][0];
                        }
                    }
                }
            }
        }
        return $post;
    }

    public function insert(){
        $request = Request::instance();
        $model = $this->dao;
        $fields = $this->fields;
        $data = $this->checkfield($fields,Request::except('file'));
        if(isset($data['code']) && $data['code']==0){
            return $data;
        }
        if(isset($fields['createtime'])  && !isset($data['createtime']) ){
            $data['createtime'] = time();
        }
        if(isset($fields['updatetime'])  && !isset($data['updatetime']) ) {
            $data['updatetime'] = time();
        }
        $data['user_type'] = 2;
        $data['userid'] = $this->userInfo['id'];
        $data['username'] = $this->userInfo['username'];

        $title_style ='';
        if (isset($data['style_color'])) {
            $title_style .= 'color:' . $data['style_color'].';';
            unset($data['style_color']);
        }else{
            $title_style .= 'color:#222;';
        }
        if (isset($data['style_bold'])) {
            $title_style .= 'font-weight:' . $data['style_bold'].';';
            unset($data['style_bold']);
        }else{
            $title_style .= 'font-weight:normal;';
        }
        if($fields['title']['setup']['style']==1) {
            $data['title_style'] = $title_style;
        }

        unset($data['style_color']);
        unset($data['style_bold']);
        unset($data['aid']);
        unset($data['pics_name']);
        //编辑多图和多文件
        foreach ($fields as $k=>$v){
            if($v['type']=='files' ){
                if(!$data[$k]){
                    $data[$k]='';
                }
                $data[$v['field']] = $data['images'];
            }
            if($v['type']=='images'){
                if(!isset($data[$k])){
                    $data[$k]='';
                }
                if($data[$k]){
                    $data[$v['field']] = implode(';',$data[$k]);
                }
            }
        }
        $data['description'] = $data['content'];
        $data['catid'] = $this->catid;
        $id= $model->insertGetId($data);
        if ($id !==false) {
            $result['url'] = url("index");
            $result['msg'] = '添加成功!';
            $result['code'] = 1;
            return $result;
        } else {
            $result['msg'] = '添加失败!';
            $result['code'] = 0;
            return $result;
        }

    }

    public function listDel(){
        $id = input('post.id');
        $model = $this->dao;
        $model->where(array('id'=>$id))->delete();//转入回收站
        return ['code'=>1,'msg'=>'删除成功！'];
    }
}