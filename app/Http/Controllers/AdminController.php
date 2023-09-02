<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile(Request $request)
    {
        return view('admin.admin-profile-view', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request)
    {
        return view('admin.admin-profile-edit', [
            'user' => $request->user(),
        ]);
    }

    public function store(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            unlink(public_path('upload/admin_images/' . $request->user()->profile_image));

            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $fileName);
            $request->user()->profile_image = $fileName;
        }

        $request->user()->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return Redirect::route('admin.profile')->with($notification);
    }
}
