<!-- resources/views/admin/skates/edit.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Редактирование коньков - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Редактирование коньков #{{ $skate->id }}</h2>
        <a href="{{ route('admin.skates.index') }}" class="btn" 
           style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; padding: 10px 25px; transition: all 0.3s;">
            <i class="fas fa-arrow-left me-2"></i>
            Назад к списку
        </a>
    </div>
    
    <div class="card" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
        <div class="card-body p-5">
            <form action="{{ route('admin.skates.update', $skate) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row g-4">
                    <!-- Бренд -->
                    <div class="col-md-6">
                        <label for="brand" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Бренд <span style="color: #A2C0D4;">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('brand') is-invalid @enderror" 
                               id="brand" 
                               name="brand" 
                               value="{{ old('brand', $skate->brand) }}" 
                               required
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Модель -->
                    <div class="col-md-6">
                        <label for="model" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Модель <span style="color: #A2C0D4;">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('model') is-invalid @enderror" 
                               id="model" 
                               name="model" 
                               value="{{ old('model', $skate->model) }}" 
                               required
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Размер -->
                    <div class="col-md-6">
                        <label for="size" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Размер <span style="color: #A2C0D4;">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('size') is-invalid @enderror" 
                               id="size" 
                               name="size" 
                               value="{{ old('size', $skate->size) }}" 
                               required
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                        @error('size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Количество -->
                    <div class="col-md-6">
                        <label for="quantity" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Количество <span style="color: #A2C0D4;">*</span>
                        </label>
                        <input type="number" 
                               class="form-control @error('quantity') is-invalid @enderror" 
                               id="quantity" 
                               name="quantity" 
                               value="{{ old('quantity', $skate->quantity) }}" 
                               min="0" 
                               required
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Цена за час -->
                    <div class="col-md-6">
                        <label for="price_per_hour" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Цена за час (₽) <span style="color: #A2C0D4;">*</span>
                        </label>
                        <input type="number" 
                               class="form-control @error('price_per_hour') is-invalid @enderror" 
                               id="price_per_hour" 
                               name="price_per_hour" 
                               value="{{ old('price_per_hour', $skate->price_per_hour) }}" 
                               min="0" 
                               step="0.01" 
                               required
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                        @error('price_per_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Изображение -->
                    <div class="col-md-6">
                        <label for="image" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Изображение
                        </label>
                        
                        @if($skate->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($skate->image) }}" alt="{{ $skate->model }}" 
                                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                            </div>
                        @endif
                        
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/*"
                               style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 10px;">
                        <small class="text-muted">Оставьте пустым, чтобы не менять изображение</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Описание -->
                    <div class="col-12">
                        <label for="description" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                            Описание
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4"
                                  style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">{{ old('description', $skate->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Доступность -->
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="is_available" 
                                   name="is_available" 
                                   value="1" 
                                   {{ $skate->is_available ? 'checked' : '' }}
                                   style="accent-color: #A2C0D4; width: 20px; height: 20px;">
                            <label class="form-check-label ms-2" for="is_available" style="color: #3A3A3A;">
                                Доступен для бронирования
                            </label>
                        </div>
                    </div>
                    
                    <!-- Кнопки -->
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn px-5 py-3" 
                                style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-save me-2"></i>
                            Обновить
                        </button>
                        
                        <a href="{{ route('admin.skates.index') }}" class="btn px-5 py-3 ms-3" 
                           style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-times me-2"></i>
                            Отмена
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection