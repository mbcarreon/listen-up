@extends('layouts.app')

@section('title')
    <title>Contact Us</title>
@endsection

@section('style')
    
@endsection

@section('content')

    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="{{ route('contact.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

@endsection