<style type="text/less" lang="less" scoped>
    @import url(https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css);

    a {
        color: inherit;
    }

    .main-container {
        width: 1000px;
        margin: 0 auto;
    }

    .step-container {
        background: #e6e6e6;
        padding: 50px 0;
    }

    .zhuyao {
        position: relative;
        text-align: center;
        margin: 20px 0;
        &:before {
            content: ' ';
            height: 1px;
            background: #488d4a;
            position: absolute;
            width: 100%;
            top: 50%;
            left: 0;
            z-index: 1;
        }
        span {
            display: inline-block;
            position: relative;
            z-index: 2;
            padding: 0 20px;
            font-size: 30px;
            font-weight: bold;
            background: #e6e6e6;
            color: #488d4a;
        }
    }

    a {
        text-decoration: none;
    }

    .swiper-slide {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        .desc {
            color: #FFF;
            font-size: 20px;
            font-weight: bold;
        }
    }

    .main {
        position: relative;
        overflow: hidden;
        > .top-car {
            width: 100%;
            height: 700px;
            background: url('/static/home/images/background/main.jpg') no-repeat center bottom;
            overflow: hidden;
            padding-top: 60px;
            box-sizing: border-box;
            .car-pic{
                width: 430px;
            }
        }
        .top {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            background: rgb(72, 141, 74);
            box-shadow: 0 0 19px -2px rgba(0, 0, 0, .5);
            .logo {
                background: rgba(255, 255, 255, 0.35);
                width: 300px;
                text-align: center;
                padding: 20px;
                border-bottom-right-radius: 25px;
                img {
                    width: 140px;
                }
            }
            .contact {
                display: flex;
                align-items: center;
                color: #FFFFFF;
                .item {
                    margin-right: 10px;
                    position: relative;
                    cursor: pointer;
                    .iconfont {
                        margin-right: 4px;
                    }
                    &:last-child {
                        margin-right: 0;
                    }
                    .ct{
                        cursor: default;
                        display: none;
                        position: absolute;
                        top: 100%;
                        margin-top: 5px;
                        left: -10px;
                        min-width: 170px;
                        min-height: 50px;
                        background: rgba(255, 255, 255, 0.81);
                        color: #03d85e;
                        padding: 4px;
                        align-items: center;
                        justify-content: center;
                        border-radius: 4px;
                        font-size: 16px;
                        text-shadow: 1px 1px rgba(0, 0, 0, 0.5098039215686274);
                        font-weight: 900;
                        letter-spacing: 3px;
                        white-space: nowrap;
                        img{
                            width: 100%;
                        }
                        &:after {
                            content: ' ';
                            display: inline-block;
                            position: absolute;
                            border: 4px solid transparent;
                            border-bottom: 4px solid rgba(255, 255, 255, 0.84);
                            top: -8px;
                            left: 12px;
                        }
                    }
                    &:hover{
                        .ct{
                            display: flex;
                        }
                    }
                }
            }
            .top-nav {
                display: flex;
                color: #FFF;
                margin-left: 200px;
                dl {
                    cursor: pointer;
                    margin-right: 40px;
                    position: relative;
                    dt {
                        font-size: 20px;
                        padding: 20px;
                        background: transparent;
                        transition: all ease 0.3s;
                        .iconfont {
                            margin-right: 10px;
                            font-size: 20px;
                            transform: scale(1);
                            transition: all ease 0.3s;
                            display: inline-block;
                        }
                    }
                    dd {
                        position: absolute;
                        width: 100%;
                        left: 0;
                        transform: scaleY(0);
                        transition: all ease 0.3s;
                    }
                    &:hover {
                        dt {
                            background: #3f8241;
                            .iconfont {
                                transform: scale(1.2);
                            }
                        }
                        dd {
                            background: rgba(255, 255, 255, .7);
                            transform: scaleY(1);
                            ul {
                                padding: 4px 10px;
                                li {
                                    color: #000;
                                    padding: 6px 0;
                                    border-bottom: 1px dotted #000;
                                    &:last-child {
                                        border-bottom: none;
                                    }
                                    &:hover {
                                        color: #488d4a;
                                        border-color: #488d4a;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            .login {
                span {
                    margin-right: 8px;
                    cursor: pointer;
                    color: #FFF;
                    &:hover {
                        color: #98ff9b;
                    }
                    &:before {
                        content: '[';
                    }
                    &:after {
                        content: ']';
                    }
                }
            }
            .user-info {
                margin-right: 40px;
                margin-top: 10px;
                dl {
                    position: relative;
                    dt {
                        display: flex;
                        align-items: center;
                        img {
                            width: 40px;
                            height: 40px;
                            border-radius: 25px;
                            margin-right: 10px;
                        }
                        .name {
                            font-size: 18px;
                            color: #ffffff;
                        }
                    }
                    &:hover {
                        dd {
                            display: block;
                        }
                    }
                    dd {
                        display: none;
                        position: absolute;
                        background: rgba(255, 255, 255, 0.7);
                        border-radius: 4px;
                        width: 100px;
                        left: 40px;
                        box-shadow: 0 2px 8px -4px #000;
                        ul {
                            padding: 4px 10px;
                            li {
                                line-height: 30px;
                                cursor: pointer;
                                &:hover {
                                    color: #488d4a;
                                }
                            }
                        }
                        &:after {
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
        }
    }

    .step {
        display: flex;
        justify-content: space-between;
        height: 200px;
        li {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            img {

            }
            span {
                color: #000000;
                font-size: 16px;
                font-weight: bold;
                margin-top: 16px;
            }
        }
    }

    .nav {
        overflow: hidden;
        position: relative;
        z-index: 2;
        min-height: 500px;
        margin: 0 auto;
        .control {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            font-size: 24px;
            border-bottom: 1px solid #8de490;
            li {
                flex: 1;
                padding-bottom: 28px;
                cursor: pointer;
                border-bottom: 4px solid transparent;
                transition: border ease 0.3s;
                .iconfont {
                    transform: scale(1);
                    transition: all ease 0.3s;
                }
                &.active {
                    border-color: #8de490;
                    .iconfont {
                        transform: scale(1.2);
                        color: #8de490;
                    }
                }
            }
            .icon {
                text-align: center;
                .iconfont {
                    font-size: 46px;
                    display: inline-block;
                    line-height: 46px;
                    margin-bottom: 12px;
                }
            }
            .title {
                font-size: 18px;
                text-align: center;
                font-weight: bold;
            }
        }
        .content {
            .cars {
                .list-item {
                    margin: 20px 0;
                    background: rgba(255, 255, 255, 0.74);
                    color: #000;
                }
            }
            > li {
                padding-top: 40px;
            }
            .jingdian {
                > li {
                    width: 48%;
                    float: left;
                    height: 300px;
                    background: rgba(0, 0, 0, 0.3) no-repeat center / cover;
                    margin-bottom: 35px;
                    position: relative;
                    border: 1px solid rgba(152, 232, 154, 0.4);
                    &:nth-child(even) {
                        margin-left: 2%;
                    }
                    &:nth-child(odd) {
                        margin-right: 2%;
                    }
                    .ct {
                        position: absolute;
                        width: 100%;
                        bottom: 0;
                        background: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0.68) 20%, rgba(0, 0, 0, 0) 100%);
                        min-height: 60px;
                        padding: 10px;
                        cursor: pointer;
                        .title {
                            font-weight: bold;
                            font-size: 16px;
                        }
                    }
                }
            }
        }
    }

    .gongsi {
        text-align: center;
        position: absolute;
        width: 100%;
        bottom: 0;
        z-index: -1;
        opacity: 0.7;
        filter: blur(1px);
    }

    .fixed-nav {
        position: fixed;
        z-index: 999;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        .ic {
            text-align: center;
            margin-bottom: 10px;
            &:hover .iconfont {
                color: #4ea8d8;
            }
        }
        .iconfont {
            font-size: 38px;
            color: #488d4a;
        }
        li {
            width: 90px;
            text-align: center;
            padding: 10px;
            line-height: 16px;
            color: #fff;
            position: relative;
            background: #488d4a;
            margin-bottom: 2px;
            cursor: pointer;
            font-weight: bold;
        }
        li div:hover:before {
            -webkit-transform: none;
            transform: none;
            border-radius: 0;
            background: rgba(0, 255, 244, 0.4);
        }
        li div:before {
            position: absolute;
            content: " ";
            background: transparent;
            border-radius: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transition: .2s cubic-bezier(.215, .61, .355, 1);
            transition: .2s cubic-bezier(.215, .61, .355, 1);
        }
    }

    .vidbacking {
        position: absolute;
        width: 100%;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .shadow {
        width: 100%;
        height: 100%;
        position: absolute;
        display: none;
        z-index: 2;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAAWklEQVR42u3YsQ0AIAhE0WMAWV031mjDAkBhPjYXmkt8Hdqqf2or0ZTrjuenKBmyt7T8FCWF01zS8l0BtZIT8MADDzzwwAMPPPDAAw888MADXwdfd8D54t51AJH5yuxlg8PDAAAAAElFTkSuQmCC)
    }

    #certify {
        position: relative;
        z-index: 2
    }
</style>
<template>
    <div class="wrap" id="app">
        <div class="fixed-nav animated zoomIn">
            <div class="ic"><a href="/"><i class="iconfont animated zoomIn">&#xe631;</i></a></div>
            <ul>
                <li onclick="location.href='http://www.otsxxlzjy.com/home/cars/index/catId/17.html'">
                    <div>租车预约</div>
                </li>
                <li onclick="location.hash='rule'">
                    <div>交通规则</div>
                </li>
                <li onclick="location.hash='jiazhao'">
                    <div>驾照说明</div>
                </li>
                <li onclick="location.hash='jiesong'">
                    <div>机场接送</div>
                </li>
                <li onclick="location.hash='baoxian'">
                    <div>保险介绍</div>
                </li>
                <li onclick="location.hash='youhui'">
                    <div>优惠活动</div>
                </li>
            </ul>
        </div>

        <div class="main" id="chekuan">
            <div class="top-car">
                <div class="shadow"></div>
                <div id="certify">
                    <div ref="swiper" class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" v-for="(item, index) in carList" :key="item.id">
                                <a :href="item.url">
                                    <img class="car-pic" :src="item.thumb">
                                    <p class="desc">
                                        【{{item.brand}}】{{item.level}}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="top">
                <div class="top-nav">
                    <a href="/">
                        <dl>
                            <dt><i class="iconfont">&#xe63e;</i>首页</dt>
                        </dl>
                    </a>
                    <dl v-for="(item, index) in category" :key="item.id" :class="{active: item.catdir == catedir}">
                        <a v-if="item.catname == '租车'" href="/home/index/main">
                            <dt><i class="iconfont" v-html="iconMap[item.catname]"></i>{{item.catname}}</dt>
                        </a>
                        <a v-else-if="item.sub.length == 0" :href="item.url">
                            <dt><i class="iconfont" v-html="iconMap[item.catname]"></i>{{item.catname}}</dt>
                        </a>
                        <a v-else :href="item.sub[0].url"><dt><i class="iconfont" v-html="iconMap[item.catname]"></i>{{item.catname}}</dt></a>
                        <dd v-if="item.sub.length > 0">
                            <ul>
                                <li v-for="(v, k) in item.sub" :key="v.id" @click="toUrl(v.url)">{{v.catname}}</li>
                            </ul>
                        </dd>
                    </dl>
                </div>
                <div class="contact">
                    <div class="item fl">
                        <i class="iconfont">&#xe694;</i>
                        <div class="ct">
                            {{sys.tel}}
                        </div>
                    </div>
                    <div class="item fl">
                        <i class="iconfont weixin">&#xe665;</i>
                        <div class="ct">
                            <img src="/static/home/images/new/weixin.png">
                        </div>
                    </div>
                    <div class="item fl">
                        <i class="iconfont weixin">&#xe602;</i>
                        <div class="ct">
                            {{sys.email}}
                        </div>
                    </div>
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
                        <span @click="toUrl('/user/login/index')"><i class="iconfont">&#xe619;</i>登录</span>
                        <span @click="toUrl('/user/login/reg')"><i class="iconfont">&#xe600;</i>注册</span>
                    </div>
                </div>
            </div>
            <div class="shade"></div>
        </div>
        <div class="ots-static">
            <div class="main anxin">
                <div class="l">
                    <div class="c">
                        <img class="lazyload" data-src="/static/home/images/new/anxin.png">
                        <span class="text">自驾须知</span>
                    </div>
                </div>
                <div class="r">
                    <div class="title"><span class="big">“黄老师”带你</span> 解读新西兰交规</div>
                </div>
            </div>
            <div class="huanglei">
                <div class="main">
                </div>
                <div class="video texiaoRight">
                    <embed src='http://player.youku.com/player.php/sid/XMTMyNDc3MTA2MA==/v.swf' allowFullScreen='true'
                           quality='high' style="height: 448px; width: 725px;" align='middle' allowScriptAccess='always'
                           type='application/x-shockwave-flash'></embed>
                </div>
            </div>
        </div>
        <div class="nav">
            <ul class="content">
                <li>
                    <div class="tip rule">
                        <div class="step-container">
                            <div class="main-container">
                                <div class="zhuyao"><span>主要交规</span></div>
                                <ul class="step">
                                    <li class="texiaoLeft">
                                        <img class="lazyload" data-src="/static/home/images/step/map-icon1.png"
                                             alt="车辆靠左行驶">
                                        <span>车辆靠左行驶</span>
                                    </li>
                                    <li class="texiaoTop">
                                        <img class="lazyload" data-src="/static/home/images/step/map-icon2.png"
                                             alt="系好安全带">
                                        <span>系好安全带</span>
                                    </li>
                                    <li class="texiaoBottom">
                                        <img class="lazyload" data-src="/static/home/images/step/map-icon3.png"
                                             alt="红灯禁止左转">
                                        <span>红灯禁止左转</span>
                                    </li>
                                    <li class="texiaoRight">
                                        <img class="lazyload" data-src="/static/home/images/step/map-icon4.png"
                                             alt="行人先行">
                                        <span>行人先行</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="article-content imgTop" v-if="articleList[0]"
                             v-html="articleList[0].source || articleList[0].content"></div>
                    </div>
                </li>
                <li id="jiazhao">
                    <div class="article-content imgTop" v-if="articleList[1]"
                         v-html="articleList[1].source || articleList[1].content"></div>
                </li>
                <li id="jiesong">
                    <div class="article-content imgTop" v-if="articleList[2]"
                         v-html="articleList[2].source || articleList[2].content"></div>
                </li>
                <li id="baoxian">
                    <div class="article-content imgTop" v-if="articleList[3]"
                         v-html="articleList[3].source || articleList[3].content"></div>
                </li>
                <li id="youhui">
                    <div class="article-content imgTop" v-if="articleList[4]"
                         v-html="articleList[4].source || articleList[4].content"></div>
                    <div class="ots-static">
                        <div class="main youhuiquan">
                            <div class="mini-title"><span>优惠</span></div>
                            <Quan v-for="(item) in discountList" :key="item.id" :item="item"></Quan>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    import Swiper from 'swiper';
    import 'swiper/dist/css/swiper.min.css';
    import Plan from './components/Plan.vue';
    import Item from './components/item.vue';
    import axios from 'axios';
    import CarPrice from './components/CarPrice.vue';
    import Quan from './components/Quan.vue';

    export default {
        props: ['adList', 'carList', 'homeUrl', 'logo', 'category', 'sys', 'debris', 'catedir', 'userInfo',
            'articleList'
        ],
        data() {
            return {
                iconMap: {
                    '租车': '&#xe631;',
                    '说说': '&#xe630;',
                    '攻略': '&#xe653;',
                },
                discountList: [],
                tabActiveIndex: 0
            }
        },
        computed: {
            slider() {
                if (Array.isArray(this.adList) && this.adList.length > 0) {
                    return this.adList.filter(a => a.type_id == 1);
                }
                return [];
            },
            topBanner() {
                let data = {};
                if (Array.isArray(this.adList)) {
                    this.adList.forEach(item => {
                        if (item.type_id == 5) {
                            data = item;
                        }
                    });
                }
                return data;
            },
            bottomBanner() {
                let data = {};
                if (Array.isArray(this.adList)) {
                    this.adList.forEach(item => {
                        if (item.ad_id == 37) {
                            data = item;
                        }
                    });
                }
                return data;
            },
            bottomChartlet() {
                let data = {};
                if (Array.isArray(this.adList)) {
                    this.adList.forEach(item => {
                        if (item.ad_id == 38) {
                            data = item;
                        }
                    });
                }
                return data;
            },
            bottom4pic() {
                if (Array.isArray(this.adList) && this.adList.length > 0) {
                    return this.adList.filter(a => a.type_id == 11);
                }
                return [];
            }
        },
        components: {
            Plan,
            Item,
            Quan
        },
        methods: {
            toUrl(url) {
                if (url) {
                    location.href = url;
                }
            },
            tabToIndex(index) {
                this.tabActiveIndex = index;
            }
        },
        mounted() {
            new Vue({
                el: '#price-app',
                data: {
                    carList: window.data.carList,
                },
                components: {
                    'car-price': CarPrice,
                }
            });
            let cars = new Swiper(this.$refs.swiper, {
                slidesPerView: 'auto',
                normalizeSlideIndex: false,
                slidesPerView: 1,
                speed: 1000,
                autoplay: {
                    delay: 4000,
                    stopOnLastSlide: false,
                    disableOnInteraction: true,
                },
                loop: true,
                // 如果需要前进后退按钮
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            ScrollReveal({
                viewOffset: {
                    bottom: 300
                }
            });
            ScrollReveal().reveal('.texiaoTop', {distance: '60px', origin: 'top'});
            ScrollReveal().reveal('.texiaoLeft', {distance: '60px', origin: 'left'});
            ScrollReveal().reveal('.texiaoRight, .normal-title', {distance: '60px', origin: 'right'});
            ScrollReveal().reveal('.texiaoBottom, .title, .mini-title', {distance: '60px', origin: 'bottom'});
            ScrollReveal().reveal('.imgTop img', {distance: '60px', origin: 'top', scale: 0.6});
            ScrollReveal().reveal('.imgLeft img', {distance: '60px', origin: 'left', scale: 0.6});
            ScrollReveal().reveal('.imgRight img', {distance: '60px', origin: 'right', scale: 0.6});
            ScrollReveal().reveal('.imgBottom img', {distance: '60px', origin: 'bottom', scale: 0.6});

            axios.post('/home/map/getList', {
                table: 'discounts',
            }).then(res => {
                if (Array.isArray(res.data)) {
                    this.discountList = res.data;
                }
            });

            var videoObject = {
                container: '#vi-huanghouzhen', //容器的ID或className
                variable: 'player',//播放函数名称
                loop: false,
                // flashplayer:true,//强制使用flashplayer播放
                // poster:'../material/poster.jpg',//封面图片
                video: [
                    ['/static/home/video/huanghouzhen.mp4', 'video/mp4', '中文高清', 0]
                ]
            };
            var player = new ckplayer(videoObject);
            var videoObject1 = {
                container: '#vi-jiducheng', //容器的ID或className
                variable: 'player1',//播放函数名称
                loop: false,
                // flashplayer:true,//强制使用flashplayer播放
                // poster:'../material/poster.jpg',//封面图片
                video: [
                    ['/static/home/video/jiducheng.mp4', 'video/mp4', '中文高清', 0]
                ]
            };
            var player1 = new ckplayer(videoObject1);
        }
    }
</script>
<source>
<{include file="common/plain/head"/}>
<vue>
    var debris = {
    <{clt:list db='debris' id='debris' limit="3" where="type_id = 1"}>
    <{$debris['id']}>:<{:json_encode($debris)}>,
    <{/clt:list}>
    };
    var data = window.data = {
    sys: <{:json_encode($sys)}>,
    adList: <{:json_encode($adList)}>,
    carList: <{:json_encode($list)}>,
    debris,
    homeUrl: '<{:url('home/index/index')}>',
    catedir: '<{$controller}>',
    logo: '<{$sys.logo}>',
    userInfo: <{:json_encode($userInfo)}>,
    category: <{:json_encode($category)}>,
    articleList: <{:json_encode($articleList)}>
    };
</vue>
<{include file="common/footer"/}>
</source>
