@extends('layouts.layout')
@section('title', 'Продукция')
@section('content')
    <div class="material-nav">
        <a class="material-btn" href="{{ route('materials.index') }}">Назад</a>
    </div>

    <div class="materials-list border">
        <h2>Продукция с использованием "{{ $material->name }}"</h2>

        @foreach ($material->product as $product)
            <div class="material-card border">
                <div class="material-details">
                    <div>Идентификатор продукции: {{ $product->product->id }}</div>
                    <div>Наименование продукции: {{ $product->product->name }}</div>
                    <div>Необходимое количество: {{ $product->quantity }} {{$product->unit}} </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

