<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>

    <h1 class="text-3xl font-bold p-12">Conversão de moedas</h1>
    <div class="w-full flex justify-between px-12">
        @if ($error)
            <h2 class="bg-red-200 border border-red-400 p-4 w-full text-center text-red-800">{{ $error }}</h2>
        @else
            @foreach($currencies as $key => $data)
                <div class="bg-slate-200 w-[30%] transition hover:scale-105 hover:shadow-2xl rounded flex flex-col justify-between items-center">
                    <div class="w-full bg-green-700 flex justify-center items-center rounded-t py-3">
                        <h3 class="text-xl font-semibold text-white">{{ $data['name'] }}</h3>
                    </div>
                    <p class="p-6 text-2xl">
                        R$ {{ number_format($data['bid'], 2, ',', '.') }}
                    </p>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
