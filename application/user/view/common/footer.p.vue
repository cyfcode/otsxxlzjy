<template>
    <footer class="bottom">
        <div class="main-container">
            <dl v-for="(item, index) in category" :key="item.id">
                <dt>{{item.catname}}</dt>
                <dd v-if="item.sub.length > 0" v-for="(v, k) in item.sub" :key="v.id" @click="toUrl(v.url)">
                    {{v.catname}}
                </dd>
            </dl>
            <dl>
                <dt><i class="iconfont">&#xe665;</i>{{qrcode.name}}</dt>
                <dd>
                    <img :src="qrcode.pic">
                </dd>
            </dl>
            <dl>
                <dt><i class="iconfont">&#xe681;</i>官方微博</dt>
                <dd>
                    <img src="/static/home/images/new/weibo.jpeg">
                </dd>
            </dl>
            <dl>
                <dt><i class="iconfont">&#xe614;</i>抖音</dt>
                <dd>
                    <img src="/static/home/images/new/douyin.png">
                </dd>
            </dl>
        </div>
    </footer>
</template>
<script>
    export default {
        props: ['adList', 'sys', 'category'],
        computed: {
            qrcode(){
                var data = {};
                if(Array.isArray(this.adList)){
                    this.adList.forEach(item => {
                        if(item.ad_id == 39){
                            data = item;
                        }
                    });
                }
                return data;
            }
        },
        methods: {
            toUrl(url){
                if(url){
                    location.href = url;
                }
            }
        }
    }
</script>
<style type="text/less" lang="less" scoped>
    .bottom {
        background: #191a4b;
        border-bottom: solid 5px #3f8241;
        .main-container {
            padding: 50px 0;
            color: #FFF;
            font-size: 14px;
            display: flex;
            dl {
                flex: 1;
                padding: 0 20px;
                dt {
                    padding-bottom: 5px;
                    border-bottom: solid 1px #373862;
                    margin-bottom: 20px;
                }
                dd {
                    cursor: pointer;
                    color: #8997cb;
                    &:hover{
                        color: #FFF;
                    }
                    img{
                        width: 90px;
                    }
                }
            }
        }
    }
</style>
<source>
<vue>

    var data = {
    sys: <{:json_encode($sys)}>,
    adList: <{:json_encode($adList)}>,
    category: <{:json_encode($category)}>
    };
</vue>
</body>
</html>
</source>
