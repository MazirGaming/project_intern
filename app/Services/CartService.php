<?php

declare(strict_types=1);

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

    public function update($request)
    {
    }

    public function total($cart)
    {
        return $this->cart->count();
    }

    public function exists($id)
    {
        return !empty($this->cart->where('id', $id));
    }

    public function find($course)
    {
        return $this->cart->where('id', $course->id);
    }

    public function removeItem($course)
    {
        foreach ($this->cart as $index => $item) {
            if ($item['id'] == $course->id) {
                return $this->cart->splice($index, 1);
            }
        }
    }

    public function destroy($request)
    {
        return $request->session()->forget('cart');
    }

    public function getAll()
    {
        return $this->cart;
    }
}
