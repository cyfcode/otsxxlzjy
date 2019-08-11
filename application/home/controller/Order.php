<?php

namespace app\home\controller;

use think\Db;
use think\Request;
use think\Controller;

class Order extends Controller
{
    public function add()
    {
        if (Request()->isPost()) {
            $userId = session('user.id');
            if(!$userId){
                return json_encode([
                    status => -1,
                    msg => '用户未登录'
                ]);
            }
            $username = input('username');
            $fromAddress = input('fromAddress');
            $toAddress = input('toAddress');
            $fromTime = strtotime(input('fromTime'));
            $toTime = strtotime(input('toTime'));
            $email = input('email');
            $tel = input('tel');
            $carId = input('carId');
            $zhangdan = input('zhangdan');
            $createtime = time();
            $total = input('total');
            // 读取库存
            $carData = db('car')->find($carId);
            if($carData['repertory'] < 1){
                return json_encode([
                    status => 1,
                    msg => '车辆库存不足，请联系客服'
                ]);
            }
            // 减库存
            $res = db('car')->update(array(
                'id' => $carId,
                'repertory' => $carData['repertory'] - 1
            ));
            if(!$res){
                return json_encode([
                    status => 1,
                    msg => '库存更新失败，请联系客服'
                ]);
            }
            $id = db('order')->insert([
                car_id => $carId,
                user_id => $userId,
                from_address_id => $fromAddress,
                to_address_id => $toAddress,
                from_time => $fromTime,
                to_time => $toTime,
                user_name => $username,
                email => $email,
                zhangdan => $zhangdan,
                tel => $tel,
                createtime => $createtime,
                updatetime => $createtime,
                total => $total
            ]);
            if($id){
                $date = date("Y-m-d H:i:s", $createtime);
                $carName = input('carName');
                $pic = input('pic');
                $fromAddressName = input('fromAddressName');
                $toAddressName = input('toAddressName');
                $fromTime = input('fromTime');
                $toTime = input('toTime');
                $system = db('system')->find(1);
                $content = <<<EOT
亲爱的{$username}，您好：<br>
恭喜您！在OTS新西兰自驾游网上预约成功！以下是您的预约信息：
<ul>
    <li>订单号：{$id}</li>
    <li>开单时间：{$date}</li>
    <li>车型：{$carName} <br>
        <img src="http://www.otsxxlzjy.com/{$pic}">
    </li>
    <li>取车：{$fromAddressName} {$fromTime}</li>
    <li>还车：{$toAddressName} {$toTime}</li>
</ul>
<br>
帐单信息
<ul>
    {$zhangdan}
</ul>
<br>
<br>
以上是您的预约信息，如果任何疑问请致电：{$system['tel']}, 或 Email至{$system['email']}
感谢您对新西兰自驾游的信赖与支持！祝您家庭和睦，辛福安康！
EOT;
                $send = send_email(array($email, 'order@ots-info.com'), 'OTS新西兰自驾游车款预约成功通知！', $content);
                return json_encode([
                    orderId => $id,
                    status => 0,
                    emailSended => $send
                ]);
            }
        }
    }
}