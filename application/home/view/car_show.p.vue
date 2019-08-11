<template>
    <div class="detail main-container">
        <div class="main">
            <Detail :data="data" style="flex: 1; width: auto;"></Detail>
            <Plan :carData="data" :userInfo="userInfo"></Plan>
        </div>
        <div class="content" id="detail" v-html="data.detail"></div>
        <Comment :cid="data.catid + '-' + data.id" :isAdmin="userInfo && userInfo.level == 11"></Comment>
    </div>
</template>
<script>
    import detail from './components/detail';
    import plan from './components/Plan1';
    import Comment from './components/comment';
    export default {
        props: ['data', 'userInfo'],
        components:{
            Detail: detail,
            Plan: plan,
            Comment
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 960px;
        margin: 0 auto;
    }
    .main{
        display: flex;
    }
    .content{
        margin-top: 35px;
    }
</style>
<source>
<{include file="common/head"/}>
<vue>
    var data = {
    data: <{:json_encode($info)}>,
    userInfo: <{:json_encode($userInfo)}>,
    };
</vue>
<{include file="common/footer"/}>
</source>