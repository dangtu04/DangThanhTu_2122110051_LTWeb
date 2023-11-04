<?php

namespace App\Libraries;

class Cart
{
    public static function checkCart($id)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $item) {
                if ($item['id'] == $id) {
                    return true;
                }
            }
        }
        return false;
    }
    public static function postCart($id)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $id) {
                    return $pos;
                }
            }
        }
        return -1;
    }

    public static function addCart($cart_item)
    {
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            if (self::checkCart($cart_item['id']) == true) {
                $pos = self::postCart($cart_item['id']);
                $carts[$pos]['qty'] += $cart_item['qty'];
            } else {
                $carts[] = $cart_item;
            }
        } else {

            $carts[] = $cart_item;
        }
        $_SESSION['cart'] = $carts;
    }
    public static function cartContent()
    {
        return $_SESSION['cart'] ?? [];
    }
    public static function cartTotal()
    {
        $total = 0;
        $carts = $_SESSION['cart'] ?? [];
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                $total += $item['qty'] * $item['price'];
            }
        }
        return $total;
    }
}
