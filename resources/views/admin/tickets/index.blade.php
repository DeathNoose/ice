<!-- resources/views/admin/tickets/index.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Управление билетами - Админ-панель')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #3A3A3A;">Управление билетами</h2>
        
        <div class="d-flex gap-2">
            <select id="statusFilter" class="form-select" style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 8px 15px; width: auto;">
                <option value="">Все статусы</option>
                <option value="pending">Ожидание</option>
                <option value="paid">Оплачено</option>
                <option value="used">Использован</option>
            </select>
            
            <input type="text" id="searchInput" class="form-control" placeholder="Поиск..." 
                   style="border: 2px solid #D6E4F0; border-radius: 10px; padding: 8px 15px; width: 250px;">
        </div>
    </div>
    
    <div class="table-container" style="background: #FFFFFF; border-radius: 20px; padding: 1.5rem; box-shadow: 0 10px 30px rgba(162,192,212,0.2); border: 1px solid #D6E4F0;">
        <div class="table-responsive">
            <table class="table table-hover" id="ticketsTable">
                <thead style="background: #D6E4F0;">
                    <tr>
                        <th style="color: #3A3A3A;">ID</th>
                        <th style="color: #3A3A3A;">Клиент</th>
                        <th style="color: #3A3A3A;">Телефон</th>
                        <th style="color: #3A3A3A;">Email</th>
                        <th style="color: #3A3A3A;">Сумма</th>
                        <th style="color: #3A3A3A;">Статус</th>
                        <th style="color: #3A3A3A;">Дата</th>
                        <th style="color: #3A3A3A;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tickets as $ticket)
                    <tr>
                        <td style="color: #3A3A3A;">#{{ $ticket->id }}</td>
                        <td style="color: #3A3A3A;">{{ $ticket->full_name }}</td>
                        <td style="color: #3A3A3A;">{{ $ticket->phone }}</td>
                        <td style="color: #3A3A3A;">{{ $ticket->email ?? '—' }}</td>
                        <td style="color: #3A3A3A; font-weight: 600;">{{ number_format($ticket->price, 0, '.', ' ') }} ₽</td>
                        <td>
                            @if($ticket->status == 'pending')
                                <span class="badge-pending">Ожидание</span>
                            @elseif($ticket->status == 'paid')
                                <span class="badge-paid">Оплачено</span>
                            @else
                                <span class="badge-used">Использован</span>
                            @endif
                        </td>
                        <td style="color: #3A3A3A;">{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-sm" 
                                   style="background: #D6E4F0; color: #3A3A3A; border-radius: 8px; padding: 5px 10px; transition: all 0.3s;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <form action="{{ route('admin.tickets.destroy', $ticket) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот билет?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" 
                                            style="background: #ffe5e5; color: #d63031; border-radius: 8px; padding: 5px 10px; transition: all 0.3s;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="fas fa-ticket-alt fa-4x mb-3" style="color: #A2C0D4;"></i>
                            <h5 style="color: #3A3A3A;">Билеты не найдены</h5>
                            <p style="color: #3A3A3A; opacity: 0.7;">Здесь будут отображаться все купленные билеты</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($tickets->hasPages())
        <div class="mt-4">
            {{ $tickets->links() }}
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('statusFilter');
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('ticketsTable');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        function filterTable() {
            const statusValue = statusFilter.value.toLowerCase();
            const searchValue = searchInput.value.toLowerCase();
            
            for (let row of rows) {
                let showRow = true;
                
                if (statusValue) {
                    const statusCell = row.cells[5];
                    const statusText = statusCell.textContent.trim().toLowerCase();
                    if (!statusText.includes(statusValue)) {
                        showRow = false;
                    }
                }
                
                if (searchValue && showRow) {
                    let rowText = '';
                    for (let i = 0; i < row.cells.length - 1; i++) {
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
    .badge-pending, .badge-paid, .badge-used {
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: 500;
        display: inline-block;
    }
    .badge-pending {
        background: #D6E4F0;
        color: #3A3A3A;
    }
    .badge-paid {
        background: #A2C0D4;
        color: white;
    }
    .badge-used {
        background: #cce5ff;
        color: #004085;
    }
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