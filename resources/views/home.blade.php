<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Ледовый каток Ice Arena - Главная')

@section('content')
<!-- Hero секция -->
<section class="hero-section position-relative" style="background: linear-gradient(135deg, #A2C0D4 0%, #D6E4F0 100%);">
    <div class="container py-5">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4" style="color: #3A3A3A;">
                    Добро пожаловать в <span style="color: #FFFFFF;">Ice Arena</span>
                </h1>
                <p class="lead mb-4" style="color: #3A3A3A; opacity: 0.9;">
                    Современный ледовый каток для всей семьи. Профессиональный лед, 
                    комфортные раздевалки, прокат коньков и уютное кафе.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('ticket.create') }}" class="btn btn-lg px-4" 
                       style="background: #3A3A3A; color: white; border-radius: 10px; padding: 12px 30px; transition: all 0.3s;">
                        <i class="fas fa-ticket-alt me-2"></i>
                        Купить билет
                    </a>
                    <a href="{{ route('booking.skates') }}" class="btn btn-lg px-4" 
                       style="background: white; color: #3A3A3A; border-radius: 10px; padding: 12px 30px; transition: all 0.3s;">
                        <i class="fas fa-skating me-2"></i>
                        Забронировать коньки
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400/A2C0D4/FFFFFF?text=Ice+Arena" 
                     alt="Ice Arena" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Преимущества -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Почему выбирают нас</h2>
        <div class="row g-4">
            <!-- Преимущество 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 text-center" 
                     style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); transition: all 0.3s;">
                    <div class="feature-icon mb-4 mx-auto" 
                         style="width: 80px; height: 80px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-ice-skate fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="mb-3" style="color: #3A3A3A; font-weight: 600;">Профессиональный лед</h5>
                    <p style="color: #3A3A3A; opacity: 0.8;">Качественный лед международного стандарта, ежедневная заливка и подготовка</p>
                </div>
            </div>
            
            <!-- Преимущество 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 text-center" 
                     style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); transition: all 0.3s;">
                    <div class="feature-icon mb-4 mx-auto" 
                         style="width: 80px; height: 80px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shield-alt fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="mb-3" style="color: #3A3A3A; font-weight: 600;">Безопасность</h5>
                    <p style="color: #3A3A3A; opacity: 0.8;">Медицинский контроль, страховка каждого посетителя, видеонаблюдение</p>
                </div>
            </div>
            
            <!-- Преимущество 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 p-4 text-center" 
                     style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2); transition: all 0.3s;">
                    <div class="feature-icon mb-4 mx-auto" 
                         style="width: 80px; height: 80px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-clock fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="mb-3" style="color: #3A3A3A; font-weight: 600;">Удобный график</h5>
                    <p style="color: #3A3A3A; opacity: 0.8;">Работаем без выходных с 9:00 до 23:00, утренние и вечерние сеансы</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Каталог коньков -->
