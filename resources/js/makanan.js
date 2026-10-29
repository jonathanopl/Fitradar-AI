document.addEventListener('DOMContentLoaded', function () {
    window.gantiMakanan = async function (waktu) {
        const button = document.getElementById(`${waktu}-button`);
        if (!button) {
            console.error(`Button for ${waktu} not found!`);
            return;
        }

        button.disabled = true;  // Menonaktifkan tombol setelah klik

        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            console.log(`Button for ${waktu} clicked`);

            const url = ROUTE_GANTI_TEMPLATE.replace('__WAKTU__', waktu);
            console.log(url); // Debug log untuk melihat URL

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({})
            });

            if (!response.ok) {
                throw new Error(`Server error: ${await response.text()}`);
            }

            const data = await response.json();
            console.log(data); // Debug log untuk data yang diterima

            // Update nama dan deskripsi
            document.getElementById(`${waktu}-nama`).innerText = data.nama || 'Menu Baru';
            document.getElementById(`${waktu}-deskripsi`).innerText = data.deskripsi || '';

            // Update gambar
            const img = document.querySelector(`#${waktu}-card img`);
            if (img) {
                img.src = `/images/${data.gambar || 'default.jpeg'}`;  // Pastikan path gambar sesuai
            }

            // Update informasi gizi
            const giziContainer = document.querySelector(`#${waktu}-card .gizi`);
            giziContainer.innerHTML = '<p class="font-semibold">Informasi Gizi:</p>';
            if (data.gizi && typeof data.gizi === 'object') {
                Object.entries(data.gizi).forEach(([key, value]) => {
                    giziContainer.innerHTML += `
                        <div class="flex justify-between">
                            <span class="capitalize">${key}:</span>
                            <span class="font-semibold">${value}</span>
                        </div>`;
                });
            }
        } catch (error) {
            console.error("Fetch error:", error);
            alert("Gagal mengganti menu makanan.");
        } finally {
            // Mengaktifkan kembali tombol setelah selesai
            button.disabled = false;
        }
    };
});
