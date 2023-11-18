<head>
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">Ini Main</h1>
    <form method="post" action="{{route('logout')}}" class="p-6">
        @csrf
        <button type='submit'>Logout</button>
    </form>
    @if ($user_role == '1')
    <h1 class="text-3xl font-bold">Ini Admin</h1>
    @else
    <h1 class="text-3xl font-bold">Ini User</h1>
    @endif
    <div class='all' id='blur'>

        <div class="bg-gray-200 p-4 h-full">
            <div class="container">
                <div class="menu-container">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                        <!-- foreach -->
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card">
                            
                        </div>
                        <!-- endforeach -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>