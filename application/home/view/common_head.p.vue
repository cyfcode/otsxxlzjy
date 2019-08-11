<template>
    <header class="top">
        <div class="nav-ct main-container">
            <div class="logo">
                <a href="/"><img :src="logo"></a>
            </div>
            <div class="nav">
                <a href="/">
                    <dl>
                        <dt>首页</dt>
                    </dl>
                </a>
                <dl v-for="(item, index) in category" :key="item.id" :class="{active: item.catdir == catedir}">
                    <a v-if="item.catname == '租车'" href="/home/index/main">
                        <dt>租车</dt>
                    </a>
                    <a v-else-if="item.sub.length == 0" :href="item.url">
                        <dt>{{item.catname}}</dt>
                    </a>
                    <a v-else :href="item.sub[0].url"><dt>{{item.catname}}</dt></a>
                    <dd v-if="item.sub.length > 0">
                        <ul v-for="(v, k) in item.sub" :key="v.id">
                            <li @click="toUrl(v.url)">{{v.catname}}</li>
                        </ul>
                    </dd>
                </dl>
            </div>
            <div class="user-info">
                <dl v-if="userInfo">
                    <dt>
                        <img :src="userInfo.avatar || '/static/user/images/avatar/default.png'">
                        <span class="name">{{userInfo.username}}</span>
                    </dt>
                    <dd>
                        <ul>
                            <li @click="toUrl('/user/login/index')">会员中心</li>
                            <li @click="toUrl('/user/set/index')">设置</li>
                            <li @click="toUrl('/user/index/logout')">退出</li>
                        </ul>
                    </dd>
                </dl>
                <div class="login" v-else>
                    <span @click="toUrl('/user/login/index')">登录</span>
                    <span @click="toUrl('/user/login/reg')">注册</span>
                </div>
            </div>
        </div>
        <div class="contact">
            <div class="main-container">
                <div class="notice" v-html="debris['15'].content"></div>
                <div class="tel"><i class="iconfont">&#xe694;</i>{{sys.tel}}</div>
                <div class="email"><i class="iconfont">&#xe68f;</i>{{sys.email}}</div>
                <div class="login"></div>
            </div>
        </div>
    </header>
</template>
<style type="text/less" lang="less" scoped>
    .user-info{
        display: flex;
        align-items: center;
        .login{
            span{
                margin-right: 8px;
                cursor: pointer;
                &:hover{
                    color: #488d4a;
                }
                &:before{
                    content: '[';
                }
                &:after{
                    content: ']';
                }
            }
        }
        dl{
            position: relative;
            dt{
                display: flex;
                align-items: center;
                img{
                    width: 40px;
                    height: 40px;
                    border-radius: 25px;
                    margin-right: 10px;
                }
                .name{
                    font-size: 16px;
                }
            }
            &:hover{
                dd{
                    display: block;
                }
            }
            dd{
                display: none;
                position: absolute;
                background: #FFF;
                width: 100px;
                right: 0;
                box-shadow: 0 2px 8px -4px #000;
                ul{
                    padding: 4px 10px;
                    li{
                        line-height: 30px;
                        cursor: pointer;
                        &:hover{
                            color: #488d4a;
                        }
                    }
                }
                &:after{
                    content: ' ';
                    display: inline-block;
                    position: absolute;
                    border: 4px solid transparent;
                    border-bottom: 4px solid #FFF;
                    top: -8px;
                    right: 12px;
                }
            }
        }
    }
    .contact {
        border-top: solid 1px #e2e2e2;
        height: 60px;
        border-bottom: none;
        background: #FFF;
        .main-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .notice {
            width: 440px;
            margin-right: 50px;
        }
        .tel, .email{
            margin-right: 20px;
            font-size: 16px;
            i{
                color: #488d4a;
                margin-right: 3px;
            }
        }
    }
    .top {
        border-top: 5px solid #3f8241;
        background: -moz-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -webkit-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -o-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: -ms-linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        background: linear-gradient(top, #f9f9f9 0%, #f2f2f2 100%);
        position: relative;
        z-index: 3;
        .nav-ct {
            display: flex;
            height: 90px;
        }
        .logo {
            width: 200px;
            display: flex;
            align-items: center;
            a{
                display: block;
                height: 100%;
                img{
                    display: block;
                    max-height: 100%;
                    padding: 10px 0;
                    margin-left: 30px;
                }
            }
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
                    color: #488d4a;
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
                                background-color: #3f8241;
                                background: -moz-linear-gradient(top, #458c47 0%, #458c47 95%, #38753a 100%);
                                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3f8241), color-stop(95%, #458c47), color-stop(100%, #38753a));
                                background: -webkit-linear-gradient(to bottom, #3f8241 0%, #458c47 95%, #38753a 100%);
                                background: -o-linear-gradient(to bottom, #3f8241 0%, #458c47 95%, #38753a 100%);
                                background: -ms-linear-gradient(to bottom, #3f8241 0%, #458c47 95%, #38753a 100%);
                                background: linear-gradient(to bottom, #3f8241 0%, #458c47 95%, #38753a 100%);
                                color: #fff;
                                border-top: solid 1px #56a358;
                                border-bottom: solid 2px #2e682f;
                                -webkit-border-radius: 0 0 2px 2px;
                                -moz-border-radius: 0 0 2px 2px;
                                border-radius: 0 0 2px 2px;
                            }
                        }
                    }
                }
                &.active{
                    dt {
                        background: #FFF;
                        color: #3f8241;
                        border: 1px solid #eaeaea;
                    }
                }
                &:hover {
                    dt {
                        background: #222365;
                        border-color: #222365;
                        color: #488d4a;
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
    export default {
        props: ['homeUrl', 'logo', 'category', 'sys', 'debris', 'catedir', 'userInfo'],
        methods: {
            toUrl(url){
                if(url){
                    location.href = url;
                }
            }
        }
    }
</script>
<source>
<head>
    <meta charset="utf-8"/>
    <title><{$info['title']??($title ? $title : $sys.title)}></title>
    <meta name="keywords" content="<{$info['keywords']??($keywords ? $keywords : $sys.key)}>"/>
    <meta name="description" content="<{$info['description']??($description ? $description : $sys.des)}>"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/normalize/8.0.0/normalize.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/minireset.css/0.0.2/minireset.css">
    <link rel="stylesheet" href="/static/home/css/new-static.css">
    <link rel="stylesheet" href="/static/common/iconfont/iconfont.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.0-beta.31/scrollreveal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.0.2/lazysizes.min.js"></script>
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/static/home/js/ckplayer/ckplayer.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- 引入组件库 -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font: normal 14px/20px Avenir, arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            color: #444;
        }

        .main-container {
            width: 960px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<vue>
    var debris = {
    <{clt:list db='debris' id='debris' limit="3" where="type_id = 1"}>
    <{$debris['id']}>:<{:json_encode($debris)}>,
    <{/clt:list}>
    };
    var data = {
        debris,
        homeUrl: '<{:url('home/index/main')}>',
        catedir: '<{$controller}>',
        logo: '<{$sys.logo}>',
        sys: <{:json_encode($sys)}>,
        userInfo: <{:json_encode($userInfo)}>,
        category: <{:json_encode($category)}>
    }
</vue>
</source>