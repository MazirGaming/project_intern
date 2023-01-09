<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttachmentRepository;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    protected $courseRepository;

    protected $categoryRepository;

    public function __construct(
        CourseRepository $courseRepository,
        CategoryRepository $categoryRepository,
        AttachmentRepository $attachmentRepository
    ) {
        $this->courseRepository = $courseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->attachmentRepository = $attachmentRepository;
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
        
        DB::transaction(function () use ($inputs) {
            $course = $this->courseRepository->save($inputs);
            $course->attachment()->create([
                'file_path' => $inputs['photo']->store('public/attachments'),
                'attachable_id' => $course['id'],
                'file_name' => $inputs['photo']->hashName(),
                'attachable_type' => Course::class,
                'extension' => $inputs['photo']->extension(),
                'size' => $inputs['photo']->getSize(),
                'mime_type' => $inputs['photo']->getClientMimeType()
            ]);
        });

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
        DB::transaction(function () use ($inputs, $id) {
            if (!empty($inputs['photo'])) {
                $this->attachmentRepository->updateAttachment($id, $inputs);
            }

            $course = $this->courseRepository->findById([$id]);
            $this->courseRepository->save($inputs, ['id' => $id]);
        });

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
