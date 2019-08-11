<template>
    <div class="ct main-container">
        <div class="title">{{info.title}}</div>
        <div class="content" v-html="info.content"></div>
        <Comment :cid="info.catid + '-' + info.id" :isAdmin="userInfo && userInfo.level == 11"></Comment>
    </div>
</template>
<script>
    import Plan from './components/Plan2';
    import Comment from './components/comment';
    export default {
        props: ['info', 'userInfo'],
        components: {
            Plan,
            Comment
        },
        mounted(){
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
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 960px;
        margin: 0 auto;
        padding-top: 1px; 
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