<x-app-layout>
    <div class="min-h-screen bg-gray-100 text-gray-800 flex">

        {{-- Sidebar - Hidden on mobile, visible on desktop --}}
        <aside class="hidden lg:block fixed top-0 left-0 h-full w-64 bg-[#15168a] text-white p-6 shadow-xl z-10">
            <div class="flex items-center mb-10">
                <img src="{{ asset('images/Logo.png') }}" alt="FitRadar AI Logo" class="h-16 lg:h-20 w-auto mr-2">
                <span class="text-lg lg:text-xl font-bold leading-tight">FITRADAR<br>AI</span>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('halaman-dashboard') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3" />
                    </svg>
                    Tinjauan
                </a>
                <a href="{{ route('halaman-profil') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profil
                </a>
                <a href="{{ route('deteksi') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01" />
                    </svg>
                    Deteksi
                </a>
                <a href="{{ route('halaman-makanan') }}"
                    class="flex items-center gap-3 text-gray-300 hover:text-white transition-all">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5" />
                    </svg>
                    Makanan
                </a>
                <a href="{{ route('halaman-olahraga') }}"
                    class="flex items-center gap-3 text-white bg-[#1E1F9D] px-3 py-2 rounded-lg">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5A1 1 0 004.586 12H4" />
                    </svg>
                    <span>Olahraga</span>
                </a>
            </nav>
        </aside>

        {{-- Mobile Navigation Bar --}}
        <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-[#15168a] text-white shadow-xl z-20">
            <nav class="flex justify-around items-center py-2">
                <a href="{{ route('halaman-dashboard') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all p-2">
                    <svg class="h-5 w-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3" />
                    </svg>
                    <span class="text-xs">Tinjauan</span>
                </a>
                <a href="{{ route('halaman-profil') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all p-2">
                    <svg class="h-5 w-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="text-xs">Profil</span>
                </a>
                <a href="{{ route('deteksi') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all p-2">
                    <svg class="h-5 w-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 5v.01M12 12v.01M12 19v.01" />
                    </svg>
                    <span class="text-xs">Deteksi</span>
                </a>
                <a href="{{ route('halaman-makanan') }}"
                    class="flex flex-col items-center text-gray-300 hover:text-white transition-all p-2">
                    <svg class="h-5 w-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5" />
                    </svg>
                    <span class="text-xs">Makanan</span>
                </a>
                <a href="{{ route('halaman-olahraga') }}"
                    class="flex flex-col items-center text-white bg-[#1E1F9D] px-2 py-1 rounded-lg">
                    <svg class="h-5 w-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5A1 1 0 004.586 12H4" />
                    </svg>
                    <span class="text-xs">Olahraga</span>
                </a>
            </nav>
        </div>

        {{-- Main Content --}}
        <main class="flex-1 lg:pl-64 px-4 md:px-6 lg:px-8 py-6 md:py-8 lg:py-12 pb-20 lg:pb-12">
            {{-- Mobile Header with Logo --}}
            <div
                class="lg:hidden flex items-center justify-center mb-6 bg-[#15168a] text-white p-4 rounded-xl mx-auto max-w-sm">
                <img src="{{ asset('images/Logo.png') }}" alt="FitRadar AI Logo" class="h-12 w-auto mr-2">
                <span class="text-lg font-bold leading-tight">FITRADAR<br>AI</span>
            </div>

            {{-- Header --}}
            <div class="text-center mb-8 lg:mb-12">
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-[#15168a] mb-3 lg:mb-4 px-4">
                    🔥 Rekomendasi Olahraga Untuk Anda
                </h1>
                <p class="text-base lg:text-lg text-gray-600 px-4">
                    Olahraga yang dirancang khusus untukmu berdasarkan data kesehatan
                </p>
            </div>

            {{-- Error Message --}}
            @if(session('error'))
                <div class="text-center text-red-600 font-semibold mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Exercise Cards --}}
            @if(isset($rekomendasi) && count($rekomendasi) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 px-2 sm:px-4 lg:px-0">
                    @foreach ($rekomendasi as $item)
                        @php
                            $gambarMap = [
                                'Jumping Jack' => 'jumpingjack.gif',
                                'Shoulder tap' => 'shouldertap.gif',
                                'Russian twist' => 'russiantwist.gif',
                                'Jogging' => 'jogging.gif',
                                'Plank' => 'plank.gif',
                                'Sit up' => 'situp.gif',
                                'Skipping' => 'skipping.gif',
                                'Lunges' => 'lunges.gif',
                                'Push up' => 'pushup.gif',
                                'Pull up' => 'pullup.gif',
                                'Wall Sit' => 'wallsit.gif',
                                'Tai Chi' => 'taichi.webp',
                                'Bridge' => 'bridge.gif',
                                'Squat' => 'squat.gif',
                                'Step up' => 'stepup.gif',
                                'Jalan santai' => 'jalansantai.gif',
                                'Mountain climber' => 'mountainclimbers.gif',
                                'Jalan cepat' => 'jalancepat.gif',
                            ];
                            $img = $gambarMap[$item->nama] ?? 'default.gif';
                        @endphp

                        <div class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 hover:scale-105 overflow-hidden border border-gray-100/50 cursor-pointer">
                            {{-- Image Container - Diperbesar untuk menampilkan animasi dengan lebih jelas --}}
                            <div class="relative bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-3 overflow-hidden">
                                {{-- Background decorative elements --}}
                                <div class="absolute inset-0 opacity-30">
                                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-blue-200/60 to-transparent rounded-full -translate-y-16 translate-x-16"></div>
                                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-200/60 to-transparent rounded-full translate-y-12 -translate-x-12"></div>
                                    <div class="absolute top-1/2 left-1/2 w-20 h-20 bg-gradient-to-r from-indigo-200/40 to-transparent rounded-full -translate-x-10 -translate-y-10"></div>
                                </div>

                                {{-- Main image area - Lebih besar dan fokus pada animasi --}}
                                <div class="relative w-full h-80 bg-white/80 backdrop-blur-sm rounded-2xl shadow-inner border border-white/50 overflow-hidden">
                                    <div class="absolute inset-2">
                                        <img src="{{ asset('images/' . $img) }}" 
                                             alt="{{ $item->nama }}"
                                             class="w-full h-full rounded-xl transition-all duration-500 group-hover:scale-110 group-hover:brightness-105"
                                             style="object-fit: contain; object-position: center center;" 
                                             loading="lazy">
                                    </div>

                                    {{-- Hover overlay effect --}}
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#15168a]/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl"></div>
                                    
                                    {{-- Exercise type badge --}}
                                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0">
                                        <span class="text-xs font-semibold text-[#15168a]">🏃‍♂️ Exercise</span>
                                    </div>

                                    {{-- Animated pulse indicator --}}
                                    <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <div class="relative">
                                            <div class="w-4 h-4 bg-green-500 rounded-full animate-ping absolute"></div>
                                            <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Content Section - Diperbaiki layout --}}
                            <div class="relative p-6 bg-gradient-to-b from-white to-gray-50/50">
                                {{-- Exercise Name --}}
                                <h3 class="text-xl lg:text-2xl font-bold text-[#15168a] mb-3 text-center group-hover:text-[#1E1F9D] transition-colors duration-300">
                                    {{ $item->nama }}
                                </h3>

                                {{-- Description --}}
                                <p class="text-sm text-gray-600 leading-relaxed text-center mb-4 min-h-[4rem] flex items-center justify-center">
                                    {{ $item->deskripsi ?? 'Latihan yang dirancang untuk meningkatkan kesehatan dan kebugaran Anda secara optimal.' }}
                                </p>

                                {{-- Decorative elements --}}
                                <div class="flex justify-center items-center space-x-2 mb-4">
                                    <div class="w-2 h-2 bg-[#15168a] rounded-full opacity-30"></div>
                                    <div class="w-1 h-1 bg-[#15168a] rounded-full opacity-50"></div>
                                    <div class="w-2 h-2 bg-[#15168a] rounded-full opacity-30"></div>
                                </div>

                                {{-- Bottom accent line --}}
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-1 bg-gradient-to-r from-[#15168a] via-[#1E1F9D] to-[#15168a] rounded-full group-hover:w-20 transition-all duration-700 ease-out"></div>
                                
                                {{-- Side accent lines --}}
                                <div class="absolute top-6 right-0 w-0 h-6 bg-gradient-to-b from-[#15168a] to-transparent group-hover:w-1 transition-all duration-500 delay-100"></div>
                                <div class="absolute top-6 left-0 w-0 h-6 bg-gradient-to-b from-[#15168a] to-transparent group-hover:w-1 transition-all duration-500 delay-100"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-500 text-base lg:text-lg px-4">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6 shadow-inner">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <p class="text-lg font-medium">Belum ada rekomendasi dari AI</p>
                    <p class="text-sm text-gray-400 mt-2">Silakan lengkapi profil kesehatan Anda untuk mendapatkan rekomendasi</p>
                </div>
            @endif
        </main>
    </div>

    <style>
        /* Custom animations untuk exercise cards */
        .group:hover .animate-ping {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        
        @keyframes ping {
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
        
        /* Smooth transitions untuk semua elemen */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Enhanced hover effects */
        .group:hover {
            animation: gentle-float 2s ease-in-out infinite;
        }
        
        @keyframes gentle-float {
            0%, 100% { transform: translateY(-16px) scale(1.05); }
            50% { transform: translateY(-20px) scale(1.05); }
        }
    </style>
</x-app-layout>