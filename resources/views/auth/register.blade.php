<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-white">
        {{-- Logo --}}
        <div class="mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-60 mx-auto">
        </div>

        {{-- Judul --}}
        <h1 class="text-3xl font-extrabold text-[#1E1F9D] mb-1">FITRADAR AI</h1>
        <p class="text-blue-900 font-medium mb-8 text-center">Health & Fitness</p>

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                    class="w-full max-w-sm px-4 py-2 border border-blue-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            {{-- Email --}}
            <div>
                <input type="email" name="email" id="email" placeholder="Alamat Email"
                    class="w-full px-4 py-2 border border-blue-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            {{-- Password --}}
            <div>
                <input type="password" name="password" id="password" placeholder="Kata Sandi"
                    class="w-full px-4 py-2 border border-blue-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            {{-- Confirm Password --}}
            <div>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Kata Sandi"
                    class="w-full px-4 py-2 border border-blue-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit"
                    class="w-full bg-[#1E1F9D] hover:bg-[#15168a] text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                    Daftar
                </button>
            </div>

            {{-- Login Redirect --}}
            <div class="text-center text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk</a>
            </div>
        </form>
    </div>
</x-guest-layout>
