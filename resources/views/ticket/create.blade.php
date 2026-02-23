<!-- resources/views/ticket/create.blade.php -->
@extends('layouts.app')

@section('title', 'Покупка билета - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-ticket-alt me-2"></i>
                        Покупка входного билета
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    <!-- Информация о цене -->
                    <div class="text-center mb-5">
                        <div class="display-1 fw-bold" style="color: #3A3A3A;">300</div>
                        <div class="h4" style="color: #A2C0D4;">рублей</div>
                        <p class="text-muted">Входной билет на каток</p>
                    </div>
                    
                    <!-- Форма -->
                    <form action="{{ route('ticket.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="full_name" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                ФИО *
                            </label>
                            <input type="text" 
                                   class="form-control @error('full_name') is-invalid @enderror" 
                                   id="full_name" 
                                   name="full_name" 
                                   value="{{ old('full_name', auth()->user()->name ?? '') }}"
                                   placeholder="Иванов Иван Иванович"
                                   required
                                   style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                Email
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', auth()->user()->email ?? '') }}"
                                   placeholder="example@mail.com"
                                   style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-5">
                            <label for="phone" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                Телефон *
                            </label>
                            <input type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                   placeholder="+7 (___) ___-__-__"
                                   required
                                   style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn py-3" 
                                    style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-arrow-right me-2"></i>
                                Перейти к оплате
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted">
                            <i class="fas fa-info-circle me-1" style="color: #A2C0D4;"></i>
                            После оплаты вы получите билет на email
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://unpkg.com/imask"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Маска для телефона
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            IMask(phoneInput, {
                mask: '+{7} (000) 000-00-00'
            });
        }
    });
</script>
@endpush
@endsection