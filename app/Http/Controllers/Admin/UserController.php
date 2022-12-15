<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        return view('admin.user.index', [
               'users' => $this->userRepository->getAll(request()->all())
        ]);
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