@if(isset($skates) && $skates->count() > 0)
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Наши коньки</h2>
        <div class="row g-4">
            @foreach($skates as $skate)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 border-0" 
                     style="background: #FFFFFF; border-radius: 20px; overflow: hidden; transition: all 0.3s;">
                    @if($skate->image)
                        <img src="{{ Storage::url($skate->image) }}" class="card-img-top" alt="{{ $skate->model }}" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top d-flex align-items-center justify-content-center" 
                             style="height: 200px; background: #D6E4F0;">
                            <i class="fas fa-ice-skate fa-4x" style="color: #A2C0D4;"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <h5 class="card-title mb-2" style="color: #3A3A3A; font-weight: 600;">{{ $skate->brand }} {{ $skate->model }}</h5>
                        <p class="mb-2" style="color: #A2C0D4;">Размер: {{ $skate->size }}</p>
                        <p class="mb-3" style="color: #3A3A3A; font-weight: 700; font-size: 1.2rem;">{{ $skate->price_per_hour }} ₽/час</p>
                        <p class="mb-0"><small style="color: #3A3A3A; opacity: 0.7;">В наличии: {{ $skate->quantity }} шт.</small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Цены и тарифы -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Наши цены</h2>
        <div class="row justify-content-center g-4">
            <!-- Карточка билета -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 h-100" 
                     style="background: #FFFFFF; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 40px rgba(162,192,212,0.3);">
                    <div class="card-header text-center py-4" style="background: #A2C0D4; border: none;">
                        <h4 class="mb-0" style="color: #FFFFFF; font-weight: 600;">Входной билет</h4>
                    </div>
                    <div class="card-body p-5 text-center">
                        <div class="price-value mb-4">
                            <span class="display-1 fw-bold" style="color: #3A3A3A;">300</span>
                            <span style="color: #A2C0D4; font-size: 1.5rem;">₽</span>
                        </div>
                        <ul class="list-unstyled mb-5" style="color: #3A3A3A;">
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Вход на каток
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Раздевалка
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Медицинская страховка
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-times me-2" style="color: #A2C0D4;"></i>
                                Прокат коньков
                            </li>
                        </ul>
                        <a href="{{ route('ticket.create') }}" class="btn w-100 py-3" 
                           style="background: #A2C0D4; color: white; border-radius: 15px; font-weight: 600; transition: all 0.3s;">
                            Купить билет
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Карточка аренды -->
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 h-100" 
                     style="background: #FFFFFF; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 40px rgba(162,192,212,0.3);">
                    <div class="card-header text-center py-4" style="background: #3A3A3A; border: none;">
                        <h4 class="mb-0" style="color: #FFFFFF; font-weight: 600;">Аренда коньков</h4>
                    </div>
                    <div class="card-body p-5 text-center">
                        <div class="price-value mb-4">
                            <span class="display-1 fw-bold" style="color: #3A3A3A;">150</span>
                            <span style="color: #A2C0D4; font-size: 1.5rem;">₽/час</span>
                        </div>
                        <ul class="list-unstyled mb-5" style="color: #3A3A3A;">
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Профессиональные коньки
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Разные размеры (27-47)
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Заточка включена
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check me-2" style="color: #A2C0D4;"></i>
                                Можно прийти со своими
                            </li>
                        </ul>
                        <a href="{{ route('booking.skates') }}" class="btn w-100 py-3" 
                           style="background: #3A3A3A; color: white; border-radius: 15px; font-weight: 600; transition: all 0.3s;">
                            Забронировать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Расписание -->
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Расписание сеансов</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0" style="background: #FFFFFF; border-radius: 30px; overflow: hidden;">
                    <div class="card-body p-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr style="border-bottom: 2px solid #D6E4F0;">
                                        <th class="pb-3" style="color: #3A3A3A; font-weight: 600;">День</th>
                                        <th class="pb-3" style="color: #3A3A3A; font-weight: 600;">Утренний сеанс</th>
                                        <th class="pb-3" style="color: #3A3A3A; font-weight: 600;">Дневной сеанс</th>
                                        <th class="pb-3" style="color: #3A3A3A; font-weight: 600;">Вечерний сеанс</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3" style="color: #3A3A3A;">Понедельник - Пятница</td>
                                        <td class="py-3" style="color: #A2C0D4;">10:00 - 13:00</td>
                                        <td class="py-3" style="color: #A2C0D4;">14:00 - 17:00</td>
                                        <td class="py-3" style="color: #A2C0D4;">18:00 - 22:00</td>
                                    </tr>
                                    <tr style="border-top: 1px solid #D6E4F0;">
                                        <td class="py-3" style="color: #3A3A3A;">Суббота - Воскресенье</td>
                                        <td class="py-3" style="color: #A2C0D4;">09:00 - 12:00</td>
                                        <td class="py-3" style="color: #A2C0D4;">13:00 - 16:00</td>
                                        <td class="py-3" style="color: #A2C0D4;">17:00 - 23:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4">
                            <p style="color: #3A3A3A; opacity: 0.8;">
                                <i class="fas fa-info-circle me-2" style="color: #A2C0D4;"></i>
                                Продолжительность сеанса - 2 часа
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Отзывы -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Что говорят посетители</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 p-4" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-circle me-3" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-2x" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 class="mb-1" style="color: #3A3A3A; font-weight: 600;">Анна Смирнова</h6>
                            <div style="color: #A2C0D4;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p style="color: #3A3A3A; opacity: 0.8;">
                        "Отличный каток! Чистый лед, вежливый персонал, удобные раздевалки. 
                        Обязательно придем еще!"
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 p-4" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-circle me-3" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-2x" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 class="mb-1" style="color: #3A3A3A; font-weight: 600;">Михаил Петров</h6>
                            <div style="color: #A2C0D4;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p style="color: #3A3A3A; opacity: 0.8;">
                        "Хороший прокат коньков, большой выбор размеров. 
                        Удобное расположение, всегда есть свободные места."
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 p-4" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-circle me-3" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-user fa-2x" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 class="mb-1" style="color: #3A3A3A; font-weight: 600;">Елена Иванова</h6>
                            <div style="color: #A2C0D4;">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p style="color: #3A3A3A; opacity: 0.8;">
                        "Отличное место для семейного отдыха! Дети в восторге, 
                        есть инструкторы для начинающих. Рекомендую!"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Контакты и карта -->
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="mb-4" style="color: #3A3A3A; font-weight: 700;">Как нас найти</h2>
                <div class="card border-0 p-4" style="background: #FFFFFF; border-radius: 20px;">
                    <div class="d-flex mb-4">
                        <div class="me-3" style="width: 40px; height: 40px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-map-marker-alt" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 style="color: #3A3A3A; font-weight: 600;">Адрес</h6>
                            <p style="color: #3A3A3A; opacity: 0.8;">г. Москва, ул. Примерная, д. 123</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3" style="width: 40px; height: 40px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-phone" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 style="color: #3A3A3A; font-weight: 600;">Телефон</h6>
                            <p style="color: #3A3A3A; opacity: 0.8;">+7 (999) 123-45-67</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3" style="width: 40px; height: 40px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-envelope" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 style="color: #3A3A3A; font-weight: 600;">Email</h6>
                            <p style="color: #3A3A3A; opacity: 0.8;">info@icearena.ru</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="me-3" style="width: 40px; height: 40px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-clock" style="color: #A2C0D4;"></i>
                        </div>
                        <div>
                            <h6 style="color: #3A3A3A; font-weight: 600;">Режим работы</h6>
                            <p style="color: #3A3A3A; opacity: 0.8;">Пн-Пт: 10:00-22:00, Сб-Вс: 09:00-23:00</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0" style="background: #FFFFFF; border-radius: 20px; overflow: hidden; height: 400px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.372949437794!2d37.6189!3d55.7520!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTXCsDQ1JzA3LjIiTiAzN8KwMzcnMDguMCJF!5e0!3m2!1sru!2sru!4v1620000000000!5m2!1sru!2sru" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Добавляем стили для анимаций -->
@push('styles')
<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(162,192,212,0.4) !important;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(162,192,212,0.3);
    }
    .feature-icon {
        transition: transform 0.3s;
    }
    .card:hover .feature-icon {
        transform: scale(1.1);
    }
</style>
@endpush
@endsection