<style type="text/css" lang="less" scoped>
    .comment{
        margin-top: 50px;
        .top-title{
            margin-bottom: 20px;
            border-bottom: 2px solid #266427;
            .text{
                display: inline-block;
                background: #FFF;
                padding: 7px 20px;
                border: 2px solid #2b6f2c;
                border-bottom: none;
                position: relative;
                bottom: -2px;
                left: 22px;
                color: #266427;
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }
        }
        .form{
            .input{
                border: 1px solid #488d4a;
                height: 80px;
                border-radius: 5px;
                overflow: hidden;
            }
            textarea{
                width: 100%;
                height: 100%;
                border: none;
                resize: none;
                outline: none;
                padding: 10px;
                font-size: 12px;
            }
            .ctr{
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
                .iconfont{
                    font-size: 20px;
                    color: #266427;
                    cursor: pointer;
                }
                .btn{
                    padding: 6px 20px;
                    display: inline-block;
                    background: #488d4a;
                    color: #FFF;
                    border-radius: 4px;
                    cursor: pointer;
                    border: 1px solid transparent;
                    &.cancel{
                        color: #488d4a;
                        border-color: #488d4a;
                        background: #FFF;
                    }
                }
            }
        }
        .list{
            margin-top: 30px;
            ul{
                li{
                    cursor: default;
                    display: flex;
                    border-top: 1px solid #eeeeee;
                    padding: 10px 0;
                    &.level-2{
                        padding-left: 40px;
                        border-top: none;
                    }
                    &.level-3{
                        padding-left: 80px;
                        border-top: none;
                    }
                    &.level-4{
                        padding-left: 120px;
                        border-top: none;
                    }
                }
            }
        }
        .touxiang{
            width: 70px;
            img{
                border-radius: 50%;
                width: 60%;
            }
        }
        .content{
            flex: 1;
            .top{
                display: flex;
                justify-content: space-between;
                .title{
                    color: #266427;
                }
                .time{
                    color: #666;
                    font-size: 12px;
                }
            }
            .text{
                min-height: 40px;
                font-size: 12px;
                margin: 4px 0;
            }
            .bottom{
                text-align: right;
                .resend{
                    cursor: pointer;
                    &:hover{
                        color: #266427;
                    }
                }
            }
        }
    }
</style>
<template>
    <div class="comment">
        <div class="top-title">
            <span class="text">评论</span>
        </div>
        <div v-if="!replyId" class="form">
            <div class="input">
                <textarea v-model="text"></textarea>
            </div>
            <div class="ctr">
                <div class="l">
                    <!--<i class="iconfont">&#xe6b2;</i>-->
                </div>
                <div class="r">
                    <span class="btn" @click="resend()">发表</span>
                </div>
            </div>
        </div>
        <div class="list">
            <ul>
                <li v-for="(item, index) in list" :class="['level-' + item.level]">
                    <div class="touxiang">
                        <img :src="item.avatar || '/static/user/images/avatar/default.png'">
                    </div>
                    <div class="content">
                        <div class="top">
                            <div class="title">{{item.username}}</div>
                            <div class="time">{{item.time}}</div>
                        </div>
                        <div class="text">
                            {{item.content}}
                        </div>
                        <div class="reply" v-if="replyId && replyId == item.id">
                            <div class="form">
                                <div class="input">
                                    <textarea v-model="text"></textarea>
                                </div>
                                <div class="ctr">
                                    <div class="l">
                                        <!--<i class="iconfont">&#xe6b2;</i>-->
                                    </div>
                                    <div class="r">
                                        <span class="btn cancel" @click="toCancel()">取消</span>
                                        <span class="btn" @click="resend()">发表</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="bottom">
                            <span v-if="isAdmin" class="resend" @click="toDel(item.id)">删除</span>
                            <span class="resend" @click="toReply(item.id)">回复</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        props: ['cid', 'isAdmin'],
        data(){
            return {
                text: '',
                replyId: '',
                list: []
            }
        },
        methods: {
            toReply(id){
                this.replyId = id;
            },
            toCancel(){
                this.replyId = '';
                this.text = '';
            },
            resend(){
                if(this.text.trim().length > 0){
                    axios.post('/home/comment/add', {
                        cid: this.cid,
                        pid: this.replyId,
                        content: this.text.trim()
                    }).then(res => {
                        if(res.data.code > 0){
                            this.$message({
                                message: '评论发表成功',
                                type: 'success'
                            });
                            this.getList();
                            this.toCancel();
                        }
                        else if(res.data.code == -1){
                            this.$message({
                                message: '请先登录',
                                type: 'warning',
                                onClose(){
                                    location.href = '/user/login/index';
                                }
                            });
                        }
                    });
                }
            },
            toDel(id){
                axios.post('/home/comment/del', {
                    id: id,
                }).then(res => {
                    if(res.data.code > 0){
                        this.$message({
                            message: '删除操作成功',
                            type: 'success'
                        });
                        this.getList();
                        this.toCancel();
                    }
                    else if(res.data.code == -1){
                        this.$message({
                            message: '请先登录',
                            type: 'warning',
                            onClose(){
                                location.href = '/user/login/index';
                            }
                        });
                    }
                    else if(res.data.code == -2){
                        this.$message({
                            message: '您无此权限，该操作已加入系统预警',
                            type: 'error'
                        });
                    }
                });
            },
            getList(){
                axios.get('/home/comment/index', {
                    params: {
                        cid: this.cid
                    }
                }).then(res => {
                    if(res.data){
                        this.list = res.data;
                    }
                });
            }
        },
        mounted(){
            this.getList();
        }
    }
</script>