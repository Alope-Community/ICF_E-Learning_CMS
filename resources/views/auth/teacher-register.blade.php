@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen w-screen"
        style="background-image: radial-gradient(circle at top,#e0e7ff,#fff 50%)">
        <form method="POST" action="{{ route('register.teacher.submit') }}"
            class="max-w-lg mx-auto bg-white px-6 pb-6 rounded-2xl shadow-xl border">
            <div class="flex items-center justify-center">
                <div class="h-[1px] bg-slate-800 w-10/12"></div>
            </div>
            <h3 class="text-xl font-bold text-center text-slate-800 mt-6 mb-2">{{ env('APP_NAME') }}</h3>
            <h2 class="text-2xl font-bold text-center mb-6 mt-4 text-slate-800">Registrasi Guru</h2>

            @csrf

            <div class="flex gap-5">

                <!-- NUPTK -->
                <div class="mb-4 relative">
                    <label for="nuptk" class="text-gray-700 font-semibold mb-2 text-sm flex items-center">
                        NUPTK <span class="text-red-500 ml-1">*</span>
                        <!-- Tombol Help -->
                        <div class="relative ml-2 group flex items-center">
                            <button type="button" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                            <!-- Tooltip Help -->
                            <div
                                class="absolute left-0 top-6 bg-gray-800 text-white text-xs text-center rounded-lg px-3 py-2 shadow-md opacity-0 transition-opacity duration-200 pointer-events-none group-hover:opacity-100 z-10">
                                NUPTK (Nomor Unik Pendidik dan Tenaga Kependidikan) adalah nomor khusus yang diberikan
                                kepada guru atau tenaga kependidikan sebagai identitas resmi.
                            </div>
                        </div>
                    </label>

                    <input id="nuptk" type="number"
                        style="appearance: none; -moz-appearance: textfield; -webkit-appearance: none;"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('nuptk') border-red-500 @enderror"
                        name="nuptk" value="{{ old('nuptk') }}" required autofocus>
                    @error('nuptk')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>



                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2 text-sm">Name <span
                            class="text-red-500">*</span></label>
                    <input id="name" type="text"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2 text-sm">Email <span
                        class="text-red-500">*</span></label>
                <input id="email" type="email"
                    class="w-full border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-5">

                <!-- Password -->
                <div class="mb-4 w-full relative">
                    <label for="password" class="block text-gray-700 font-semibold mb-2 text-sm">Password <span
                            class="text-red-500">*</span></label>
                    <input id="password" type="password"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('password') border-red-500 @enderror"
                        name="password" required>
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <!-- Toggle Password Visibility -->
                    <button type="button" class="absolute right-3 top-[37px] text-gray-500" id="toggle-password"
                        onclick="visiblity('password', 'svg-eye-pass')">
                        <svg id="svg-eye-pass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-4 w-full relative">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2 text-sm">Confirm
                        Password <span class="text-red-500">*</span></label>
                    <input id="password_confirmation" type="password"
                        class="w-full border rounded-lg p-2 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('password_confirmation') border-red-500 @enderror"
                        name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <button type="button" class="absolute right-3 top-[37px] text-gray-500"
                        id="toggle-password-confirmation"
                        onclick="visiblity('password_confirmation', 'svg-eye-confirm-pass')">
                        <svg id="svg-eye-confirm-pass" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>

                </div>

            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold tracking-[0.020em] py-2 rounded-lg transition mt-5">
                Register
            </button>
        </form>
    </div>

    <script>
        function visiblity(idPassField, idIcon) {
            const passwordField = document.getElementById(idPassField);
            const eyeIconPass = document.getElementById(idIcon);

            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            if (type === 'text') {
                eyeIconPass.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                `
            } else {
                eyeIconPass.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                `
            }
        }

        function toggleHelp(id) {
            const helpElement = document.getElementById(id);
            helpElement.classList.toggle('hidden');
        }
    </script>
@endsection
