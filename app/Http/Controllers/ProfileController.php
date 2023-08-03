<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.profile', compact('user'));
    }

    /**
     * @return Application|Factory|View
     */
    public function setting()
    {
        $user = auth()->user();
        return view('profile.setting', compact('user'));
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $validDate = $request->validate([
            'name' => ['required', 'string'],
        ]);

        if ($request->avatar) {
            $imgValidated = $request->validate([
                'avatar' => 'file|max:512'
            ]);;
            $validDate['avatar'] = "/storage/" . Storage::disk('public')->putFile('avatars', $imgValidated['avatar']);
        }

        $request->user()->update($validDate);

        return redirect()->back();
    }
}
