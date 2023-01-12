<?php

namespace App\Services;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart') ?? collect();
    }

    public function insert($course)
    {
        $this->cart = session()->get('cart') ?? collect();
        if ($this->cart->where('id', $course->id)->isNotEmpty()) {
            $this->cart = $this->cart->map(function ($item) use ($course) {
                if ($item['id'] == $course->id) {
                    ++$item['quantity'];
                }

                return $item;
            });

            session()->put('cart', $this->cart);
            return;
        }

        $this->cart->push([
            "id" => $course->id,
            "name" => $course->name,
            "quantity" => 1,
            "price" => $course->price,
            "photo" => $course->attachment->file_name
        ]);
        session()->put('cart', $this->cart);
        return;
    }

    public function update($course)
    {
        $this->cart = session()->get('cart');
        $qty = request()->qty;
        if (isset($this->cart[$course->id])) {
            $this->cart[$course->id]['quantity'] = $qty;
            session()->put('cart', $this->cart);
        }
    }

    public function total($cart)
    {
        $this->cart = session()->get('cart');
        if ($this->cart) {
            return $this->cart->count();
        }
    }

    public function exists($course)
    {
        $this->cart = session()->get('cart');
        if ($this->cart) {
            $this->cart->where('id', $course->id);
            return true;
        }

        return false;
    }

    public function find($course)
    {
        $this->cart = session()->get('cart');
        if ($this->cart) {
            return $this->cart->where('id', $course->id);
        }
    }

    public function removeItem($course)
    {
        $this->cart = session()->get('cart');
        if ($this->cart) {
            foreach ($this->cart as $index => $item) {
                if ($item['id'] == $course->id) {
                    unset($this->cart[$index]);
                }
            }

            return $this->cart;
        }
    }

    public function destroy($request)
    {
        return $request->session()->forget('cart');
    }
}
