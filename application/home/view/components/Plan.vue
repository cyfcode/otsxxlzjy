<template>
    <div class="ct">
        <div class="path">
            <div class="left">
                <h3>
                    快速搜索
                </h3>
                <p>
                    在此输入您的行程以找到您的车辆。
                </p>
            </div>
            <div class="right">
                <div class="form">
                    <div class="from">
                        <el-select v-model="fromAddress" placeholder="取车营业所" size="mini">
                            <el-option
                                    size="mini"
                                    v-for="item in address"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id">
                            </el-option>
                        </el-select>
                        <el-date-picker
                                size="mini"
                                v-model="fromTime"
                                type="datetime"
                                placeholder="选择日期时间">
                        </el-date-picker>
                    </div>
                    <div class="to">
                        <el-select v-model="toAddress" placeholder="取车营业所" size="mini">
                            <el-option
                                    size="mini"
                                    v-for="item in address"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id">
                            </el-option>
                        </el-select>
                        <el-date-picker
                                size="mini"
                                v-model="toTime"
                                type="datetime"
                                placeholder="选择日期时间">
                        </el-date-picker>
                    </div>
                </div>
                <div class="find">
                    <div class="btn" @click="toUrl('/home/cars/index/catId/17')"><i class="iconfont">&#xe60f;</i>车辆一键搜索</div>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                fromTime: '',
                fromAddress: '',
                toTime: '',
                toAddress: '',
                address: []
            }
        },
        created() {
            axios.get('/home/address/getList').then(res => {
                if(Array.isArray(res.data)){
                    this.address = res.data;
                }
            })
        },
        methods: {
            toUrl(url){
                location.href = url;
            }
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .footer {
        height: 0;
        padding: 0 !important;
        width: 100%;
        border-top: solid 2px #307232;
        border-bottom: solid 3px #276029;
        -webkit-border-radius: 0 0 3px 3px;
        -moz-border-radius: 0 0 3px 3px;
        border-radius: 0 0 3px 3px;
        z-index: 11;
    }

    .path {
        background: #3f8241;
        margin: 39px auto 0;
        height: 120px;
        display: flex;
        .left {
            width: 260px;
            padding: 0 30px 0 62px;
            margin: 0 29px -2px 0;
            border-bottom: 0;
            border-right: solid 1px #458e47;
            background: -moz-linear-gradient(top, #39913b 0%, #3f8241 85%, #307432 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #39913b), color-stop(85%, #3f8241), color-stop(100%, #307432));
            background: -webkit-linear-gradient(top, #39913b 0%, #3f8241 85%, #307432 100%);
            background: -o-linear-gradient(to bottom, #39913b 0%, #3f8241 85%, #307432 100%);

            background: -ms-linear-gradient(to bottom, #39913b 0%, #3f8241 85%, #307432 100%);

            background: linear-gradient(to bottom, #39913b 0%, #3f8241 85%, #307432 100%);

            border-bottom: solid 1px #3b6c3d;
            display: flex;
            flex-direction: column;
            justify-content: center;
            h3 {
                font-size: 22px;
                font-weight: normal;
                color: #fff;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, .25);
                font: normal 20px/20px EtelkaText, Avenir, arial, sans-serif;
            }
            p {
                margin-top: 8px;
                font-size: 14px;
                line-height: 18px;
                color: rgba(255, 255, 255, .75);
                font-weight: bold;
            }
        }
        .right {
            flex: 1;
            display: flex;
            .form {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                .from {
                    margin-bottom: 14px;
                }
                .el-select {
                    margin-right: 10px;
                }
            }
            .find {
                display: flex;
                align-items: center;
                width: 200px;
                justify-content: center;
                .btn {
                    border: none;
                    display: inline-block;
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
                }
            }
        }
    }
</style>
