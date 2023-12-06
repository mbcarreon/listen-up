@extends('layouts.app')

@section('title')
    <title>Contact Us</title>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between; width: 80%; margin: 0 auto;">
        <div style="width: 50%;">
            <h2>Contact Details</h2>
            <p>Contact Number: +7891239</p>
            <p>Address: España Blvd, Sampaloc, Manila</p>
            <p>Email: contact@listenup.com</p>
        </div>
        <div style="width: 50%;">

            <h2>Contact Us</h2>
    <form action="/contact" method="post">
        @csrf
        <!-- Name -->
        <div class="row g-3 align-items-center mb-2">
            <div class="col-3">
                <label class="col-form-label">Name</label>
            </div>
            <div class="col-9">
                <input type="text" name="name" id="name" class="form-control rounded" required>
            </div>
        </div>
        <!-- Email -->
        <div class="row g-3 align-items-center mb-2">
            <div class="col-3">
                <label class="col-form-label">Email</label>
            </div>
            <div class="col-9">
                <input type="email" name="email" id="email" class="form-control rounded" required>
            </div>
        </div>
        <!-- Subject -->
        <div class="row g-3 align-items-center mb-2">
            <div class="col-3">
                <label class="col-form-label">Subject</label>
            </div>
            <div class="col-9">
                <input type="text" name="subject" id="subject" class="form-control rounded" required>
            </div>
        </div>
        <!-- Message -->
        <div class="row g-3 align-items-center mb-2">
            <div class="col-3">
                <label class="col-form-label">Message</label>
            </div>
            <div class="col-9">
                <textarea type="text" name="message" id="message" class="form-control rounded" rows="6" required></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn bg-success text-light fw-bold">Submit</button>
        </div>
        
    </form>
        </div>
    </div>
@endsection