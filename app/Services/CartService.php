<?php

namespace App\Services;

class CartService
{
    public function insert($course)
    {
        $cart = session()->get('cart') ?? collect();
        if (!$cart) {
            $cart->push([
                    $course->id => [
                        "id" => $course->id,
                        "name" => $course->name,
                        "quantity" => 1,
                        "price" => $course->price,
                        "photo" => $course->attachment->file_name
                    ]
                ]);
            session()->put('cart', $cart);
            return;
        }

        if (isset($cart[$course->id])) {
            $cart = $cart->map(function ($item) use ($course) {
                if ($item['id'] == $course->id) {
                    ++$item['quantity'];
                }

                return $item;
            });

            session()->put('cart', $cart);
            return;
        }

        $cart[$course->id] = [
            "id" => $course->id,
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
            return $cart->count();
        }
    }

    public function exists($course)
    {
        $cart = session()->get('cart');
        if ($cart) {
            $cart->where('id', $course->id);
            return true;
        }

        return false;
    }

    public function find($course)
    {
        $cart = session()->get('cart');
        if ($cart) {
            return $cart->where('id', $course->id);
        }
    }

    public function removeItem($course)
    {
        $cart = session()->get('cart');
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
        return $request->session()->forget('cart');
    }
}
