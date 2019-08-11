<template>
    <div class="ct">
        <div class="top">
            Quick Search
        </div>
        <div class="content">
            <div class="form">
                <div class="from">
                    <div class="title">取车</div>
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
                    <div class="title">还车</div>
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
                <div class="btn" @click="toUrl('/home/cars/index/catId/17')">车辆一键搜索</div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return {
                fromTime: '',
                fromAddress: '',
                toTime: '',
                toAddress: '',
                address: []
            }
        },
        created(){
            axios.get('/home/address/getList').then(res => {
                if(Array.isArray(res.data)){
                    this.address = res.data;
                }
            });
        },
        methods: {
            toUrl(url){
                location.href = url;
            }
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .ct{
        background: #3f8241;
        position: relative;
        .top{
            background: -moz-linear-gradient(top,#4d9b4f 0%,#3f8241 85%,#1e7620 100%);
            background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#4d9b4f),color-stop(85%,#3f8241),color-stop(100%,#1e7620));
            background: -webkit-linear-gradient(to bottom, #4d9b4f 0%, #3f8241 85%, #1e7620 100%);
            background: -o-linear-gradient(to bottom, #4d9b4f 0%, #3f8241 85%, #1e7620 100%);
            background: -ms-linear-gradient(to bottom, #4d9b4f 0%, #3f8241 85%, #1e7620 100%);
            background: linear-gradient(to bottom, #4d9b4f 0%, #3f8241 85%, #1e7620 100%);
            border-bottom: solid 1px #417d43;
            height: 50px;
            text-align: center;
            color: #FFFFFF;
            font-size: 18px;
            text-shadow: 1px 1px 1px rgba(0,0,0,.25);
            line-height: 50px;
        }
        .content{
            padding: 20px;
            .from{
                margin-bottom: 20px;
            }
            .title{
                text-align: center;
                font-size: 14px;
                line-height: 20px;
                color: #FFFFFF;
                letter-spacing: 10px;
                margin-bottom: 6px;
            }
            .el-select{
                display: block;
                margin-bottom: 5px;
            }
            .el-input{
                width: auto;
            }
            .find{
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
            .btn{
                border: none;
                display: inline-block;
                height: 36px;
                padding: 0 26px;
                background: #2c2d7f;
                color: #fff;
                font: bold 14px/36px Avenir,arial,sans-serif;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 1px;
                border-bottom: solid 3px #191948;
                -webkit-border-radius: 2px 2px 3px 3px;
                -moz-border-radius: 2px 2px 3px 3px;
                border-radius: 2px 2px 3px 3px;
                background: -moz-linear-gradient(top,#3c3d8a 0%,#292a77 95%,#393ba5 100%);
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#3c3d8a),color-stop(95%,#292a77),color-stop(100%,#393ba5));
                background: -webkit-linear-gradient(top,#3c3d8a 0%,#292a77 95%,#393ba5 100%);
                background: -o-linear-gradient(top,#3c3d8a 0%,#292a77 95%,#393ba5 100%);
                background: -ms-linear-gradient(top,#3c3d8a 0%,#292a77 95%,#393ba5 100%);
                background: linear-gradient(to bottom,#3c3d8a 0%,#292a77 95%,#393ba5 100%);
                -webkit-box-shadow: 1px 1px 5px rgba(0,0,0,.2);
                -moz-box-shadow: 1px 1px 5px rgba(0,0,0,.2);
                -khtml-box-shadow: 1px 1px 5px rgba(0,0,0,.2);
                -ms-box-shadow: 1px 1px 5px rgba(0,0,0,.2);
                box-shadow: 1px 1px 5px rgba(0,0,0,.2);
                -webkit-transition: background .2s ease 0s;
                -moz-transition: background .2s ease 0s;
                -o-transition: background .2s ease 0s;
                transition: background .2s ease 0s;
                cursor: pointer;
            }
        }
    }
    .footer{
        height: 0;
        padding: 0!important;
        width: 100%;
        border-top: solid 2px #367638;
        border-bottom: solid 3px #295f2a;
        -webkit-border-radius: 0 0 3px 3px;
        -moz-border-radius: 0 0 3px 3px;
        border-radius: 0 0 3px 3px;
        z-index: 11;
    }
</style>
