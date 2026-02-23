<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Дашборд')

@section('content')
<div class="container-fluid px-0">
    <h2 class="mb-4">Дашборд</h2>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex align-items-center">
                    <div class="stat-icon me-3">
                        <i class="fas fa-ice-skate"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Всего коньков</h6>
                        <h3 class="mb-0">{{ $stats['total_skates'] }}</h3>
                        <small class="text-success">Доступно: {{ $stats['available_skates'] }}</small>
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
                        <h6 class="text-muted mb-1">Бронирования</h6>
                        <h3 class="mb-0">{{ $stats['total_bookings'] }}</h3>
                        <small class="text-warning">Ожидание: {{ $stats['pending_bookings'] }}</small>
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
                        <h6 class="text-muted mb-1">Билеты</h6>
                        <h3 class="mb-0">{{ $stats['total_tickets'] }}</h3>
                        <small class="text-success">Оплачено: {{ $stats['paid_tickets'] }}</small>
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
                        <h6 class="text-muted mb-1">Сегодня</h6>
                        <h3 class="mb-0">{{ $stats['today_bookings'] + $stats['today_tickets'] }}</h3>
                        <small>бронирований и билетов</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Recent Bookings -->
        <div class="col-md-6 mb-4">
            <div class="table-container">
                <h5 class="mb-3">Последние бронирования</h5>
                <div class="table-responsive">
                    <table class="table">
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
                                    <span class="badge badge-{{ $booking->status }}">
                                        @switch($booking->status)
                                            @case('pending') Ожидание @break
                                            @case('paid') Оплачено @break
                                            @case('cancelled') Отменено @break
                                            @default {{ $booking->status }}
                                        @endswitch
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                    <p class="text-muted">Нет бронирований</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">
                        Все бронирования <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Recent Tickets -->
        <div class="col-md-6 mb-4">
            <div class="table-container">
                <h5 class="mb-3">Последние билеты</h5>
                <div class="table-responsive">
                    <table class="table">
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
                                    <span class="badge badge-{{ $ticket->status }}">
                                        @switch($ticket->status)
                                            @case('pending') Ожидание @break
                                            @case('paid') Оплачено @break
                                            @case('used') Использован @break
                                            @default {{ $ticket->status }}
                                        @endswitch
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">
                                    <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                    <p class="text-muted">Нет билетов</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-end mt-3">
                    <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-primary">
                        Все билеты <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection