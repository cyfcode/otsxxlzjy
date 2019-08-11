<template>
    <div class="ct">
        <div class="pic">
            <div class="pic-ct">
                <img :src="data.thumb">
            </div>
            <table class="price-table">
                <tr>
                    <td colspan="2">基本费用</td>
                    <td>全额保险</td>
                    <td>普通保险</td>
                    <td rowspan="2"><a class="link" href="/home/cars/index/catId/41.html" target="_blank">关于保险</a></td>
                </tr>
                <tr>
                    <td>每24小时</td>
                    <td>NZ${{data.base_price}}</td>
                    <td>NZ${{data.lingfengxian}}</td>
                    <td>NZ${{data.fengxian}}</td>
                </tr>
            </table>
        </div>
        <div class="desc">
            <div class="l">
                <dl>
                    <dt>
                        <div class="name">{{data.title}} 【{{data.level}}】</div>
                        <div class="ext">{{data.brand}}</div>
                    </dt>
                    <dd>
                        <div class="item">
                            <div class="field">后备箱尺寸</div>
                            <div class="value" v-html="data.trunk"></div>
                        </div>
                        <div class="item">
                            <div class="field">排气量</div>
                            <div class="value">{{data.gas}}cc</div>
                        </div>
                        <div class="item">
                            <div class="field">耗油量</div>
                            <div class="value">{{data.oil}}km/L</div>
                        </div>
                        <div>
                            <div class="field">车身尺寸</div>
                            <div class="value" v-html="data.carsize"></div>
                        </div>
                    </dd>
                </dl>
                <div class="intro">
                    <ul>
                        <li>
                            <i class="iconfont">&#xe62f;</i>
                            {{data.people}}个座位
                        </li>
                        <li>
                            <i class="iconfont">&#xe62f;</i>
                            快適{{data.quick}}人
                        </li>
                        <li>
                            <i class="iconfont">&#xe60b;</i>
                            行李{{data.baggage}}件
                        </li>
                    </ul>
                </div>
            </div>
            <div class="r">
                <div class="actions" v-html="data.description"></div>
                <div class="intro">
                    <span class="btn" @click="toDetail(data.url)"><i class="iconfont">&#xe605;</i>去预约</span>
                    <span class="btn detail" @click="toDetail(data.url + '#detail')"><i class="iconfont">&#xe631;</i>看细节</span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        methods: {
            toDetail(url){
                if(url){
                    location.href = url;
                }
            }
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .iconfont {
        margin-right: 5px;
    }
    .pic-ct{
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .price-table{
        width: 100%;
        td{
            padding: 2px;
            border: 1px solid #e9e9e9;
            text-align: center;
            font-size: 14px;
            border-bottom: none;
            border-left: none;
            &:last-child{
                border-right: none;
            }
        }
    }
    .link{
        color: #478d4a;
    }
    .ct {
        display: flex;
        height: 300px;
        border: solid 1px #e2e2e2;
        -webkit-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -moz-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -khtml-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -ms-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: 14px;
        .pic {
            width: 330px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .desc {
            flex: 1;
            display: flex;
            .l {
                flex: 1;
                display: flex;
                flex-direction: column;
                border-left: solid 1px #eee;
            }
            .r {
                width: 240px;
                display: flex;
                flex-direction: column;
                border-left: solid 1px #eee;
            }
            .actions {
                flex: 1;
                padding: 12px 24px;
                text-indent: 2em;
                line-height: 23px;
                color: #757575;
                display: flex;
                align-items: center;
            }
            dl {
                flex: 1;
                padding: 12px 24px;
                dt {
                    margin-bottom: 16px;
                    .name {
                        font-size: 14px;
                        color: #2f6331;
                        font-weight: bold;
                    }
                    .ext{
                        font-size: 14px;
                        color: #030052;
                        font-weight: bold;
                    }
                }
                dd{
                    .item{
                        margin-bottom: 2px;
                    }
                    .field{
                        font-weight: bold;
                    }
                }
            }
            .intro {
                border-top: solid 1px #eee;
                height: 50px;
                display: flex;
                align-items: center;
                padding: 0 24px;
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
                ul {
                    li {
                        float: left;
                        margin-right: 10px;
                        display: flex;
                        justify-content: center;
                    }
                }
            }
        }
    }
</style>
