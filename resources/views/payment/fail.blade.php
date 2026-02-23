<!-- resources/views/payment/fail.blade.php -->
@extends('layouts.app')

@section('title', 'Оплата не удалась - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-body p-5 text-center">
                    <!-- Иконка ошибки -->
                    <div class="fail-icon mb-4 mx-auto" 
                         style="width: 100px; height: 100px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-times-circle fa-4x" style="color: #A2C0D4;"></i>
                    </div>
                    
                    <h2 class="mb-3" style="color: #3A3A3A;">Оплата не удалась</h2>
                    <p class="text-muted mb-4">
                        К сожалению, произошла ошибка при обработке платежа. 
                        Пожалуйста, попробуйте еще раз или используйте другой способ оплаты.
                    </p>
                    
                    <div class="card mb-4" style="background: #D6E4F0; border: none; border-radius: 15px;">
                        <div class="card-body p-4">
                            <h5 class="mb-3" style="color: #3A3A3A;">Возможные причины:</h5>
                            <ul class="text-start mb-0" style="color: #3A3A3A;">
                                <li class="mb-2">Недостаточно средств на карте</li>
                                <li class="mb-2">Неверно введены данные карты</li>
                                <li class="mb-2">Технические проблемы на стороне банка</li>
                                <li class="mb-2">Истек срок действия карты</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-3">
                        <a href="javascript:history.back()" class="btn py-3" 
                           style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                            <i class="fas fa-redo me-2"></i>
                            Попробовать снова
                        </a>
                        
                        <a href="{{ route('home') }}" class="btn py-2" 
                           style="background: none; border: 2px solid #A2C0D4; color: #3A3A3A; border-radius: 10px; font-weight: 500; transition: all 0.3s;">
                            <i class="fas fa-home me-2"></i>
                            На главную
                        </a>
                    </div>
                    
                    <div class="mt-4">
                        <p class="small text-muted">
                            Если проблема повторяется, обратитесь в службу поддержки:
                            <br>
                            <a href="mailto:support@icearena.ru" style="color: #A2C0D4;">support@icearena.ru</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .fail-icon {
        animation: shake 0.5s ease;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
</style>
@endpush
@endsection