import sys
import joblib
import os

try:
    # Ambil teks dari Laravel
    text = sys.argv[1]

    BASE_DIR = os.path.dirname(os.path.abspath(__file__))

    # Model terbaik
    model_path = os.path.join(BASE_DIR, "best_pipeline_60_40.pkl")

    # Load model
    pipeline = joblib.load(model_path)

    # Prediksi
    hasil = pipeline.predict([text])[0]

    # Kirim hasil ke Laravel
    print(hasil)

except Exception as e:
    print("ERROR")