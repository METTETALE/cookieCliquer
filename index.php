<?php
session_start();

if (!isset($_SESSION["nbCookie"])) {
    $_SESSION["nbCookie"] = 0;
}

if (!isset($_SESSION["nbCookiePerClick"])) {
    $_SESSION["nbCookiePerClick"] = 1;
}

if (!isset($_SESSION["upgrades"])) {
    $_SESSION["upgrades"] = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Click</title>
</head>

<body class="flex flex-col h-screen">
    <main class="grow p-8">
        <div class="grid grid-cols-3 w-full h-full">
            <div>
                <p id="compteur" class="text-xl font-bold">Nb click : </p>
            </div>
            <div class="h-full w-full flex flex-col justify-center items-center">
                <button id="cookie" class="cursor-pointer rounded-full bg-slate-200">
                    <img src="cookieClicker.png" alt="" class="h-96 w-auto">
                </button>
            </div>
            <div class="flex flex-col gap-10">
                <button class="w-full h-40 bg-[url(/upgrader.png)] bg-no-repeat bg-contain rounded-lg cursor-pointer flex justify-normal pt-2 pl-2 upgrade overflow-hidden" id="superAutoCliquer" val="500:2:1">
                    <div class="w-1/3 h-full">
                        <p class="text-xl h-1/3 w-full">Super auto cliquer</p>
                        <div class="h-2/3 w-full flex justify-center items-center">
                            <img src="upgrader.png" alt="" class="h-full w-auto">
                        </div>
                    </div>
                    <div class="w-1/3 h-full">
                        <p class="h-1/3 w-full"></p>
                        <p class="h-1/3 w-full">ajoute 2 cookies par clique</p>
                        <p class="h-1/3 w-full"></p>
                    </div>
                    <div class="flex flex-col w-1/3 h-full">
                        <p class="h-1/3 w-full"></p>
                        <p class="h-1/3 w-full"></p>
                        <p class="h-1/3 w-full pt-5 pl-15">500 Cookies</p>
                    </div>
                </button>
            </div>
        </div>
    </main>
    <script src="app.js"></script>
</body>

</html>