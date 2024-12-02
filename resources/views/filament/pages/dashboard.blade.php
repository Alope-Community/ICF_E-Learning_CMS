<x-filament::page>
    @if (!$this->isEmailVerified())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-5 pb-8 mb-4">
            <p class="mb-5"><strong>Peringatan:</strong> Akun Anda belum terverifikasi. Silakan verifikasi email Anda untuk
                mendapatkan akses penuh.</p>
            <a class="text-sm font-medium bg-green-500 text-white p-3 rounded-lg" href="{{ route('auth.verify.otp.form') }}">Verifikasi sekarang</a>
        </div>
    @endif
    <x-filament::widgets :widgets="$this->getWidgets()" :columns="$this->getColumns()" />

</x-filament::page>
