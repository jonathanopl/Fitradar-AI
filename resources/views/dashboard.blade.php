<x-app-layout>
    <div class="py-8" style="background-color: #1E1F9D;">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 rounded-2xl shadow-lg">

                <div class="text-center mb-10 text-white">
                    <h1 class="text-3xl font-bold mb-2" style="font-family: 'Comic Sans MS', cursive, sans-serif;">Isi
                        Profil mu</h1>
                    <p class="text-sm leading-relaxed">
                        Bantu kami melihat latar belakang mu agar<br>
                        kami dapat menyesuaikan rekomendasi khusus untukmu
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md">
                    <form method="POST" action="{{ route('halaman-profil.store') }}" id="profile-form"
                        class="space-y-6 text-black">
                        @csrf

                        <div class="flex flex-col sm:flex-row items-center justify-between">
                            <div class="w-full sm:w-1/2 font-semibold">Nama</div>
                            <div class="w-full sm:w-1/2 text-right">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="border-b border-gray-300 w-full text-right focus:outline-none font-semibold text-black">
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between">
                            <div class="w-full sm:w-1/2 font-semibold">Jenis Kelamin</div>
                            <div class="w-full sm:w-1/2 flex justify-end gap-4 mt-2 sm:mt-0">
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="gender" value="male" required class="accent-[#1E1F9D]">
                                    Male
                                </label>
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="gender" value="female" class="accent-[#1E1F9D]"> Female
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between">
                            <div class="w-full sm:w-1/2 font-semibold">Tanggal Lahir</div>
                            <div class="w-full sm:w-1/2 flex justify-end gap-2 mt-2 sm:mt-0">
                                <input type="text" name="day" placeholder="DD" maxlength="2"
                                    class="border-b border-gray-300 w-12 text-center focus:outline-none font-semibold text-black"
                                    required>
                                <input type="text" name="month" placeholder="MM" maxlength="2"
                                    class="border-b border-gray-300 w-12 text-center focus:outline-none font-semibold text-black"
                                    required>
                                <input type="text" name="year" placeholder="YYYY" maxlength="4"
                                    class="border-b border-gray-300 w-20 text-center focus:outline-none font-semibold text-black"
                                    required>
                            </div>
                        </div>

                        <div class="bg-white text-[#1E1F9D] rounded-lg p-6">
                            <h2 class="font-semibold mb-4">Pengukur BMI</h2>
                            <div class="mb-4">
                                <label for="tinggi" class="block text-gray-700 text-sm font-bold mb-2">Tinggi
                                    (cm):</label>
                                <input type="number" id="tinggi" name="height" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Masukkan tinggi dalam cm">
                            </div>

                            <!-- Berat (kg) -->
                            <div class="mb-4">
                                <label for="berat" class="block text-gray-700 text-sm font-bold mb-2">Berat Badan
                                    (kg):</label>
                                <input type="number" id="berat" name="weight" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Masukkan berat badan dalam kg">
                            </div>

                            <!-- Hidden BMI Input -->
                            <input type="hidden" name="bmi" id="bmi_hidden">

                            <button type="button" onclick="hitungBMI()"
                                class="bg-[#007bff] hover:bg-[#0056b3] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">
                                Hitung BMI
                            </button>
                            <div id="bmiResult" class="mt-4 font-semibold"></div>
                            <div id="bmiCategory" class="mt-2 text-sm italic text-gray-600"></div>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between">
                            <div class="w-full sm:w-1/2 font-semibold">Tingkat Aktivitas</div>
                            <div class="w-full sm:w-1/2 flex justify-end gap-4 mt-2 sm:mt-0">
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="activity_level" value="low" class="accent-[#1E1F9D]"
                                        required> Low
                                </label>
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="activity_level" value="moderate" class="accent-[#1E1F9D]"
                                        required> Moderate
                                </label>
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="activity_level" value="high" class="accent-[#1E1F9D]"
                                        required> High
                                </label>
                            </div>
                        </div>

                        <div class="text-center mt-8">
                            <button type="submit"
                                class="bg-[#1E1F9D] text-white px-10 py-3 rounded-full hover:bg-[#15168a] transition-all duration-200 font-bold">
                                Selanjutnya
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hitungBMI() {
            const tinggiInput = document.getElementById('tinggi');
            const beratInput = document.getElementById('berat');
            const resultDiv = document.getElementById('bmiResult');
            const categoryDiv = document.getElementById('bmiCategory');
            const bmiHidden = document.getElementById('bmi_hidden');

            const tinggiCm = parseFloat(tinggiInput.value);
            const beratKg = parseFloat(beratInput.value);

            if (isNaN(tinggiCm) || isNaN(beratKg) || tinggiCm <= 0 || beratKg <= 0) {
                resultDiv.textContent = 'Masukkan tinggi dan berat badan yang valid.';
                categoryDiv.textContent = '';
                return;
            }

            const tinggiMeter = tinggiCm / 100;
            const bmi = beratKg / (tinggiMeter * tinggiMeter);
            const roundedBmi = bmi.toFixed(2);

            let category = '';
            if (bmi < 18.5) {
                category = 'Kekurangan Berat Badan';
            } else if (bmi < 25) {
                category = 'Berat Badan Normal';
            } else if (bmi < 30) {
                category = 'Kelebihan Berat Badan';
            } else {
                category = 'Obesitas';
            }

            resultDiv.textContent = `BMI Anda: ${roundedBmi}`;
            categoryDiv.textContent = `Kategori: ${category}`;
            bmiHidden.value = roundedBmi;
        }
    </script>
</x-app-layout>