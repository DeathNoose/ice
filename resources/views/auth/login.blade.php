<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Ice Arena</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--soft-blue) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Декоративные элементы */
        .shape {
            position: absolute;
            background: var(--white);
            opacity: 0.1;
            border-radius: 50%;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            right: -50px;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        /* Контейнер формы */
        .auth-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            position: relative;
            z-index: 10;
        }
        
        .auth-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(58, 58, 58, 0.1);
            padding: 40px;
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Заголовок */
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-gray);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: color 0.3s;
        }
        
        .logo:hover {
            color: var(--soft-blue);
        }
        
        .auth-header h2 {
            color: var(--dark-gray);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .auth-header p {
            color: var(--soft-blue);
            font-size: 0.95rem;
        }
        
        /* Форма */
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark-gray);
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--soft-blue);
            font-size: 1.1rem;
            transition: color 0.3s;
            z-index: 1;
        }
        
        input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid var(--light-blue);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            background: var(--white);
            color: var(--dark-gray);
        }
        
        input:focus {
            outline: none;
            border-color: var(--soft-blue);
            box-shadow: 0 0 0 3px rgba(162, 192, 212, 0.2);
        }
        
        input::placeholder {
            color: #b0b0b0;
            font-size: 0.95rem;
        }
        
        /* Кнопка */
        .btn-auth {
            width: 100%;
            padding: 14px;
            background: var(--soft-blue);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .btn-auth:hover {
            background: var(--dark-gray);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(58, 58, 58, 0.2);
        }
        
        /* Чекбокс */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: auto;
            padding: 0;
            accent-color: var(--soft-blue);
        }
        
        .checkbox-group label {
            margin: 0;
            font-size: 0.95rem;
        }
        
        /* Ссылки */
        .auth-links {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--light-blue);
        }
        
        .auth-links a {
            color: var(--soft-blue);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            margin: 0 10px;
        }
        
        .auth-links a:hover {
            color: var(--dark-gray);
        }
        
        /* Уведомления */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            animation: slideDown 0.4s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: var(--light-blue);
            color: var(--dark-gray);
            border: 1px solid var(--soft-blue);
        }
        
        .alert-danger {
            background: #ffe5e5;
            color: #d63031;
            border: 1px solid #ff7675;
        }
        
        .invalid-feedback {
            color: #d63031;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        /* Адаптивность */
        @media (max-width: 576px) {
            .auth-card {
                padding: 30px 20px;
            }
            
            .auth-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Декоративные элементы -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="{{ route('home') }}" class="logo">
                    <i class="fas fa-ice-skate me-2"></i>Ice Arena
                </a>
                <h2>Добро пожаловать!</h2>
                <p>Войдите в свой аккаунт</p>
            </div>
            
            <!-- Уведомления -->
            @if(session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('status') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="your@email.com"
                            required 
                            autofocus
                        >
                    </div>
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••"
                            required
                        >
                    </div>
                </div>
                
                <!-- Remember me -->
                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Запомнить меня</label>
                    </div>
                </div>
                
                <!-- Submit button -->
                <button type="submit" class="btn-auth">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    Войти
                </button>
            </form>
            
            <div class="auth-links">
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus me-1"></i>
                    Регистрация
                </a>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>