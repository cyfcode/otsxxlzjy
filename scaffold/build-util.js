const fs = require('fs');
const readdirSync = require('recursive-readdir-sync');
module.exports = {
    /**
     * 递归查找目录下的指定后辍名文件
     * @param fileOrFolder
     * @param extName
     * @param ignoreArray
     * @returns {Array}
     */
    searchFileByExtName(fileOrFolder, extName, ignoreArray) {
        const files = [];
        const testAndPush = (filePath) => {
            if(filePath.lastIndexOf(extName) != filePath.length - extName.length){
                return;
            }
            if (ignoreArray && ignoreArray.length) {
                for (let i = 0; i < ignoreArray.length; i++) {
                    if (filePath.indexOf(ignoreArray[i]) !== -1) {
                        return;
                    }
                }
            }
            files.push(filePath);
        };
        if (fs.statSync(fileOrFolder).isFile()) {
            testAndPush(fileOrFolder);
        } else {
            readdirSync(fileOrFolder).forEach(testAndPush);
        }
        return files;
    }
};
