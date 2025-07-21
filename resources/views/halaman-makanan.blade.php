<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="min-h-screen bg-[#F4F4F4] text-gray-800 flex">

        {{-- Data untuk JavaScript --}}
        <div id="sarapan-data" data-sarapan="{{ json_encode($alternatif['sarapan'] ?? []) }}" style="display: none;">
        </div>
        <div id="siang-data" data-siang="{{ json_encode($alternatif['siang'] ?? []) }}" style="display: none;"></div>
        <div id="malam-data" data-malam="{{ json_encode($alternatif['malam'] ?? []) }}" style="display: none;"></div>

        <style>
            #sarapan-button,
            #siang-button,
            #malam-button {
                display: none;
            }
        </style>


        {{-- Sidebar --}}
        <aside class="hidden lg:block fixed top-0 left-0 h-full w-64 bg-[#15168a] text-white p-6 shadow-lg z-10">
            <div class="flex items-center mb-10">
                <img src="{{ asset('images/Logo.png') }}" alt="FitRadar AI Logo" class="h-16 lg:h-20 w-auto mr-2">
                <span class="text-lg lg:text-xl font-bold leading-tight">FITRADAR<br>AI</span>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('halaman-dashboard') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <span>Tinjauan</span>
                </a>
                <a href="{{ route('halaman-profil') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <span>Profil</span>
                </a>
                <a href="{{ route('deteksi') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <span>Deteksi</span>
                </a>
                <a href="{{ route('halaman-makanan') }}"
                    class="flex items-center gap-3 text-white bg-[#1E1F9D] px-3 py-2 rounded-lg">
                    <span>Makanan</span>
                </a>
                <a href="{{ route('halaman-olahraga') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <span>Olahraga</span>
                </a>
            </nav>
        </aside>

        {{-- Mobile Navigation Bar --}}
        <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-[#15168a] text-white p-4 shadow-lg z-20">
            <nav class="flex justify-around items-center">
                <a href="{{ route('halaman-dashboard') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all">
                    <span class="text-xs">Tinjauan</span>
                </a>
                <a href="{{ route('halaman-profil') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all">
                    <span class="text-xs">Profil</span>
                </a>
                <a href="{{ route('deteksi') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all">
                    <span class="text-xs">Deteksi</span>
                </a>
                <a href="{{ route('halaman-makanan') }}"
                    class="flex flex-col items-center text-white bg-[#1E1F9D] px-2 py-1 rounded-lg">
                    <span class="text-xs">Makanan</span>
                </a>
                <a href="{{ route('halaman-olahraga') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all">
                    <span class="text-xs">Olahraga</span>
                </a>
            </nav>
        </div>

        {{-- Main Content --}}
        <main class="flex-1 lg:pl-64 p-4 md:p-6 lg:p-8 xl:p-12 bg-gradient-to-br from-gray-50 to-white pb-20 lg:pb-8">
            <div class="text-center mb-8 lg:mb-12">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#15168a] mb-2 lg:mb-3 px-4">
                    Rekomendasi Makanan Harian
                </h1>
                <p class="text-gray-600 text-base lg:text-lg px-4">Menu sehat untuk kebutuhan nutrisi Anda</p>
            </div>

            {{-- Cards Container --}}
            <div class="max-w-7xl mx-auto px-2 sm:px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">

                    <!-- Card Sarapan -->
                    <div class="relative z-0 group" id="sarapan-card">
                        <div
                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100">
                            <div class="absolute top-4 left-4 z-20">
                                <div
                                    class="bg-gradient-to-r from-amber-400 to-orange-500 text-white px-3 py-1.5 lg:px-4 lg:py-2 rounded-full text-xs lg:text-sm font-bold shadow-lg backdrop-blur-sm">
                                    <span class="mr-1 lg:mr-2">🌅</span>SARAPAN
                                </div>
                            </div>
                            <div class="relative h-48 sm:h-56 md:h-64 lg:h-80 overflow-hidden">
                                <img id="sarapan-img"
                                    src="{{ asset('images/' . ($rekomendasi['sarapan']['gambar'] ?? 'default.jpeg')) }}"
                                    alt="Sarapan"
                                    class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="p-4 lg:p-6">
                                <h2 id="sarapan-nama"
                                    class="text-[#15168a] text-lg md:text-xl lg:text-2xl font-bold mb-2">
                                    {{ $rekomendasi['sarapan']['nama'] ?? 'Menu Sarapan' }}</h2>
                                <p id="sarapan-deskripsi" class="text-gray-600 text-sm line-clamp-2 mb-3">
                                    {{ $rekomendasi['sarapan']['deskripsi'] ?? 'Deskripsi menu sarapan yang lezat dan bergizi.' }}
                                </p>
                                <div
                                    class="mt-3 lg:mt-4 text-xs lg:text-sm text-gray-600 space-y-1.5 lg:space-y-2 gizi">
                                    <p class="font-semibold">Informasi Gizi:</p>
                                    @foreach ($rekomendasi['sarapan']['gizi'] ?? [] as $key => $value)
                                        <div class="flex justify-between">
                                            <span class="capitalize">{{ $key }}:</span>
                                            <span class="font-semibold">{{ $value }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <button id="sarapan-button" class="bg-[#1E1F9D] text-white py-1 px-3 rounded-lg mt-3"
                                    onclick="gantiMakanan('sarapan')">Ganti Sarapan</button>
                            </div>
                        </div>
                    </div>


                    {{-- Card Siang --}}
                    <div class="relative z-0 group" id="siang-card">
                        <div
                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100">
                            <div class="absolute top-4 left-4 z-20">
                                <div
                                    class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-3 py-1.5 lg:px-4 lg:py-2 rounded-full text-xs lg:text-sm font-bold shadow-lg backdrop-blur-sm">
                                    <span class="mr-1 lg:mr-2">☀️</span>SIANG
                                </div>
                            </div>
                            <div class="relative h-48 sm:h-56 md:h-64 lg:h-80 overflow-hidden">
                                <img src="{{ asset('images/' . ($rekomendasi['siang']['gambar'] ?? 'default.jpeg')) }}"
                                    alt="Siang"
                                    class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="p-4 lg:p-6">
                                <h2 class="text-[#15168a] text-lg md:text-xl lg:text-2xl font-bold mb-2"
                                    id="siang-nama">
                                    {{ $rekomendasi['siang']['nama'] ?? 'Menu Siang' }}
                                </h2>
                                <p class="text-gray-600 text-sm line-clamp-2 mb-3" id="siang-deskripsi">
                                    {{ $rekomendasi['siang']['deskripsi'] ?? 'Deskripsi menu siang yang lezat dan bergizi.' }}
                                </p>
                                <div
                                    class="mt-3 lg:mt-4 text-xs lg:text-sm text-gray-600 space-y-1.5 lg:space-y-2 gizi">
                                    <p class="font-semibold">Informasi Gizi:</p>
                                    @foreach ($rekomendasi['siang']['gizi'] ?? [] as $key => $value)
                                        <div class="flex justify-between">
                                            <span class="capitalize">{{ $key }}:</span>
                                            <span class="font-semibold">{{ $value }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <button id="siang-button"
                                    class="bg-[#1E1F9D] text-white py-1 px-3 rounded-lg mt-3 relative z-50 pointer-events-auto"
                                    onclick="gantiMakanan('siang')">
                                    Ganti Siang
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Card Malam --}}
                    <div class="relative z-0 group" id="malam-card">
                        <div
                            class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100">
                            <div class="absolute top-4 left-4 z-20">
                                <div
                                    class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-3 py-1.5 lg:px-4 lg:py-2 rounded-full text-xs lg:text-sm font-bold shadow-lg backdrop-blur-sm">
                                    <span class="mr-1 lg:mr-2">🌙</span>MALAM
                                </div>
                            </div>
                            <div class="relative h-48 sm:h-56 md:h-64 lg:h-80 overflow-hidden">
                                <img src="{{ asset('images/' . ($rekomendasi['malam']['gambar'] ?? 'default.jpeg')) }}"
                                    alt="Malam"
                                    class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <div class="p-4 lg:p-6">
                                <h2 class="text-[#15168a] text-lg md:text-xl lg:text-2xl font-bold mb-2"
                                    id="malam-nama">
                                    {{ $rekomendasi['malam']['nama'] ?? 'Menu Malam' }}
                                </h2>
                                <p class="text-gray-600 text-sm line-clamp-2 mb-3" id="malam-deskripsi">
                                    {{ $rekomendasi['malam']['deskripsi'] ?? 'Deskripsi menu malam yang lezat dan bergizi.' }}
                                </p>
                                <div
                                    class="mt-3 lg:mt-4 text-xs lg:text-sm text-gray-600 space-y-1.5 lg:space-y-2 gizi">
                                    <p class="font-semibold">Informasi Gizi:</p>
                                    @foreach ($rekomendasi['malam']['gizi'] ?? [] as $key => $value)
                                        <div class="flex justify-between">
                                            <span class="capitalize">{{ $key }}:</span>
                                            <span class="font-semibold">{{ $value }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <button id="malam-button"
                                    class="bg-[#1E1F9D] text-white py-1 px-3 rounded-lg mt-3 relative z-50 pointer-events-auto"
                                    onclick="gantiMakanan('malam')">
                                    Ganti Malam
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <script>
            const ROUTE_GANTI_TEMPLATE = "/ganti-makanan/__WAKTU__";
        </script>


        @vite('resources/js/makanan.js')
</x-app-layout>