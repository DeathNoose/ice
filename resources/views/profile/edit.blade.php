<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Мой профиль')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: linear-gradient(135deg, #A2C0D4 0%, #D6E4F0 100%);">
                    <h4 class="mb-0 text-center" style="color: #3A3A3A;">
                        <i class="fas fa-user-circle me-2"></i>
                        Мой профиль
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <!-- Информация о пользователе -->
                    <div class="text-center mb-5">
                        <div class="avatar-circle mx-auto mb-3" 
                             style="width: 100px; height: 100px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-3x" style="color: #A2C0D4;"></i>
                        </div>
                        <h5 style="color: #3A3A3A;">{{ auth()->user()->name }}</h5>
                        <p style="color: #A2C0D4;">{{ auth()->user()->email }}</p>
                    </div>
                    
                    <!-- Форма редактирования -->
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="color: #3A3A3A; font-weight: 500;">Имя</label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', auth()->user()->name) }}"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="color: #3A3A3A; font-weight: 500;">Email</label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', auth()->user()->email) }}"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone" style="color: #3A3A3A; font-weight: 500;">Телефон</label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone', auth()->user()->phone) }}"
                                           placeholder="+7 (___) ___-__-__"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn px-5 py-3" 
                                        style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                    <i class="fas fa-save me-2"></i>
                                    Сохранить изменения
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <hr class="my-5" style="border-color: #D6E4F0;">
                    
                    <!-- Смена пароля -->
                    <h5 class="mb-4" style="color: #3A3A3A;">Смена пароля</h5>
                    
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="current_password" style="color: #3A3A3A; font-weight: 500;">Текущий пароль</label>
                                    <input type="password" 
                                           class="form-control @error('current_password') is-invalid @enderror" 
                                           id="current_password" 
                                           name="current_password"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="new_password" style="color: #3A3A3A; font-weight: 500;">Новый пароль</label>
                                    <input type="password" 
                                           class="form-control @error('new_password') is-invalid @enderror" 
                                           id="new_password" 
                                           name="new_password"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    @error('new_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="new_password_confirmation" style="color: #3A3A3A; font-weight: 500;">Подтверждение</label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="new_password_confirmation" 
                                           name="new_password_confirmation"
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                </div>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn px-5 py-3" 
                                        style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                    <i class="fas fa-key me-2"></i>
                                    Изменить пароль
                                </button>
                            </div>
                        </div>
                    </form>
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