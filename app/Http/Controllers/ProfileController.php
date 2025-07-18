<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'dob' => 'nullable|date',
            'sexe' => 'nullable|string|in:homme,femme',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800', // Ajout image
        ]);

        // ✅ Traitement image si elle est soumise
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Stocke dans storage/app/public/avatars
            $avatar->storeAs('public/avatars', $filename);

            // Supprimer l'ancien avatar si existant (optionnel)
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }

            // Mise à jour du champ avatar dans la BDD
            $user->avatar = 'avatars/' . $filename;
        }

        // ✅ Mise à jour des autres champs
        $user->update($request->only([
            'name',
            'email',
            'phone',
            'address',
            'city',
            'dob',
            'sexe'
        ]));

        // Sauvegarde du champ avatar
        $user->save();

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function resetAvatar()
    {
        $user = Auth::user();

        // Supprimer l'ancien avatar s’il existe
        if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
            Storage::delete('public/' . $user->avatar);
        }

        // Réinitialiser l’avatar à null
        $user->avatar = null;
        $user->save();

        return back()->with('success', 'Votre photo de profil a été réinitialisée.');
    }

    public function updateInfo(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'dob'     => 'nullable|date',
            'sexe'    => 'nullable|in:homme,femme',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city'    => 'nullable|string|max:255',
            'bio'     => 'nullable|string|max:1000',
            'specialization'    => 'nullable|string|max:255',
            'consultancy_fees'  => 'nullable|numeric|min:0',
            'role'              => 'nullable|in:admin,medecin,patient',
        ]);

        $user->dob     = $request->dob;
        $user->sexe    = $request->sexe;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->city    = $request->city;

        // Si c’est un médecin ou admin, mettre à jour les champs spéciaux
        if ($user->role === 'medecin' || $user->role === 'admin') {
            $user->bio               = $request->bio;
            $user->specialization    = $request->specialization;
            $user->consultancy_fees  = $request->consultancy_fees;
        }

        // Seul un admin peut changer le rôle
        if ($user->role === 'admin' && $request->filled('role')) {
            $user->role = $request->role;
        }

        $user->save();

        return back()->with('success', 'Informations personnelles mises à jour avec succès.');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();


        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Mot de passe mis à jour avec succès.');
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
