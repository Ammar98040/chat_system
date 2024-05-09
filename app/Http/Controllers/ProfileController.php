<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if(auth('member')->check()){
            $myprofile = auth('member')->user();
        }
        else {
            $myprofile = auth('web')->user();
        }
        return view('profile.edit', compact('myprofile'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        if(auth('member')->check()){
            $user = Member::findOrfail(auth('member')->user()->id);
            if($request->hasFile('profileImg')){
                // delete current image
                $profileIMGCurrent = public_path('/' . auth('member')->user()->profileImg);
                if(file_exists($profileIMGCurrent)){
                    unlink($profileIMGCurrent);
                }
                // update image
                $generateFile = time() . '.' . $request->profileImg->extension();
                $folder = public_path('images/users');
                $request->profileImg->move($folder, $generateFile);
                $profileImg = 'images/users/' . $generateFile;
                $user->profileImg = $profileImg;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->Nation = $request->Nation;
            $user->save();
        }
        else {
            $user = User::findOrfail(auth('web')->user()->id);
            if($request->hasFile('profileImg')){
                // delete current image
                $profileIMGCurrent = public_path('/' . auth('web')->user()->profileImg);
                if(file_exists($profileIMGCurrent)){
                    unlink($profileIMGCurrent);
                }
                // update image
                $generateFile = time() . '.' . $request->profileImg->extension();
                $folder = public_path('images/users');
                $request->profileImg->move($folder, $generateFile);
                $profileImg = 'images/users/' . $generateFile;
                $user->profileImg = $profileImg;
            } 

            // new Password create
            if($request->password != null){
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
