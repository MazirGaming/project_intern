<?php

namespace App\Services;

class CartService
{
    public function insert($course)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                    $course->id => [
                        "name" => $course->name,
                        "quantity" => 1,
                        "price" => $course->price,
                        "photo" => $course->attachment->file_name
                    ]
            ];
            session()->put('cart', $cart);
            return;
        }

        if (isset($cart[$course->id])) {
            $cart[$course->id]['quantity']++;
            session()->put('cart', $cart);
            return;
        }

        $cart[$course->id] = [
            "name" => $course->name,
            "quantity" => 1,
            "price" => $course->price,
            "photo" => $course->attachment->file_name
        ];
        session()->put('cart', $cart);
    }

    public function update($course)
    {
        $cart = session()->get('cart');
        $qty = request()->qty;
        if (isset($cart[$course->id])) {
            $cart[$course->id]['quantity'] = $qty;
            session()->put('cart', $cart);
        }
    }

    public function total($cart)
    {
        $cart = session()->get('cart');
        if ($cart) {
            return count($cart);
        }
    }

    public function exists($course)
    {
        $cart = session()->get('cart');
        return isset($cart[$course->id]);
    }

    public function find($course)
    {
        $cart = session()->get('cart');
        if ($cart) {
            foreach ($cart as $index => $item) {
                if ($index == $course->id) {
                    return $item;
                }
            }
        }
    }

    public function removeItem($course)
    {
        if ($cart) {
            foreach ($cart as $index => $item) {
                if ($index == $course->id) {
                    unset($cart[$index]);
                }
            }
            return $cart;
        }
    }

    public function destroy()
    {
        $request->session()->forget('cart');
    }
}
