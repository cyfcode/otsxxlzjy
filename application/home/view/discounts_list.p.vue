<template>
    <div class="ct">
        <!--<div class="top">
            <img :src="cateData.image"/>
            <div class="main-container">
                <Plan class="plan"></Plan>
            </div>
        </div>-->
        <div class="list main-container">
            <div class="ots-static">
                <div class="main youhuiquan">
                    <div class="normal-title">
                        <span>优惠券</span>
                    </div>
                    <Quan v-for="(item) in list" :key="item.id" :item="item"></Quan>
                </div>
            </div>
        </div>
    </div>
</template>
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 960px;
        margin: 0 auto;
        position: relative;
    }
    .plan{
        position: absolute;
        bottom: -50px;
    }
    .top{
        background-color: #191a4b;
        background-repeat: no-repeat;
        background-position: center top;
        background-size: contain;
        margin-bottom: 80px;
        img{
            display: block;
            margin: 0 auto;
            width: 1200px;
        }
    }
    .list-item{
        margin: 25px 0;
    }
</style>
<script>
    import Quan from './components/Quan.vue';
    export default {
        props: ['list', 'cateData'],
        components: {
            Quan
        },
        mounted(){
            console.log(this.list);
        }
    }
</script>
<source>
<{include file="common/head"/}>
<vue>
    var data = {
        list: <{:json_encode($list)}>,
        cateData: <{:json_encode($cateData)}>
    };
</vue>
<{include file="common/footer"/}>
</source>