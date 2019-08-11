<template>
    <div class="ct">
        <div class="top">
            <img :src="cateData.image"/>
            <div class="main-container">
                <!--<Plan class="plan"></Plan>-->
            </div>
        </div>
        <div class="list main-container">
            <Item class="list-item" v-for="(item, index) in list" :data="item" :key="item.id"></Item>
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
    import Item from './components/item.vue';
    import Plan from './components/Plan.vue';
    export default {
        props: ['list', 'cateData'],
        components: {
            Item,
            Plan
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