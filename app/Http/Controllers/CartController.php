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
        // $request->session()->forget('cart');
        // $this->cartService->listCourse();

        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        $this->cartService->insert($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function destroy(Request $request, $id)
    {
        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        $this->cartService->removeItem($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function update(Request $request, $id)
    {
        $this->cartService->insert($course);
        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }
}
