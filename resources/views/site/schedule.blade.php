<!-- resources/views/site/schedule.blade.php -->
@extends('layouts.app')

@section('title', 'Расписание - Ice Arena')

@section('content')
<!-- Hero секция -->
<section class="py-5" style="background: linear-gradient(135deg, #A2C0D4 0%, #D6E4F0 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4" style="color: #3A3A3A;">
                    Расписание <span style="color: #FFFFFF;">сеансов</span>
                </h1>
                <p class="lead mb-4" style="color: #3A3A3A; opacity: 0.9;">
                    Мы работаем ежедневно с 9:00 до 23:00. Выбирайте удобное время для посещения.
                </p>
            </div>
            <div class="col-lg-6">
 <img src="https://avatars.mds.yandex.net/i?id=315bbb66cb653ec6c85e5130f85ba7f0_l-3675323-images-thumbs&n=13" 
                     alt="Schedule" class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Расписание по дням -->
<section class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Расписание сеансов</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg" style="background: #FFFFFF; border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-5">
                        <!-- Будни -->
                        <div class="schedule-block mb-5">
                            <h4 class="mb-4" style="color: #3A3A3A; border-left: 4px solid #A2C0D4; padding-left: 15px;">
                                Будние дни (Пн - Пт)
                            </h4>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="background: #D6E4F0;">
                                        <tr>
                                            <th style="color: #3A3A3A;">Сеанс</th>
                                            <th style="color: #3A3A3A;">Время</th>
                                            <th style="color: #3A3A3A;">Длительность</th>
                                            <th style="color: #3A3A3A;">Цена</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Утренний</strong></td>
                                            <td>10:00 - 12:00</td>
                                            <td>2 часа</td>
                                            <td>300 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Дневной</strong></td>
                                            <td>12:30 - 14:30</td>
                                            <td>2 часа</td>
                                            <td>300 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Дневной</strong></td>
                                            <td>15:00 - 17:00</td>
                                            <td>2 часа</td>
                                            <td>300 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Вечерний</strong></td>
                                            <td>17:30 - 19:30</td>
                                            <td>2 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Вечерний</strong></td>
                                            <td>20:00 - 22:00</td>
                                            <td>2 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Выходные -->
                        <div class="schedule-block">
                            <h4 class="mb-4" style="color: #3A3A3A; border-left: 4px solid #A2C0D4; padding-left: 15px;">
                                Выходные дни (Сб - Вс)
                            </h4>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="background: #D6E4F0;">
                                        <tr>
                                            <th style="color: #3A3A3A;">Сеанс</th>
                                            <th style="color: #3A3A3A;">Время</th>
                                            <th style="color: #3A3A3A;">Длительность</th>
                                            <th style="color: #3A3A3A;">Цена</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Утренний</strong></td>
                                            <td>09:00 - 11:00</td>
                                            <td>2 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Дневной</strong></td>
                                            <td>11:30 - 13:30</td>
                                            <td>2 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Дневной</strong></td>
                                            <td>14:00 - 16:00</td>
                                            <td>2 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Вечерний</strong></td>
                                            <td>16:30 - 18:30</td>
                                            <td>2 часа</td>
                                            <td>400 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Вечерний</strong></td>
                                            <td>19:00 - 21:00</td>
                                            <td>2 часа</td>
                                            <td>400 ₽</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ночной</strong></td>
                                            <td>21:30 - 23:00</td>
                                            <td>1.5 часа</td>
                                            <td>350 ₽</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="alert mt-5" style="background: #D6E4F0; border: none; border-radius: 10px;">
                            <i class="fas fa-info-circle me-2" style="color: #A2C0D4;"></i>
                            <span style="color: #3A3A3A;">Входной билет включает: посещение катка, раздевалку, медицинскую страховку. Аренда коньков оплачивается отдельно.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Специальные предложения -->
<section class="py-5" style="background: #D6E4F0;">
    <div class="container py-5">
        <h2 class="text-center mb-5" style="color: #3A3A3A; font-weight: 700;">Специальные предложения</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 h-100" style="background: #FFFFFF; border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-clock fa-3x" style="color: #A2C0D4;"></i>
                        </div>
                        <h5 class="text-center mb-3" style="color: #3A3A3A;">Утренние часы</h5>
                        <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">Скидка 20% на входной билет с 9:00 до 12:00 в будни</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 h-100" style="background: #FFFFFF; border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-users fa-3x" style="color: #A2C0D4;"></i>
                        </div>
                        <h5 class="text-center mb-3" style="color: #3A3A3A;">Групповые посещения</h5>
                        <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">При группе от 10 человек - скидка 15% каждому</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 h-100" style="background: #FFFFFF; border-radius: 20px; overflow: hidden;">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-birthday-cake fa-3x" style="color: #A2C0D4;"></i>
                        </div>
                        <h5 class="text-center mb-3" style="color: #3A3A3A;">День рождения</h5>
                        <p class="text-center" style="color: #3A3A3A; opacity: 0.8;">Имениннику бесплатный вход в день рождения</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection