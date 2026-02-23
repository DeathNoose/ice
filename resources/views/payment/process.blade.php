<!-- resources/views/payment/process.blade.php -->
@extends('layouts.app')

@section('title', 'Оплата - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-credit-card me-2"></i>
                        Оплата заказа
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    <!-- Информация о заказе -->
                    <div class="text-center mb-5">
                        <div class="display-1 fw-bold" style="color: #3A3A3A;">
                            {{ number_format($item->total_price ?? $item->price ?? 300, 0, '.', ' ') }}
                        </div>
                        <div class="h4" style="color: #A2C0D4;">рублей</div>
                        
                        @if($type == 'ticket')
                            <p class="text-muted mt-3">
                                <i class="fas fa-ticket-alt me-2" style="color: #A2C0D4;"></i>
                                Входной билет на каток
                            </p>
                        @else
                            <p class="text-muted mt-3">
                                <i class="fas fa-skating me-2" style="color: #A2C0D4;"></i>
                                Бронирование коньков ({{ $item->hours }} ч.)
                            </p>
                        @endif
                    </div>
                    
                    <!-- Детали заказа -->
                    <div class="card mb-5" style="background: #D6E4F0; border: none; border-radius: 15px;">
                        <div class="card-body p-4">
                            <h5 class="mb-4" style="color: #3A3A3A;">Детали заказа</h5>
                            
                            <div class="row mb-3">
                                <div class="col-6" style="color: #3A3A3A;">ФИО:</div>
                                <div class="col-6 text-end fw-bold" style="color: #3A3A3A;">{{ $item->full_name }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-6" style="color: #3A3A3A;">Телефон:</div>
                                <div class="col-6 text-end fw-bold" style="color: #3A3A3A;">{{ $item->phone }}</div>
                            </div>
                            
                            @if($type == 'booking')
                                <div class="row mb-3">
                                    <div class="col-6" style="color: #3A3A3A;">Количество часов:</div>
                                    <div class="col-6 text-end fw-bold" style="color: #3A3A3A;">{{ $item->hours }}</div>
                                </div>
                                
                                @if($item->skate_id)
                                <div class="row mb-3">
                                    <div class="col-6" style="color: #3A3A3A;">Аренда коньков:</div>
                                    <div class="col-6 text-end fw-bold" style="color: #3A3A3A;">{{ $item->skate->brand ?? 'Коньки' }} (размер {{ $item->skate_size }})</div>
                                </div>
                                @endif
                            @endif
                            
                            <hr style="border-color: #A2C0D4;">
                            
                            <div class="row">
                                <div class="col-6" style="color: #3A3A3A; font-weight: 600;">Итого к оплате:</div>
                                <div class="col-6 text-end fw-bold" style="color: #A2C0D4; font-size: 1.2rem;">
                                    {{ number_format($item->total_price ?? $item->price ?? 300, 0, '.', ' ') }} ₽
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Способ оплаты -->
                    <div class="mb-5">
                        <h5 class="mb-4" style="color: #3A3A3A;">Способ оплаты</h5>
                        
                        <div class="payment-methods">
                            <!-- Банковская карта -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="card" checked>
                                <label class="form-check-label d-flex align-items-center" for="card">
                                    <i class="fas fa-credit-card me-3" style="color: #A2C0D4; font-size: 1.2rem;"></i>
                                    <div>
                                        <strong style="color: #3A3A3A;">Банковская карта</strong>
                                        <p class="small text-muted mb-0">Visa, MasterCard, МИР</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- ЮMoney -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="yoomoney">
                                <label class="form-check-label d-flex align-items-center" for="yoomoney">
                                    <i class="fas fa-wallet me-3" style="color: #A2C0D4; font-size: 1.2rem;"></i>
                                    <div>
                                        <strong style="color: #3A3A3A;">ЮMoney</strong>
                                        <p class="small text-muted mb-0">Электронный кошелек</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- SBP -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="sbp">
                                <label class="form-check-label d-flex align-items-center" for="sbp">
                                    <i class="fas fa-qrcode me-3" style="color: #A2C0D4; font-size: 1.2rem;"></i>
                                    <div>
                                        <strong style="color: #3A3A3A;">СБП</strong>
                                        <p class="small text-muted mb-0">Система быстрых платежей</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Кнопка оплаты -->
                    <div class="d-grid gap-3">
                        <button type="button" class="btn py-3" id="payButton"
                                style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-lock me-2"></i>
                            Оплатить {{ number_format($item->total_price ?? $item->price ?? 300, 0, '.', ' ') }} ₽
                        </button>
                        
                        <a href="{{ route('home') }}" class="btn py-2" 
                           style="background: none; border: 2px solid #A2C0D4; color: #3A3A3A; border-radius: 10px; font-weight: 500; transition: all 0.3s;">
                            <i class="fas fa-arrow-left me-2"></i>
                            Вернуться на главную
                        </a>
                    </div>
                    
                    <!-- Безопасность -->
                    <div class="text-center mt-4">
                        <p class="small text-muted">
                            <i class="fas fa-shield-alt me-1" style="color: #A2C0D4;"></i>
                            Все платежи защищены. Мы не храним данные ваших карт.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('payButton');
        
        payButton.addEventListener('click', function() {
            // Здесь будет интеграция с платежной системой
            // Пока просто покажем уведомление
            alert('В демо-режиме оплата не производится. Нажмите ОК для имитации успешной оплаты.');
            window.location.href = '{{ route("payment.success") }}?paymentId=demo_' + Date.now();
        });
    });
</script>
@endpush

@push('styles')
<style>
    .form-check-input:checked {
        background-color: #A2C0D4;
        border-color: #A2C0D4;
    }
    
    .form-check-input:focus {
        border-color: #A2C0D4;
        box-shadow: 0 0 0 0.25rem rgba(162, 192, 212, 0.25);
    }
    
    .form-check-label {
        cursor: pointer;
        padding: 10px;
        border-radius: 10px;
        transition: background 0.3s;
    }
    
    .form-check-label:hover {
        background: #D6E4F0;
    }
</style>
@endpush
@endsection