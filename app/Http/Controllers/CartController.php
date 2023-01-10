<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CourseRepository $courseRepository, CartService $cartService)
    {
        $this->courseRepository = $courseRepository;
        $this->cartService = $cartService;
    }

    public function index()
    {
        return view('admin.cart.index');
    }

    public function addToCart(Request $request, $id)
    {
        $course = $this->courseRepository->findById([$id]);
        if (!$course) {
            return "Không tìm thấy sản phẩm";
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = $this->cartService->insert($course, $id);
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Course added to cart successfully1!');
        }

        if ($this->cartService->exists($cart, $id)) {
            $cart[$id]['quantity'] = $this->cartService->update($cart, $id);
            session()->put('cart', $cart);
            return redirect()->back()->with('message', 'Course added to cart successfully2!');
        }

        $cart[$id] = [
            "name" => $course->name,
            "quantity" => 1,
            "price" => $course->price,
            "photo" => $course->attachment->file_name
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Course added to cart successfully3!');
    }
}
