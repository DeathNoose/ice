<!-- resources/views/payment/success.blade.php -->
@extends('layouts.app')

@section('title', 'Оплата успешна - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-body p-5 text-center">
                    <!-- Иконка успеха -->
                    <div class="success-icon mb-4 mx-auto" 
                         style="width: 100px; height: 100px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-circle fa-4x" style="color: #A2C0D4;"></i>
                    </div>
                    
                    <h2 class="mb-3" style="color: #3A3A3A;">Оплата прошла успешно!</h2>
                    <p class="text-muted mb-4">
                        Спасибо за покупку. Ваш заказ оплачен и принят в обработку.
                    </p>
                    
                    <div class="card mb-4" style="background: #D6E4F0; border: none; border-radius: 15px;">
                        <div class="card-body p-4">
                            <h5 class="mb-3" style="color: #3A3A3A;">Детали платежа</h5>
                            <p class="mb-2">
                                <strong>Номер платежа:</strong> 
                                <span style="color: #A2C0D4;">{{ request()->get('paymentId', 'DEMO_' . rand(100000, 999999)) }}</span>
                            </p>
                            <p class="mb-2">
                                <strong>Дата:</strong> 
                                <span style="color: #A2C0D4;">{{ now()->format('d.m.Y H:i') }}</span>
                            </p>
                            <p class="mb-0">
                                <strong>Статус:</strong> 
                                <span class="badge" style="background: #A2C0D4; color: white;">Оплачено</span>
                            </p>
                        </div>
                    </div>
                    
                    <div class="alert" style="background: #D6E4F0; border: none; color: #3A3A3A;">
                        <i class="fas fa-envelope me-2" style="color: #A2C0D4;"></i>
                        Детали заказа отправлены на ваш email
                    </div>
                    
                    <div class="d-grid gap-3">
                        <a href="{{ route('home') }}" class="btn py-3" 
                           style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-home me-2"></i>
                            На главную
                        </a>
                        
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="btn py-2" 
                                   style="background: none; border: 2px solid #A2C0D4; color: #3A3A3A; border-radius: 10px; font-weight: 500; transition: all 0.3s;">
                                    <i class="fas fa-cog me-2"></i>
                                    В админ-панель
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .success-icon {
        animation: scaleIn 0.5s ease;
    }
    
    @keyframes scaleIn {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }
</style>
@endpush
@endsection