def get_rekomendasi_makanan(preferensi: str):
    data = {
        "vegan": {
            "sarapan": {
                "nama": "Oatmeal Pisang",
                "deskripsi": "Oatmeal dengan topping pisang dan susu almond",
                "gambar": "oatmealpisang.jpg",
                "gizi": {
                    "kalori": 250,
                    "protein": 6,
                    "karbohidrat": 45,
                    "serat": 5,
                    "lemak": 4
                }
            },
            "siang": {
                "nama": "Tumis Tahu Brokoli",
                "deskripsi": "Protein nabati dan sayuran hijau",
                "gambar": "tumistahubrokoli.jpg",
                "gizi": {
                    "kalori": 300,
                    "protein": 12,
                    "karbohidrat": 20,
                    "serat": 6,
                    "lemak": 10
                }
            },
            "malam": {
                "nama": "Salad Quinoa",
                "deskripsi": "Campuran quinoa, sayur, dan minyak zaitun",
                "gambar": "salad.jpeg",
                "gizi": {
                    "kalori": 320,
                    "protein": 9,
                    "karbohidrat": 40,
                    "serat": 7,
                    "lemak": 12
                }
            },
        },
        "vegetarian": {
            "sarapan": {
                "nama": "Omelet Sayur",
                "deskripsi": "Telur omelet dengan bayam dan paprika",
                "gambar": "omelet.jpeg",
                "gizi": {
                    "kalori": 280,
                    "protein": 10,
                    "karbohidrat": 5,
                    "serat": 2,
                    "lemak": 20
                }
            },
            "siang": {
                "nama": "Nasi Merah dan Capcay",
                "deskripsi": "Karbo sehat dan sayur protein",
                "gambar": "nasimerahcapcay.jpg",
                "gizi": {
                    "kalori": 400,
                    "protein": 9,
                    "karbohidrat": 60,
                    "serat": 8,
                    "lemak": 8
                }
            },
            "malam": {
                "nama": "Sup Jagung Telur",
                "deskripsi": "Sup ringan kaya serat dan protein",
                "gambar": "supjagung.jpg",
                "gizi": {
                    "kalori": 220,
                    "protein": 8,
                    "karbohidrat": 25,
                    "serat": 3,
                    "lemak": 6
                }
            },
        },
        "pescatarian": {
            "sarapan": {
                "nama": "Roti Tuna",
                "deskripsi": "Roti gandum isi tuna dan selada",
                "gambar": "rotituna.jpg",
                "gizi": {
                    "kalori": 310,
                    "protein": 20,
                    "karbohidrat": 28,
                    "serat": 4,
                    "lemak": 10
                }
            },
            "siang": {
                "nama": "Salmon Panggang",
                "deskripsi": "Ikan salmon dengan sayur rebus",
                "gambar": "salmonpanggang.jpg",
                "gizi": {
                    "kalori": 420,
                    "protein": 30,
                    "karbohidrat": 10,
                    "serat": 2,
                    "lemak": 25
                }
            },
            "malam": {
                "nama": "Sup Ikan",
                "deskripsi": "Ikan rebus dan kaldu ringan",
                "gambar": "supikan.jpg",
                "gizi": {
                    "kalori": 280,
                    "protein": 18,
                    "karbohidrat": 12,
                    "serat": 2,
                    "lemak": 10
                }
            },
        },
        "bebas_gluten": {
            "sarapan": {
                "nama": "Smoothie Pisang",
                "deskripsi": "Campuran pisang, yogurt, dan chia",
                "gambar": "smoothiepisang.jpg",
                "gizi": {
                    "kalori": 260,
                    "protein": 8,
                    "karbohidrat": 35,
                    "serat": 5,
                    "lemak": 7
                }
            },
            "siang": {
                "nama": "Ayam Panggang + Kentang",
                "deskripsi": "Porsi sehat tanpa gluten",
                "gambar": "ayam.jpeg",
                "gizi": {
                    "kalori": 450,
                    "protein": 35,
                    "karbohidrat": 30,
                    "serat": 4,
                    "lemak": 18
                }
            },
            "malam": {
                "nama": "Salad Kentang",
                "deskripsi": "Kentang rebus dan sayur",
                "gambar": "saladkentang.jpg",
                "gizi": {
                    "kalori": 300,
                    "protein": 6,
                    "karbohidrat": 40,
                    "serat": 6,
                    "lemak": 10
                }
            },
        },
        "default": {
            "sarapan": {
                "nama": "Nasi Uduk",
                "deskripsi": "Menu sarapan tradisional Indonesia",
                "gambar": "nasuduk.jpg",
                "gizi": {
                    "kalori": 350,
                    "protein": 8,
                    "karbohidrat": 45,
                    "serat": 2,
                    "lemak": 12
                }
            },
            "siang": {
                "nama": "Nasi Ayam",
                "deskripsi": "Nasi, ayam goreng, dan lalapan",
                "gambar": "nasiayam.jpeg",
                "gizi": {
                    "kalori": 550,
                    "protein": 28,
                    "karbohidrat": 50,
                    "serat": 4,
                    "lemak": 25
                }
            },
            "malam": {
                "nama": "Soto Ayam",
                "deskripsi": "Hidangan berkuah ringan",
                "gambar": "soto.jpeg",
                "gizi": {
                    "kalori": 320,
                    "protein": 20,
                    "karbohidrat": 15,
                    "serat": 3,
                    "lemak": 12
                }
            },
        },
    }
    
    # Mengembalikan rekomendasi berdasarkan preferensi yang diberikan
    return data.get(preferensi.lower(), data["default"])
