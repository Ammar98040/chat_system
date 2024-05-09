<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        if($request->usertype == 'member'){
    
            if (Auth::guard($this->checkGuard($request))->attempt(['IDNum' => $request->IDNum, 'password' => $request->password])) {
                return $this->redirectToPage($request);
            } else {
                return back()->with('faild', 'هذا الحساب غير مسجل من قبل لدينا !');
            }

        }
        else {

            if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
                return $this->redirectToPage($request);
            } else {
                return back()->with('faild', 'هذا الحساب غير مسجل من قبل لدينا !');
            }

        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return $this->Logout($request);

    }
}
