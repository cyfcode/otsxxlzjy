<template>
    <div class="ct main-container">
        <div class="title">{{info.title}}</div>
        <div class="content" v-html="info.source || info.content"></div>
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
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 1000px;
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