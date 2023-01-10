<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;

class CartController extends Controller
{
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('admin.cart.index');
    }

    public function addToCart($id)
    {
        $course = $this->courseRepository->findById([$id]);
        if (!$course) {
            return "Không tìm thấy sản phẩm";
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                    $id => [
                        "name" => $course->name,
                        "quantity" => 1,
                        "price" => $course->price,
                        "photo" => $course->attachment->file_name
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Course added to cart successfully!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Course added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $course->name,
            "quantity" => 1,
            "price" => $course->price,
            "photo" => $course->attachment->file_name
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Course added to cart successfully!');
    }
}
