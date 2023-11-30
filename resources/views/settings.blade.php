<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">

    <!--nav bar-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Sample Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/offers">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/partners">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="settings-container">
        <h2>Account Profile Display</h2>
        <div>
            <p><strong>Name:</strong> {{ $userData['name'] }}</p>
            <p><strong>Username:</strong> {{ $userData['username'] }}</p>
            <p><strong>Password:</strong> {{ $userData['password'] }}</p>
            <p><strong>Account Created:</strong> {{ $userData['account_created'] }}</p>
            <p><strong>Audit Logs:</strong></p>
            <ul>
                @forelse ($userData['audit_logs'] as $log)
                    <li>{{ $log['action'] }} - {{ $log['timestamp'] }}</li>
                @empty
                    <li>No audit logs available.</li>
                @endforelse
            </ul>
        </div>

        <h2>Edit Account Profile Details</h2>
        <form action="{{ route('settings.updateProfile') }}" method="post">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $userData['name'] }}" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $userData['username'] }}" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Update Profile</button>
        </form>

        <h2>System Settings</h2>
        <form action="{{ route('settings.updateSystemSettings') }}" method="post">
            @csrf
            <label for="darkMode">Dark Mode:</label>
            <input type="checkbox" id="darkMode" name="dark_mode" {{ $systemSettings['dark_mode'] ? 'checked' : '' }}>

            <!-- Add more system settings fields as needed -->

            <button type="submit">Update System Settings</button>
        </form>
    </div>
</body>
</html>
