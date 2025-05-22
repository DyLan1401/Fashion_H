@extends('layouts.app')

@section('content')
<style>
    .table-container { max-width: 1200px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background-color: #007bff; color: white; }
    .expired { color: red; font-weight: bold; }
    .success { color: green; margin-bottom: 10px; }
    .action-btn { margin-right: 10px; color: #007bff; text-decoration: none; }
    .delete-btn { color: red; cursor: pointer; background: none; border: none; }
    .add-btn { display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
</style>

<div class="table-container">
    <h2>Discounts List</h2>
    <a href="{{ route('discounts.create') }}" class="add-btn">Add New Discount</a>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    @if($discounts->isEmpty())
        <p>Không có mã giảm giá nào.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Discount Percent</th>
                    <th>Discount Type</th>
                    <th>Min Order Value</th>
                    <th>Usage Limit</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discounts as $discount)
                    <tr>
                        <td>{{ $discount->discount_id }}</td>
                        <td>{{ number_format($discount->discount_percent, 2) }}%</td>
                        <td>{{ ucfirst($discount->discount_type) }}</td>
                        <td>{{ $discount->min_order_value ? number_format($discount->min_order_value, 2) : 'N/A' }}</td>
                        <td>{{ $discount->usage_limit ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($discount->discount_expiry_date)->format('d/m/Y H:i') }}</td>
                        <td class="{{ \Carbon\Carbon::now()->gt($discount->discount_expiry_date) ? 'expired' : '' }}">
                            {{ \Carbon\Carbon::now()->gt($discount->discount_expiry_date) ? 'Hết hạn' : 'Còn hiệu lực' }}
                        </td>
                        <td>
                            <a href="{{ route('discounts.edit', $discount->discount_id) }}" class="action-btn">Edit</a>
                            <form action="{{ route('discounts.destroy', $discount->discount_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection