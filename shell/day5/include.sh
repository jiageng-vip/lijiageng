#!/bin/bash

#-----------------------------------------------------------
# Shell 文件包含
# 和其他语言一样，Shell 也可以包含外部脚本。这样可以很方便的封装一些公用的代码作为一个独立的文件。
#-----------------------------------------------------------
#  . filename   # 注意点号(.)和文件名中间有一空格
#  或
#  source filename
#-----------------------------------------------------------

:<<I
test1.sh
!/bin/bash
author:菜鸟教程
url:www.runoob.com

url="http://www.baidu.com"
I

:<<I
!/bin/bash
author:菜鸟教程
url:www.runoob.com

使用 . 号来引用test1.sh 文件
. ./test1.sh

或者使用以下包含文件代码
source ./test1.sh

echo "菜鸟教程官网地址：$url"
I
