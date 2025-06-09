@extends('layouts.layout')
@section('title', 'Редактирование материала')
@section('content')
    <a class="material-btn" href="{{ route('materials.index') }}">Назад</a>
    <form
        action="{{ route('materials.update', [$material->id]) }}"
        method="post"
        enctype="application/x-www-form-urlencoded"
        class="material-form">
        @csrf
        @method('put')

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
            <input type="text" name="name" value="{{$material->name}}" placeholder="Введите название материала" required>
        </div>

        <div>
            @error('price')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Цена единицы материала</label>
            <input type="number" value="{{$material->price}}"  min="0" step="0.01" name="price" placeholder="Введите цену единицы за материал" required>
        </div>

        <div>
            @error('warehouse')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Количество на складе</label>
            <input type="number" value="{{$material->warehouse}}" min="0" step="0.01" name="warehouse" placeholder="Введите количество товара на складе" required>
        </div>

        <div>
            @error('minimum')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Минимальное количество</label>
            <input type="number"  min="0" step="0.01" value="{{$material->minimum}}" name="minimum" placeholder="Введите минимальное количество" required>
        </div>

        <div>
            @error('packaging')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Количество в упаковке</label>
            <input type="number"  min="0" step="0.01" name="packaging" value="{{$material->packaging}}" placeholder="Введите количество в упаковке" required>
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

        <button type="submit" class="material-btn">Редактировать данные</button>
    </form>

@endsection
