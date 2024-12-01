<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class OtpVerificationController extends Controller
{
    public function showForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        $user = User::where('otp', $request->otp)->first();

        if (!$user) return redirect()->back()->withErrors(['otp' => 'OTP tidak valid.']);

        $user->email_verified_at = now();
        $user->otp = null;
        $user->save();

        $user->assignRole('teacher');

        auth()->login($user);

        Notification::make()
            ->title('Email Terverifikasi!')
            ->body('Selamat datang, akun Anda berhasil diverifikasi dan Anda telah login.')
            ->success()
            ->send();

        return redirect('/admin')->with('success', 'Akun berhasil diverifikasi dan Anda telah login.');
    }
}
