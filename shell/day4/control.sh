#!/bin/bash

#-----------------------------------------------------------
# if condition
# then
#    command1
#    command2
#    ...
#    commandN
# fi
#-----------------------------------------------------------
if [ $(ps -ef | grep -c "ssh") -gt 1 ]; then
  echo "true"
fi

#-----------------------------------------------------------
# if condition
# then
#    command1
#    command2
#    ...
#    commandN
# else
#    command
# fi
#-----------------------------------------------------------

#-----------------------------------------------------------
# if condition1
# then
#    command1
# elif condition2
# then
#    command2
# else
#    commandN
# fi
#-----------------------------------------------------------
a=10
b=20
if [ $a == $b ]; then
  echo "a 等于 b"
elif [ $a -gt $b ]; then
  echo "a 大于 b"
elif [ $a -lt $b ]; then
  echo "a 小于 b"
else
  echo "没有符合的条件"
fi

#-----------------------------------------------------------
#  for var in item1 item2 item3 item4
#  do
#    command1
#    command2
#    ...
#    commandN
#  done
#-----------------------------------------------------------

#-----------------------------------------------------------
#  while condition
#  do
#    command
#  done
#-----------------------------------------------------------
int=1
while (($int<=5))
do
  echo $int
  let "int++"
done

#-----------------------------------------------------------
# while循环可用于读取键盘信息。下面的例子中，输入信息被设置为变量FILM，按<Ctrl-D>结束循环。
#-----------------------------------------------------------
echo '按下<CTRL-D>退出'
echo -n '输入你最喜欢的网站名：'
while read FILM
do
  echo "是的！${FILM} 是一个好的网站"
done

#-----------------------------------------------------------
# 无限循环
#-----------------------------------------------------------
# while :
# do
#   command
# done
#
# while true
# do
#   command
# done
#
# for (( ; ; ))
#-----------------------------------------------------------

#-----------------------------------------------------------
# until 循环 until 循环执行一系列命令直至条件为 true 时停止。
#-----------------------------------------------------------
# until condition
# do
#   command
# done
#-----------------------------------------------------------
a=0
until [ ! $a -lt 10 ]
do
   echo $a
   a=`expr $a + 1`
done

#-----------------------------------------------------------
# case Shell case语句为多选择语句。可以用case语句匹配一个值与一个模式，如果匹配成功，执行相匹配的命令。
#-----------------------------------------------------------
# case 值 in
# 模式1)
#   command1
#   command2
#   .....
#   commandN
#   ;;
# 模式2)
#   command1
#   command2
#   ......
#   commandN
#   ;;
# esac
#-----------------------------------------------------------
echo '输入 1 到 4 之间的数字：'
echo '您输入的数字为：'
read aNum
case $aNum in
  1)
    echo '你选择了1'
    ;;
  2)
    echo '你选择了2'
    ;;
  3)
    echo '你选择了3'
    ;;
  4)
    echo '你选择了4'
    ;;
  *)
    echo '你没有输入 1 到 4 之间的数字'
    ;;
esac

#-----------------------------------------------------------
# 跳出循环 在循环过程中，有时候需要在未达到循环结束条件时强制跳出循环，Shell使用两个命令来实现该功能：break和continue。
#-----------------------------------------------------------
# break命令
# break命令允许跳出所有循环（终止执行后面的所有循环）。
#-----------------------------------------------------------
# continue
# continue命令与break命令类似，只有一点差别，它不会跳出所有循环，仅仅跳出当前循环。
#-----------------------------------------------------------
while :
do
    echo -n "输入 1 到 5 之间的数字:"
    read aNum
    case $aNum in
        1|2|3|4|5) echo "你输入的数字为 $aNum!"
        ;;
        *) echo "你输入的数字不是 1 到 5 之间的! 游戏结束"
            break
        ;;
    esac
done

while :
do
    echo -n "输入 1 到 5 之间的数字: "
    read aNum
    case $aNum in
        1|2|3|4|5) echo "你输入的数字为 $aNum!"
        ;;
        *) echo "你输入的数字不是 1 到 5 之间的!"
            continue
            echo "游戏结束"
        ;;
    esac
done
