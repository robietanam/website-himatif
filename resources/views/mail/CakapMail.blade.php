<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app-frontpage.css')
</head>

<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="#">
                <img class="w-auto h-10 max-sm:h-8" src="https://himatif.ilkom.unej.ac.id/img/logo.png" alt="">
                <p>Himatif x Cakap </p>
            </a>
        </header>

        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200">Hi, {{ $details['nama'] }}</h2>

            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                Terimakasih sudah mendaftar pada course cakap, berikut kode untuk mendaftar
            </p>
            <p class="px-6 py-2 mt-8 text-sm font-medium bg-blue-600 rounded-lg w-fit ">
                {{ $details['kode'] }}
            </p>

            <p class="mt-2 text-gray-600 dark:text-gray-300">
                Thanks, <br>
                Meraki UI team
            </p>
        </main>

        <footer class="mt-8">

            <p class="mt-3 text-gray-500 dark:text-gray-400">© 2024 Himpunan Mahasiswa Teknologi Informsi .</p>
        </footer>
    </section>
</body>

</html>
