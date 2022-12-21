<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

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
        return view('admin.user.add_user');
    }

    public function store(Request $request)
    {
        return redirect()->route('user.index', [
            'users' => $this->userRepository->save(request()->all())
        ])->with('message', 'Thêm mới thành công');
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
