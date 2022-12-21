<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index', [
               'users' => $this->userRepository->getAll(request()->all())
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        return redirect()->route('user.index', [
            'users' => $this->userRepository->save(request()->all())
        ])->with('message', 'The success message!');
    }

    public function edit($id)
    {
       //
    }

    public function destroy($id)
    {
       //
    }
}
