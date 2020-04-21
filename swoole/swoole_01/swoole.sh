#!/bin/bash
pids=$(ps aux | grep "swoole_tcp_server"|awk '{print $2}' )
for pid in $pids
do
 echo  $pid
 kill -9  $pid
done
