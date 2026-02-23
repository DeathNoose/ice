<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Админ-панель - Ice Arena')

@section('content')
<div class="container-fluid px-0">
    <h2 class="mb-4" style="color: #3A3A3A;">Админ-панель</h2>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon me-3">
                        <!-- Пробуем разные варианты иконок коньков -->
                        <i class="fas fa-ice-skate"></i> <!-- Font Awesome 6 -->
                        <!-- <i class="fas fa-skating"></i> --> <!-- Альтернативный вариант -->
                        <!-- <i class="fas fa-hockey-skate"></i> --> <!-- Еще вариант -->
                    </div>
                    <div>
                        <h6 class="mb-1" style="color: #3A3A3A; opacity: 0.7;">Всего коньков</h6>
                        <h3 class="mb-0" style="color: #3A3A3A;">{{ $stats['total_skates'] }}</h3>
                        <small style="color: #A2C0D4;">Доступно: {{ $stats['available_skates'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon me-3">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <h6 class="mb-1" style="color: #3A3A3A; opacity: 0.7;">Бронирования</h6>
                        <h3 class="mb-0" style="color: #3A3A3A;">{{ $stats['total_bookings'] }}</h3>
                        <small style="color: #A2C0D4;">Ожидание: {{ $stats['pending_bookings'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon me-3">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div>
                        <h6 class="mb-1" style="color: #3A3A3A; opacity: 0.7;">Билеты</h6>
                        <h3 class="mb-0" style="color: #3A3A3A;">{{ $stats['total_tickets'] }}</h3>
                        <small style="color: #A2C0D4;">Оплачено: {{ $stats['paid_tickets'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon me-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h6 class="mb-1" style="color: #3A3A3A; opacity: 0.7;">Сегодня</h6>
                        <h3 class="mb-0" style="color: #3A3A3A;">{{ $stats['today_bookings'] + $stats['today_tickets'] }}</h3>
                        <small style="color: #A2C0D4;">бронирований и билетов</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Bookings -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="table-container">
                <h5 class="mb-4" style="color: #3A3A3A; font-weight: 600;">Последние бронирования</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Клиент</th>
                                <th>Часы</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_bookings as $booking)
                            <tr>
                                <td>{{ $booking->full_name }}</td>
                                <td>{{ $booking->hours }} ч.</td>
                                <td>{{ number_format($booking->total_price, 0, '.', ' ') }} ₽</td>
                                <td>
                                    @if($booking->status == 'pending')
                                        <span class="badge-pending">Ожидание</span>
                                    @elseif($booking->status == 'paid')
                                        <span class="badge-paid">Оплачено</span>
                                    @else
                                        <span class="badge-cancelled">Отменено</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x mb-2" style="color: #A2C0D4;"></i>
                                    <p style="color: #3A3A3A;">Нет бронирований</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('admin.bookings.index') }}" class="btn-primary">
                        Все бронирования <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Recent Tickets -->
        <div class="col-md-6 mb-4">
            <div class="table-container">
                <h5 class="mb-4" style="color: #3A3A3A; font-weight: 600;">Последние билеты</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Клиент</th>
                                <th>Email</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->full_name }}</td>
                                <td>{{ $ticket->email ?? '—' }}</td>
                                <td>
                                    @if($ticket->status == 'pending')
                                        <span class="badge-pending">Ожидание</span>
                                    @elseif($ticket->status == 'paid')
                                        <span class="badge-paid">Оплачено</span>
                                    @else
                                        <span class="badge-used">Использован</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    <i class="fas fa-inbox fa-3x mb-2" style="color: #A2C0D4;"></i>
                                    <p style="color: #3A3A3A;">Нет билетов</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('admin.tickets.index') }}" class="btn-primary">
                        Все билеты <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="table-container">
                <h5 class="mb-4" style="color: #3A3A3A; font-weight: 600;">Быстрые действия</h5>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('admin.skates.create') }}" class="btn-outline-primary">
                        <i class="fas fa-plus-circle me-2"></i>
                        Добавить коньки
                    </a>
                    <a href="{{ route('admin.skates.index') }}" class="btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>
                        Управление коньками
                    </a>
                    <a href="{{ route('admin.bookings.index') }}" class="btn-outline-primary">
                        <i class="fas fa-list me-2"></i>
                        Все бронирования
                    </a>
                    <a href="{{ route('admin.tickets.index') }}" class="btn-outline-primary">
                        <i class="fas fa-ticket-alt me-2"></i>
                        Все билеты
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection