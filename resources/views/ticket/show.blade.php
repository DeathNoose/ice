<!-- resources/views/ticket/show.blade.php -->
@extends('layouts.app')

@section('title', 'Мой билет - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-ticket-alt me-2"></i>
                        Ваш билет #{{ $ticket->id }}
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    <!-- Статус -->
                    <div class="text-center mb-5">
                        @if($ticket->status == 'paid')
                            <span class="badge-paid" style="padding: 12px 30px; font-size: 1.1rem;">
                                <i class="fas fa-check-circle me-2"></i>Билет оплачен
                            </span>
                        @elseif($ticket->status == 'used')
                            <span class="badge-used" style="padding: 12px 30px; font-size: 1.1rem;">
                                <i class="fas fa-check-double me-2"></i>Билет использован
                            </span>
                        @else
                            <span class="badge-pending" style="padding: 12px 30px; font-size: 1.1rem;">
                                <i class="fas fa-clock me-2"></i>Ожидает оплаты
                            </span>
                        @endif
                    </div>
                    
                    <div class="row">
                        <!-- Информация о билете -->
                        <div class="col-md-6">
                            <div class="p-4" style="background: #D6E4F0; border-radius: 15px;">
                                <h5 class="mb-4" style="color: #3A3A3A;">Информация о билете</h5>
                                
                                <p class="mb-3">
                                    <strong>ФИО:</strong><br>
                                    {{ $ticket->full_name }}
                                </p>
                                
                                <p class="mb-3">
                                    <strong>Email:</strong><br>
                                    {{ $ticket->email ?? 'Не указан' }}
                                </p>
                                
                                <p class="mb-3">
                                    <strong>Телефон:</strong><br>
                                    {{ $ticket->phone }}
                                </p>
                                
                                <p class="mb-3">
                                    <strong>Дата покупки:</strong><br>
                                    {{ $ticket->created_at->format('d.m.Y H:i') }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- QR-код -->
                        <div class="col-md-6">
                            <div class="p-4 text-center" style="background: #D6E4F0; border-radius: 15px;">
                                <h5 class="mb-4" style="color: #3A3A3A;">QR-код для входа</h5>
                                
                                <div style="display: inline-block; padding: 20px; background: white; border-radius: 15px;">
                                    {!! QrCode::size(180)->generate(route('ticket.show', $ticket->id)) !!}
                                </div>
                                
                                <p class="mt-3 text-muted">
                                    Покажите этот код на входе
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Цена -->
                    <div class="mt-4 p-4 text-center" style="background: #D6E4F0; border-radius: 15px;">
                        <p class="mb-2" style="color: #3A3A3A;">Стоимость билета</p>
                        <p class="display-6 fw-bold" style="color: #A2C0D4;">{{ number_format($ticket->price, 0, '.', ' ') }} ₽</p>
                    </div>
                    
                    <!-- Кнопки -->
                    <div class="d-flex gap-3 mt-5">
                        <a href="{{ route('home') }}" class="btn flex-fill py-3" 
                           style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; font-weight: 600;">
                            <i class="fas fa-home me-2"></i>
                            На главную
                        </a>
                        
                        @if($ticket->status == 'pending')
                        <a href="{{ route('payment.process', ['ticket' => $ticket->id]) }}" class="btn flex-fill py-3" 
                           style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600;">
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

@push('styles')
<style>
    .badge-paid {
        background: #A2C0D4;
        color: white;
        border-radius: 10px;
    }
    .badge-used {
        background: #cce5ff;
        color: #004085;
        border-radius: 10px;
    }
    .badge-pending {
        background: #D6E4F0;
        color: #3A3A3A;
        border-radius: 10px;
    }
</style>
@endpush
@endsection