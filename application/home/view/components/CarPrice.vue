<template>
    <table>
        <thead>
        <tr>
            <th colspan="2">定价</th>
            <th>24小时</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="f16" rowspan="3" align="center">
                {{data.level}} {{data.brand}} {{data.title}}<br>
                {{data.gas}}cc~ <br>
                <img :src="data.thumb"><br>
                {{data.people}}人
            </td>
            <td>基本费用</td>
            <td>NZ${{data.base_price}}~</td>
        </tr>
        <tr>
            <td>
                <span class="num">1</span>普通保险 <br>
                <span class="num">2</span>全额保险
            </td>
            <td>
                <span class="num">1</span>NZ${{data.fengxian}} <br>
                <span class="num">2</span>NZ${{data.lingfengxian}}
            </td>
        </tr>
        <tr>
            <td><span class="yl f16">合计</span></td>
            <td>
                <div class="yl">
                    <span class="num">1</span>NZ${{data.base_price + data.fengxian}}~ <br>
                    <span class="num">2</span>NZ${{data.base_price + data.lingfengxian}}~
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>
<script>
    export default {
        props: ['data']
    }
</script>