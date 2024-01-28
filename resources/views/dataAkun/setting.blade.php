@extends('layout.master')

<style>
    .foouter-setting {
        width: 100%;
        height: 250px;
        padding: 10px;
        margin-top: 70px;
        background-image: url('../../img/contoh.gif');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .judul-setting{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: translateY(190%);
    }

    .judul-setting h3 {
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .container-setting {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.49);
        margin-top: -50px;
        margin-bottom: 100px;
        transform: translateY(-50%);
        background-color: #fff;
    }

    .container-setting p {
        color: #333;
        font-weight: bold;
        margin: 0;
    }

    .container-setting-2 {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.49);
        transform: translateY(-50%);
        background-color: #fff;
    }

    .container-setting-2 p {
        color: #333;
        font-weight: bold;
        margin: 0;
    }

    .edit-profile{
        display: flex;
        align-items: center;
    }

    .edit-profile span {
        display: flex;
        margin-right: 10px;
        align-items: center;
        justify-content: center;
        background-color: #2eada7;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .batas {
        color: #333;
    }
</style>

<div class="foouter-setting">
    <a class="isi-icon" href="{{ route('dataAkun.index') }}">
        <i class="bi bi-arrow-left-circle" style="color: #fff; font-size: 1.2em;"></i>
    </a>
    <div class="judul-setting">
        <h3>Account Settings</h3>
    </div>
</div>
@section('content')
<div class="container-setting">
    <a href="{{ route('dataAkun.edit', ['user_id' => $userProfile->user->id]) }}" class="button-modal">
        <div class="edit-profile">
            <span><center><i class="bi bi-gear" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Edit profile</p>
        </div>
    </a>
    <hr class="batas">
    <a href="{{ route('statuses.create') }}" class="button-modal">
        <div class="edit-profile">
            <span><center><i class="bi bi-plus-lg" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Buat status</p>
        </div>
    </a>
    <hr class="batas">

    @php
    $user = auth()->user();
    $userHasData = \App\Models\DataToko::where('user_id', $user->id)->exists();
    @endphp

    @if ($userHasData)
    <a href="{{ route('datatoko.edit', ['user_id' => $user->id]) }}" class="button-modal">
        <div class="edit-profile">
            <span><center><i class="bi bi-plus-lg" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Edit Data Toko Mu</p>
        </div>
    </a>
    @else
    <a href="{{ route('datatoko.create', ['userId' => $user->id]) }}" class="button-modal">
        <div class="edit-profile">
            <span><center><i class="bi bi-plus-circle" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Buat Data Toko Mu</p>
        </div>
    </a>
    @endif
</div>
<div class="container-setting-2">
    <a class="button-modal" href="{{ route('fotoProfile.index') }}">
        <div class="edit-profile">
            <span><center><i class="bi bi-camera" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Foto Profile Setting</p>
        </div>
    </a>
    <hr class="batas">
    <a class="button-modal" href="{{ route('reset.password.form.show', ['username']) }}">
        <div class="edit-profile">
            <span><center><i class="bi bi-arrow-clockwise" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Ganti Password</p>
        </div>
    </a>
    <hr class="batas">
    <a class="button-modal" href="{{ route('history.index') }}">
        <div class="edit-profile">
            <span><center><i class="fas fa-history" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>History</p>
        </div>
    </a>
    <hr class="batas">
    <a href="{{ route('user.edit', ['id' => $user->id]) }}">
        <div class="edit-profile">
            <span><center><i class="bi bi-person-fill" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Tentang Akun</p>
        </div>
    </a>
    <hr class="batas">
    <a class="button-modal" href="{{ route('logout') }}">
        <div class="edit-profile">
            <span><center><i class="bi bi-box-arrow-right" style="color: #fff; font-size: 1.2em;"></i></center></span>
            <p>Logout</p>
            <p style="color: #c91414; margin-left: 5px;">{{$user->user}}</p>
        </div>
    </a>
</div>
@endsection