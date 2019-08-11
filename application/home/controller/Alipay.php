<?php
namespace app\home\controller;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use think\Db;

class Alipay
{
    protected $config = [
        //应用ID,您的APPID。
        'app_id' => '2016100100640642',
        //异步通知地址
        'notify_url' => 'http://www.otsxxlzjy.com/home/alipay/notify',
        //同步跳转
        'return_url' => 'http://www.otsxxlzjy.com/home/alipay/return',
        //支付宝公钥
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnL7VYA4xIF/Nb/+zljNckNLSXp/s7S8NAfRfwcD5vLysdlkm0z8CaxYIkotnGBwIb0Hy3kRKzrtqVzsdhRHmxtKLVcFE7kLKVwvfPV+ZiKraMW+OTu2LMbkPs/j/SDhOZ2Eiq52d2Tk2dAaqi2FRT16uaElgrWwRryghDN5s8m2dUce2fUXg3ZW8X8aRNDfLRaOlk8btEj1bLKx6BgcwfRftEy7uE3aKBO42zqhVZy5ZWahk4DHTeS9bZu8Xod+Zs/U/jzIuhrXnmafLcI7FQ8Y477Hj8CShfcvRYmTs8vI4r9a/aRBCqXNGi5H4yLskhpaY98DDu4eAJ5BoYvAUMQIDAQAB',
        // 加密方式： **RSA2**
        'sign_type'=>"RSA2",
        //商户私钥
        'private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCUIjYpFj3arl8Fd+JWjZmO7AGIz8aeE+yR1g8JeEaHJXq4l50Xn+C9fYjzRY7bEp7UUdbNviU/izr6am/aXrxsfw6wKwqTqN2TJFrtM7pSxfZ4zgDIMQKR39KH2o0KeEUvDAaqUuLWki2GFMyb6KqHSIG3ol4dnciX3Pj3AmPNuYbOMY6Yf8ZggZhnELnuUiWFNo+eaU6kpWbI/WbWPzfbaBYCY4yTr+n7lhaLmGaZnRlWgY8jx1bPaTL2N56aUb0/Ka30RkzFvvHBX4Dh6qUYREk/VyfGyOnLvFBLBH6+4ERkwLyqBdg1CZf2dGGl9gpZUkkU49jEAhbw7837YQ/XAgMBAAECggEAZNbJMbz/TE8pRiqu/CaWYvGLtdtjJJcBkuE6CUNEF5nO6bvj54IhVj0PrjMqpT0OvBAd/p6y8ofQFUnBbNDSybTQheI25/+rHhBAiXqOGuzB9MifRaf/TNglk++V1Yu75OP14Zpc6p5FuSGNi5CeDUuxahVwpg6Tz7VQEa4hzJeziRxWkAMgire/ZEtWBhQAlYYAnUElBId5lazMsODsv/OuejuGXp1OGtwexlQPCFUYwSWLmPvGtfgrxzErq+56+dT6/GJlotE3QisHdPbJAZifHwYXp1v4szRbskuIkMJHNSAz67B7H3DJMmCVGNK1A0E7494o/3xIOyIhT1s0IQKBgQDkX/mn/Wi4FTlo/mPMYn5MHIX9CkC2YGM58GICYUv53I0K9BP48lF1A/+IyuBoog6K+cz+e8f8qzE63efIxq0cthxs78eCNAWWgzLdUg3RQOhjq54grVJB4nO5GlPR6DqI8kT+DrKpi1PM2YkG3ENuxoABKuRihEfXFUL8hcBG8QKBgQCmDW0upbsEXii7uFRctHiou/Q1WR6FypfzH9Pq7bU1TYTHHZvlxEVTNUjKjXc6bbfI62EQTljKQDpG/9gkY2tjgeV9MT7feO+Kyx79Y2yfRtxdtv6Wp/abVnhs06ee+pwdeKBtyMZz/K4Jkp+UF+TOh3+agnlcLSmosX3AKWGTRwKBgQDTM9NOQfRTsgU7DXC8NyZ4OzTLFG1OfQunLKFndBXwiMDDrYC/DVK59i2fk4hAHAd5DZZAj7ce/C92MnzGWL8GO4FEWehXiMbWMJWcyuLOb8m7S57ct43IMqY1PJziFnPz7KJTlsIyPBEO9OtdtdyDGP6Old1LIuzRg+9EXGm68QKBgQCMB1KFPdkh681p0B3EN6Rwll9wBYFJzfipW7O3r1Faa86Gox9ueT8E1jBWL0nWCeQsGOI3f/o8REFg0iuRNA3BUi8Wjcq5ZSCL6JJvl8Jn5re6h7DVlzrM7/SJwUrfM/Mmnyyap+9CrFiPVgggOK4IxBcFUvXIl4VD7rlerQbNzQKBgF57i98bdJYXrHN2d6U9Yi9MkXUL9sUf1pKaeEPzahPAezbYPanR+pd9nR4lv2t0W728f4Nt3hqZjaphrDpHTWdrx+a8EqLHWqlcwV67iDWqqEWMpWwnNWj+L3d7Cr7wIwzfdlFpYHyF2sJoolBO9Brm3mUHjsv6QBLvxu1S9BZw",
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];

    public function index()
    {
        $orderId = input('orderId');
        $orderInfo = db('order')->where('id',$orderId)->find();
        $order = [
            'out_trade_no' => $orderId,
            'total_amount' => $orderInfo['total'],
            'subject' => input('get.username'),
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        return $alipay->send();// laravel 框架中请直接 `return $alipay`
    }

    public function return()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！
        dump($data['trade_no']);
        // 发邮件
        $emailData = db("order")->where('id', $data['out_trade_no'])->find();
        //车型
        $carStyle = db('car')->where('id', $emailData['car_id'])->find();
        //取车地址
        $backAddress = db('address')->where('id', $emailData['from_address_id'])->find();
        //还车地址
        $getAddress = db('address')->where('id', $emailData['to_address_id'])->find();
        //系统信息
        $system = db('system')->find(1);
        $content = <<<EOT
亲爱的{$emailData['user_name']}，您好：<br>
恭喜您！在OTS新西兰自驾游网上预约成功！以下是您的预约信息：
<ul>
    <li>订单号：{$emailData['id']}</li>
    <li>支付宝订单号：{$data['trade_no']}</li>
    <li>开单时间：{$emailData['createtime']}</li>
    <li>车型：{$carStyle['title']} <br>
        <img src="http://www.otsxxlzjy.com/{$carStyle['thumb']}">
    </li>
    <li>取车：{$getAddress['title']} {$emailData['from_time']}</li>
    <li>还车：{$backAddress['title']} {$emailData['to_time']}</li>
</ul>
<br>
帐单信息
<ul>
    {$emailData['zhangdan']}
</ul>
<br>
<br>
以上是您的预约信息，如果任何疑问请致电：{$system['tel']}, 或 Email至{$system['email']}
感谢您对新西兰自驾游的信赖与支持！祝您家庭和睦，辛福安康！
EOT;
        $send = send_email(array($emailData['email'], 'order@ots-info.com'), 'OTS新西兰自驾游车款预约成功通知！', $content);


        // 更新支付宝订单号、订单状态
        $upData = ['real_total' => $data['total_amount'], 'trade_no' => $data['trade_no'], 'status' => 4];
        db('order')->where('id', $data['out_trade_no'])->update($upData);
        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
        //重定向到订单页面
        $this->redirect('/user/index');
    }

    public function notify()
    {
        $alipay = Pay::alipay($this->config);
        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！
            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success()->send();// laravel 框架中请直接 `return $alipay->success()`
    }
}
