@extends($user && $user->role === 'admin' ? 'layout.admin' : 'layout.master')

@section('judul')
    Tambah Postingan
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    .image-create {
        border: 1px solid #d1d3e2;
        border-radius: 8px;
        padding: 5px;
        margin-bottom: 10px;
    }

    .button {
        border-radius: 50px;
        border: 1px solid #2eada7;
        background-color: #2eada7;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: bold;
        padding: 10px 45px;
        letter-spacing: 1px;
        transition: transform 80ms ease-in;
        width: 100%;
    }
</style>

@section('content')
    <form method="post" action="{{ route('postingan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_menu" value="{{ old('nama_menu') }}" class="form-control">
        </div>

        @error('nama_menu')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga') }}" class="form-control">
        </div>

        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>

        @error('deskripsi')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label>Ketersediaan</label>
            <input type="text" name="kapasitas" value="{{ old('kapasitas') }}" class="form-control">
        </div>

        @error('kapasitas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <select name="jenis" required  class="form-control">
                <option value="" disabled selected>Jenis Produk anda</option>
                <option value="elektronik">elektronik</option>
                <option value="kecantikan">kecantikan</option>
                <option value="fesion">fesion</option>
                <option value="food">food</option>
                <option value="studi">studi</option>
                <option value="olahraga">olahraga</option>
            </select>
        </div>

        @error('jenis')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="image-create">
            <div class="form-group">
                <center>
                    <label for="imageInput">
                        <i class="bi bi-file-earmark-image-fill" style="font-size: 2rem; color: green; cursor: pointer;"></i>
                    </label>
                    <input type="file" name="image[]" id="imageInput" class="form-control-file" style="display: none;" required
                        multiple onchange="displayImages()">
                    <p id="fileCountText" style="margin-top: 5px;">Choose Image</p>
                </center>
            </div>
        </div>

        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="button"><i class="bi bi-save"></i>
            Simpan</button>
    </form>
    <script>
        function displayImages() {
            var input = document.getElementById('imageInput');
            var selectedImageDiv = document.getElementById('selectedImage');
            selectedImageDiv.innerHTML = '';

            function readAndDisplayImage(index) {
                if (index < input.files.length) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Selected Image';
                        img.className = 'selected-img';
                        selectedImageDiv.appendChild(img);

                        readAndDisplayImage(index + 1);
                    };

                    reader.onerror = function(error) {
                        console.error('Error reading image:', error);
                        readAndDisplayImage(index + 1);
                    };

                    reader.readAsDataURL(input.files[index]);
                }
            }
            readAndDisplayImage(0);
        }
            function displayImages() {
            var input = document.getElementById('imageInput');
            var fileCountText = document.getElementById('fileCountText');
            fileCountText.innerText = input.files.length + ' file selected';
        }
    </script>
@endsection
