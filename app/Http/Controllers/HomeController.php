<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;

class HomeController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home', [
            'courses' => $this->courseRepository->getAll(request()->all()),
        ]);
    }
}
