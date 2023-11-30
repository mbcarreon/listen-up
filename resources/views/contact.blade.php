@extends('layouts.app')

@section('title')
    <title>Contact Us</title>
@endsection

@section('style')
<style>
        /* body {
            display: flex;
            justify-content: space-between;
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .column {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input,
        textarea {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        } */
    </style>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between; width: 80%; margin: 0 auto;">
        <div style="width: 50%;">
            <h2>Contact Details</h2>
            <p>Contact Number: +123456789</p>
            <p>Address: 123 Main St, City, Country</p>
            <p>Email: info@example.com</p>
        </div>
        <div style="width: 50%;">
            <h2>Contact Us</h2>
    <form action="/contact" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" required>
        <br>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        <br>
        <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </form>
        </div>
    </div>
@endsection