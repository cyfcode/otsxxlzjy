<template>
    <div class="ct">
        <div class="pic">
            <img src="https://www.gorentals.co.nz/i/car-details/GROUP-1-VEHICLE-PHOTO-0.jpg">
        </div>
        <div class="desc">
            <div class="l">
                <dl>
                    <dt>
                    <div class="name">程飞程飞程飞</div>
                    <div class="ext">测试测试测试</div>
                    </dt>
                    <dd>Cruise Control</dd>
                    <dd>Cruise Control</dd>
                    <dd>Cruise Control</dd>
                    <dd>Cruise Control</dd>
                </dl>
                <div class="intro">
                    1231
                </div>
            </div>
            <div class="r">
                <div class="actions">
                    asdfsadfsf
                </div>
                <div class="intro">
                    456456
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
<style type="text/less" lang="less" scoped>
    .ct {
        display: flex;
        height: 300px;
        border: solid 1px #e2e2e2;
        -webkit-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -moz-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -khtml-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -ms-box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        box-shadow: 1px 1px 6px rgba(0, 0, 0, .07);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: 12px;
        .pic {
            width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .desc {
            flex: 1;
            display: flex;
            background: #f8f8f8;
            .l {
                flex: 1;
                display: flex;
                flex-direction: column;
                border-left: solid 1px #eee;
            }
            .r {
                flex: 1;
                display: flex;
                flex-direction: column;
                border-left: solid 1px #eee;
            }
            .actions {
                flex: 1;
                padding: 12px 24px;
            }
            dl {
                flex: 1;
                padding: 12px 24px;
                dt{
                    margin-bottom: 16px;
                    .name{
                        font-size: 14px;
                        color: #ec008c;
                        font-weight: bold;
                    }
                }
            }
            .intro {
                border-top: solid 1px #eee;
                height: 50px;
                display: flex;
                align-items: center;
                padding: 0 24px;
            }
        }
    }
</style>
