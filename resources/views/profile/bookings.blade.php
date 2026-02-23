<!-- resources/views/profile/bookings.blade.php -->
@extends('layouts.app')

@section('title', 'Мои бронирования - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Боковое меню профиля -->
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4 text-center" style="background: #A2C0D4; border: none;">
                    <div class="avatar-circle mx-auto mb-3" 
                         style="width: 80px; height: 80px; background: #FFFFFF; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="mb-0" style="color: white;">{{ Auth::user()->name }}</h5>
                    <p style="color: white; opacity: 0.9;">{{ Auth::user()->email }}</p>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action d-flex align-items-center p-3" 
                           style="border: none; border-bottom: 1px solid #D6E4F0;">
                            <i class="fas fa-user-edit me-3" style="color: #A2C0D4; width: 20px;"></i>
                            Профиль
                        </a>
                        <a href="{{ route('profile.tickets') }}" class="list-group-item list-group-item-action d-flex align-items-center p-3" 
                           style="border: none; border-bottom: 1px solid #D6E4F0;">
                            <i class="fas fa-ticket-alt me-3" style="color: #A2C0D4; width: 20px;"></i>
                            Мои билеты
                        </a>
                        <a href="{{ route('profile.bookings') }}" class="list-group-item list-group-item-action d-flex align-items-center p-3 active" 
                           style="background: #D6E4F0; border: none; border-bottom: 1px solid #D6E4F0;">
                            <i class="fas fa-calendar-check me-3" style="color: #A2C0D4; width: 20px;"></i>
                            Мои бронирования
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center p-3" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           style="border: none;">
                            <i class="fas fa-sign-out-alt me-3" style="color: #A2C0D4; width: 20px;"></i>
                            Выйти
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Список бронирований -->
        <div class="col-md-9">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-calendar-check me-2"></i>
                        Мои бронирования
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @if($bookings->count() > 0)
                        <div class="row g-4">
                            @foreach($bookings as $booking)
                            <div class="col-md-6">
                                <div class="card h-100 border-0" style="background: #D6E4F0; border-radius: 15px; transition: all 0.3s;">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h5 class="mb-0" style="color: #3A3A3A;">Бронирование #{{ $booking->id }}</h5>
                                            <span class="badge" style="
                                                background: @if($booking->status == 'paid') #A2C0D4 
                                                          @elseif($booking->status == 'cancelled') #ffe5e5 
                                                          @else #FFFFFF @endif;
                                                color: @if($booking->status == 'paid') white 
                                                       @elseif($booking->status == 'cancelled') #d63031 
                                                       @else #3A3A3A @endif;
                                                padding: 8px 12px;
                                                border-radius: 8px;">
                                                @if($booking->status == 'pending')
                                                    <i class="fas fa-clock me-1"></i>Ожидает оплаты
                                                @elseif($booking->status == 'paid')
                                                    <i class="fas fa-check-circle me-1"></i>Оплачено
                                                @else
                                                    <i class="fas fa-times-circle me-1"></i>Отменено
                                                @endif
                                            </span>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <p class="mb-1" style="color: #3A3A3A;">
                                                <i class="fas fa-clock me-2" style="color: #A2C0D4; width: 18px;"></i>
                                                {{ $booking->hours }} ч.
                                            </p>
                                            <p class="mb-1" style="color: #3A3A3A;">
                                                <i class="fas fa-ice-skate me-2" style="color: #A2C0D4; width: 18px;"></i>
                                                @if($booking->skate)
                                                    {{ $booking->skate->brand }} {{ $booking->skate->model }} (размер {{ $booking->skate_size }})
                                                @else
                                                    Свои коньки
                                                @endif
                                            </p>
                                            <p class="mb-1" style="color: #3A3A3A;">
                                                <i class="fas fa-calendar me-2" style="color: #A2C0D4; width: 18px;"></i>
                                                {{ $booking->created_at->format('d.m.Y H:i') }}
                                            </p>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold" style="color: #A2C0D4; font-size: 1.2rem;">
                                                {{ number_format($booking->total_price, 0, '.', ' ') }} ₽
                                            </span>
                                            
                                            <a href="{{ route('booking.show', $booking) }}" class="btn" 
                                               style="background: #A2C0D4; color: white; border-radius: 8px; padding: 8px 20px; transition: all 0.3s;">
                                                <i class="fas fa-eye me-2"></i>
                                                Подробнее
                                            </a>
                                        </div>
                                        
                                        @if($booking->status == 'pending')
                                        <div class="mt-3 pt-3" style="border-top: 1px solid #FFFFFF;">
                                            <a href="{{ route('payment.process', ['booking' => $booking->id]) }}" class="btn w-100" 
                                               style="background: #A2C0D4; color: white; border-radius: 8px; padding: 8px; transition: all 0.3s;">
                                                <i class="fas fa-credit-card me-2"></i>
                                                Оплатить
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4">
                            {{ $bookings->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-check fa-4x mb-3" style="color: #A2C0D4;"></i>
                            <h5 style="color: #3A3A3A;">У вас пока нет бронирований</h5>
                            <p style="color: #3A3A3A; opacity: 0.7;">Забронируйте коньки для посещения катка</p>
                            <a href="{{ route('booking.skates') }}" class="btn mt-3" 
                               style="background: #A2C0D4; color: white; border-radius: 10px; padding: 12px 30px; font-weight: 600;">
                                <i class="fas fa-skating me-2"></i>
                                Забронировать коньки
                            </a>
                        </div>
                    @endif
                </div>
            </div>
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
    .list-group-item {
        transition: all 0.3s;
    }
    .list-group-item:hover {
        background: #D6E4F0 !important;
        transform: translateX(5px);
    }
    .list-group-item.active {
        background: #D6E4F0 !important;
        color: #3A3A3A !important;
        font-weight: 600;
    }
</style>
@endpush
@endsection