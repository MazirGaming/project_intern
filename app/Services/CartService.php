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

    public function update(array $inputs)
    {
        foreach ($inputs as $key => $item) {
            $this->cart = $this->cart->map(function ($course) use ($inputs, $key, $item) {
                if (count($inputs) === 1){
                    if ($key == $course['id']) {
                        $course['quantity'] = $course['quantity'] + 1;
                    }
                } else {
                    if ($key == $course['id']) {
                        $course['quantity'] = $item;
                    }
                }
                
                return $course;
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
