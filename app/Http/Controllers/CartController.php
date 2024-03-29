<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Services\CartService;
use App\Services\MailService;
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
        $course = $this->courseRepository->findById($id);
        $cartService = app(CartService::class);

        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        if (app(CartService::class)->exists($course->id)) {
            $cartService->update([$course->id => 1], false);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cartService->insert($course);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy(Request $request, $id)
    {
        if (!$course = $this->courseRepository->findById($id)) {
            abort(404);
        }

        app(CartService::class)->removeItem($course);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function updateQuantity(Request $request)
    {
        app(CartService::class)->update($request->quantity);
        return redirect()->back()->with('message', 'Course added to cart successfully1!');
    }

    public function checkOut()
    {
        app(MailService::class)->sendMailCheckoutOrder(auth()->user(), app(CartService::class)->getAll());
        return redirect()->back()->with('message', 'Successfully');
    }
}
