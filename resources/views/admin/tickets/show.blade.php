<!-- resources/views/admin/tickets/show.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Просмотр билета - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Просмотр билета #{{ $ticket->id }}</h2>
        <a href="{{ route('admin.tickets.index') }}" class="btn" 
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
                        <p class="fw-bold fs-5" style="color: #3A3A3A;">{{ $ticket->full_name }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Телефон</label>
                        <p class="fw-bold" style="color: #3A3A3A;">
                            <i class="fas fa-phone me-2" style="color: #A2C0D4;"></i>
                            {{ $ticket->phone }}
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Email</label>
                        <p class="fw-bold" style="color: #3A3A3A;">
                            <i class="fas fa-envelope me-2" style="color: #A2C0D4;"></i>
                            {{ $ticket->email ?? 'Не указан' }}
                        </p>
                    </div>
                    
                    @if($ticket->user)
                    <div class="mb-3">
                        <label class="text-muted small">ID пользователя</label>
                        <p class="fw-bold" style="color: #3A3A3A;">#{{ $ticket->user->id }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Детали билета -->
        <div class="col-md-6 mb-4">
            <div class="card h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
                <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
                    <h5 class="mb-0" style="color: white;">
                        <i class="fas fa-ticket-alt me-2"></i>
                        Детали билета
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="text-muted small">Стоимость билета</label>
                        <p class="fw-bold fs-5" style="color: #3A3A3A;">{{ number_format($ticket->price, 0, '.', ' ') }} ₽</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Статус</label>
                        <p>
                            @if($ticket->status == 'pending')
                                <span class="badge-pending">Ожидание оплаты</span>
                            @elseif($ticket->status == 'paid')
                                <span class="badge-paid">Оплачено</span>
                            @elseif($ticket->status == 'used')
                                <span class="badge-used">Использован</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Дата создания</label>
                        <p class="fw-bold" style="color: #3A3A3A;">{{ $ticket->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    
                    @if($ticket->used_at)
                    <div class="mb-3">
                        <label class="text-muted small">Дата использования</label>
                        <p class="fw-bold" style="color: #3A3A3A;">{{ $ticket->used_at->format('d.m.Y H:i') }}</p>
                    </div>
                    @endif
                    
                    @if($ticket->payment_id)
                    <div class="mb-3">
                        <label class="text-muted small">ID платежа</label>
                        <p class="fw-bold" style="color: #3A3A3A;">{{ $ticket->payment_id }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Изменение статуса -->
       <!-- resources/views/admin/tickets/show.blade.php -->
<!-- Замените блок с формой изменения статуса и удаления -->

<div class="col-12">
    <div class="card" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
        <div class="card-header py-3" style="background: #A2C0D4; border-radius: 20px 20px 0 0;">
            <h5 class="mb-0" style="color: white;">
                <i class="fas fa-edit me-2"></i>
                Изменить статус
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <!-- Форма для изменения статуса (PUT) -->
                <div class="col-md-8">
                    <form action="{{ route('admin.tickets.update-status', $ticket) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row align-items-end">
                            <div class="col-md-8">
                                <label for="status" class="form-label" style="color: #3A3A3A; font-weight: 500;">Выберите новый статус</label>
                                <select class="form-select" id="status" name="status" required
                                        style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Ожидание оплаты</option>
                                    <option value="paid" {{ $ticket->status == 'paid' ? 'selected' : '' }}>Оплачено</option>
                                    <option value="used" {{ $ticket->status == 'used' ? 'selected' : '' }}>Использован</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn w-100 py-3" 
                                        style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                    <i class="fas fa-sync-alt me-2"></i>
                                    Обновить статус
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Форма для удаления (DELETE) - отдельная форма -->
                <div class="col-md-4">
                    <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот билет?');">
                        @csrf
                        @method('DELETE')
                        <label class="form-label d-block" style="color: #3A3A3A; font-weight: 500;">&nbsp;</label>
                        <button type="submit" class="btn w-100 py-3" 
                                style="background: #ffe5e5; color: #d63031; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-trash me-2"></i>
                            Удалить билет
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .badge-pending, .badge-paid, .badge-used, .badge-cancelled {
        padding: 8px 15px;
        border-radius: 8px;
        font-weight: 500;
        display: inline-block;
    }
    .badge-pending {
        background: #D6E4F0;
        color: #3A3A3A;
    }
    .badge-paid {
        background: #A2C0D4;
        color: white;
    }
    .badge-used {
        background: #cce5ff;
        color: #004085;
    }
    .badge-cancelled {
        background: #ffe5e5;
        color: #d63031;
    }
</style>
@endpush
@endsection