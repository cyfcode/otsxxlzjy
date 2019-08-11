const clc = require('cli-color');
const path = require('path');
const fs = require('fs');
const webpack = require('webpack');
const merge = require('webpack-merge');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
let baseConfig = require('./webpack.base.conf');

let task = [];
let scanDir = path.resolve(__dirname, '../');
let util = require('./build-util');

let entryFile = util.searchFileByExtName(scanDir, '.p.vue', ['node_module']);

let globalVar = '_p_vue';
if(Array.isArray(entryFile) && entryFile.length > 0){
    entryFile.forEach(filePath => {
        let filename = path.basename(filePath);
        filename = filename.replace(/\.p\.vue$/, '');
        task.push(merge(baseConfig, {
            entry: filePath,
            output: {
                filename: filename + '.js',
                path: path.dirname(filePath),
                library: globalVar,
                libraryTarget: "var"
            },
            watch: true,
            watchOptions: {
                aggregateTimeout: 1000,
                poll: true,
            },
            plugins: [
                new UglifyJsPlugin({
                    uglifyOptions: {
                        compress: {
                            warnings: false
                        }
                    }
                })
            ]
        }));
    });
}
webpack(task, (error, stats) => {
    const info = stats.toJson({
        assets: false
    });
    if (error) {
        console.error(error.stack || error);
        if (error.details) {
            console.log(clc.red('发生错误:'));
            console.log(stats.toString({
                assets: false,
                chunks: false
            }));
        }
        return;
    }
    if (stats.hasErrors()) {
        console.log(clc.red('发生错误:'));
        console.log(stats.toString({
                assets: false,
                chunks: false
            }
        ));
        return;
    }

    stats.stats.forEach(stat => {
        let assets = stat.compilation.assets;
        let outputPath = assets[Object.keys(assets)[0]].existsAt;
        let entry = stat.compilation.entries[0].resource;
        let tpl = fs.readFileSync(entry, 'utf-8');
        let distContent = fs.readFileSync(outputPath, 'utf-8');
        let html = tpl.match(/<source>([\s\S]*)<\/source>/);
        html = html[1];
        if(!html) return;
        html = html.replace(/<vue>((\s|\S)*)<\/vue>/g, (a, b, c) => {
            let id = 'a' + parseInt(Math.random() * 10000);
            let injectStr = `<div id="${id}"></div><script>(function(){var data = {};${b};${distContent};${globalVar}.propsData = data || {}; var vm  = new Vue(${globalVar}); vm.$mount('#${id}')})()</script>`;
            return injectStr;
        });

        fs.unlink(outputPath);
        outputPath = outputPath.replace(/\.js$/, '.html');
        fs.writeFile(outputPath, html, 'utf-8', function(){});
    });

    // if (stats.hasWarnings()) {
    //     console.log(clc.yellow('发现警告:'));
    //     console.warn(info.warnings);
    // }
});

