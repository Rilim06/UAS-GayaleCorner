<head>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">Ini Index</h1>
    @if ($user)
    <form method="post" action="{{route('logout')}}" class="p-6">
        @csrf
        <button type='submit'>Logout</button>
    </form>
    @else
    <a href='/login'>
        <h1 class="text-3xl font-bold">Login</h1>
    </a>
    @endif
</body>