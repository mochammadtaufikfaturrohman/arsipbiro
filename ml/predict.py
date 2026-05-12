import sys
import joblib
import os

try:
    # Ambil input teks
    text = sys.argv[1]

    # Ambil folder saat ini
    BASE_DIR = os.path.dirname(os.path.abspath(__file__))

    # Path model
    model_path = os.path.join(BASE_DIR, 'model_rf.pkl')
    label_path = os.path.join(BASE_DIR, 'label_encoder.pkl')

    # Load model
    model = joblib.load(model_path)

    # Load label encoder
    label_encoder = joblib.load(label_path)

    # Prediksi
    prediction = model.predict([text])

    # Decode label
    hasil = label_encoder.inverse_transform(prediction)

    # OUTPUT FINAL (PENTING)
    print(hasil[0])

except Exception as e:
    print("ERROR")