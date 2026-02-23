<!-- resources/views/admin/skates/index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Управление коньками - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Управление коньками</h2>
        <a href="{{ route('admin.skates.create') }}" class="btn" 
           style="background: #A2C0D4; color: white; border-radius: 10px; padding: 10px 25px; transition: all 0.3s;">
            <i class="fas fa-plus-circle me-2"></i>
            Добавить коньки
        </a>
    </div>
    
    <div class="table-container" style="background: #FFFFFF; border-radius: 20px; padding: 1.5rem; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead style="background: #D6E4F0;">
                    <tr>
                        <th style="color: #3A3A3A;">ID</th>
                        <th style="color: #3A3A3A;">Изображение</th>
                        <th style="color: #3A3A3A;">Модель</th>
                        <th style="color: #3A3A3A;">Бренд</th>
                        <th style="color: #3A3A3A;">Размер</th>
                        <th style="color: #3A3A3A;">Количество</th>
                        <th style="color: #3A3A3A;">Цена/час</th>
                        <th style="color: #3A3A3A;">Статус</th>
                        <th style="color: #3A3A3A;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skates as $skate)
                    <tr>
                        <td style="color: #3A3A3A;">#{{ $skate->id }}</td>
                        <td>
                            @if($skate->image)
                                <img src="{{ Storage::url($skate->image) }}" alt="{{ $skate->model }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                            @else
                                <div style="width: 50px; height: 50px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-ice-skate" style="color: #A2C0D4;"></i>
                                </div>
                            @endif
                        </td>
                        <td style="color: #3A3A3A;">{{ $skate->model }}</td>
                        <td style="color: #3A3A3A;">{{ $skate->brand }}</td>
                        <td style="color: #3A3A3A;">{{ $skate->size }}</td>
                        <td style="color: #3A3A3A;">{{ $skate->quantity }}</td>
                        <td style="color: #3A3A3A;">{{ $skate->price_per_hour }} ₽</td>
                        <td>
                            @if($skate->is_available && $skate->quantity > 0)
                                <span class="badge-paid">Доступен</span>
                            @else
                                <span class="badge-cancelled">Недоступен</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.skates.edit', $skate) }}" class="btn btn-sm" 
                                   style="background: #D6E4F0; color: #3A3A3A; border-radius: 8px; padding: 5px 10px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.skates.destroy', $skate) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эти коньки?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background: #ffe5e5; color: #d63031; border-radius: 8px; padding: 5px 10px;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <i class="fas fa-ice-skate fa-4x mb-3" style="color: #A2C0D4;"></i>
                            <h5 style="color: #3A3A3A;">Коньки не найдены</h5>
                            <p style="color: #3A3A3A; opacity: 0.7;">Добавьте первые коньки в каталог</p>
                            <a href="{{ route('admin.skates.create') }}" class="btn mt-3" style="background: #A2C0D4; color: white; border-radius: 10px; padding: 10px 25px;">
                                <i class="fas fa-plus-circle me-2"></i>
                                Добавить коньки
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $skates->links() }}
        </div>
    </div>
</div>

@push('styles')
<style>
    .pagination {
        gap: 5px;
    }
    .page-link {
        border: 1px solid #D6E4F0;
        color: #3A3A3A;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .page-link:hover {
        background: #A2C0D4;
        color: white;
        border-color: #A2C0D4;
    }
    .page-item.active .page-link {
        background: #A2C0D4;
        border-color: #A2C0D4;
        color: white;
    }
</style>
@endpush