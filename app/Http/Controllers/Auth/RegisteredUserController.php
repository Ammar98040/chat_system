<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Models\Member;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use AuthTrait;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $profileImg = '';
        if($request->hasFile('profileImg')){
            $generateFile = time() . '.' . $request->profileImg->extension();
            $folder = public_path('images/users');
            $request->profileImg->move($folder, $generateFile);
            $profileImg = 'images/users/' . $generateFile;
        }

        if($request->usertype == 'admin'){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'profileImg' => $profileImg,
                'password' => Hash::make($request->password),
            ]);
        }
        else {
            if($request->college == '' || $request->IDNum == ''){
                return back()->with('faild', 'يجب ملئ جميع الحقول  !');
            }
            $user = Member::create([
                'name' => $request->name,
                'email' => $request->email,
                'profileImg' => $profileImg,
                'IDNum' => $request->IDNum,
                'college' => $request->college,
                'Nation' => $request->Nation,
                'password' => Hash::make($request->password),
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return $this->redirectToPage($request);
    }
}
