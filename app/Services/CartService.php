<?php

namespace App\Services;

class CartService
{
    public function insert($course, $id)
    {
        return [
            $id => [
                "name" => $course->name,
                "quantity" => 1,
                "price" => $course->price,
                "photo" => $course->attachment->file_name
            ]
        ];
    }

    public function update($cart, $id)
    {
        return ++$cart[$id]['quantity'];
    }

    public function total($cart)
    {
        return count($cart);
    }

    public function exists($cart, $id)
    {
        return isset($cart[$id]);
    }

    public function find($cart, $id)
    {
        foreach ($cart as $index => $item) {
            if ($index == $id) {
                return $item;
            }
        }
    }

    public function removeItem($cart, $id)
    {
        foreach ($cart as $index => $item) {
            if ($index == $id) {
                unset($cart[$index]);
            }
        }
        return $cart;
    }

    public function destroy()
    {
        $request->session()->forget('cart');
    }
}
