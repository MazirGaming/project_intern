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

        $this->cartService->insert($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }
}
