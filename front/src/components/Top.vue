<template>
    <header class="top">
        <div class="main-container">
            <div class="logo"></div>
            <div class="nav">
                <dl>
                    <dt>租车</dt>
                    <dd>
                        <ul>
                            <li>车款介绍</li>
                            <li>保险介绍</li>
                            <li>在线预约付款</li>
                            <li>驾照说明</li>
                            <li>接送说明</li>
                            <li>交通规则说明</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>攻略</dt>
                    <dd>
                        <ul>
                            <li>景点介绍</li>
                            <li>购票方式</li>
                            <li>路线规划</li>
                        </ul>
                    </dd>
                </dl>
                <dl>
                    <dt>说说</dt>
                    <dd>
                        <ul>
                            <li>评价</li>
                            <li>心得分享</li>
                            <li>小编推荐</li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
    </header>
</template>
<style type="text/less" lang="less" scoped>
    .top {
        border-top: 5px solid #ec008c;
        display: flex;
        height: 90px;
        background: -moz-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -webkit-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -o-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -ms-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        position: relative;
        z-index: 3;
        .main-container {
            display: flex;
            height: 100%;
        }
        .logo {
            width: 350px;
            background: yellow;
        }
        .nav {
            flex: 1;
            display: flex;
            align-items: center;
            dl {
                float: left;
                margin-right: 18px;
                font-size: 15px;
                position: relative;
                dt {
                    color: #2c2d7f;
                    padding: 12px 20px;
                    border: solid 1px transparent;
                    cursor: pointer;
                    border-radius: 2px;
                }
                dd {
                    display: none;
                    position: absolute;
                    width: 200px;
                    background: #272875;
                    color: #ffffff;
                    margin-top: -2px;
                    padding: 6px 0;
                    box-sizing: border-box;
                    border-top: solid 1px #393ba5;
                    border-bottom: solid 3px #191948;
                    -webkit-border-radius: 2px 2px 3px 3px;
                    -moz-border-radius: 2px 2px 3px 3px;
                    border-radius: 2px 2px 3px 3px;
                    -webkit-box-shadow: 1px 1px 10px rgba(0, 0, 0, .5);
                    -moz-box-shadow: 1px 1px 10px rgba(0, 0, 0, .5);
                    -khtml-box-shadow: 1px 1px 10px rgba(0, 0, 0, .5);
                    -ms-box-shadow: 1px 1px 10px rgba(0, 0, 0, .5);
                    box-shadow: 1px 1px 10px rgba(0, 0, 0, .5);
                    ul {
                        li {
                            padding: 4px 20px;
                            font-size: 14px;
                            cursor: pointer;
                            &:hover {
                                background-color: #ec008c;
                                background: -moz-linear-gradient(top, #ed1492 0%, #e10885 95%, #e6399d 100%);
                                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ed1492), color-stop(95%, #e10885), color-stop(100%, #e6399d));
                                background: -webkit-linear-gradient(top, #ed1492 0%, #e10885 95%, #e6399d 100%);
                                background: -o-linear-gradient(top, #ed1492 0%, #e10885 95%, #e6399d 100%);
                                background: -ms-linear-gradient(top, #ed1492 0%, #e10885 95%, #e6399d 100%);
                                background: linear-gradient(to bottom, #ed1492 0%, #e10885 95%, #e6399d 100%);
                                color: #fff;
                                border-top: solid 1px #f25bb3;
                                border-bottom: solid 2px #9d005d;
                                -webkit-border-radius: 0 0 2px 2px;
                                -moz-border-radius: 0 0 2px 2px;
                                border-radius: 0 0 2px 2px;
                            }
                        }
                    }
                }
                &:hover {
                    dt {
                        background: #222365;
                        border-color: #222365;
                        color: #ec008c;
                    }
                    dd {
                        display: block;
                    }
                }
            }
        }
    }
</style>
<script>
    export default {}
</script>
