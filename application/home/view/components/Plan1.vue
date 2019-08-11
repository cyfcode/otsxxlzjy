<template>
    <div class="ct">
        <h2>预订车辆</h2>
        <dl :class="{active: step == 1}">
            <dt>
                <span class="num">1</span>
                选择行程
            </dt>
            <dd class="tips">
                请在下面填写您的行程，开始为此车辆编制报价
            </dd>
            <dd>
                <div class="form">
                    <div class="from">
                        <div class="title">
                            取车营业所
                        </div>
                        <el-select v-model="fromAddress" placeholder="取车营业所" size="mini">
                            <el-option
                                    size="mini"
                                    v-for="item in address"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="to">
                        <div class="title">
                            还车营业所
                        </div>
                        <el-select v-model="toAddress" placeholder="取车营业所" size="mini">
                            <el-option
                                    size="mini"
                                    v-for="item in address"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id">
                            </el-option>
                        </el-select>
                    </div>
                </div>
                <div class="time">
                    <el-date-picker
                            v-model="timerange"
                            size="mini"
                            type="datetimerange"
                            align="right"
                            start-placeholder="取车日期与时间"
                            end-placeholder="还车日期与时间"
                            value-format="yyyy-MM-dd HH:mm:ss"
                            :default-time="['12:00:00', '12:00:00']">
                    </el-date-picker>
                </div>
                <div class="find">
                    <div class="btn" @click="toStep(1)">继续</div>
                </div>
            </dd>
        </dl>
        <dl :class="{active: step == 2}">
            <dt>
                <span class="num">2</span>
                租车人信息
            </dt>
            <dd class="tips">
                请认真填写一下信息，取车时需要现场核对！
            </dd>
            <dd>
                <div class="form1">
                    <div class="item">
                        <div class="field"><i class="iconfont">&#xe601;</i>主驾驶人姓名</div>
                        <div class="value">
                            <el-input v-model="username" size="mini"></el-input>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field"><i class="iconfont">&#xe62f;</i>乘车人数</div>
                        <div class="value">
                            <el-select v-model="count" size="mini">
                                <el-option
                                        size="mini"
                                        v-for="n in carData.people"
                                        :key="n"
                                        :value="n">
                                </el-option>
                            </el-select>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field"><i class="iconfont">&#xe601;</i>其中驾驶人人数</div>
                        <div class="value">
                            <el-select v-model="dcount" size="mini">
                                <el-option
                                        size="mini"
                                        v-for="n in count"
                                        :key="n"
                                        :value="n">
                                </el-option>
                            </el-select>
                        </div>
                    </div>
                    <div class="item" v-for="n in dcount">
                        <div class="field"><i class="iconfont">&#xe60c;</i>驾驶人{{n}}出生年月日</div>
                        <div class="value">
                            <el-date-picker
                                    v-model="birthday[n - 1]"
                                    type="date"
                                    size="mini"
                                    placeholder="选择日期">
                            </el-date-picker>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="item">
                        <div class="field"><i class="iconfont">&#xe694;</i>手机号码</div>
                        <div class="value">
                            <el-input type="number" v-model="tel" size="mini"></el-input>
                        </div>
                    </div>
                    <div class="item">
                        <div class="field"><i class="iconfont">&#xe68f;</i>电子邮箱</div>
                        <div class="value">
                            <el-input type="email" v-model="email" size="mini"></el-input>
                        </div>
                    </div>
                    <br>
                    <br>
                    <el-checkbox-group v-model="fujia" size="mini">
                        <el-checkbox v-for="(item, index) in fujiaxuanxiangList" :key="index" :label="item.title">
                            需要{{item.title}} (NZ${{item.feiyong}})
                        </el-checkbox>
                    </el-checkbox-group>
                    <div class="item" v-if="fujia.indexOf('儿童安全汽座') != -1 && count > 1">
                        <br>
                        <div class="field"><i class="iconfont">&#xe633;</i>儿童安全汽座数量</div>
                        <div class="value">
                            <el-input-number v-model="ertongzuoNum" :min="1" :max="count - 1"
                                             size="mini"></el-input-number>
                        </div>
                    </div>
                    <br>
                    <br>
                    <el-radio v-model="priceType" :label="1">全额保险 (NZ${{carData.lingfengxian}})</el-radio>
                    <el-radio v-model="priceType" :label="2">普通保险 (NZ${{carData.fengxian}})</el-radio>
                </div>
                <div class="find">
                    <div class="btn prev" @click="toStep(0)">上一步</div>
                    <div class="btn" @click="toStep(2)">继续</div>
                </div>
            </dd>
        </dl>
        <dl :class="{active: step == 3}">
            <dt>
                <span class="num">3</span>
                订单确认
            </dt>
            <dd class="tips">
                请核对您的租车信息！
            </dd>
            <dd class="result" style="background: #FFF;color: #000;margin-top: 10px;">
                <div class="group">
                    <div class="item">主驾驶人姓名：{{username}}</div>
                    <div class="item">乘车人数：{{count}} (驾驶{{dcount}}人)</div>
                    <div class="item">驾驶人年龄：{{getAges}}</div>
                    <div class="item">电子邮箱：{{email}}</div>
                    <div class="item">联系电话：{{tel}}</div>
                </div>
                <div class="group" style="margin: 10px 0;">
                    <div class="item">取车: {{getAddressName(fromAddress)}} {{fromTime}}</div>
                    <div class="item">还车: {{getAddressName(toAddress)}} {{toTime}}</div>
                </div>
                <div class="group">
                    <div class="item" v-for="(item, index) in fujia" :key="index">
                        需要{{item}}
                        <span v-if="item == '儿童安全汽座'">{{ertongzuoNum}}个</span>
                    </div>
                </div>
                <div class="group yusuan">
                    <div class="title">预算帐单</div>
                    <ul v-html="zhangdan"></ul>
                </div>
                <div class="find">
                    <div class="btn prev" @click="toStep(0)">上一步</div>
                    <div class="btn" @click="submit">提交</div>
                </div>
            </dd>
        </dl>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    export default {
        props: ['carData', 'userInfo'],
        data() {
            return {
                birthday: [],
                jiejiList: [],
                yidihuancheList: [],
                fujiaxuanxiangList: [],
                sijitiaojianList: [],
                step: 1,
                fromTime: '',
                fromAddress: '',
                toTime: '',
                toAddress: '',
                address: [],
                username: '',
                count: 1,
                dcount: 1,
                email: '',
                tel: '',
                fujia: [],
                timerange: '',
                ages: [],
                priceType: 1,
                ertongzuoNum: 0
            }
        },
        watch: {
            fujia: {
                deep: true,
                handler(value) {
                    console.log(value);
                }
            }
        },
        computed: {
            getAges() {
                return this.ages.join('、');
            },
            zhangdan() {
                if (this.step != 3) return [];
                let temp = [];
                // 租车时间
                let fromTime = moment(this.fromTime),
                    toTime = moment(this.toTime);
                let day = Math.ceil(moment.duration(toTime - fromTime).asDays());
                temp.push(`<li>租用总天数：${day} 天</li>`);
                // 基本费用总和
                let baseSumPrice = this.carData.base_price * day;
                temp.push(`<li>基本费用：NZ${this.carData.base_price} * ${day}天 = NZ$${baseSumPrice} </li>`);

                // 风险补偿费用总和
                var fenxian = '全额保险',
                    fenxianPrice = this.carData.lingfengxian;
                if (this.priceType == 2) {
                    fenxian = '普通保险';
                    fenxianPrice = this.carData.fengxian;
                }
                let fenxianSumPrice = fenxianPrice * day;
                temp.push(`<li>${fenxian}费用：NZ$${fenxianPrice} * ${day}天 = NZ$${fenxianSumPrice} </li>`);
                // 接机服务费
                let jiejidi = '', jiejifei = 0;
                this.jiejiList.forEach(item => {
                    if (item.title.indexOf(this.getAddressName(this.fromAddress)) != -1) {
                        jiejidi = item.title;
                        jiejifei = item.feiyong;
                    }
                });
                temp.push(`<li>${jiejidi}接机费用：NZ$${jiejifei} </li>`);
                // 异地还车
                let yidihuancheFei = 0;
                if (this.fromAddress != this.toAddress) {
                    this.yidihuancheList.forEach(item => {
                        if (item.quchedi == this.fromAddress && item.huanchedi == this.toAddress) {
                            yidihuancheFei = item.feiyong;
                        }
                    });
                    temp.push(`<li>异地还车费用：NZ$${yidihuancheFei} </li>`);
                }
                // 司机人数费
                let sijiRule = this.sijitiaojianList[0];
                let sijifei = 0, xiaoyu25Fei = 0;
                if (this.dcount > 1) {
                    sijifei = (this.dcount - 1) * sijiRule.sijirenshu * day;
                    temp.push(`<li>司机人数费用：${this.dcount - 1}人 * NZ$${sijiRule.sijirenshu} * ${day}天 = NZ$${sijifei} </li>`);
                    let xiaoyu25 = 0;
                    this.ages.forEach(item => {
                        if (Number(item) < 25) {
                            xiaoyu25++;
                        }
                    });
                    xiaoyu25Fei = xiaoyu25 * sijiRule.nianlingfei;
                    temp.push(`<li>小于25周岁司机费用：${xiaoyu25}人 * NZ$${sijiRule.nianlingfei} = NZ$${xiaoyu25Fei}</li>`);
                }

                // 附加
                let sumFujia = 0;
                this.fujiaxuanxiangList.forEach(item => {
                    //儿童座
                    if (item.title == '儿童安全汽座' && this.fujia.indexOf('儿童安全汽座') != -1) {
                        let ertong = item.feiyong * this.ertongzuoNum;
                        sumFujia += ertong
                        temp.push(`<li>儿童安全汽座费用：NZ$${item.feiyong} * ${this.ertongzuoNum}人 = NZ$${ertong} </li>`);
                    }
                    else if (this.fujia.indexOf(item.title) != -1) {
                        sumFujia += item.feiyong;
                        temp.push(`<li>${item.title}费用：NZ$${item.feiyong}</li>`);
                    }
                });
                // 总费用
                let sum = baseSumPrice + fenxianSumPrice + jiejifei + yidihuancheFei + sijifei + sumFujia + xiaoyu25Fei;
                temp.push(`<li class="sum">总计：NZ$${sum}</li>`);
                return temp.join('');
            },
            total() {
                let result = 0;
                if (this.step != 3) return result;
                let temp = [];
                // 租车时间
                let fromTime = moment(this.fromTime),
                    toTime = moment(this.toTime);
                let day = Math.ceil(moment.duration(toTime - fromTime).asDays());
                // 基本费用总和
                let baseSumPrice = this.carData.base_price * day;

                // 风险补偿费用总和
                var fenxian = '全额保险',
                    fenxianPrice = this.carData.lingfengxian;
                if (this.priceType == 2) {
                    fenxian = '普通保险';
                    fenxianPrice = this.carData.fengxian;
                }
                let fenxianSumPrice = fenxianPrice * day;
                // 接机服务费
                let jiejidi = '', jiejifei = 0;
                this.jiejiList.forEach(item => {
                    if (item.title.indexOf(this.getAddressName(this.fromAddress)) != -1) {
                        jiejidi = item.title;
                        jiejifei = item.feiyong;
                    }
                });
                // 异地还车
                let yidihuancheFei = 0;
                if (this.fromAddress != this.toAddress) {
                    this.yidihuancheList.forEach(item => {
                        if (item.quchedi == this.fromAddress && item.huanchedi == this.toAddress) {
                            yidihuancheFei = item.feiyong;
                        }
                    });
                }
                // 司机人数费
                let sijiRule = this.sijitiaojianList[0];
                let sijifei = 0, xiaoyu25Fei = 0;
                if (this.dcount > 1) {
                    sijifei = (this.dcount - 1) * sijiRule.sijirenshu * day;
                    let xiaoyu25 = 0;
                    this.ages.forEach(item => {
                        if (Number(item) < 25) {
                            xiaoyu25++;
                        }
                    });
                    xiaoyu25Fei = xiaoyu25 * sijiRule.nianlingfei;
                }

                // 附加
                let sumFujia = 0;
                this.fujiaxuanxiangList.forEach(item => {
                    //儿童座
                    if (item.title == '儿童安全汽座' && this.fujia.indexOf('儿童安全汽座') != -1) {
                        let ertong = item.feiyong * this.ertongzuoNum;
                        sumFujia += ertong
                    }
                    else if (this.fujia.indexOf(item.title) != -1) {
                        sumFujia += item.feiyong;
                    }
                });
                // 总费用
                let sum = baseSumPrice + fenxianSumPrice + jiejifei + yidihuancheFei + sijifei + sumFujia + xiaoyu25Fei;
                result = sum;
                return result;
            }
        },
        created() {
            // 获取地址列表
            axios.get('/home/address/getList').then(res => {
                if (Array.isArray(res.data)) {
                    this.address = res.data;
                }
            });
            // 获取接机服务
            axios.post('/home/map/getList', {
                table: 'jieji',
                field: 'title,feiyong'
            }).then(res => {
                if (Array.isArray(res.data)) {
                    this.jiejiList = res.data;
                }
            });
            // 异地取车
            axios.post('/home/map/getList', {
                table: 'yidihuanche',
                field: 'quchedi,huanchedi,feiyong'
            }).then(res => {
                if (Array.isArray(res.data)) {
                    this.yidihuancheList = res.data;
                }
            });
            // 附加费用
            axios.post('/home/map/getList', {
                table: 'fujiaxuanxiang',
                field: 'id,title,feiyong'
            }).then(res => {
                if (Array.isArray(res.data)) {
                    this.fujiaxuanxiangList = res.data;
                }
            });
            // 司机附加
            axios.post('/home/map/getList', {
                table: 'sijitiaojian',
                field: 'id,sijirenshu,buman,nianlingfei'
            }).then(res => {
                if (Array.isArray(res.data)) {
                    this.sijitiaojianList = res.data;
                }
            });
        },
        methods: {
            getAddressName(id) {
                for (let i = 0, len = this.address.length; i < len; i++) {
                    if (this.address[i].id == id) {
                        return this.address[i].name;
                    }
                }
            },
            submit() {
                axios.post('/home/order/add', {
                    fromAddress: this.fromAddress,
                    toAddress: this.toAddress,
                    fromTime: this.fromTime,
                    toTime: this.toTime,
                    username: this.username,
                    email: this.email,
                    tel: this.tel,
                    carId: this.carData.id,
                    zhangdan: this.zhangdan,
                    carName: this.carData.title,
                    pic: this.carData.thumb,
                    fromAddressName: this.getAddressName(this.fromAddress),
                    toAddressName: this.getAddressName(this.toAddress),
                    total: this.total
                }).then(res => {
                    let data = res.data;
                    if (data.status == 0) {
                        const { orderId } = data.id;
                        this.$message({
                            message: '订单创建成功，即将跳转到支付页面',
                            type: 'success'
                        });
                        location.href = '/home/alipay/index?orderId=' + orderId;
                    } else {
                        this.$message({
                            message: data.msg,
                            type: 'warning',
                            onClose() {
                                if (data.status == -1) {
                                    location.href = '/user/index/index';
                                }
                            }
                        });
                    }
                });
            },
            toStep(step) {
                switch (step) {
                    case 0:
                        this.step--;
                        break;
                    case 1:
                        if(!this.userInfo){
                            this.$message({
                                message: '请先登录',
                                type: 'warning',
                                onClose(){
                                    location.href = '/user/login/index';
                                }
                            });
                            return;
                        }
                        if (!this.fromAddress) {
                            this.$message('请选择取车点');
                            return;
                        }
                        if (!this.toAddress) {
                            this.$message('请选择还车点');
                            return;
                        }
                        if (!this.timerange) {
                            this.$message('请选择取还车时间');
                            return;
                        }
                        this.fromTime = this.timerange[0];
                        this.toTime = this.timerange[1];
                        this.step++;
                        break;
                    case 2:
                        if (!this.username) {
                            this.$message('请填写你的姓名');
                            return;
                        }
                        if (!this.email) {
                            this.$message('请填写电子邮箱');
                            return;
                        }
                        if (!this.tel) {
                            this.$message('请填写联系电话');
                            return;
                        }
                        if(!this.dcount > this.birthday.length){
                            this.$message('请填写驾驶人出生年月日');
                            return;
                        }
                        let ages = [], now = Date.now();
                        this.birthday.forEach(item => {
                            try{
                                ages.push(Math.floor(moment.duration(now - moment(item)).asYears()));
                            }catch (e) {}
                        });
                        this.ages = ages;
                        this.step++;
                        break;
                }
            }
        }
    }
