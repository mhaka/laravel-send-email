<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhiteDesk - Task 1</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-md mx-auto min-h-screen flex flex-col justify-center">
        <div class="max-w-md w-full bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-semibold mb-6">Form</h1>
            @if (session('success'))
                <div class="bg-green-200 border-t-4 border-green-400 rounded-b text-green-500 px-4 py-3 shadow-md flex items-center mb-3 text-center">{{ session('success') }}</div>
            @endif

            <form method="POST" action="/">
                @csrf
                <div  class="my-2">
                    <x-input name="email" label="Email" type="email" />
                </div>
                <div  class="my-2">
                    <x-input name="text" label="Text" type="text" />
                </div>
                <div class="my-2">
                    <x-input name="datetime" label="Datetime" type="datetime-local" />
                </div>
                <div class="my-4">
                    <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600">SendEmail</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
