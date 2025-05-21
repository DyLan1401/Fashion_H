@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        {{-- Add the contact info sections --}}
        <div class="row text-center mb-5">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Placeholder for Mail Icon --}}
                        <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope fa-2x"></i>{{-- Using Font Awesome, need to ensure it's included --}}
                        </div>
                        <h5 class="card-title">fashion.h.2025@gmail.com</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Placeholder for Location Icon --}}
                         <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-2x"></i>{{-- Using Font Awesome, need to ensure it's included --}}
                        </div>
                        <h5 class="card-title">Trường Cảo Đẳng Công Nghệ Thủ Đức</h5>
                        <p class="card-text">53 Võ Văn Ngân, Q. Thủ Đức, TP. HCM</p>{{-- Using placeholder text from OCR --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        {{-- Placeholder for Call Icon --}}
                         <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-phone fa-2x"></i>{{-- Using Font Awesome, need to ensure it's included --}}
                        </div>
                        <h5 class="card-title">0909090909</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- The form section starts here --}}
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Contact </h2>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">YOUR NAME</label>{{-- Update label text --}}
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">YOUR EMAIL</label>{{-- Update label text --}}
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">YOUR PHONE</label>{{-- Update label text --}}
                                <input type="phone" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">YOUR MESSAGE</label>{{-- Update label text --}}
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                                </form>
            </div>
        </div>
    </div>
@endsection