@extends('layouts.admin')

@section('title', 'Edit Artikel · Kos XYZ')

@section('content')
@include('admin.artikel.form', ['artikel' => $artikel, 'formAction' => route('admin.artikel.update', $artikel), 'formMethod' => 'PUT', 'submitLabel' => 'Update'])
@endsection
