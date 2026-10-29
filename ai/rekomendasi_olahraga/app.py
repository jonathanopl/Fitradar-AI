from flask import Flask, request, jsonify
import pandas as pd
from datetime import datetime
from flask_cors import CORS
import re

app = Flask(__name__)
CORS(app)

# Load dataset
df = pd.read_csv("isi_dataset_olahraga_rekomendasi.csv")

def normalize_gender(gender_str):
    cleaned = re.sub(r'\s+', '', gender_str.lower())
    if cleaned in ['laki-laki', 'lakilaki', 'laki', 'pria', 'cowok', 'male']:
        return 'male'
    elif cleaned in ['perempuan', 'wanita', 'cewe', 'female']:
        return 'female'
    else:
        return None

@app.route("/", methods=["GET"])
def home():
    return "✅ API Rekomendasi Olahraga Aktif!"

@app.route("/", methods=["POST"])
def rekomendasi():
    try:
        data = request.get_json()

        # Extract data from the request
        weight = float(data["weight"])
        height_cm = float(data["height"])
        gender = data["gender"]
        birthdate = datetime.strptime(data["birthdate"], "%Y-%m-%d")

        # Normalize gender
        gender_normalized = normalize_gender(gender)
        if not gender_normalized:
            return jsonify({
                "error": f"Gender '{gender}' tidak dikenali. Gunakan format valid seperti 'Laki-laki', 'Perempuan', 'Male', atau 'Female'."
            }), 400

        # Calculate BMI
        height_m = height_cm / 100
        bmi = round(weight / (height_m ** 2), 2)
        today = datetime.today()
        age = today.year - birthdate.year - ((today.month, today.day) < (birthdate.month, birthdate.day))

        # Define BMI category
        if bmi < 18.5:
            bmicase = "Kekurangan berat badan"
        elif 18.5 <= bmi < 25:
            bmicase = "Normal"
        elif 25 <= bmi < 30:
            bmicase = "Kelebihan berat badan"
        else:
            bmicase = "Obesitas"

        # Get rows with the same gender from the dataset
        row = df[df["Gender"].str.lower() == gender_normalized].copy()

        if row.empty:
            return jsonify({"error": "Tidak ditemukan data rekomendasi yang sesuai."}), 404

        # Calculate distance score to find the closest match
        def skor_jarak(r):
            skor = 0
            if r["BMIcase"].lower() != bmicase.lower():
                skor += 5  # Penalty if BMIcase does not match
            skor += abs(r["Weight"] - weight)
            skor += abs(r["Height"] - height_m)
            skor += abs(r["Age"] - age)
            return skor

        row["skor"] = row.apply(skor_jarak, axis=1)
        best_match = row.sort_values("skor").iloc[0]

        olahraga_list = [x.strip() for x in best_match["Rekomendasi Olahraga"].split(",")]
        deskripsi_parts = [x.strip() for x in best_match["Deskripsi Rekomendasi"].split(" | ")]

        hasil = []
        for nama in olahraga_list:
            nama_bersih = nama.strip().lower()
            deskripsi = "Deskripsi tidak ditemukan."
            for d in deskripsi_parts:
                if ":" in d:
                    nama_d, isi_d = d.split(":", 1)
                    if nama_d.strip().lower() == nama_bersih:
                        deskripsi = isi_d.strip()
                        break
            hasil.append({
                "nama": nama,
                "deskripsi": deskripsi
            })

        return jsonify(hasil)

    except Exception as e:
        return jsonify({"error": str(e)}), 400

if __name__ == "__main__":
    app.run(debug=True)
