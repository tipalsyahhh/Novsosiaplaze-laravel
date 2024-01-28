@extends('layout.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('desain/css/comentar.css')}}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="modal-status">
            <div class="card my-4">
                <div class="info-posting">
                    <div class="user-postingan">
                        <img src="{{ $status->user->profileImage ? asset('storage/' . $status->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                            alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        <h8 class="mb-0" style="margin-left: 10px; color: #080808">{{ $status->user->user }}
                        </h8>
                    </div>
                </div>
                @php
                $imagePaths = explode(',', $status->image);
                @endphp
                <div id="profile-carousel-{{ $status->id }}" class="carousel">
                    <div class="carousel-inner">
                        @foreach ($imagePaths as $index => $imagePath)
                        <div class="carousel-item{{ $index === 0 ? ' active' : '' }}">
                            <img src="{{ asset($imagePath) }}" class="d-block w-100 profile-image" data-toggle="modal"
                                data-target="#profile-modal-{{ $status->id }}-{{ $index }}" alt="Profile Image">
                        </div>
                        @endforeach
                    </div>

                    @if (count($imagePaths) > 1)
                    <a class="carousel-control-prev" href="#profile-carousel-{{ $status->id }}" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#profile-carousel-{{ $status->id }}" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators" style="cursor: none;">
                        @foreach ($imagePaths as $index => $imagePath)
                        <li class="{{ $index === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    @endif
                </div>
                <div class="caption">
                    <p>{{ $status->caption }}</p>
                </div>
                <div class="judul-comentar">
                    <h6>Commentar</h6>
                </div>
                <div class="isi-comentar">
                    @foreach ($comments as $commen)
                    @if ($commen->comentar)
                    <div class="comentar-item">
                        <img src="{{ $commen->user->profileImage ? asset('storage/' . $commen->user->profileImage->image_path) : asset('storage/default_profile.png') }}"
                            alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                        <div class="comentar-details">
                            <strong class="comment-user">{{ $commen->user->user }}</strong>
                            <p>{{ $commen->comentar }}</p>
                            <div class="comentar-user">
                                @foreach($comments as $likeComment)
                                @if($likeComment->comentar && $likeComment->id === $commen->id)
                                <p id="{{ $likeComment->id }}">{{ $likeComment->created_at->diffForHumans() }}</p>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="garis-comentar"></div>
                @include('like.emoticon')
                <div class="form-comentar">
                    <div class="user-info">
                        <img class="img-profile-comentar rounded-circle" style="width: 40px; height: 40px;"
                            src="{{ $user->profileImage ? asset('storage/' . $user->profileImage->image_path) : asset('storage/default_profile.png') }}">
                    </div>
                    <form method="post" action="{{ route('comment.add', ['status_id' => $status->id]) }}" class="mt-3"
                        id="comment-form">
                        @csrf
                        <div class="comen-group">
                            <input type="text" name="comment" class="form-control" placeholder="Add a comment...">
                            <div class="input-group-icon-comentar">
                                <button type="button" id="emoticon-button">
                                    <i
                                        class="bi bi-emoji-smile"></i>
                                </button>
                                <button type="submit" class="kirim-comentar">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menyisipkan emotikon ke dalam input teks
    function insertEmoticon(emoticon) {
        var commentInput = document.querySelector('input[name="comment"]');
        commentInput.value += emoticon;
    }

    // Fungsi untuk menampilkan/sembunyikan kontainer emotikon saat tombol diklik
    document.getElementById('emoticon-button').addEventListener('click', function() {
    // Skrip pertama
    var emoticonContainer = document.getElementById('emoticon-container');
    emoticonContainer.style.display = (emoticonContainer.style.display === 'none' || emoticonContainer.style.display === '') ? 'block' : 'none';

    // Skrip kedua
    var emoticonHeader = document.getElementById('emoticon-header');
    emoticonHeader.style.display = (emoticonHeader.style.display === 'none' || emoticonHeader.style.display === '') ? 'block' : 'none';
});
</script>
@endsection