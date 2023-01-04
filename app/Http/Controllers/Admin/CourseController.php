<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CourseRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    protected $courseRepository;

    protected $categoryRepository;

    public function __construct(CourseRepository $courseRepository, CategoryRepository $categoryRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.courses.index', [
            'courses' => $this->courseRepository->getAll(request()->all()),
            'categories' =>  $this->categoryRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', [
            'categories' =>  $this->categoryRepository->getAll(),
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $this->courseRepository->save($request->all());
        return redirect()->route('course.index')->with('message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
