import sys
import joblib
import os
import json

try:
    # Ambil input teks dari argumen command line
    text = sys.argv[1]

    # Ambil folder saat ini (folder model)
    BASE_DIR = os.path.dirname(os.path.abspath(__file__))

    # Path file model — sesuaikan nama file dengan yang ada di folder
    model_path = os.path.join(BASE_DIR, 'best_pipeline (5).pkl')
    label_path = os.path.join(BASE_DIR, 'label_kelas.pkl')

    # Load pipeline (sudah mencakup TF-IDF + Random Forest)
    pipeline = joblib.load(model_path)

    # Load daftar label kelas (hanya untuk referensi, opsional digunakan)
    label_kelas = joblib.load(label_path)

    # Prediksi langsung — TIDAK perlu label encoding
    # karena pipeline menerima dan mengembalikan label string langsung
    prediction = pipeline.predict([text])[0]

    # Hitung confidence (probabilitas tertinggi)
    proba = pipeline.predict_proba([text])[0]
    confidence = round(max(proba) * 100, 2)

    # OUTPUT FINAL dalam format JSON (lebih mudah dibaca PHP)
    hasil = {
        "jenis_dokumen": prediction,
        "confidence": confidence
    }
    print(json.dumps(hasil))

except Exception as e:
    error_output = {"error": str(e)}
    print(json.dumps(error_output))
