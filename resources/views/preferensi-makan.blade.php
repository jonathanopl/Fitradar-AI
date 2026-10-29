<x-app-layout>
    <div class="min-h-screen" style="background-color: #1E1F9D;">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg">

                <div class="text-center mb-8" style="color: #1E1F9D;">
                    <h1 class="text-2xl sm:text-3xl font-bold mb-2" style="font-family: cursive;">Tingkatkan Gaya Hidup
                        Sehatmu</h1>
                    <p class="text-sm sm:text-base leading-relaxed">
                        Your eating habits are key to designing personalized meal plans
                    </p>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg sm:text-xl font-semibold mb-4 text-center" style="color: #1E1F9D;">Kamu lebih
                        suka makan apa?</h2>

                    <form method="POST" action="{{ route('simpan-preferensi-makan') }}" class="space-y-3">
                        @csrf

                        @php
                            $opsi = [
                                'vegan' => 'Tidak makan semua jenis makanan dari hewan.',
                                'vegetarian' => 'Tidak makan daging, tapi makan telur dan susu.',
                                'pescatarian' => 'Makan ikan, tapi tidak makan daging lain',
                                'bebas_gluten' => 'Tidak makan makanan yang ada glutennya, kayak gandum.',
                                'bebas' => 'Aku boleh makan apa saja.',
                            ];
                        @endphp

                        @foreach($opsi as $value => $deskripsi)
                            <label class="block border border-gray-300 rounded-md p-4 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-start sm:items-center">
                                    <input type="radio" name="preferensi_makan" value="{{ $value }}"
                                        class="form-radio shrink-0 mt-1 sm:mt-0"
                                        style="color: #1E1F9D; -webkit-appearance: none; appearance: none; width: 16px; height: 16px; border: 1px solid #ccc; border-radius: 50%; outline: none; cursor: pointer; display: inline-block; vertical-align: middle; margin-right: 0.5rem; background-color: white; background-clip: content-box; padding: 2px; transition: background-color 0.2s;">
                                    <div class="ml-3">
                                        <span
                                            class="font-semibold text-gray-700 block capitalize">{{ str_replace('_', ' ', $value) }}:</span>
                                        <p class="text-gray-500 text-sm block">{{ $deskripsi }}</p>
                                    </div>
                                </div>
                            </label>
                        @endforeach

                        <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
                            <a href="{{ route('tingkat-waktu') }}"
                                class="bg-gray-300 text-gray-700 px-6 py-3 rounded-full hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 text-center w-full sm:w-auto">
                                Sebelumnya
                            </a>
                            <button type="submit"
                                class="bg-white border border-black text-black font-medium px-6 py-2 rounded-full hover:bg-gray-100 text-center w-full sm:w-auto">
                                Selanjutnya
                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>