<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('admin.cart.index', [
            'cart' => app(CartService::class)->getAll()
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        app(CartService::class)->insert($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function destroy(Request $request, $id)
    {
        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        app(CartService::class)->removeItem($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function update(Request $request)
    {
        //
    }
}
