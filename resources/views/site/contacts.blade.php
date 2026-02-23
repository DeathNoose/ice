<!-- resources/views/site/contacts.blade.php -->
@extends('layouts.app')

@section('title', 'Контакты - Ice Arena')

@section('content')
<!-- Hero секция -->
<section class="py-5" style="background: linear-gradient(135deg, #A2C0D4 0%, #D6E4F0 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4" style="color: #3A3A3A;">
                    Контактная <span style="color: #FFFFFF;">информация</span>
                </h1>
                <p class="lead mb-4" style="color: #3A3A3A; opacity: 0.9;">
                    Мы всегда рады ответить на ваши вопросы и помочь с выбором.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://avatars.mds.yandex.net/i?id=315bbb66cb653ec6c85e5130f85ba7f0_l-3675323-images-thumbs&n=13" 
                     alt="Contacts" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Контакты -->
<section class="py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 h-100" style="background: #FFFFFF; border-radius: 20px; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div class="card-body p-5">
                        <h3 class="mb-4" style="color: #3A3A3A;">Как нас найти</h3>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3" style="width: 50px; height: 50px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-map-marker-alt fa-lg" style="color: #A2C0D4;"></i>
                            </div>
                            <div>
                                <h6 style="color: #3A3A3A; font-weight: 600;">Адрес</h6>
                                <p style="color: #3A3A3A; opacity: 0.8;">г. Москва, ул. Примерная, д. 123</p>
                                <p style="color: #3A3A3A; opacity: 0.8;">м. Спортивная, выход №3</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3" style="width: 50px; height: 50px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-phone fa-lg" style="color: #A2C0D4;"></i>
                            </div>
                            <div>
                                <h6 style="color: #3A3A3A; font-weight: 600;">Телефон</h6>
                                <p style="color: #3A3A3A; opacity: 0.8;">+7 (999) 123-45-67</p>
                                <p style="color: #3A3A3A; opacity: 0.8;">+7 (999) 765-43-21 (бронирование)</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="me-3" style="width: 50px; height: 50px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-envelope fa-lg" style="color: #A2C0D4;"></i>
                            </div>
                            <div>
                                <h6 style="color: #3A3A3A; font-weight: 600;">Email</h6>
                                <p style="color: #3A3A3A; opacity: 0.8;">info@icearena.ru</p>
                                <p style="color: #3A3A3A; opacity: 0.8;">booking@icearena.ru (бронирование)</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="me-3" style="width: 50px; height: 50px; background: #D6E4F0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock fa-lg" style="color: #A2C0D4;"></i>
                            </div>
                            <div>
                                <h6 style="color: #3A3A3A; font-weight: 600;">Режим работы</h6>
                                <p style="color: #3A3A3A; opacity: 0.8;">Пн-Пт: 10:00 - 22:00</p>
                                <p style="color: #3A3A3A; opacity: 0.8;">Сб-Вс: 09:00 - 23:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card border-0 h-100" style="background: #FFFFFF; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(162,192,212,0.2);">
                    <div style="height: 100%; min-height: 400px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.372949437794!2d37.6189!3d55.7520!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTXCsDQ1JzA3LjIiTiAzN8KwMzcnMDguMCJF!5e0!3m2!1sru!2sru!4v1620000000000!5m2!1sru!2sru" 
                            width="100%" 
                            height="100%" 
                            style="border:0; min-height: 400px;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Форма обратной связи -->
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0" style="background: #FFFFFF; border-radius: 20px;">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4" style="color: #3A3A3A;">Напишите нам</h3>
                        
                        <form action="#" method="POST">
                            @csrf
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label" style="color: #3A3A3A;">Ваше имя</label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label" style="color: #3A3A3A;">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                </div>
                                
                                <div class="col-12">
                                    <label for="subject" class="form-label" style="color: #3A3A3A;">Тема</label>
                                    <input type="text" class="form-control" id="subject" name="subject" 
                                           style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;">
                                </div>
                                
                                <div class="col-12">
                                    <label for="message" class="form-label" style="color: #3A3A3A;">Сообщение</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" 
                                              style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 12px;"></textarea>
                                </div>
                                
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn px-5 py-3" 
                                            style="background: #A2C0D4; color: white; border-radius: 10px; font-weight: 600; transition: all 0.3s;">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Отправить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Социальные сети -->
<section class="py-5">
    <div class="container py-5 text-center">
        <h3 class="mb-4" style="color: #3A3A3A;">Мы в социальных сетях</h3>
        <div class="d-flex justify-content-center gap-4">
            <a href="#" class="social-link" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                <i class="fab fa-vk fa-2x" style="color: #A2C0D4;"></i>
            </a>
            <a href="#" class="social-link" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                <i class="fab fa-telegram-plane fa-2x" style="color: #A2C0D4;"></i>
            </a>
            <a href="#" class="social-link" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                <i class="fab fa-instagram fa-2x" style="color: #A2C0D4;"></i>
            </a>
            <a href="#" class="social-link" style="width: 60px; height: 60px; background: #D6E4F0; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                <i class="fab fa-youtube fa-2x" style="color: #A2C0D4;"></i>
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
    .social-link:hover {
        transform: translateY(-5px);
        background: #A2C0D4 !important;
    }
    .social-link:hover i {
        color: white !important;
    }
</style>
@endpush
@endsection