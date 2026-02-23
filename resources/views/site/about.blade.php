<!-- resources/views/site/about.blade.php -->
@extends('layouts.app')

@section('title', 'О нас - Ice Arena')

@section('content')
<!-- Hero секция -->
<section class="py-5" style="background: linear-gradient(135deg, #A2C0D4 0%, #D6E4F0 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4" style="color: #3A3A3A;">
                    О ледовом катке <span style="color: #FFFFFF;">Ice Arena</span>
                </h1>
                <p class="lead mb-4" style="color: #3A3A3A; opacity: 0.9;">
                    Мы создаем идеальные условия для активного отдыха и занятий спортом с 2015 года.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://avatars.mds.yandex.net/i?id=315bbb66cb653ec6c85e5130f85ba7f0_l-3675323-images-thumbs&n=13" 
                     alt="Ice Arena History" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Наша история -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Наша история</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="timeline">
                    <!-- 2015 -->
                    <div class="timeline-item mb-5">
                        <div class="d-flex">
                            <div class="timeline-year me-4" style="min-width: 100px;">
                                <span class="badge py-3 px-4" style="background: #A2C0D4; color: white; font-size: 1.2rem;">2015</span>
                            </div>
                            <div class="timeline-content">
                                <h5 style="color: #3A3A3A;">Открытие катка</h5>
                                <p style="color: #3A3A3A; opacity: 0.8;">Ледовый каток Ice Arena распахнул свои двери для посетителей. Первый сезон приняли более 50 000 гостей.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2017 -->
                    <div class="timeline-item mb-5">
                        <div class="d-flex">
                            <div class="timeline-year me-4" style="min-width: 100px;">
                                <span class="badge py-3 px-4" style="background: #A2C0D4; color: white; font-size: 1.2rem;">2017</span>
                            </div>
                            <div class="timeline-content">
                                <h5 style="color: #3A3A3A;">Реконструкция</h5>
                                <p style="color: #3A3A3A; opacity: 0.8;">Проведена масштабная реконструкция: обновлено ледовое покрытие, раздевалки, установлена современная система вентиляции.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2019 -->
                    <div class="timeline-item mb-5">
                        <div class="d-flex">
                            <div class="timeline-year me-4" style="min-width: 100px;">
                                <span class="badge py-3 px-4" style="background: #A2C0D4; color: white; font-size: 1.2rem;">2019</span>
                            </div>
                            <div class="timeline-content">
                                <h5 style="color: #3A3A3A;">Школа фигурного катания</h5>
                                <p style="color: #3A3A3A; opacity: 0.8;">Открытие детской школы фигурного катания. Более 200 детей занимаются с профессиональными тренерами.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2022 -->
                    <div class="timeline-item mb-5">
                        <div class="d-flex">
                            <div class="timeline-year me-4" style="min-width: 100px;">
                                <span class="badge py-3 px-4" style="background: #A2C0D4; color: white; font-size: 1.2rem;">2022</span>
                            </div>
                            <div class="timeline-content">
                                <h5 style="color: #3A3A3A;">Хоккейная команда</h5>
                                <p style="color: #3A3A3A; opacity: 0.8;">Создание любительской хоккейной лиги. Теперь проводятся регулярные турниры между командами.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2024 -->
                    <div class="timeline-item">
                        <div class="d-flex">
                            <div class="timeline-year me-4" style="min-width: 100px;">
                                <span class="badge py-3 px-4" style="background: #A2C0D4; color: white; font-size: 1.2rem;">2024</span>
                            </div>
                            <div class="timeline-content">
                                <h5 style="color: #3A3A3A;">Сегодня</h5>
                                <p style="color: #3A3A3A; opacity: 0.8;">Ice Arena - современный спортивный комплекс с кафе, прокатом и профессиональной школой. Более 1 млн посетителей за все время.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Наши преимущества -->
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Почему выбирают нас</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 p-4 h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="text-center mb-4">
                        <i class="fas fa-ice-skate fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="text-center mb-3" style="color: #3A3A3A;">Профессиональный лед</h5>
                    <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">Лед международного стандарта, ежедневная заливка и подготовка. Идеальное скольжение для любого уровня катания.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 p-4 h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="text-center mb-4">
                        <i class="fas fa-users fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="text-center mb-3" style="color: #3A3A3A;">Команда профессионалов</h5>
                    <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">Опытные тренеры, инструкторы и персонал. Забота о каждом посетителе, помощь новичкам.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 p-4 h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="text-center mb-4">
                        <i class="fas fa-medal fa-3x" style="color: #A2C0D4;"></i>
                    </div>
                    <h5 class="text-center mb-3" style="color: #3A3A3A;">Качество услуг</h5>
                    <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">Современное оборудование, качественный прокат, уютное кафе. Все для комфортного отдыха.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Наши цифры -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">В цифрах</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-3 fw-bold" style="color: #A2C0D4;">8+</div>
                    <p style="color: #3A3A3A;">лет работы</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-3 fw-bold" style="color: #A2C0D4;">1M+</div>
                    <p style="color: #3A3A3A;">посетителей</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-3 fw-bold" style="color: #A2C0D4;">50+</div>
                    <p style="color: #3A3A3A;">турниров</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="display-3 fw-bold" style="color: #A2C0D4;">200+</div>
                    <p style="color: #3A3A3A;">детей в школе</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection