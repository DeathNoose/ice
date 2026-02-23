<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ледовый каток "Ice Arena"')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --white: #FFFFFF;
            --dark-gray: #3A3A3A;
            --soft-blue: #A2C0D4;
            --light-blue: #D6E4F0;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark-gray);
            background: var(--white);
        }
        
        .header {
            background: var(--white);
            box-shadow: 0 2px 20px rgba(58, 58, 58, 0.05);
        }
        
        .navbar-brand {
            color: var(--dark-gray) !important;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-brand i {
            color: var(--soft-blue);
        }
        
        .nav-link {
            color: var(--dark-gray) !important;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--soft-blue) !important;
        }
        
        .nav-link.active {
            color: var(--soft-blue) !important;
        }
        
        .btn-login {
            background: none;
            border: 2px solid var(--soft-blue);
            color: var(--dark-gray);
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-login:hover {
            background: var(--soft-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-register {
            background: var(--soft-blue);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-register:hover {
            background: var(--dark-gray);
            transform: translateY(-2px);
        }
        
        .btn-ticket {
            background: var(--dark-gray);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-ticket:hover {
            background: var(--soft-blue);
            transform: translateY(-2px);
        }
        
        .btn-booking {
            background: none;
            border: 2px solid var(--dark-gray);
            color: var(--dark-gray);
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .btn-booking:hover {
            background: var(--dark-gray);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Dropdown styles */
        .dropdown-toggle {
            background: none;
            border: 2px solid var(--light-blue);
            border-radius: 10px;
            padding: 8px 15px;
            color: var(--dark-gray);
            font-weight: 500;
        }
        
        .dropdown-toggle:hover {
            border-color: var(--soft-blue);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(58, 58, 58, 0.1);
            border-radius: 10px;
            padding: 8px;
            animation: dropdownFade 0.3s ease;
        }
        
        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            color: var(--dark-gray);
        }
        
        .dropdown-item:hover {
            background: var(--light-blue);
            transform: translateX(5px);
        }
        
        .dropdown-item i {
            color: var(--soft-blue);
            width: 20px;
        }
        
        .dropdown-divider {
            border-color: var(--light-blue);
        }
        
        .avatar-circle {
            width: 30px;
            height: 30px;
            background: var(--soft-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Badge для уведомлений */
        .badge-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--soft-blue);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .footer {
            background: var(--dark-gray);
            color: white;
        }
        
        .footer a {
            color: var(--soft-blue);
            text-decoration: none;
        }
        
        .footer a:hover {
            color: var(--light-blue);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Шапка сайта -->
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-ice-skate me-2"></i>
                    Ice Arena
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('schedule') ? 'active' : '' }}" href="{{ route('schedule') }}">Расписание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">Контакты</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-2">
                        @auth
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                                    <div class="avatar-circle me-2">
                                        <i class="fas fa-user fa-xs" style="color: white;"></i>
                                    </div>
                                    <span>{{ Auth::user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="fas fa-user-edit me-2"></i>
                                            Профиль
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.tickets') }}">
                                            <i class="fas fa-ticket-alt me-2"></i>
                                            Мои билеты
                                            @php
                                                $pendingTickets = Auth::user()->tickets()->where('status', 'pending')->count();
                                            @endphp
                                            @if($pendingTickets > 0)
                                                <span class="badge-count">{{ $pendingTickets }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.bookings') }}">
                                            <i class="fas fa-calendar-check me-2"></i>
                                            Мои бронирования
                                            @php
                                                $pendingBookings = Auth::user()->bookings()->where('status', 'pending')->count();
                                            @endphp
                                            @if($pendingBookings > 0)
                                                <span class="badge-count">{{ $pendingBookings }}</span>
                                            @endif
                                        </a>
                                    </li>
                                    
                                    @if(Auth::user()->isAdmin())
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <i class="fas fa-cog me-2"></i>
                                                Админ-панель
                                            </a>
                                        </li>
                                    @endif
                                    
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="#" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i>
                                            Выйти
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Войти
                            </a>
                            <a href="{{ route('register') }}" class="btn-register">
                                <i class="fas fa-user-plus me-2"></i>
                                Регистрация
                            </a>
                        @endauth
                        
                        <a href="{{ route('ticket.create') }}" class="btn-ticket">
                            <i class="fas fa-ticket-alt me-2"></i>
                            Купить билет
                        </a>
                        <a href="{{ route('booking.skates') }}" class="btn-booking">
                            <i class="fas fa-skating me-2"></i>
                            Забронировать
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Основной контент -->
    <main style="margin-top: 80px; min-height: calc(100vh - 400px);">
        @if(session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert" 
                     style="background: var(--light-blue); color: var(--dark-gray); border: 1px solid var(--soft-blue); border-radius: 10px;">
                    <i class="fas fa-check-circle me-2" style="color: var(--soft-blue);"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" 
                     style="background: #ffe5e5; color: #d63031; border: 1px solid #ff7675; border-radius: 10px;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Футер -->
    <footer class="footer py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4">Ice Arena</h5>
                    <p>Современный ледовый каток в центре города. Комфорт, безопасность и отличное настроение!</p>
                    <div class="social-links mt-3">
                        <a href="#" class="me-2"><i class="fab fa-vk fa-lg"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-telegram fa-lg"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4">Контакты</h5>
                    <p class="mb-2">
                        <i class="fas fa-map-marker-alt me-2" style="color: var(--soft-blue);"></i>
                        ул. Примерная, 123
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone me-2" style="color: var(--soft-blue);"></i>
                        +7 (999) 123-45-67
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-envelope me-2" style="color: var(--soft-blue);"></i>
                        info@icearena.ru
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4">Режим работы</h5>
                    <p class="mb-2">
                        <i class="fas fa-clock me-2" style="color: var(--soft-blue);"></i>
                        Пн-Пт: 10:00 - 22:00
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-clock me-2" style="color: var(--soft-blue);"></i>
                        Сб-Вс: 09:00 - 23:00
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-clock me-2" style="color: var(--soft-blue);"></i>
                        Без выходных
                    </p>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Ice Arena. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <!-- Скрипты -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Автоматическое скрытие alert сообщений через 5 секунд
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alert) {
                    alert.classList.remove('show');
                    setTimeout(function() {
                        alert.remove();
                    }, 300);
                });
            }, 5000);
        });
    </script>
    
    @stack('scripts')
</body>
</html>