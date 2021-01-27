<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT | DETAILS</title>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <nav>
        <div class="container">
            <div class="navbar">
                <h1>Student</h1>
    
                <ul>
                    <li><a href="/student">Profile</a></li>
                    <li><a href="/course">Course</a></li>
                    <li><a href="/exam">Exam</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>                  

                </ul>
            </div>
        </div>
        
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>        