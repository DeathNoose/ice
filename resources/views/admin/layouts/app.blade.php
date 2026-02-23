<!-- resources/views/admin/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель') - Ice Arena</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 (полная версия) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Добавьте после основного подключения Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    
    <style>
        :root {
            --white: #FFFFFF;
            --dark-gray: #3A3A3A;
            --soft-blue: #A2C0D4;
            --light-blue: #D6E4F0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--light-blue);
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            background: linear-gradient(135deg, var(--soft-blue) 0%, var(--dark-gray) 100%);
            color: white;
            z-index: 100;
            overflow-y: auto;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }
        
        .sidebar-header p {
            margin: 0.5rem 0 0;
            font-size: 0.875rem;
            opacity: 0.8;
            color: white;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            padding-left: 2rem;
        }
        
        .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.2);
            border-left: 3px solid white;
        }
        
        .nav-link i {
            width: 20px;
            font-size: 1.1rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 2rem;
            min-height: 100vh;
            background: var(--white);
        }
        
        /* Карточки статистики */
        .stat-card {
            background: var(--white);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(162,192,212,0.2);
            border: 1px solid var(--light-blue);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(162,192,212,0.3);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background: var(--light-blue);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stat-icon i {
            font-size: 2rem;
            color: var(--soft-blue);
        }
        
        /* Таблицы */
        .table-container {
            background: var(--white);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 30px rgba(162,192,212,0.2);
            border: 1px solid var(--light-blue);
        }
        
        .table thead {
            background: var(--light-blue);
        }
        
        .table thead th {
            color: var(--dark-gray);
            font-weight: 600;
            border: none;
        }
        
        .table tbody tr {
            transition: all 0.3s;
        }
        
        .table tbody tr:hover {
            background: var(--light-blue) !important;
        }
        
        .table tbody td {
            color: var(--dark-gray);
        }
        
        /* Бейджи статусов */
        .badge-pending {
            background: var(--light-blue);
            color: var(--dark-gray);
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .badge-paid {
            background: var(--soft-blue);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .badge-cancelled {
            background: #ffe5e5;
            color: #d63031;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .badge-used {
            background: #cce5ff;
            color: #004085;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        /* Кнопки */
        .btn-primary {
            background: var(--soft-blue);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: var(--dark-gray);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58,58,58,0.3);
        }
        
        .btn-outline-primary {
            background: transparent;
            border: 2px solid var(--soft-blue);
            color: var(--dark-gray);
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        
        .btn-outline-primary:hover {
            background: var(--soft-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1000;
                background: var(--soft-blue);
                color: white;
                border: none;
                border-radius: 5px;
                padding: 0.5rem 1rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="menu-toggle d-md-none" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Ice Arena</h3>
            <p>Админ-панель</p>
        </div>
        
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-pie"></i>
                <span>Дашборд</span>
            </a>
            
            <a class="nav-link {{ request()->routeIs('admin.skates.*') ? 'active' : '' }}" 
               href="{{ route('admin.skates.index') }}">
                <i class="fas fa-skating"></i>
                <span>Коньки</span>
            </a>
            
            <a class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" 
               href="{{ route('admin.bookings.index') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Бронирования</span>
            </a>
            
            <a class="nav-link {{ request()->routeIs('admin.tickets.*') ? 'active' : '' }}" 
               href="{{ route('admin.tickets.index') }}">
                <i class="fas fa-ticket-alt"></i>
                <span>Билеты</span>
            </a>
            
            <div class="border-top my-3" style="border-color: rgba(255,255,255,0.1) !important;"></div>
            
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-globe"></i>
                <span>На сайт</span>
            </a>
            
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Выход</span>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: var(--light-blue); color: var(--dark-gray); border: 1px solid var(--soft-blue); border-radius: 10px;">
                <i class="fas fa-check-circle me-2" style="color: var(--soft-blue);"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="background: #ffe5e5; color: #d63031; border: 1px solid #ff7675; border-radius: 10px;">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        }
        
        // Initialize DataTables
        $(document).ready(function() {
            if ($('.dataTable').length) {
                $('.dataTable').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ru.json'
                    },
                    pageLength: 25,
                    responsive: true
                });
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>