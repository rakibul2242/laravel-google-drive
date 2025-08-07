<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Drive Files</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg p-8">
            @if (session('success'))
                <div class="mb-6 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-3xl font-bold text-gray-800 mb-6">📁 Google Drive Files</h1>

            @if (count($files) > 0)
                <ul class="space-y-4">
                    @foreach ($files as $file)
                        <li class="flex items-center justify-between bg-gray-100 hover:bg-gray-200 p-4 rounded-lg transition">
                            <span class="truncate text-gray-700 w-3/4">{{ $file }}</span>
                            <a href="{{ url('/google-drive/download/' . urlencode(basename($file))) }}"
                               class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded">
                                Download
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500 text-center">No files found on Google Drive.</p>
            @endif
        </div>
    </div>

</body>
</html>
