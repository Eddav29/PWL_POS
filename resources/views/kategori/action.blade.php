<div class="btn-group" role="group" aria-label="Basic example">
    <a href="{{ route('kategori.edit', $kategori_id) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('kategori.hapus', $kategori_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    </form>
    
</div>
