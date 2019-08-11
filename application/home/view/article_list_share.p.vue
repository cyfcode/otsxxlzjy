<template>
    <div class="ct">
        <div class="top" :style="{backgroundImage: `url(${cateData.image})`}"></div>
        <div class="main main-container">
            <ul>
                <li v-for="(item, index) in list" :key="item.id" @click="toDetail(item.url)">
                    <div class="pic" :style="{backgroundImage: `url(${item.thumb || item.title_thumb})`}">
                    </div>
                    <div class="title">{{item.title}}</div>
                    <div class="desc">{{item.description}}</div>
                    <div class="info">
                        <span>
                            <i class="iconfont">&#xe603;</i>
                            {{item.hits}}
                        </span>
                        <span>
                            <i class="iconfont">&#xe630;</i>
                            {{item.hits}}
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['list', 'cateData'],
        methods: {
            toDetail(url){
                if(url){
                    location.href = url;
                }
            }
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .main-container {
        width: 960px;
        margin: 0 auto;
        position: relative;
    }
    .top{
        height: 300px;
        background: no-repeat center;
        background-size: cover;
    }
    .main{
        padding: 20px;
        ul{
            &:after{
                content: ' ';
                display: block;
                clear: both;
            }
            li{
                &:hover{
                    top: -10px;
                    box-shadow: 0 0 15px -5px;
                }
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                -ms-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
                position: relative;
                top: 0;
                cursor: pointer;
                float: left;
                width: 275px;
                border: 1px solid #eee;
                margin: 20px 47px 20px 0;
                .pic{
                    height: 190px;
                    background: no-repeat center;
                    background-size: cover;
                }
                .title, .desc{
                    padding: 14px 10px;
                }
                .title{
                    font-size: 18px;
                    color: #222382;
                }
                .desc{
                    font-size: 12px;
                    padding-top: 0;
                    height: 80px;
                    overflow: hidden;
                }
                .info{
                    display: flex;
                    border-top: 1px solid #eee;
                    padding: 6px 10px;
                    > span{
                        margin-right: 10px;
                    }
                }
            }
            li:nth-child(3n){
                margin-right: 0;
            }
        }
    }
</style>
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