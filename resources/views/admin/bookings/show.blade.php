<!-- resources/views/admin/bookings/show.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Просмотр бронирования - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Просмотр бронирования #{{ $booking->id }}</h2>
        <a href="{{ route('admin.bookings.index') }}" class="btn" 
           style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; padding: 10px 25px; transition: all 0.3s;">
            <i class="fas fa-arrow-left me-2"></i>
            Назад к списку
        </a>
    </div>
    
    <div class="row">
        <!-- Информация о клиенте -->
        <div class="col-md-6 mb-4">
            <div class="card h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
                <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0" style="color: white;">
                        <i class="fas fa-user me-2"></i>
                        Информация о клиенте
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="text-muted small">ФИО</label>
                        <p class="fw-bold fs-5" style="color: #3A3A3A;">{{ $booking->full_name }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Телефон</label>
                        <p class="fw-bold" style="color: #3A3A3A;">
                            <i class="fas fa-phone me-2" style="color: #A2C0D4;"></i>
                            {{ $booking->phone }}
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Email</label>
                        <p class="fw-bold" style="color: #3A3A3A;">
                            <i class="fas fa-envelope me-2" style="color: #A2C0D4;"></i>
                            {{ $booking->user->email ?? 'Не указан' }}
                        </p>
                    </div>
                    
                    @if($booking->user)
                    <div class="mb-3">
                        <label class="text-muted small">ID пользователя</label>
                        <p class="fw-bold" style="color: #3A3A3A;">#{{ $booking->user->id }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Детали бронирования -->
        <div class="col-md-6 mb-4">
            <div class="card h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
                <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0" style="color: white;">
                        <i class="fas fa-calendar-check me-2"></i>
                        Детали бронирования
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="text-muted small">Количество часов</label>
                        <p class="fw-bold fs-5" style="color: #3A3A3A;">{{ $booking->hours }} ч.</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Коньки</label>
                        @if($booking->skate)
                            <p class="fw-bold mb-1" style="color: #3A3A3A;">
                                {{ $booking->skate->brand }} {{ $booking->skate->model }}
                            </p>
                            <p style="color: #3A3A3A;">
                                Размер: {{ $booking->skate_size }}<br>
                                Цена: {{ $booking->skate->price_per_hour }} ₽/час
                            </p>
                        @else
                            <p class="fw-bold" style="color: #3A3A3A;">
                                <span class="badge" style="background: #D6E4F0; color: #3A3A3A; padding: 8px 15px;">
                                    Свои коньки
                                </span>
                            </p>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Статус</label>
                        <p>
                            @if($booking->status == 'pending')
                                <span class="badge-pending">Ожидание оплаты</span>
                            @elseif($booking->status == 'paid')
                                <span class="badge-paid">Оплачено</span>
                            @else
                                <span class="badge-cancelled">Отменено</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Дата создания</label>
                        <p class="fw-bold" style="color: #3A3A3A;">{{ $booking->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    
                    @if($booking->payment_id)
                    <div class="mb-3">
                        <label class="text-muted small">ID платежа</label>
                        <p class="fw-bold" style="color: #3A3A3A;">{{ $booking->payment_id }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Финансовая информация -->
        <div class="col-md-6 mb-4">
            <div class="card" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
                <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0" style="color: white;">
                        <i class="fas fa-credit-card me-2"></i>
                        Финансовая информация
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted mb-1">Входной билет</p>
                            <p class="fw-bold fs-5" style="color: #3A3A3A;">300 ₽</p>
                        </div>
                        <div class="col-6">
                            <p class="text-muted mb-1">Аренда коньков</p>
                            <p class="fw-bold fs-5" style="color: #3A3A3A;">
                                @if($booking->skate)
                                    {{ $booking->total_price - 300 }} ₽
                                @else
                                    0 ₽
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <hr style="border-color: #D6E4F0;">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fs-5" style="color: #3A3A3A;">ИТОГО:</span>
                        <span class="fs-3 fw-bold" style="color: #A2C0D4;">{{ number_format($booking->total_price, 0, '.', ' ') }} ₽</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Изменение статуса -->
        <div class="col-md-6 mb-4">
            <div class="card" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
                <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0" style="color: white;">
                        <i class="fas fa-edit me-2"></i>
                        Изменить статус
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="status" class="form-label" style="color: #3A3A3A; font-weight: 500;">Выберите новый статус</label>
                            <select class="form-select" id="status" name="status" required
                                    style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Ожидание оплаты</option>
                                <option value="paid" {{ $booking->status == 'paid' ? 'selected' : '' }}>Оплачено</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Отменено</option>
                            </select>
                        </div>
                        
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn flex-fill py-3" 
                                    style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-sync-alt me-2"></i>
                                Обновить статус
                            </button>
                            
                            <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить это бронирование?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn py-3 px-4" 
                                        style="background: #ffe5e5; color: #d63031; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .badge-pending, .badge-paid, .badge-cancelled {
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 500;
    }
</style>
@endpush
@endsection