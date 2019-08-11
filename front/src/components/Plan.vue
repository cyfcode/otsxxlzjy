<template>
    <div class="path">
        <div class="left">
            <h3>
                快速搜索
            </h3>
            <p>
                在此输入您的行程以找到您的车辆。
            </p>
        </div>
        <div class="right"></div>
    </div>
</template>
<script>
    export default {}
</script>
<style type="text/less" lang="less" scoped>
    .path {
        background: #ec008c;
        margin: 39px auto 0;
        height: 120px;
        display: flex;
        .left {
            width: 260px;
            padding: 0 30px 0 62px;
            margin: 0 29px -2px 0;
            border-bottom: 0;
            border-right: solid 1px #f033a3;
            background: #da0081;
            background: -moz-linear-gradient(top, #da0081 0%, #da0081 85%, #d1007b 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #da0081), color-stop(85%, #da0081), color-stop(100%, #d1007b));
            background: -webkit-linear-gradient(top, #da0081 0%, #da0081 85%, #d1007b 100%);
            background: -o-linear-gradient(top, #da0081 0%, #da0081 85%, #d1007b 100%);
            background: -ms-linear-gradient(top, #da0081 0%, #da0081 85%, #d1007b 100%);
            background: linear-gradient(to bottom, #da0081 0%, #da0081 85%, #d1007b 100%);
            border-bottom: solid 1px #f033a3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            h3 {
                font-size: 22px;
                font-weight: normal;
                color: #fff;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, .25);
                font: normal 20px/20px EtelkaText, Avenir, arial, sans-serif;
            }
            p {
                margin-top: 8px;
                font-size: 14px;
                line-height: 18px;
                color: rgba(255, 255, 255, .75);
                font-weight: bold;
            }
        }
        .right {

        }
    }
</style>
