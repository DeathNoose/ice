<!-- resources/views/booking/show.blade.php -->
@extends('layouts.app')

@section('title', 'Детали бронирования - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-skating me-2"></i>
                        Детали бронирования #{{ $booking->id }}
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    <!-- Статус -->
                    <div class="text-center mb-5">
                        <span class="badge py-3 px-4" style="
                            background: @if($booking->status == 'paid') #A2C0D4 
                                      @elseif($booking->status == 'pending') #D6E4F0 
                                      @else #ffe5e5 @endif;
                            color: @if($booking->status == 'paid') white 
                                   @elseif($booking->status == 'pending') #3A3A3A 
                                   @else #d63031 @endif;
                            font-size: 1rem;
                            border-radius: 10px;">
                            @if($booking->status == 'paid')
                                <i class="fas fa-check-circle me-2"></i>Оплачено
                            @elseif($booking->status == 'pending')
                                <i class="fas fa-clock me-2"></i>Ожидает оплаты
                            @else
                                <i class="fas fa-times-circle me-2"></i>Отменено
                            @endif
                        </span>
                    </div>
                    
                    <!-- Информация -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-4" style="background: #D6E4F0; border-radius: 15px;">
                                <h6 class="mb-3" style="color: #3A3A3A;">Контактная информация</h6>
                                <p class="mb-2"><strong>ФИО:</strong> {{ $booking->full_name }}</p>
                                <p class="mb-2"><strong>Телефон:</strong> {{ $booking->phone }}</p>
                                <p class="mb-0"><strong>Email:</strong> {{ $booking->user->email ?? 'Не указан' }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="p-4" style="background: #D6E4F0; border-radius: 15px;">
                                <h6 class="mb-3" style="color: #3A3A3A;">Детали бронирования</h6>
                                <p class="mb-2"><strong>Часов:</strong> {{ $booking->hours }}</p>
                                @if($booking->skate)
                                <p class="mb-2"><strong>Коньки:</strong> {{ $booking->skate->brand }} {{ $booking->skate->model }}</p>
                                <p class="mb-2"><strong>Размер:</strong> {{ $booking->skate_size }}</p>
                                @else
                                <p class="mb-2"><strong>Коньки:</strong> Свои</p>
                                @endif
                                <p class="mb-0"><strong>Дата:</strong> {{ $booking->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Стоимость -->
                    <div class="card mt-4" style="background: #D6E4F0; border: none; border-radius: 15px;">
                        <div class="card-body p-4">
                            <h6 class="mb-3" style="color: #3A3A3A;">Стоимость</h6>
                            <div class="row mb-2">
                                <div class="col-6">Входной билет:</div>
                                <div class="col-6 text-end">300 ₽</div>
                            </div>
                            @if($booking->skate)
                            <div class="row mb-2">
                                <div class="col-6">Аренда коньков ({{ $booking->hours }} ч.):</div>
                                <div class="col-6 text-end">{{ $booking->total_price - 300 }} ₽</div>
                            </div>
                            @endif
                            <hr style="border-color: #A2C0D4;">
                            <div class="row">
                                <div class="col-6 fw-bold">Итого:</div>
                                <div class="col-6 text-end fw-bold" style="color: #A2C0D4;">{{ $booking->total_price }} ₽</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Кнопки -->
                    <div class="d-flex gap-3 mt-5">
                        <a href="{{ route('home') }}" class="btn flex-fill py-3" 
                           style="background: none; border: 2px solid #A2C0D4; color: #3A3A3A; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-home me-2"></i>
                            На главную
                        </a>
                        
                        @if($booking->status == 'pending')
                        <a href="{{ route('payment.process', ['booking' => $booking->id]) }}" class="btn flex-fill py-3" 
                           style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-credit-card me-2"></i>
                            Оплатить
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection