@extends('layouts.layout')
@section('title', 'Материалы')
@section('content')
    <div class="material-nav">
        <a class="material-btn" href="{{ route('materials.create') }}">Создать материал</a>
        <a class="material-btn" href="{{ route('home') }}">Назад</a>
    </div>
    <div class="materials-list border">
        @foreach ($materials as $material)
            <a href="{{ route('materials.edit', $material->id) }}">
                <div class="material-card border">
                    <div class="material-details">
                        <h2 class="material-title">{{ $material->materialType->name }} | {{ $material->name }}</h2>
                        <div>Минимальное количество: {{ $material->minimum }}</div>
                        <div>Количество на складе: {{ $material->warehouse }}</div>
                        <div>Цена: {{ $material->price }} р./{{ $material->unit->name }} | Количество в упаковке: {{ $material->packaging }}</div>
                    </div>
                    <div>Требуемое количество: {{ $material->quantity }}</div>
                </div>
            </a>
            <a href="{{ route('materials.products', $material->id) }}">Продукция, использующая материал</a>
        @endforeach
    </div>
@endsection
