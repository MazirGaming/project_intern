<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;

class HomeController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->middleware('auth');
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('home', [
            'courses' => $this->courseRepository->getAll(request()->all()),
        ]);
    }
}
