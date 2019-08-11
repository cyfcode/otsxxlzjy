<template>
    <div>
        <div class="top">
            <div class="box">
                <div class="introduce">
                    七月，赏富良野美瑛最美的景
                </div>
                <div class="search">
                    <div class="search_box">
                        <form action="" method="post">
                            <input type="text" aria-placeholder="输入目的地/服务/酒店">
                            <button type="submit">搜索</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="indent">
            <div class="dec">
                <p>7月份富良野大片的紫色薰衣草与其他盛开的鲜花一起组成了大片美丽的花毯。如果说法国普罗旺斯的薰衣草是世界共认的浪漫,那么北海道7月份的薰衣草花田便是小清新的新代表。</p>
                <img src="" alt="">
            </div>
            <div class="indent_content">
                <div class="indent_title"></div>
                <div class="indent_main">
                    <form action="" method="post">
                        <div class="data_num">
                            <div class="date">
                                <el-date-picker
                                        v-model="timerange"
                                        size="mini"
                                        type="datetimerange"
                                        align="right"
                                        placeholder="请选择时间"
                                        value-format="yyyy-MM-dd HH:mm:ss"
                                        :default-time="['12:00:00', '12:00:00']">
                                </el-date-picker>
                            </div>
                            <div class="num">
                                <div class="sum">
                                    <div>
                                        <p>游览日期</p>
                                        <el-date-picker
                                                v-model="outing_date"
                                                type="date"
                                                placeholder="选择日期">
                                        </el-date-picker>
                                    </div>
                                    <div class="people_num">
                                        <div>
                                            <p>成人人数</p>
                                            <el-select v-model="adult_num" placeholder="请选择">
                                                <el-option
                                                        v-for="item in options"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                </el-option>
                                            </el-select>
                                        </div>
                                        <div>
                                            <p>儿童人数</p>
                                            <el-select v-model="child_num" placeholder="请选择">
                                                <el-option
                                                        v-for="item in options"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                </el-option>
                                            </el-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="dec">
                                    <h2>套餐说明</h2>
                                    <p>全程用时:{}</p>
                                    <p>运行期间:{}</p>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <div class="button_all">
                                <div class="price">
                                    <p></p>
                                    <p class="true_price" v-model="price"></p>
                                </div>
                                <div class="but"></div>
                                <button type="submit">立即预约</button>
                                <button type="submit">加入购物车</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="travel">
            <div class="travel_time">
                <div class="tit">
                    <div class="min_box"></div>
                    <div class="con"></div>
                    <div class="max_box"></div>
                </div>
                <div class="travel">
                    <div class="detail">
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="time">
                                        <div class="rel"></div>
                                    </div>
                                    <div class="con">
                                        <div class="icon">
                                            <img src="" alt="">
                                        </div>
                                        <div class="address">
                                            <p class="tit"></p>
                                            <p class="dec"></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="travel_cost">
                <div class="tit">
                    <div class="min_box"></div>
                    <div class="con"></div>
                    <div class="max_box"></div>
                </div>
                <div class="dec">
                    <div class="money">
                        <p>成人:{}日元</p>
                        <p>儿童:{}日元</p>
                        <p>(均含餐)</p>
                    </div>
                    <div class="time">
                        <p>运行期间:</p>
                        <p>{}</p>
                        <p>{}</p>
                    </div>
                </div>
            </div>
            <div class="travel_dec">
                <div class="tit">
                    <div class="min_box"></div>
                    <div class="con"></div>
                    <div class="max_box"></div>
                </div>
                <div class="site">
                    <div class="site_tit">
                        <img src="" alt="">
                        <div class="tit_all">
                            <p class="eng"></p>
                            <p class="china"></p>
                            <p class="time"></p>
                        </div>
                        <img src="" alt="">
                    </div>
                    <div class="site_dec">
                        <div class="img_big">
                            <img src="" alt="">
                        </div>
                        <div class="dec">
                            <p></p>
                        </div>
                        <div class="img_sm">
                            <img src="" alt="">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                timerange:'',
                outing_date:'',
                adult_num:'',
                child_num:'',
                price:''
            }
        }
    }
</script>

<style type="text/less" lang="less" scoped>
.top{
    height: 595px;
    width: 100%;
    background: url("/static/home/images/slideshow/bak/1.jpg");
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    .box{
        width: 725px;
        height: 380px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        .introduce{
            padding: 37px 32px;
            font-size: 40px;
            background: #0C0C0C;
            color: #ffffff;
            opacity: 0.5;
        }
        .search{
            width: 720px;
            height: 80px;
            opacity: 0.6;
            .search_box{
                margin: 13px auto;
                form{
                    display: flex;
                    flex-direction: row;
                    input{
                        width: 560px;
                        height: 55px;
                        font-size: 20px;
                        text-indent: 20px;
                        color: #848484;
                    }
                    button{
                        width: 95px;
                        height: 55px;
                        font-size: 24px;
                        font-weight: bold;
                        background: #488d4a;
                        color: #ffffff;
                    }
                }
            }
        }
    }
}
    .indent{
        height: 725px;
        width: 1205px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        .dec{
            width: 1005px;
            height: 120px;
            background: #fd7202;
            border-top-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    }
</style>