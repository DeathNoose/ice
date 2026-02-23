<!-- resources/views/booking/skates.blade.php -->
@extends('layouts.app')

@section('title', 'Бронирование коньков - Ice Arena')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div class="card-header py-4" style="background: #A2C0D4; border: none;">
                    <h4 class="mb-0 text-center" style="color: #FFFFFF;">
                        <i class="fas fa-skating me-2"></i>
                        Бронирование коньков
                    </h4>
                </div>
                
                <div class="card-body p-5">
                    <!-- Информация о ценах -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="p-4 text-center" style="background: #D6E4F0; border-radius: 15px;">
                                <div class="h5 mb-2" style="color: #3A3A3A;">Входной билет</div>
                                <div class="display-6 fw-bold" style="color: #A2C0D4;">300 ₽</div>
                                <small class="text-muted">фиксированная стоимость</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 text-center" style="background: #D6E4F0; border-radius: 15px;">
                                <div class="h5 mb-2" style="color: #3A3A3A;">Аренда коньков</div>
                                <div class="display-6 fw-bold" style="color: #A2C0D4;">150 ₽/час</div>
                                <small class="text-muted">можно прийти со своими</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Форма бронирования -->
                    <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                        @csrf
                        
                        <!-- Контактная информация -->
                        <h5 class="mb-4" style="color: #3A3A3A;">1. Контактная информация</h5>
                        
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label for="full_name" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                    ФИО *
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #A2C0D4;"></i>
                                    <input type="text" 
                                           class="form-control @error('full_name') is-invalid @enderror" 
                                           id="full_name" 
                                           name="full_name" 
                                           value="{{ old('full_name', auth()->user()->name ?? '') }}"
                                           placeholder="Иванов Иван Иванович"
                                           required
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px 15px 12px 45px;">
                                </div>
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                    Телефон *
                                </label>
                                <div class="input-wrapper">
                                    <i class="fas fa-phone input-icon" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #A2C0D4;"></i>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                           placeholder="+7 (___) ___-__-__"
                                           required
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px 15px 12px 45px;">
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Детали бронирования -->
                        <h5 class="mb-4" style="color: #3A3A3A;">2. Детали бронирования</h5>
                        
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <label for="hours" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                    Количество часов *
                                </label>
                                <select class="form-select @error('hours') is-invalid @enderror" 
                                        id="hours" 
                                        name="hours" 
                                        required
                                        style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                    <option value="">Выберите количество часов</option>
                                    <option value="1" {{ old('hours') == '1' ? 'selected' : '' }}>1 час</option>
                                    <option value="2" {{ old('hours') == '2' ? 'selected' : '' }}>2 часа</option>
                                    <option value="3" {{ old('hours') == '3' ? 'selected' : '' }}>3 часа</option>
                                    <option value="4" {{ old('hours') == '4' ? 'selected' : '' }}>4 часа</option>
                                </select>
                                @error('hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label d-block" style="color: #3A3A3A; font-weight: 500;">
                                    Аренда коньков
                                </label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" 
                                           id="need_skates" 
                                           name="need_skates" 
                                           value="1"
                                           {{ old('need_skates') ? 'checked' : '' }}
                                           style="width: 50px; height: 25px; cursor: pointer;">
                                    <label class="form-check-label ms-2" for="need_skates" style="color: #3A3A3A; cursor: pointer;">
                                        Мне нужны коньки
                                    </label>
                                </div>
                                <small class="text-muted">Если не выбрано - вы приходите со своими коньками</small>
                            </div>
                        </div>
                        
                        <!-- Выбор коньков (появляется если нужны коньки) -->
                        <div id="skatesSection" style="display: {{ old('need_skates') ? 'block' : 'none' }};">
                            <h5 class="mb-4" style="color: #3A3A3A;">3. Выбор коньков</h5>
                            
                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label for="skate_id" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                        Модель коньков
                                    </label>
                                    <select class="form-select @error('skate_id') is-invalid @enderror" 
                                            id="skate_id" 
                                            name="skate_id"
                                            style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                        <option value="">Выберите модель</option>
                                        @foreach($skates as $skate)
                                            <option value="{{ $skate->id }}" 
                                                    data-price="{{ $skate->price_per_hour }}"
                                                    data-sizes='@json([$skate->size])'
                                                    {{ old('skate_id') == $skate->id ? 'selected' : '' }}>
                                                {{ $skate->brand }} {{ $skate->model }} (размер {{ $skate->size }}) - {{ $skate->price_per_hour }} ₽/час
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('skate_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="skate_size" class="form-label" style="color: #3A3A3A; font-weight: 500;">
                                        Размер
                                    </label>
                                    <select class="form-select @error('skate_size') is-invalid @enderror" 
                                            id="skate_size" 
                                            name="skate_size"
                                            style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                        <option value="">Сначала выберите модель</option>
                                    </select>
                                    @error('skate_size')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Итого -->
                        <div class="card mb-5" style="background: #D6E4F0; border: none; border-radius: 15px;">
                            <div class="card-body p-4">
                                <h5 class="mb-4" style="color: #3A3A3A;">4. Итого к оплате</h5>
                                
                                <div class="row mb-3">
                                    <div class="col-6" style="color: #3A3A3A;">Входной билет:</div>
                                    <div class="col-6 text-end fw-bold" style="color: #3A3A3A;" id="ticketPrice">300 ₽</div>
                                </div>
                                
                                <div class="row mb-3" id="skatesCostRow" style="display: none;">
                                    <div class="col-6" style="color: #3A3A3A;">Аренда коньков:</div>
                                    <div class="col-6 text-end fw-bold" style="color: #3A3A3A;" id="skatesCost">0 ₽</div>
                                </div>
                                
                                <hr style="border-color: #A2C0D4;">
                                
                                <div class="row">
                                    <div class="col-6" style="color: #3A3A3A; font-weight: 600;">Итого:</div>
                                    <div class="col-6 text-end fw-bold" style="color: #A2C0D4; font-size: 1.3rem;" id="totalPrice">300 ₽</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Кнопка отправки -->
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
                            Нажимая "Перейти к оплате", вы соглашаетесь с условиями бронирования
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
        
        // Элементы формы
        const needSkatesCheckbox = document.getElementById('need_skates');
        const skatesSection = document.getElementById('skatesSection');
        const skateSelect = document.getElementById('skate_id');
        const sizeSelect = document.getElementById('skate_size');
        const hoursSelect = document.getElementById('hours');
        const skatesCostRow = document.getElementById('skatesCostRow');
        const skatesCostSpan = document.getElementById('skatesCost');
        const totalPriceSpan = document.getElementById('totalPrice');
        
        // Показывать/скрывать секцию коньков
        needSkatesCheckbox.addEventListener('change', function() {
            if (this.checked) {
                skatesSection.style.display = 'block';
            } else {
                skatesSection.style.display = 'none';
                skateSelect.value = '';
                updateSizeSelect([]);
            }
            calculateTotal();
        });
        
        // Обновление размеров при выборе модели
        skateSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption && selectedOption.value) {
                const sizes = JSON.parse(selectedOption.dataset.sizes || '[]');
                updateSizeSelect(sizes);
            } else {
                updateSizeSelect([]);
            }
            calculateTotal();
        });
        
        // Обновление select с размерами
        function updateSizeSelect(sizes) {
            if (sizes.length > 0) {
                sizeSelect.disabled = false;
                sizeSelect.innerHTML = '<option value="">Выберите размер</option>' +
                    sizes.map(size => `<option value="${size}">${size}</option>`).join('');
            } else {
                sizeSelect.disabled = true;
                sizeSelect.innerHTML = '<option value="">Сначала выберите модель</option>';
            }
        }
        
        // Расчет стоимости
        function calculateTotal() {
            const hours = parseInt(hoursSelect.value) || 1;
            const needSkates = needSkatesCheckbox.checked;
            const ticketPrice = 300;
            
            let skatesPrice = 0;
            
            if (needSkates && skateSelect.value) {
                const selectedOption = skateSelect.options[skateSelect.selectedIndex];
                const pricePerHour = parseFloat(selectedOption.dataset.price || 150);
                skatesPrice = pricePerHour * hours;
                skatesCostRow.style.display = 'flex';
                skatesCostSpan.textContent = skatesPrice.toFixed(0) + ' ₽';
            } else {
                skatesCostRow.style.display = 'none';
                skatesCostSpan.textContent = '0 ₽';
            }
            
            const total = ticketPrice + skatesPrice;
            totalPriceSpan.textContent = total.toFixed(0) + ' ₽';
        }
        
        // Слушатели изменений
        hoursSelect.addEventListener('change', calculateTotal);
        skateSelect.addEventListener('change', calculateTotal);
        
        // Валидация формы
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            const needSkates = needSkatesCheckbox.checked;
            
            if (needSkates) {
                if (!skateSelect.value) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите модель коньков');
                    return false;
                }
                
                if (!sizeSelect.value) {
                    e.preventDefault();
                    alert('Пожалуйста, выберите размер коньков');
                    return false;
                }
            }
            
            return true;
        });
        
        // Устанавливаем начальное состояние для старой даты
        if (needSkatesCheckbox.checked && skateSelect.value) {
            const selectedOption = skateSelect.options[skateSelect.selectedIndex];
            if (selectedOption && selectedOption.dataset.sizes) {
                const sizes = JSON.parse(selectedOption.dataset.sizes);
                updateSizeSelect(sizes);
                sizeSelect.value = '{{ old('skate_size') }}';
            }
            calculateTotal();
        }
    });
</script>
@endpush

@push('styles')
<style>
    .form-switch .form-check-input {
        background-color: #D6E4F0;
        border-color: #A2C0D4;
    }
    
    .form-switch .form-check-input:checked {
        background-color: #A2C0D4;
        border-color: #A2C0D4;
    }
    
    .form-switch .form-check-input:focus {
        border-color: #A2C0D4;
        box-shadow: 0 0 0 0.25rem rgba(162, 192, 212, 0.25);
    }
    
    .input-wrapper {
        position: relative;
    }
</style>
@endpush
@endsection