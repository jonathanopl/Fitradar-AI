<x-app-layout>
    <div class="min-h-screen bg-[#1E1F9D] text-white flex flex-col sm:flex-row">
        <!-- Sidebar -->
        <div class="w-full sm:w-64 sm:fixed sm:top-0 sm:left-0 h-auto sm:h-full bg-[#15168a] p-6">
            <div class="flex items-center mb-8">
                <img src="{{ asset('images/Logo.png') }}" alt="FitRadar AI Logo" class="h-20 w-auto mr-2">
                <span class="text-xl font-semibold">FITRADAR<br>AI</span>
            </div>
            <nav class="space-y-4">
                <a href="halaman-dashboard" class="flex items-center text-white bg-[#1E1F9D] px-3 py-2 rounded-lg">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0l-2-2m2 2l7 7"></path></svg>
                    <span>Tinjauan</span>
                </a>
                <a href="halaman-profil" class="flex items-center text-gray-300 hover:text-white">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Profil</span>
                </a>
                <a href="deteksi" class="flex items-center text-gray-300 hover:text-white">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 11-2 0 1 1 0 012 0zm0 7a1 1 0 11-2 0 1 1 0 012 0zm0 7a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    <span>Deteksi</span>

                </a>
                <a href="halaman-makanan" class="flex items-center text-gray-300 hover:text-white">
                <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5" />
                    </svg>                    <span>Makanan</span>
                </a>
                <a href="halaman-olahraga" class="flex items-center text-gray-300 hover:text-white">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v-1c0-1.1.9-2 2-2h12a2 2 0 012 2v1m-1 5h-.586a1 1 0 00-.707.293l-5 5a1 1 0 00-1.414 0l-5-5A1 1 0 004.586 12H4m16 0h-.586a1 1 0 01-.707-.293l-5-5a1 1 0 01-1.414 0l-5 5A1 1 0 014.586 12H4"></path></svg>
                    <span>Olahraga</span>
                </a>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-1 p-4 sm:ml-64 sm:p-8">
            <h1 class="text-2xl font-semibold mb-6 text-center">Laporan Kemajuan</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Riwayat Berat Badan -->
                <div class="bg-white text-[#1E1F9D] rounded-lg shadow-md p-6">
                    <h2 class="font-semibold mb-4">Riwayat Berat Badan</h2>
                    <ul id="riwayatBerat" class="list-disc list-inside text-gray-800 max-h-40 overflow-y-auto">

   
</ul>

                    <p class="text-sm text-gray-600 mt-2">Perubahan berat badan dari bulan ke bulan.</p>
                </div>

                <!-- Pengukur BMI -->
                <div class="bg-white text-[#1E1F9D] rounded-lg shadow-md p-6">
                    <h2 class="font-semibold mb-4">Pengukur BMI</h2>
                    <div class="mb-4">
                        <label for="tinggi" class="block text-gray-700 text-sm font-bold mb-2">Tinggi (cm):</label>
                        <input type="number" id="tinggi" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan tinggi dalam cm">
                    </div>
                    <div class="mb-4">
                        <label for="berat" class="block text-gray-700 text-sm font-bold mb-2">Berat Badan (kg):</label>
                        <input type="number" id="berat" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan berat badan dalam kg">
                    </div>
                    <button onclick="hitungBMI()" class="bg-[#007bff] hover:bg-[#0056b3] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hitung BMI</button>
                    <div id="bmiResult" class="mt-4 font-semibold"></div>
                    <div id="bmiCategory" class="mt-2 text-sm italic text-gray-600"></div>
                </div>

                <!-- Laporan Progres -->
<div class="bg-white text-[#1E1F9D] rounded-lg shadow-md p-6">
    <h2 class="font-semibold mb-4">Progres Target</h2>
    <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
        <div id="progressBar" class="bg-blue-600 h-4 rounded-full" style="width: 0%"></div>
    </div>
    <p id="progressText" class="text-center text-sm text-gray-600">Belum ada data.</p>
</div>


                <!-- Riwayat Aktivitas -->
                <div class="bg-white text-[#1E1F9D] rounded-lg shadow-md p-6 overflow-x-auto">
                    <h2 class="font-semibold mb-4">Riwayat Olahraga dan Makanan</h2>
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="border-b bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Hari</th>
                                <th class="px-4 py-2">Olahraga (jam)</th>
                                <th class="px-4 py-2">Kalori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="px-4 py-2">Senin</td><td>1</td><td>2000</td></tr>
                            <tr><td class="px-4 py-2">Selasa</td><td>0.5</td><td>2200</td></tr>
                            <tr><td class="px-4 py-2">Rabu</td><td>1.5</td><td>1900</td></tr>
                            <tr><td class="px-4 py-2">Kamis</td><td>1</td><td>2100</td></tr>
                            <tr><td class="px-4 py-2">Jumat</td><td>0</td><td>2500</td></tr>
                            <tr><td class="px-4 py-2">Sabtu</td><td>2</td><td>1800</td></tr>
                            <tr><td class="px-4 py-2">Minggu</td><td>0.75</td><td>2300</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       <!-- ... bagian atas tidak berubah ... -->
<!-- Script BMI -->
<script>
    const beratAwal = 75;     // berat awal user
    const beratTarget = 60;   // target user

    function hitungBMI() {
        const tinggiInput = document.getElementById('tinggi');
        const beratInput = document.getElementById('berat');
        const resultDiv = document.getElementById('bmiResult');
        const categoryDiv = document.getElementById('bmiCategory');
        const riwayatUl = document.getElementById('riwayatBerat');

        const tinggiCm = parseFloat(tinggiInput.value);
        const beratKg = parseFloat(beratInput.value);

        if (isNaN(tinggiCm) || isNaN(beratKg) || tinggiCm <= 0 || beratKg <= 0) {
            resultDiv.textContent = '⚠️ Masukkan tinggi dan berat badan yang valid.';
            categoryDiv.textContent = '';
            return;
        }

        const tinggiMeter = tinggiCm / 100;
        const bmi = beratKg / (tinggiMeter * tinggiMeter);
        const roundedBmi = bmi.toFixed(2);

        let category = '';
        if (bmi < 18.5) category = 'Kekurangan Berat Badan';
        else if (bmi < 25) category = 'Berat Badan Normal';
        else if (bmi < 30) category = 'Kelebihan Berat Badan';
        else category = 'Obesitas';

        resultDiv.textContent = `✅ BMI Anda: ${roundedBmi}`;
        categoryDiv.textContent = `Kategori: ${category}`;

        // Tambahkan ke riwayat jika belum ada bulan ini
        const bulan = new Date().toLocaleString('id-ID', { month: 'long' });
        const tahun = new Date().getFullYear();
        const key = `${bulan} ${tahun}`;

        const listItems = Array.from(riwayatUl.children);
        const sudahAda = listItems.some(item => item.textContent.includes(key));

        if (!sudahAda) {
            const newEntry = document.createElement('li');
            newEntry.textContent = `${key}: ${beratKg} kg`;
            riwayatUl.appendChild(newEntry);
        }

        updateProgress(beratKg);
    }

    function updateProgress(beratSekarang) {
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');

        const totalPerubahan = Math.abs(beratTarget - beratAwal);
        const sudahBerubah = Math.abs(beratSekarang - beratAwal);

    let progress = (sudahBerubah / totalPerubahan) * 100;
        if (progress > 100) progress = 100;

        progressBar.style.width = progress + '%';
        progressText.textContent = `${progress.toFixed(0)}% dari target telah tercapai.`;
    }
</script>


    </div>
</x-app-layout>