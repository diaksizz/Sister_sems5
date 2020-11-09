@extends('main')
@section('content')
<div class="container">
    <center><h1 style="margin-top: 2%; margin-bottom: 2%; color: white; font-family: sans-serif;"> DAFTAR AKUN</h1></center>
<table class="table table-hover table-bordered">
    <thead>

    <tr class="table-light">
        <th scope="col">#</th>
        <th scope="col">AKUNID</th>
        <th scope="col">NAMA AKUN</th>
        <th scope="col">SALDO AKUN</th>
        <th scope="col">DETAIL HERO</th>
        <th scope="col">DETAIL SKIN</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($akun as $l)
    <tr class="table-secondary">
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$l->AKUNID}}</td>
        <td>{{$l->AKUNNAMA}}</td>
        <td>{{$l->AKUNSALDO}}</td>
        <td>
           <a  href="{{route('detailhero', $l->AKUNID)}}"
            class="btn btn-warning btn-sm">Detail Hero</a>
        </td>
        <td>
            <a  href="{{route('detailskin', $l->AKUNID)}}"
                class="btn btn-warning btn-sm">Detail Skin</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection

