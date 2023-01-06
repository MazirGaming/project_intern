<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

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
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.courses.create', [
            'categories' => $this->categoryRepository->getAll(),
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $inputs = $request->all();
        if (!$request->hasFile('photo')) {
            return redirect()->back()->with("error", "You need upload image");
        }

        $path = $request->file('photo')->store('public');
        $path = substr($path, strlen('public/'));
        $course = $this->courseRepository->save($inputs);
        $course->attachment()->create([
            'file_path' => $path,
            'attachable_id' => $course['id'],
            'attachable_typ' => 'App\Models\Course',
        ]);

        return redirect()->route('course.index')->with('message', 'Created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.courses.edit', [
            'course' => $this->courseRepository->findById([$id]),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $inputs = $request->all();
        $course = $this->courseRepository->findById([$id]);
        $this->courseRepository->save($inputs, ['id' => $id]);
        return redirect()->route('course.index')->with('message', 'Saved successfully!');
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
