<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.profile', [
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

    // Users List function
    public function UsersList()
    {

        $alluser = User::all();

        $i = 1;
        return view('admin.profile.admin_register', compact('alluser', 'i'));

    }

    /**
     * Delete users by admin 
     */
    public function UserDelete($id)
    {

        if (auth()->user()->role == 'superadmin') {
            $user = User::find($id);

            $user->delete();
            return redirect()->back();
        }

    }

    public function UserEdit($id)
    {

        $user = User::find($id);
        return view('admin.profile.admin_edit', compact('user'));
    }

    // public function UserUpdate(Request $request)
    // {
    //     dd($request->all());

    //     $request->validate(
    //         [
    //             'name' => 'required|string|max:200',
    //             'email' => 'required|string|email',
    //         ]

    //     );
    //     $user = User::find($request->id);
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');

    //     $user->password = Hash::make($request->password);

    //     $user->save();
    //     return redirect()->back();


    // }
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