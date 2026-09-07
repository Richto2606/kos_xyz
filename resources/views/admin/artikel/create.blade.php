@extends('layouts.admin')

@section('title', 'Tambah Artikel · Kos XYZ')

@section('content')
@include('admin.artikel.form', ['artikel' => null, 'formAction' => route('admin.artikel.store'), 'formMethod' => 'POST', 'submitLabel' => 'Simpan'])
@endsection
