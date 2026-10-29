<x-app-layout>
  <div class="min-h-screen bg-[#1E1F9D] text-white flex flex-col sm:flex-row">
    <!-- Sidebar -->
    <div class="w-full sm:w-64 sm:fixed sm:top-0 sm:left-0 h-auto sm:h-full bg-[#15168a] p-6 z-50">
      <div class="flex items-center mb-8">
        <img src="{{ asset('images/Logo.png') }}" alt="FitRadar AI Logo" class="h-20 w-auto mr-2">
        <span class="text-xl font-semibold">FITRADAR<br>AI</span>
      </div>
      <nav class="space-y-4">
        <a href="{{ route('halaman-dashboard') }}" class="flex items-center text-gray-300 hover:text-white">
          <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0l-2-2m2 2l7 7" />
          </svg>
          <span>Tinjauan</span>
        </a>
        <a href="{{ route('halaman-profil') }}" class="flex items-center text-white bg-[#1E1F9D] px-3 py-2 rounded-lg">
          <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span>Profil</span>
        </a>
        <a href="{{ route('deteksi') }}" class="flex items-center text-gray-300 hover:text-white">
          <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 11-2 0 1 1 0 012 0zm0 7a1 1 0 11-2 0 1 1 0 012 0zm0 7a1 1 0 11-2 0 1 1 0 012 0z" />
          </svg>
          <span>Deteksi</span>
        </a>
        <a href="{{ route('halaman-makanan') }}" class="flex items-center text-gray-300 hover:text-white">
          <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5" />
          </svg>
          <span>Makanan</span>
        </a>
        <a href="{{ route('halaman-olahraga') }}" class="flex items-center text-gray-300 hover:text-white">
          <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5A1 1 0 004.586 12H4m16 0h-.586a1 1 0 01-.707-.293l-5-5a1 1 0 01-1.414 0l-5 5A1 1 0 014.586 12H4" />
          </svg>
          <span>Olahraga</span>
        </a>
      </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-1 sm:ml-64 p-4 sm:p-6 lg:p-8">
      <h1 class="text-xl sm:text-2xl font-semibold mb-6 text-center">Profile</h1>

      @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 max-w-4xl mx-auto"
      role="alert">
      <strong class="font-bold">Sukses!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

      <div class="bg-white text-[#2d3748] rounded-lg shadow-md p-6 max-w-4xl mx-auto space-y-8">

        {{-- Form: Simpan Profil --}}
        <form action="{{ route('halaman-profil.store') }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')
          <div>
            <label for="name" class="block text-sm font-semibold">Name</label>
            <input type="text" name="name" id="name"
              value="{{ old('name', $healthData->name ?? auth()->user()->name) }}"
              class="mt-1 block w-full border rounded px-3 py-2">
          </div>

          {{-- Gender --}}
          @php
      $selectedGender = strtolower(old('gender') ?? ($healthData->gender ?? ''));
    @endphp
          <div>
            <label class="block text-sm font-semibold">Gender</label>
            <div class="flex space-x-6 mt-2">
              <label class="inline-flex items-center">
                <input type="radio" name="gender" value="male" {{ $selectedGender === 'male' ? 'checked' : '' }}>
                <span class="ml-2">Male</span>
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="gender" value="female" {{ $selectedGender === 'female' ? 'checked' : '' }}>
                <span class="ml-2">Female</span>
              </label>
            </div>
          </div>


          {{-- Tanggal Lahir --}}
          @php
      $birthdate = $healthData->birthdate ?? null;
      $day = $birthdate ? date('d', strtotime($birthdate)) : '';
      $month = $birthdate ? date('m', strtotime($birthdate)) : '';
      $year = $birthdate ? date('Y', strtotime($birthdate)) : '';
      @endphp
          <div class="grid grid-cols-3 gap-4">
            <select name="day" class="border rounded px-3 py-2">
              <option value="">Day</option>
              @for ($i = 1; $i <= 31; $i++)
          <option value="{{ $i }}" {{ $day == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
            </select>

            <select name="month" class="border rounded px-3 py-2">
              <option value="">Month</option>
              @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
            </select>

            <select name="year" class="border rounded px-3 py-2">
              <option value="">Year</option>
              @for ($i = date('Y'); $i >= 1950; $i--)
          <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
            </select>
          </div>

          {{-- Tinggi dan Berat --}}
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label for="height" class="block text-sm font-semibold">Height (cm)</label>
              <input type="number" name="height" id="height" value="{{ old('height', $healthData->height ?? '') }}"
                class="mt-1 block w-full border rounded px-3 py-2" onchange="calculateBMI()">
            </div>
            <div>
              <label for="weight" class="block text-sm font-semibold">Weight (kg)</label>
              <input type="number" name="weight" id="weight" value="{{ old('weight', $healthData->weight ?? '') }}"
                class="mt-1 block w-full border rounded px-3 py-2" onchange="calculateBMI()">
            </div>
          </div>

          {{-- BMI --}}
          <div>
            <label for="bmi" class="block text-sm font-semibold">BMI</label>
            <input type="text" id="bmi" readonly value="{{ number_format($healthData->bmi ?? 0, 2) }}"
              class="mt-1 block w-full border rounded px-3 py-2 bg-gray-200 cursor-not-allowed">
            <p class="text-xs text-gray-600 mt-1">BMI dihitung otomatis.</p>
          </div>

          <div class="flex justify-end">
            <button type="submit" class="bg-[#007bff] text-white px-4 py-2 rounded hover:bg-[#0056b3]">
              Simpan Profil
            </button>
          </div>
        </form>

        <!-- Notifikasi Password Berhasil Diubah -->
        @if (session('password_status'))
      <div
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 max-w-4xl mx-auto"
        role="alert">
        <strong class="font-bold">Sukses</strong>
        <span class="block sm:inline">{{ session('password_status') }}</span>
      </div>
    @endif

        @if ($errors->updatePassword->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6 max-w-4xl mx-auto"
          role="alert">
          <strong class="font-bold">Gagal Mengubah Password</strong>
          <ul class="list-disc pl-5">
          @foreach ($errors->updatePassword->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
          </ul>
        </div>
    @endif

        {{-- Form: Ubah Password --}}
        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')
          <h2 class="text-lg font-medium text-[#1E1F9D]">Ubah Password</h2>

          <div>
            <label for="current_password" class="block text-sm font-semibold">Password Saat Ini</label>
            <input type="password" name="current_password" id="current_password"
              class="mt-1 block w-full border rounded px-3 py-2" required>
          </div>

          <div>
            <label for="password" class="block text-sm font-semibold">Password Baru</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full border rounded px-3 py-2"
              required>
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-semibold">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
              class="mt-1 block w-full border rounded px-3 py-2" required>
          </div>

          <div class="flex justify-end">
            <button type="submit" class="bg-[#1E1F9D] text-white px-4 py-2 rounded hover:bg-[#15168a]">
              Simpan Password Baru
            </button>
          </div>
        </form>

        {{-- Form: Hapus Akun --}}
        <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-6"
          onsubmit="return confirm('Anda yakin ingin menghapus akun ini? Semua data akan dihapus permanen.')">
          @csrf
          @method('DELETE')
          <h2 class="text-lg font-medium text-red-600">Hapus Akun</h2>
          <div class="flex justify-end">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
              Hapus Akun
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</x-app-layout>