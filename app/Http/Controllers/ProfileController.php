<?php
// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $user->update($validated);

        return back()->with('success', 'Профиль успешно обновлен');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Текущий пароль указан неверно']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Пароль успешно изменен');
    }

    /**
     * Показать билеты пользователя
     */
    public function tickets()
    {
        $tickets = Auth::user()->tickets()->latest()->paginate(10);
        return view('profile.tickets', compact('tickets'));
    }

    /**
     * Показать бронирования пользователя
     */
    public function bookings()
    {
        $bookings = Auth::user()->bookings()->with('skate')->latest()->paginate(10);
        return view('profile.bookings', compact('bookings'));
    }
}