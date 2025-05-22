@extends('layouts.app')

@section('content')
<style>
    .form-container { max-width: 500px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; font-weight: bold; }
    .form-group input, .form-group select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
    .form-group .error { color: red; font-size: 0.9em; }
    button { width: 100%; background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
</style>

<div class="form-container">
    <h2>Edit Discount</h2>
    <form method="POST" action="{{ route('discounts.update', $discount->discount_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Discount ID:</label>
            <input type="number" name="discount_id" value="{{ $discount->discount_id }}" disabled>
        </div>
        <div class="form-group">
            <label>Discount Percent:</label>
            <input type="number" step="0.01" name="discount_percent" value="{{ old('discount_percent', $discount->discount_percent) }}" required>
            @error('discount_percent')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Discount Type:</label>
            <select name="discount_type">
                <option value="percentage" {{ old('discount_type', $discount->discount_type) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('discount_type', $discount->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
            </select>
            @error('discount_type')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Min Order Value:</label>
            <input type="number" step="0.01" name="min_order_value" value="{{ old('min_order_value', $discount->min_order_value) }}">
            @error('min_order_value')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Usage Limit:</label>
            <input type="number" name="usage_limit" value="{{ old('usage_limit', $discount->usage_limit) }}">
            @error('usage_limit')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Expiry Date:</label>
            <input type="datetime-local" name="discount_expiry_date" value="{{ \Carbon\Carbon::parse($discount->discount_expiry_date)->format('Y-m-d\TH:i') }}" required>
            @error('discount_expiry_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update Discount</button>
    </form>
</div>
@endsection