</script>
<style>
    .el-checkbox, .el-checkbox__input.is-checked + .el-checkbox__label, .el-radio__input.is-checked + .el-radio__label, .el-radio__label {
        color: #ffffff;
    }

    .el-icon-minus, .el-icon-plus {
        line-height: 26px !important;
    }
</style>

<style type="text/less" lang="less" scoped>
    .form1 .field{
        margin-bottom: 4px;
        .iconfont{
            margin-right: 4px;
        }
    }
    .yusuan {
        margin-top: 20px;
        .title {
            font-size: 16px;
            text-align: center;
            color: #488d4a;
            margin-bottom: 15px;
        }
        ul {
            li {
                list-style: disc;
            }
        }
    }

    .el-checkbox {
        margin-left: 0;
        display: block;
    }

    .result {
        line-height: 26px;
    }

    .el-date-editor {
        display: block;
        width: 100%;
    }

    h2 {
        text-align: center;
        padding: 20px 0;
        font-weight: normal;
    }

    .ct {
        width: 450px;
        background: #3f8241;
        color: #FFFFFF;
        overflow: hidden;
        padding: 10px 0;
        border: 10px solid #3f8241;
    }

    dl {
        dt {
            color: #191a4b;
        }
        dt, dd {
            padding: 20px 40px;
        }
        dt {
            background: #FFFFFF;
            border-bottom: 1px solid #eee;
            .num {
                display: inline-block;
                width: 30px;
                height: 30px;
                background: #b0b0b0;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                text-align: center;
                font: normal 18px/32px EtelkaText, Avenir, arial, sans-serif;
                color: #fff;
                margin-right: 15px;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, .25);
            }
        }
        dd {
            display: none;
        }
    }

    dl.active {
        border-top: #2f8831 1px solid;
        padding: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        .tips {
            background: #FFFFFF;
            color: #3f8241;
            padding-top: 0;
        }
        .num {
            background: #3f8241;
        }
        dt {
            border-bottom: none;
        }
        dd {
            background: #3f8241;
            display: block;
        }
    }

    .form1 {
        .item {
            margin-bottom: 10px;
        }
    }

    .form {
        display: flex;
        justify-content: space-between;
        .title {
            text-align: center;
            color: #FFFFFF;
            font-size: 12px;
        }
        .from, .to {
            > * {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        .from {
            width: 45%;
        }
        .to {
            width: 45%;
        }
        .el-select {
            margin-right: 10px;
        }
    }

    .find {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-top: 30px;
        .btn {
            border: none;
            display: inline-block;
            height: 36px;
            padding: 0 26px;
            background: #2c2d7f;
            color: #fff;
            font: bold 14px/40px Avenir, arial, sans-serif;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: solid 3px #191948;
            -webkit-border-radius: 2px 2px 3px 3px;
            -moz-border-radius: 2px 2px 3px 3px;
            border-radius: 2px 2px 3px 3px;
            background: -moz-linear-gradient(top, #3c3d8a 0%, #292a77 95%, #393ba5 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3c3d8a), color-stop(95%, #292a77), color-stop(100%, #393ba5));
            background: -webkit-linear-gradient(top, #3c3d8a 0%, #292a77 95%, #393ba5 100%);
            background: -o-linear-gradient(top, #3c3d8a 0%, #292a77 95%, #393ba5 100%);
            background: -ms-linear-gradient(top, #3c3d8a 0%, #292a77 95%, #393ba5 100%);
            background: linear-gradient(to bottom, #3c3d8a 0%, #292a77 95%, #393ba5 100%);
            -webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, .2);
            -moz-box-shadow: 1px 1px 5px rgba(0, 0, 0, .2);
            -khtml-box-shadow: 1px 1px 5px rgba(0, 0, 0, .2);
            -ms-box-shadow: 1px 1px 5px rgba(0, 0, 0, .2);
            box-shadow: 1px 1px 5px rgba(0, 0, 0, .2);
            -webkit-transition: background .2s ease 0s;
            -moz-transition: background .2s ease 0s;
            -o-transition: background .2s ease 0s;
            transition: background .2s ease 0s;
            cursor: pointer;
            &.prev {
                margin-right: 20px;
                border-bottom: solid 3px #264c27;
                background: -moz-linear-gradient(top, #488d4a 0%, #3c753d 95%, #376e39 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #488d4a), color-stop(95%, #3c753d), color-stop(100%, #376e39));
                background: -webkit-linear-gradient(top, #488d4a 0%, #3c753d 95%, #376e39 100%);
                background: -o-linear-gradient(top, #488d4a 0%, #3c753d 95%, #376e39 100%);
                background: -ms-linear-gradient(top, #488d4a 0%, #3c753d 95%, #376e39 100%);
                background: linear-gradient(to bottom, #488d4a 0%, #3c753d 95%, #376e39 100%);
            }
        }
    }
</style>
