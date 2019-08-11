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