<form action="{{ route('yandas.update', $yanda->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama Lembaga</label>
        <input type="text" name="Nama_Lembaga" class="form-control" value="{{ $yandas->Nama_Lembaga }}" required>
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="Tanggal" class="form-control" value="{{ $yandas->Tanggal }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
