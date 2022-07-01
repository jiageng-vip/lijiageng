<?php
/**
 * OrderService.php
 *
 * User: lijiageng
 *
 * Date: 2022/6/30
 * Time: 21:44:01
 */

class OrderService
{
    public function getList($param)
    {
        return json_encode(['status' => $param]);
    }
}