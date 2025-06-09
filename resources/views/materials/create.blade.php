@extends('layouts.layout')

@section('title', 'Создание материала')

@section('content')

    <a class="material-btn" href="{{ route('materials.index') }}">Назад</a>

    <form action="{{ route('materials.store') }}" method="post" enctype="application/x-www-form-urlencoded" class="material-form">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные");
            </script>
        @endif

        <div>
            @error('material_type_id')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Тип материала</label>
            <select name="material_type_id" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            @error('name')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Название материала</label>
            <input type="text" name="name" placeholder="Введите название материала" required>
        </div>

        <div>
            @error('price')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Цена единицы материала</label>
            <input type="number" name="price" min="0" step="0.01" placeholder="Введите цену единицы за материал" required>
        </div>

        <div>
            @error('warehouse')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Количество на складе</label>
            <input type="number" name="warehouse" min="0" step="0.01" placeholder="Введите количество товара на складе" required>
        </div>

        <div>
            @error('minimum')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Минимальное количество</label>
            <input type="number" name="minimum" min="0" step="0.01" placeholder="Введите минимальное количество" required>
        </div>

        <div>
            @error('packaging')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Количество в упаковке</label>
            <input type="number" name="packaging" min="0" step="0.01" placeholder="Введите количество в упаковке" required>
        </div>

        <div>
            @error('unit_id')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Единица измерения</label>
            <select name="unit_id" required>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="material-btn">Создать данные</button>
    </form>

@endsection
