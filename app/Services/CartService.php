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

    public function insert($data)
    {
        $data->quantity = 1;
        $this->cart->push($data);
        session()->put('cart', $this->cart);
        return;
    }

    public function update(array $inputs, $isReplace = true)
    {
        foreach ($inputs as $key => $quantity) {
            $this->cart = $this->cart->map(function ($item) use ($isReplace, $key, $quantity) {
                if ($key == $item->id) {
                    $isReplace ? $item->quantity = $quantity : $item->quantity += $quantity ;
                }

                return $item;
            });
        };


        session()->put('cart', $this->cart);
        return;
    }

    public function total($cart)
    {
        return $this->cart->count();
    }

    public function exists($id)
    {
        return $this->cart->where('id', $id)->isNotEmpty();
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
