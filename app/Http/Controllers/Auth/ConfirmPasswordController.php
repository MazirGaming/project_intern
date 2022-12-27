<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;
    protected $userRepository;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository, CourseRepository $courseRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
    }

    public function showForm()
    {
        return view('admin.users.change_password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        $inputs = $request->all();
        $this->userRepository->save(['password' => Hash::make($inputs['new_password'])], ['id' => Auth::user()->id]);
        return redirect()->back()->with("message", "Changed Password");
    }
}
