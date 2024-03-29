<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository, CourseRepository $courseRepository)
    {
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->getAll(request()->all())
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['type'] = User::TYPES['admin'];
        $inputs['password'] = Hash::make($inputs['password']);
        $this->userRepository->save($inputs);
        return redirect()->route('user.index')->with('message', 'Created successfully!');
    }

    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => $this->userRepository->findById($id)
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $inputs = $request->all();
        $user = $this->userRepository->findById($id);

        if ($inputs['password'] == null) {
            unset($inputs['password']);
        } else {
            $inputs['password'] = Hash::make($inputs['password']);
        }

        $this->userRepository->save($inputs, ['id' => $id]);
        return redirect()->route('user.index')->with('message', 'Saved successfully!');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('user.index')->with('error', 'Delete Fail!');
        }

        User::destroy($id);
        return redirect()->route('user.index')->with('message', 'Deleted successfully!');
    }

    public function show($id)
    {
        return view('admin.users.show', [
            'user' => $this->userRepository->findById($id),
            'courses' => $this->courseRepository->getByUserId($id),
        ]);
    }
}
