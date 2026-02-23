<!-- resources/views/admin/bookings/index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Управление бронированиями - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Управление бронированиями</h2>
        
        <!-- Фильтры -->
        <div class="d-flex gap-2">
            <select id="statusFilter" class="form-select" style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 8px 15px; width: auto;">
                <option value="">Все статусы</option>
                <option value="pending">Ожидание</option>
                <option value="paid">Оплачено</option>
                <option value="cancelled">Отменено</option>
            </select>
            
            <input type="text" id="searchInput" class="form-control" placeholder="Поиск..." 
                   style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 8px 15px; width: 250px;">
        </div>
    </div>
    
    <div class="table-container" style="background: #FFFFFF; border-radius: 20px; padding: 1.5rem; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
        <div class="table-responsive">
            <table class="table table-hover" id="bookingsTable">
                <thead style="background: #D6E4F0;">
                    <tr>
                        <th style="color: #3A3A3A;">ID</th>
                        <th style="color: #3A3A3A;">Клиент</th>
                        <th style="color: #3A3A3A;">Телефон</th>
                        <th style="color: #3A3A3A;">Часы</th>
                        <th style="color: #3A3A3A;">Коньки</th>
                        <th style="color: #3A3A3A;">Сумма</th>
                        <th style="color: #3A3A3A;">Статус</th>
                        <th style="color: #3A3A3A;">Дата</th>
                        <th style="color: #3A3A3A;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td style="color: #3A3A3A;">#{{ $booking->id }}</td>
                        <td style="color: #3A3A3A;">{{ $booking->full_name }}</td>
                        <td style="color: #3A3A3A;">{{ $booking->phone }}</td>
                        <td style="color: #3A3A3A;">{{ $booking->hours }} ч.</td>
                        <td style="color: #3A3A3A;">
                            @if($booking->skate)
                                {{ $booking->skate->brand }} {{ $booking->skate->model }}<br>
                                <small>размер {{ $booking->skate_size }}</small>
                            @else
                                <span class="badge" style="background: #D6E4F0; color: #3A3A3A; padding: 5px 10px; border-radius: 5px;">
                                    Свои коньки
                                </span>
                            @endif
                        </td>
                        <td style="color: #3A3A3A; font-weight: 600;">{{ number_format($booking->total_price, 0, '.', ' ') }} ₽</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="badge-pending">Ожидание</span>
                            @elseif($booking->status == 'paid')
                                <span class="badge-paid">Оплачено</span>
                            @else
                                <span class="badge-cancelled">Отменено</span>
                            @endif
                        </td>
                        <td style="color: #3A3A3A;">{{ $booking->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm" 
                                   style="background: #D6E4F0; color: #3A3A3A; border-radius: 8px; padding: 5px 10px; transition: all 0.3s;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <!-- Кнопка изменения статуса -->
                                <button type="button" class="btn btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#statusModal{{ $booking->id }}"
                                        style="background: #A2C0D4; color: white; border-radius: 8px; padding: 5px 10px; transition: all 0.3s;">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить это бронирование?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" 
                                            style="background: #ffe5e5; color: #d63031; border-radius: 8px; padding: 5px 10px; transition: all 0.3s;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Modal для изменения статуса -->
                            <div class="modal fade" id="statusModal{{ $booking->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius: 20px; border: none;">
                                        <div class="modal-header" style="background: #A2C0D4; color: white; border-radius: 20px 20px 0 0;">
                                            <h5 class="modal-title">Изменить статус бронирования #{{ $booking->id }}</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body p-4">
                                                <div class="mb-3">
                                                    <label class="form-label" style="color: #3A3A3A;">Текущий статус:</label>
                                                    <p>
                                                        @if($booking->status == 'pending')
                                                            <span class="badge-pending">Ожидание</span>
                                                        @elseif($booking->status == 'paid')
                                                            <span class="badge-paid">Оплачено</span>
                                                        @else
                                                            <span class="badge-cancelled">Отменено</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label" style="color: #3A3A3A;">Новый статус</label>
                                                    <select class="form-select" name="status" required
                                                            style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 10px;">
                                                        <option value="pending">Ожидание</option>
                                                        <option value="paid">Оплачено</option>
                                                        <option value="cancelled">Отменено</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal" 
                                                        style="background: #D6E4F0; color: #3A3A3A; border-radius: 10px; padding: 8px 20px;">Отмена</button>
                                                <button type="submit" class="btn" 
                                                        style="background: #A2C0D4; color: white; border-radius: 10px; padding: 8px 20px;">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5">
                            <i class="fas fa-calendar-check fa-4x mb-3" style="color: #A2C0D4;"></i>
                            <h5 style="color: #3A3A3A;">Бронирования не найдены</h5>
                            <p style="color: #3A3A3A; opacity: 0.7;">Здесь будут отображаться все бронирования коньков</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($bookings->hasPages())
        <div class="mt-4">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('statusFilter');
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('bookingsTable');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        function filterTable() {
            const statusValue = statusFilter.value.toLowerCase();
            const searchValue = searchInput.value.toLowerCase();
            
            for (let row of rows) {
                let showRow = true;
                
                // Фильтр по статусу
                if (statusValue) {
                    const statusCell = row.cells[6]; // Статус в 7-й колонке
                    const statusText = statusCell.textContent.trim().toLowerCase();
                    if (!statusText.includes(statusValue)) {
                        showRow = false;
                    }
                }
                
                // Поиск по тексту
                if (searchValue && showRow) {
                    let rowText = '';
                    for (let i = 0; i < row.cells.length - 1; i++) { // Исключаем колонку с действиями
                        rowText += row.cells[i].textContent.toLowerCase() + ' ';
                    }
                    if (!rowText.includes(searchValue)) {
                        showRow = false;
                    }
                }
                
                row.style.display = showRow ? '' : 'none';
            }
        }
        
        statusFilter.addEventListener('change', filterTable);
        searchInput.addEventListener('keyup', filterTable);
    });
</script>
@endpush

@push('styles')
<style>
    .pagination {
        gap: 5px;
    }
    .page-link {
        border: 1px solid #D6E4F0;
        color: #3A3A3A;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .page-link:hover {
        background: #A2C0D4;
        color: white;
        border-color: #A2C0D4;
    }
    .page-item.active .page-link {
        background: #A2C0D4;
        border-color: #A2C0D4;
        color: white;
    }
    .btn-sm {
        transition: all 0.3s;
    }
    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px rgba(162,192,212,0.3);
    }
</style>
@endpush
@endsection