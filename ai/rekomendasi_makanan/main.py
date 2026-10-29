from fastapi import FastAPI
from pydantic import BaseModel
from data import get_rekomendasi_makanan

app = FastAPI()

class InputUser(BaseModel):
    preferensi: str

@app.get("/")
def read_root():
    return {"message": "API Rekomendasi Makanan aktif"}

@app.post("/rekomendasi-makanan")
def rekomendasi_makanan(data: InputUser):
    if not data.preferensi:
        return {
            "rekomendasi": {
                "sarapan": {"nama": "Lengkapi Preferensi", "deskripsi": "Isi preferensi makan terlebih dahulu", "gambar": "default.jpeg", "gizi": {}},
                "siang": {"nama": "-", "deskripsi": "-", "gambar": "default.jpeg", "gizi": {}},
                "malam": {"nama": "-", "deskripsi": "-", "gambar": "default.jpeg", "gizi": {}}
            }
        }

    rekomendasi = get_rekomendasi_makanan(data.preferensi.strip().lower())

    return {
        "rekomendasi": {
            "sarapan": rekomendasi["sarapan"],
            "siang": rekomendasi["siang"],
            "malam": rekomendasi["malam"]
        }
    }

