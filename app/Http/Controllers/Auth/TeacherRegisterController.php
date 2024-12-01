<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use App\Mail\OtpMail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TeacherRegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.teacher-register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nuptk' => 'required|numeric|digits:16|unique:users',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ], [
            'nuptk.required' => 'NUPTK wajib diisi.',
            'nuptk.numeric' => 'NUPTK harus berupa angka.',
            'nuptk.digits' => 'NUPTK harus 16 digit.',
            'nuptk.unique' => 'NUPTK sudah terdaftar.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
            'password_confirmation.same' => 'Konfirmasi password tidak cocok dengan password.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nuptk' => $request->input('nuptk'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $otp = rand(100000, 999999);

        $user->otp = $otp;
        $user->save();

        Mail::to($user->email)->send(new SendOtpMail($otp));

        Notification::make()
            ->title('Verifikasi Email')
            ->body('Silahkan cek email Anda untuk mendapatkan OTP dan verifikasi akun Anda.')
            ->warning()
            ->send();

        return redirect()->route('auth.verify.otp.form')->with('success', 'Pendaftaran Berhasil! Silahkan cek email anda untuk verifikasi.');
    }
}
