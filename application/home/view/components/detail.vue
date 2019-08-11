<template>
    <div class="ct">
        <div class="main-pic">
            <img :src="item.thumb" alt="">
        </div>
        <div class="to-detail"><span class="btn detail" @click="toHash('detail')"><i class="iconfont">&#xe631;</i>看细节</span></div>
        <div class="description" v-html="item.description"></div>
        <div class="feature">
            <ul>
                <li>
                    <i class="iconfont">&#xe62f;</i>
                    {{item.people}}个座位
                </li>
                <li>
                    <i class="iconfont">&#xe62f;</i>
                    快適{{item.quick}}人
                </li>
                <li>
                    <i class="iconfont">&#xe60b;</i>
                    行李{{item.baggage}}件
                </li>
            </ul>
        </div>
        <div class="specification">
            <dl>
                <dt>后备箱尺寸</dt>
                <dd v-html="item.trunk"></dd>
            </dl>
            <dl>
                <dt>排气量</dt>
                <dd>{{item.gas}}cc</dd>
            </dl>
            <dl>
                <dt>耗油量</dt>
                <dd>{{item.oil}}km/L</dd>
            </dl>
            <dl>
                <dt>车身尺寸</dt>
                <dd v-html="item.carsize"></dd>
            </dl>
        </div>
        <div class="location">
            <dl>
                <dt>取车营业所</dt>
                <dd v-html="item.address"></dd>
            </dl>
        </div>
        <div class="price" v-html="item.prices"></div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        computed: {
            item(){
                return Object.assign({}, this.data, {
                    carsize: this.data.carsize.replace(/\n/g, '<br>'),
                    address: this.data.address.replace(/\n/g, '<br>'),
                    trunk: this.data.trunk.replace(/\n/g, '<br>'),
                    description: this.data.description.replace(/\n/g, '<br>'),
                })
            }
        },
        methods: {
            toHash(hash){
                location.hash = hash;
            },
            toDetail(url){
                if(url){
                    window.open(url, '_blank');
                }
            },
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .to-detail{
        text-align: right;
    }
    .btn{
        border: 1px solid #488d4a;
        padding: 5px 10px;
        margin-right: 7px;
        border-radius: 4px;
        background: #FFF;
        color: #488d4a;
        cursor: pointer;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        .iconfont{
            margin-right: 4px;
        }
        &:hover{
            background: #488d4a;
            color: #FFF;
            font-weight: bold;
        }
        &.detail{
            border: 1px solid #3e3e8f;
            color: #3e3e8f;
            &:hover{
                color: #FFF;
                background: #3e3e8f;
                font-weight: bold;
            }
        }
    }
    .ct {
        font-size: 14px;
        width: 450px;
        color: #444444;
        box-sizing: border-box;
        padding: 20px 30px;
        .main-pic{
            border-bottom: none;
        }
        > div {
            padding: 10px;
            border-bottom: 1px solid #e1e1e1;
        }
        dl {
            margin: 10px 0;
            display: flex;
            dt {
                width: 100px;
            }
            dd {
                line-height: 26px;
            }
        }
        .feature {
            ul {
                li {
                    width: 50%;
                    float: left;
                    margin-bottom: 10px;
                }
                &:after {
                    content: ' ';
                    display: block;
                    clear: both;
                }
            }
        }
    }
    .ct {

    }
</style>
