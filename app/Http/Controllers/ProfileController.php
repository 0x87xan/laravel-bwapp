<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatar = $request->file('avatar');
        $current_avatar = Auth::user()->avatar;

        try {
            $image = Image::make($avatar);
        }catch (\Exception $e){
            return redirect()->back()->with('avatar', 'Avatar should be an image');
        }

        if ($image->height() > 1 && $image->width() > 1){
            if (Storage::exists('public/images/' . $current_avatar) && $current_avatar != 'default-logo.png'){
                Storage::delete('public/images/' . $current_avatar);
            }

            $filename = time() . '.' . $avatar->extension();
            $path = $request->avatar->storeAs(('public/images'), $filename);
            Auth::user()->avatar = $filename;
            Auth::user()->save();

            return redirect()->back()->with('status', 'profile-avatar-updated');
        }

        return redirect()->back()->with('avatar', 'Something went wrong');
    }
}
