@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Verifikasi OTP</h2>
        <form method="POST" action="{{ route('auth.verify.otp.submit') }}">
            @csrf

            <div class="form-group">
                <label for="otp">Masukkan OTP</label>
                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp"
                    required>
                @error('otp')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </form>
    </div>
@endsection
