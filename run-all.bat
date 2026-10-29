@echo off
title Menjalankan Laravel + FastAPI AI Deteksi + Rekomendasi Makanan + Rekomendasi Olahraga

:: [1] Jalankan Laravel di background
start "" /min cmd /c "cd /d %~dp0 && php artisan serve --host=127.0.0.1 --port=8000"

:: Tunggu agar Laravel sempat menyala
timeout /t 5 >nul

:: [2] Jalankan FastAPI AI Deteksi (port 8001)
start "" cmd /k "cd /d %~dp0ai\deteksi && call venv\Scripts\activate.bat && uvicorn app:app --host 127.0.0.1 --port 8001 --reload"

:: Tunggu agar FastAPI Deteksi siap
timeout /t 5 >nul

:: [3] Jalankan FastAPI AI Rekomendasi Makanan (port 5001)
start "" cmd /k "cd /d %~dp0ai\makanan && call venv\Scripts\activate.bat && uvicorn main:app --host 127.0.0.1 --port 5001 --reload"

:: Tunggu agar FastAPI Rekomendasi Makanan siap
timeout /t 5 >nul

:: [4] Buka browser ke halaman Laravel
start "" http://127.0.0.1:8000

exit
