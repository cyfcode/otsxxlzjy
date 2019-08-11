<style type="text/less" lang="less">
    .main-container {
        width: 960px;
        margin: 0 auto;
    }
    .wrap {
        .content {
            background: #fff;
            border-bottom: 0;
            .contact {
                border: solid 1px #e2e2e2;
                height: 60px;
                border-bottom: none;
                .main-container {
                    height: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .notice {
                    width: 440px;
                }
            }
        }
        .cars {
            .swiper{
                height: 274px;
                display: flex;
                align-items: center;
                .swiper-button-prev, .swiper-button-next{
                    position: static;
                    background: none;
                    border: 5px solid transparent;
                    width: 0;
                    height: 0;
                    margin: 12px;
                    outline: none;
                }
                .prev-next{
                    width: 25px;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    background: rgba(255,255,255,.9);
                    -webkit-box-shadow: 0 0 10px rgba(0,0,0,.07);
                    -moz-box-shadow: 0 0 10px rgba(0,0,0,.07);
                    -khtml-box-shadow: 0 0 10px rgba(0,0,0,.07);
                    -ms-box-shadow: 0 0 10px rgba(0,0,0,.07);
                    box-shadow: 0 0 10px rgba(0,0,0,.07);
                    -moz-background-clip: padding;
                    -webkit-background-clip: padding;
                    background-clip: padding-box;
                    &.left{
                        border-right: solid 1px rgba(0,0,0,.1);
                    }
                    &.right{
                        border-left: solid 1px rgba(0,0,0,.1);
                    }
                }
                .swiper-button-prev{
                    border-right-color: #2c2d7f;
                    margin-left: 2px;
                }
                .swiper-button-next{
                    border-left-color: #2c2d7f;
                    margin-right: 2px;
                }
                .swiper-container{
                    flex: 1;
                }
            }
            .swiper-slide {
                width: 265px;
                &:last-child{
                    dl{
                        border-right: none;
                    }
                }
            }
            .pagination{
                position: relative;
                width: 100%;
                line-height: 48px;
                margin: 0;
                background: #f2f2f2;
                border-top: solid 1px #e2e2e2;
                .swiper-pagination-bullet{
                    margin: 0 3px;
                }
            }
            dl {
                text-align: center;
                padding: 20px 12px;
                box-sizing: border-box;
                border-right: solid 1px #eee;
                dt {
                    height: 150px;
                    img {

                    }
                }
                dd {
                    &.desc {
                        color: #191a4b;
                        font-size: 20px;
                    }
                    &.type {
                        margin-top: 4px;
                        font-size: 12px;
                        color: #191a4b;
                    }
                    &.more {
                        color: #2c2d7f;
                        margin-top: 20px;
                        font-size: 14px;
                    }
                }
            }
        }
        .slider-1 {
            background: #191a4b;
            .main-container {
                background: url("https://www.gorentals.co.nz/i/reviews-bg1.jpg") no-repeat;
                background-size: cover;
                overflow: hidden;
                height: 300px;
                position: relative;
                &:before {
                    content: "";
                    position: absolute;
                    z-index: 1;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    width: 240px;
                    background: -moz-linear-gradient(left, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -webkit-linear-gradient(left, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -o-linear-gradient(left, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -ms-linear-gradient(left, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: linear-gradient(left, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                }
                &:after {
                    content: "";
                    position: absolute;
                    z-index: 2;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    width: 240px;
                    background: -moz-linear-gradient(right, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -webkit-linear-gradient(right, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -o-linear-gradient(right, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: -ms-linear-gradient(right, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                    background: linear-gradient(right, #191a4b 0%, rgba(25, 26, 75, 0) 100%);
                }
                .text {
                    position: absolute;
                    z-index: 2;
                    width: 100%;
                    left: 0;
                    padding: 25px 60px 23px;
                    background: rgba(236, 0, 140, .8);
                    font-size: 16px;
                    color: #FFF;
                }
                .img {
                    position: absolute;
                    left: 50%;
                    bottom: 0;
                    z-index: 3;
                    img {
                        display: block;
                    }
                }
                .cards {
                    position: absolute;
                    bottom: 50px;
                    left: 0;
                    z-index: 1;
                    ul {
                        li {
                            border: solid 1px rgba(0, 0, 0, .1);
                            -webkit-box-shadow: 0 4px 16px rgba(0, 0, 0, .33);
                            -moz-box-shadow: 0 4px 16px rgba(0, 0, 0, .33);
                            -khtml-box-shadow: 0 4px 16px rgba(0, 0, 0, .33);
                            -ms-box-shadow: 0 4px 16px rgba(0, 0, 0, .33);
                            box-shadow: 0 4px 16px rgba(0, 0, 0, .33);
                            -moz-background-clip: padding;
                            -webkit-background-clip: padding;
                            background-clip: padding-box;
                            -webkit-border-radius: 3px;
                            -moz-border-radius: 3px;
                            border-radius: 3px;
                            display: block;
                            float: left;
                            width: 100px;
                            height: 120px;
                            margin: 0 10px 0 0;
                            background: #fff;
                            text-align: center;
                        }
                    }
                }
                .swiper-container {
                    right: 0;
                    position: absolute;
                    bottom: 50px;
                    width: 300px;
                    height: 120px;
                    z-index: 3;
                    color: #ffffff;
                }
            }
        }
        .plan {
            height: 460px;
            background: url("https://www.gorentals.co.nz/i/hero-home-fluid5.jpg");
            background-repeat: no-repeat;
            background-position: bottom center;
            background-color: #191a4b;
            background-size: cover;
            position: relative;
            .main-container {
                overflow: hidden;
                position: relative;
            }
            .shade {
                position: absolute;
                z-index: 0;
                left: 0;
                right: 0;
                bottom: 0;
                padding: 120px 40px 0 40px;
                background: -moz-linear-gradient(bottom, rgba(0, 0, 0, .6) 0%, transparent 100%);
                background: -webkit-linear-gradient(bottom, rgba(0, 0, 0, .6) 0%, transparent 100%);
                background: -o-linear-gradient(bottom, rgba(0, 0, 0, .6) 0%, transparent 100%);
                background: -ms-linear-gradient(bottom, rgba(0, 0, 0, .6) 0%, transparent 100%);
                background: linear-gradient(bottom, rgba(0, 0, 0, .6) 0%, transparent 100%);
            }
        }
    }
</style>
<template>
    <div class="wrap" id="app">
        <div class="content">
            <div class="contact">
                <div class="main-container">
                    <div class="notice"><strong>进一步</strong>了解您在新西兰的汽车租赁体验</div>
                    <div class="tel"></div>
                    <div class="email"></div>
                    <div class="login"></div>
                </div>
            </div>
            <div class="plan">
                <div class="shade"></div>
                <div class="main-container">
                    <Plan></Plan>
                </div>
            </div>
        </div>
        <div class="cars">
            <div class="swiper">
                <div class="prev-next left">
                    <div class="swiper-button-prev"></div>
                </div>
                <div ref="swiper" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                        <div class="swiper-slide">
                            <dl>
                                <dt>
                                    <img
                                        src="https://www.gorentals.co.nz/i/cars/GO%20RENTALS%20GROUP%204%20VEHICLE%20PHOTO.jpg"
                                    >
                                </dt>
                                <dd class="desc">
                                    行政人员
                                </dd>
                                <dd class="type">
                                    丰田Aurion或凯美瑞
                                </dd>
                                <dd class="more">更多信息</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="prev-next right">
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div ref="pagination" class="swiper-pagination pagination"></div>
        </div>
        <div class="slider-1">
            <div class="main-container">
                <div class="text">我们在世界各地都很受信任</div>
                <div class="cards">
                    <ul>
                        <li>
                        </li>
                        <li>
                        </li>
                        <li>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>
                <div class="img">
                    <img src="https://www.gorentals.co.nz/i/reviews-people4.png">
                </div>
                <div ref="swiper1" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任</div>
                        <div class="swiper-slide">
                            我们在世界各地我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任都很受信任
                        </div>
                        <div class="swiper-slide">我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任我们在世界各地都很受信任</div>
                    </div>
                    <div ref="pagination1" class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Swiper from 'swiper';
    import 'swiper/dist/css/swiper.min.css';
    import Plan from '../components/Plan.vue';
    export default {
        components: {
            Plan
        },
        mounted(){
            let cars = new Swiper(this.$refs.swiper, {
                slidesPerView: 'auto',
                normalizeSlideIndex: false,
                loop: true,
                // 如果需要分页器
                pagination: {
                    el: this.$refs.pagination,
                },
                // 如果需要前进后退按钮
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            let mySwiper = new Swiper(this.$refs.swiper1, {
                loop: true,
                // 如果需要分页器
                pagination: {
                    el: this.$refs.pagination1,
                },
            })
        }
    }
</script>
<source>
{include file="common/head"/}
<vue></vue>
{include file="common/footer"/}
</source>
