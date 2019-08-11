  <template>
    <div class="quan-ct">
        <div class="quanquan">
            <div class="ct">
                <img class="lazyload" data-src="/static/home/images/new/quanbg.png">
                <div class="c">
                    {{item.main_title}} <br>
                    {{item.ext_title}}
                </div>
            </div>
        </div>
        <dl class="quan-xi texiaoRight">
            <dt>{{item.title}}</dt>
            <dd>
                <div class="l">
                    <img :src="item.banner">
                </div>
                <div class="r">
                    {{item.description}}
                    <table>
                        <tr>
                            <td>期间</td>
                            <td>{{item.between}}</td>
                        </tr>
                        <tr>
                            <td>货出场所</td>
                            <td>【新西兰】 基督城营业所 皇后镇营业所</td>
                        </tr>
                        <tr>
                            <td>期间</td>
                            <td>最大乘车人数5人：C-HR车款【丰田】 G-HR1.2L 直喷式发动机4WD <br>
                                C-HR车款限定方案。对其他车款有兴趣的话请咨询我们。 <br>
                                数量有限，先到先得。
                            </td>
                        </tr>
                    </table>
                </div>
            </dd>
        </dl>
    </div>
</template>
<script>
    export default {
        props: ['item']
    }
</script>