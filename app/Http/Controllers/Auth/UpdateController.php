<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
class UpdateController extends Controller
{
    public function profileUpdate()
    {
       return view('Auth.update_profile');

    }

    public function postProfile(Request $request)
{
    // Find the user profile by ID
    $update_profile = User::find($request->id);

    // Handle file upload if there is an avatar
    if ($request->hasFile('avatar')) {
        // Check if the user already has an avatar and delete the old one
        if ($update_profile->avatar) {
            \Storage::disk('public')->delete($update_profile->avatar);
        }
        // Store the new avatar
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    } else {
        // Keep the previous avatar if no new image is uploaded
        $avatarPath = $update_profile->avatar;
    }

    // Update fields only if they are not null
    $update_profile->name = $request->name ?? $update_profile->name;
    $update_profile->email = $request->email ?? $update_profile->email;
    $update_profile->phone = $request->phone ?? $update_profile->phone;
    $update_profile->avatar = $avatarPath;

    // Save the updated profile
    $update_profile->save();

    // Return success message
    if ($update_profile) {
        return back()->with('success', 'Profile updated successfully');
    }

    return back()->with('error', 'Profile update failed');
}


    public function changePassword()
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed', // Make sure new password is confirmed
        ]);
    
        // Find the user by ID
        $update_password = User::find($request->id);
    
        // Debugging - Check if user is found and old password exists
        if (!$update_password) {
            return back()->with('error', 'User not found.');
        }
    
        // Check if the old password matches the current password
        if (Hash::check($request->oldPassword, $update_password->password)) {
            // Hash and update the new password
            $update_password->password = Hash::make($request->newPassword);
    
            // Save the updated user model
            $update_password->save();
    
            // Return success response
            return back()->with('success', 'Password updated successfully');
        } else {
            // If old password doesn't match, return error message
            return back()->with('error', 'Old password is incorrect');
        }
    }
    

    public function deleteUser()
{
    // Get the authenticated user ID
    $auth = auth()->user()->id;

    // Retrieve the user's record
    $user = User::find($auth);

    // Check if the user has an avatar and delete it from storage
    if ($user && $user->avatar) {
        \Storage::disk('public')->delete($user->avatar);
    }

    // Delete the user record
    $userDeleted = $user->delete();

    // If deletion was successful, redirect to welcome page with success message
    if ($userDeleted) {
        return back()->with('success', 'Your account has been successfully deleted.');
    } else {
        return back()->with('error', 'There was a problem deleting your account.');
    }
}

}
