@extends('layout')

@section('content')
  <h1>Страница пользователя</h1>
  
   @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h3>Создание новой заявки</h3>
    <form action="{{ route('application.store') }}" method="POST">
        @csrf
        
        @if ($errors->any())
            <div style="background: #fee; color: #c00; padding: 10px; border: 1px solid #c00; margin-bottom: 15px;">
                <strong>Ошибка при сохранении:</strong>
                <ul style="margin: 5px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="margin-bottom: 10px;">
            <label>Тема:</label><br>
            <input type="text" name="title" value="{{ old('title') }}" required style="width: 300px;">
            @error('title') <span style="color:red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Описание:</label><br>
            <textarea name="description" rows="4" required style="width: 300px;">{{ old('description') }}</textarea>
            @error('description') <span style="color:red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label>Категория:</label><br>
            <select name="category" id="category" required style="width: 300px;">
                <option value="">-- Выберите --</option>
                <option value="category1" {{ old('category') == 'category1' ? 'selected' : '' }}>category1</option>
                <option value="category2" {{ old('category') == 'category2' ? 'selected' : '' }}>category2</option>
                <option value="category3" {{ old('category') == 'category3' ? 'selected' : '' }}>category3</option>
            </select>
            @error('category') <span style="color:red; font-size: 12px;">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Создать заявку</button>
    </form>

    <hr>

    <h3>Мои заявки</h3>
    {{-- <h3>Мои заявки</h3> --}}
@forelse(Auth::user()->applications ?? [] as $item)
    <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 8px; background: #f9f9f9; display: flex; gap: 15px;">
        
        {{-- Картинка категории --}}
        <div style="flex-shrink: 0;">
            @if(config('categories.' . $item->category . '.image'))
                <img src="{{ asset('images/categories/' . config('categories.' . $item->category . '.image')) }}" 
                     alt="{{ config('categories.' . $item->category . '.name', 'Категория') }}" 
                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd;">
                <p style="margin: 5px 0 0 0; font-size: 12px; color: #666; text-align: center;">
                    {{ config('categories.' . $item->category . '.name', 'Категория') }}
                </p>
            @else
                <div style="width: 80px; height: 80px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                    Нет
                </div>
            @endif
        </div>
        
        {{-- Информация о заявке --}}
        <div style="flex-grow: 1;">
            <div style="display: flex; justify-content: space-between; align-items: start;">
                <div>
                    <h4 style="margin: 0 0 10px 0;">{{ $item->title }}</h4>
                    <p style="margin: 5px 0;"><strong>Описание:</strong> {{ $item->description }}</p>
                    <p style="margin: 5px 0; color: gray; font-size: 12px;">
                        Создано: {{ $item->created_at->format('d.m.Y H:i') }}
                    </p>
                </div>
                <div style="text-align: right;">
                    <strong style="
                        display: inline-block;
                        padding: 8px 15px;
                        border-radius: 20px;
                        color: white;
                        font-size: 14px;
                        background: 
                            @if($item->status == 'new') #3498db
                            @elseif($item->status == 'in_progress') #f39c12
                            @elseif($item->status == 'completed') #27ae60
                            @elseif($item->status == 'rejected') #e74c3c
                            @else #95a5a6
                            @endif
                        ;
                    ">
                        @if($item->status == 'new') Новая
                        @elseif($item->status == 'in_progress') В работе
                        @elseif($item->status == 'completed') Завершена
                        @elseif($item->status == 'rejected') Отклонена
                        @else {{ $item->status }}
                        @endif
                    </strong>
                </div>
            </div>
        </div>
    </div>
@empty
    <p>У вас пока нет заявок.</p>
@endforelse
    
@endsection