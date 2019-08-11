<template>
    <div class="ct main-container">
        <div class="title">{{info.title}}</div>
        <div class="superbox">
            <div class="superbox-list" v-for="(url, index) in lunbo" :key="index">
                <img :src="url" :data-img="url" alt="" class="superbox-img">
            </div>
            <div class="superbox-float"></div>
        </div>
        <div class="content" v-html="info.content"></div>
        <Comment :cid="info.catid + '-' + info.id" :isAdmin="userInfo && userInfo.level == 11"></Comment>
    </div>
</template>
<style>
    .superbox{
        text-align: center;
        margin-bottom: 20px;
    }
    /* SuperBox*/.superbox-list{display:inline-block;*display:inline;zoom:1;width:12.5%;}
    .superbox-img{max-width:100%;width:100%;cursor:pointer;}
    .superbox-show{text-align:center;position:relative;background:#333;box-shadow:inset 0 1px 5px #111;-webkit-box-shadow:inset 0 1px 5px #111;-moz-box-shadow:inset 0 1px 5px #111;width:100%;float:left;padding:25px 0;display:none;}
    .superbox-current-img{max-width:100%;box-shadow:0 1px 4px #222;border:1px solid #222;}
    .superbox-img:hover{opacity:0.8;}
    .superbox-float{float:left;}
    .superbox-close:hover{opacity:1;}
    @media only screen and (min-width: 320px){.superbox-list{width:50%;}}
    @media only screen and (min-width: 486px){.superbox-list{width:25%;}}
    @media only screen and (min-width: 768px){.superbox-list{width:16.66666667%;}}
    @media only screen and (min-width: 1025px){.superbox-list{width:12.5%;}}
</style>
<script>
    import Comment from './components/comment';
    import Swiper from 'swiper';
    import 'swiper/dist/css/swiper.min.css';
    export default {
        props: ['info', 'userInfo'],
        computed:{
            lunbo(){
                return this.info.lunbo.split(';');
            }
        },
        components: {
            Comment
        },
        mounted(){
            (function($) {
                $.fn.SuperBox = function(options) {
                    var superbox      = $('<div class="superbox-show"></div>');
                    var superboximg   = $('<img src="" class="superbox-current-img">');
                    var superboxclose = $('<div class="superbox-close"></div>');
                    superbox.append(superboximg).append(superboxclose);
                    return this.each(function() {
                        $('.superbox-list').click(function() {
                            var currentimg = $(this).find('.superbox-img');
                            var imgData = currentimg.data('img');
                            superboximg.attr('src', imgData);

                            if($('.superbox-current-img').css('opacity') == 0) {
                                $('.superbox-current-img').animate({opacity: 1});
                            }

                            if ($(this).next().hasClass('superbox-show')) {
                                superbox.toggle();
                            } else {
                                superbox.insertAfter(this).css('display', 'block');
                            }
                            $('html, body').animate({
                                scrollTop:superbox.position().top - currentimg.width()
                            }, 'medium');
                        });
                        $('.superbox-close').on('click', function() {
                            $('.superbox-current-img').animate({opacity: 0}, 200, function() {
                                $('.superbox-show').slideUp();
                            });
                        });
                    });
                };
            })(jQuery);
            $(function() {
                $('.superbox').SuperBox();
            });
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 1000px;
        margin: 0 auto;
        padding-top: 1px;
        .content{
            line-height: 32px;
            font-size: 16px;
        }
    }
    .title{
        font-size: 18px;
        color: #3f8241;
        margin: 20px 0;
        font-weight: bold;
        text-align: center;
    }
</style>
<source>
<{include file="common/head"/}>
<vue>
    var data = {
        info: <{:json_encode($info)}>,
        userInfo: <{:json_encode($userInfo)}>
    };
</vue>
<{include file="common/footer"/}>
</source>