<?php
namespace app\home\controller;
use think\Db;
use think\Controller;
class Map extends Controller
{
    public function getList(){
        $tableName = input('table');
        $list = db($tableName);
        if(input('field')){
            $field = input('field');
            $list = $list->field($field);
        }
        if(input('where')){
            $where = input('where');
            $list = $list->where($where);
        }
        $list = $list->select();
        return json_encode($list);
    }
}