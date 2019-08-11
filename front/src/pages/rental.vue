<style>
    @import url('https://cdn.bootcss.com/normalize/8.0.0/normalize.css');
    @import url('https://cdn.bootcss.com/minireset.css/0.0.2/minireset.css');

    body {
        margin: 0;
        padding: 0;
        font: normal 14px/20px Avenir, arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        color: #444;
    }
</style>
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
        .card-list{
            ul{
                li{
                    margin: 30px auto;
                }
            }
        }
    }
</style>
<template>
    <div class="wrap" id="app">
        <Top></Top>
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
                <div class="main-container">
                    <Plan></Plan>
                </div>
            </div>
            <div class="card-list">
                <div class="main-container">
                    <ul>
                        <li>
                            <Item></Item>
                        </li>
                        <li>
                            <Item></Item>
                        </li>
                        <li>
                            <Item></Item>
                        </li>
                        <li>
                            <Item></Item>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <Bottom></Bottom>
    </div>
</template>
<script>
    import Top from '../components/Top.vue';
    import Bottom from '../components/Bottom.vue';
    import Plan from '../components/Plan.vue';
    import Item from '../components/Item.vue';
    export default {
        components: {
            Top,
            Bottom,
            Plan,
            Item
        },
        mounted(){
        }
    }
</script>
