{{-- filepath: resources/views/revenue/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4"> Thống kê doanh thu</h2>
    <form method="get" class="row mb-4">
        <div class="col-md-4">
            <label for="yearSelect">Chọn năm</label>
            <select id="yearSelect" name="year" class="form-select">
                @foreach([2023,2024,2025] as $y)
                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-primary w-100">Lọc</button>
        </div>
    </form>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Tổng doanh thu</h5>
                    <p class="card-text fs-4">{{ number_format($totalRevenue, 0, ',', '.') }} ₫</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Số đơn hàng</h5>
                    <p class="card-text fs-4">{{ $totalOrders }} đơn</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Khách hàng mới</h5>
                    <p class="card-text fs-4">{{ $newCustomers }} người</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Biểu đồ doanh thu theo tháng</h5>
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h4>📦 Chi tiết đơn hàng</h4>
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Khách hàng</th>
              <th>Ngày</th>
              <th>Trạng thái</th>
              <th>Giá trị</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $i => $order)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>
                    <span class="badge 
                        @if($order->status=='Đã giao') bg-success
                        @elseif($order->status=='Đang giao') bg-warning text-dark
                        @else bg-danger @endif">
                        {{ $order->status }}
                    </span>
                </td>
                <td>{{ number_format($order->total, 0, ',', '.') }} ₫</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartData = @json($chartData);
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6",
                     "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            datasets: [{
                label: 'Doanh thu',
                data: chartData,
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => value.toLocaleString('vi-VN') + ' ₫'
                    }
                }
            }
        }
    });
</script>
@endpush