<?php
    if(!isset($_SESSION["id"])) {
        header("location: " . URLROOT . "home/index");
    }else {
        $obj = new DashboardController;
        $obj->id = $_SESSION['id'];
        $reservations = $obj->fetch_reservations($obj->id);
        $bookers = $obj->fetch_bookers($obj->id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= URLROOT ?>img/logo/pestana_logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b44b654493.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet">
    <link href="<?= URLROOT ?>css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= URLROOT ?>css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="<?= URLROOT ?>css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <link rel="stylesheet" href="<?= URLROOT ?>css/tailwind_style.css">
    <link rel="stylesheet" href="<?= URLROOT ?>css/style.css">
    <script src="<?= URLROOT ?>js/trigger-popup.js" defer></script>
    <title>Pestana Dashboard - Booking</title>
</head>
<body class="m-0 font-sans text-base font-normal dark:bg-zinc-900 leading-default bg-zinc-100 text-zinc-900">
    <div class="absolute w-full bg-amber-500 min-h-75"></div>
    <?php if(isset($_GET["update"]) && $_GET["update"] == "success") { ?>
        <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-50">
            <span class="material-icons-outlined text-amber-600">check_circle</span>
            <p class="ml-3 text-sm font-medium">Your booking were successfully updated.</p>
            <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    <?php } ?>
    <?php if(isset($_GET["cancel"]) && $_GET["cancel"] == "success") { ?>
        <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-50">
            <span class="material-icons-outlined text-amber-600">check_circle</span>
            <p class="ml-3 text-sm font-medium">Your booking were successfully canceled.</p>
            <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    <?php } ?>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-transform duration-200 -translate-x-full bg-zinc-100 border-0 shadow-xl dark:shadow-none dark:bg-zinc-700 max-w-64 ease z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-zinc-100 text-zinc-900 xl:hidden" sidenav-close></i>
            <div class="flex justify-evenly items-center px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-zinc-100 text-zinc-900">
                <svg class="inline max-w-full transition-all duration-200 dark:hidden ease max-h-10" id="edDG42R0mUv1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-153 -46 315 501" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
                    <g transform="matrix(2.149438 0 0 2.149438-5.172524-140.793055)">
                    <rect width="48.671805" height="96.898694" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665-68.774944 100.111967)" stroke-width="0"/>
                    <rect width="48.671805" height="81.570087" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665 15.225056 68.111967)" stroke-width="0"/>
                    </g>
                </svg>
                <svg class="hidden max-w-full transition-all duration-200 dark:inline dark:fill-zinc-100 ease max-h-10" id="edDG42R0mUv1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-153 -46 315 501" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
                    <g transform="matrix(2.149438 0 0 2.149438-5.172524-140.793055)">
                    <rect width="48.671805" height="96.898694" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665-68.774944 100.111967)" stroke-width="0"/>
                    <rect width="48.671805" height="81.570087" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665 15.225056 68.111967)" stroke-width="0"/>
                    </g>
                </svg>
                <span class="ml-1 font-semibold text-center text-lg transition-all duration-200 ease">Pestana Dashboard</span>
            </div>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col">
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-zinc-100 dark:opacity-80 py-2.5 text-sm ease my-0 mx-2 flex items-center whitespace-nowrap px-4 rounded-lg transition-colors hover:bg-white hover:dark:shadow-white hover:dark:bg-black hover:shadow" href="my_profile">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-2xl leading-normal text-amber-500 material-icons-outlined">person</i>
                        </div>
                        <span class="ml-1 duration-300 ease">My Profile</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.5 bg-zinc-300 dark:bg-zinc-800 dark:text-zinc-100 dark:opacity-80 text-sm ease my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-zinc-700 transition-colors" href="#">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-2xl leading-normal text-amber-500 material-icons-outlined">room_service</i>
                        </div>
                        <span class="ml-1 duration-300 ease">My Bookings</span>
                    </a>
                </li>
                <?php if($_SESSION['admin'] == true) { ?>
                    <li class="w-full mt-4">
                        <div class="flex justify-center items-center gap-x-4">
                            <i class="relative top-0 text-4xl leading-normal text-yellow-400 text-shadow-zinc-1 dark:text-shadow-white-1 material-icons">admin_panel_settings</i>
                            <h6 class="text-lg text-center font-semibold leading-tight uppercase dark:text-white">ADMIN</h6>
                        </div>
                        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                    </li>
                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-zinc-100 dark:opacity-80 py-2.5 text-sm ease my-0 mx-2 flex items-center whitespace-nowrap px-4 rounded-lg transition-colors hover:bg-white hover:dark:shadow-white hover:dark:bg-black hover:shadow" href="rooms_manage">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-2xl leading-normal text-amber-500 material-icons">room_preferences</i>
                            </div>
                            <span class="ml-1 duration-300 ease">Rooms Management</span>
                        </a>
                    </li>
                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-zinc-100 dark:opacity-80 py-2.5 text-sm ease my-0 mx-2 flex items-center whitespace-nowrap px-4 rounded-lg transition-colors hover:bg-white hover:dark:shadow-white hover:dark:bg-black hover:shadow" href="actived">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-2xl leading-normal text-amber-500 material-icons-outlined">assignment_turned_in</i>
                            </div>
                            <span class="ml-1 duration-300 ease">Active Bookings</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="mx-4">
            <a href="<?= URLROOT ?>home/index">
                <svg class="w-full block dark:hidden" version="1.1" id="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="-180 0 700 550" xml:space="preserve">
                            <title>Pestana Hotel Group</title>
                            <defs>
                    <linearGradient id="bg-pestana-logo-black">
                        <stop offset="0%" stop-color="rgb(24 24 27)">
                        <animate attributeName="stop-color" values="rgb(24 24 27);rgb(251 191 36);rgb(24 24 27)" dur="5s" repeatCount="indefinite"></animate>
                        </stop>
                        <stop offset="100%" stop-color="rgb(251 191 36)">
                        <animate attributeName="stop-color" values="rgb(24 24 27);rgb(251 191 36);rgb(24 24 27)" dur="5s" repeatCount="indefinite"></animate>
                        </stop>
                    </linearGradient>
                            </defs>
                            <path fill="url(#bg-pestana-logo-black)" id="XMLID_2_" d="M-31.2,510.4h-18.6v14.4H-57v-34.6h7.1v14.1h18.6v-14.1h7.1v34.6h-7.1V510.4z M6.7,489.6
                                c10.2,0,17.9,7.6,17.9,17.9c0,10.1-7.6,17.8-17.9,17.8c-10.1,0-17.8-7.6-17.8-17.8C-11.1,497.3-3.4,489.6,6.7,489.6 M6.8,518.6
                                c6.4,0,10.8-4.8,10.8-11.1c0-6.4-4.4-11.1-10.8-11.1c-6.3,0-10.8,4.7-10.8,11.1C-4,513.8,0.5,518.6,6.8,518.6 M51.9,497.3v27.5h-7.1
                                v-27.5H33.3v-7.1h29.6v7.1H51.9z M74.5,524.8v-34.6h27.4v6.3H81.3v7.5h16.9v6.3H81.3v8.3h20.6v6.3H74.5z M115,524.8v-34.6h7.1v28.4
                                h18v6.2H115z M200.4,504.3v16.3c-3.2,2.5-9.5,4.7-14.8,4.7c-10.2,0-18.4-6.6-18.4-17.8c0-11.3,8.2-17.9,18.4-17.9
                                c5.6,0,10,1.9,13.5,4.7l-3.3,5.4c-2.7-2.2-5.9-3.5-10-3.5c-6.3,0-11.2,4.1-11.2,11.3c0,7.1,4.9,11.2,11.5,11.2
                                c2.7,0,5.3-0.7,7.2-1.8v-6.4h-9.1v-6.2H200.4z M214.1,490.2h15.2c6.8,0,13.8,2.8,13.8,11.3c0,5.7-4.2,9.9-9.8,10.7
                                c3.2,3.2,6.6,7,10.2,7c1.2,0,2.7-0.3,3.9-0.8l0.7,5.6c-1.4,0.7-3.5,1.3-5.7,1.3c-7.7,0-13.5-9.8-17.8-13h-3.5v12.5h-7.1V490.2z
                                M221.2,496.4v10.3h8.9c3.3,0,5.6-1.9,5.6-5.1c0-3.4-2.3-5.2-5.6-5.2H221.2z M273.8,489.6c10.2,0,17.9,7.6,17.9,17.9
                                c0,10.1-7.6,17.8-17.9,17.8c-10.1,0-17.8-7.6-17.8-17.8C256,497.3,263.7,489.6,273.8,489.6 M273.9,518.6c6.4,0,10.8-4.8,10.8-11.1
                                c0-6.4-4.4-11.1-10.8-11.1c-6.3,0-10.8,4.7-10.8,11.1C263.1,513.8,267.6,518.6,273.9,518.6 M311.5,509.7c0,5.5,2.8,9,8.6,9
                                c5.9,0,8.7-3.7,8.7-9.1v-19.5h7.1v20c0,8.2-5.5,15.2-15.9,15.2c-10.2,0-15.7-6.4-15.7-15.2v-20h7.1V509.7z M350.6,490.2h16.6
                                c6.8,0,12.6,4,12.6,12.6c0,7.8-5.8,12.4-12.6,12.4h-9.4v9.6h-7.1V490.2z M357.8,496.4V509h8.3c3.5,0,6.3-2.4,6.3-6.3
                                c0-4.1-2.8-6.4-6.3-6.4H357.8z M-177.8,333.1h48c19.6,0,36.5,11.5,36.5,36.6c0,22.6-16.8,36-36.5,36h-27.3v27.8h-20.7V333.1z
                                M-157.1,351.1v36.6h24.1c10.2,0,18.3-6.9,18.3-18.2c0-12-8.1-18.5-18.3-18.5H-157.1z M-76.6,433.5V333.1H2.9v18.2h-59.7v21.7h37.5
                                v18.2h-37.5v24.2H2.9v18.2H-76.6z M225.6,333.1h24.2l38.8,100.4h-21l-7.7-20.1h-45.6l-7.8,20.1h-21L225.6,333.1z M219.7,398h35.1
                                l-17.1-44.4L219.7,398z M322.2,366v67.5h-20.7V333.1h18l56.4,67.6v-67.6h20.7v100.4h-18L322.2,366z M452.2,333.1l24.2,0l38.8,100.4
                                h-21l-7.7-20.1H441l-7.8,20.1h-21L452.2,333.1z M446.3,398h35.1l-17.1-44.4L446.3,398z M203.2,333.1h-98.1v20.7h34.6v79.7h20.7
                                v-79.7h33.5L203.2,333.1z M71,375.4l-22.4-5.3c-7.2-2.1-10.9-4.3-10.9-9.7c0-5.8,5.3-9.8,18-9.8c7.4,0,19.2,1.7,26,4.3l10.5-14.2
                                l0.3-1c-7.7-4.1-21.5-8-36-8c-27.6,0-40.1,13.7-40.1,30.4c0,13.6,7.8,22.9,23,26.9l19,5.2c9,2.5,18.1,5.2,18.1,10.6
                                c0,6.6-10.6,11.2-22.7,11.2c-6.6,0-16.9-1.4-22.6-3.5l-12.2,14.2c6.9,3.6,20.5,8.2,34.4,8.2c24.2,0,44.7-12.8,44.7-31.7
                                C98,388.9,89.1,380.6,71,375.4 M158,233.5l-62.3,23.9V81.3L158,57.4V233.5z M241.7,25.4l-62.3,24.2v147.7l62.3-23.9V25.4z"/>
                </svg>
                <svg class="w-full hidden dark:block" version="1.1" id="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="-180 0 700 550" xml:space="preserve">
                            <title>Pestana Hotel Group</title>
                            <defs>
                                <linearGradient id="bg-pestana-logo">
                                    <stop offset="0%" stop-color="rgb(244 244 245)">
                                        <animate attributeName="stop-color" values="rgb(244 244 245);rgb(251 191 36);rgb(244 244 245)" dur="5s" repeatCount="indefinite"></animate>
                                    </stop>
                                    <stop offset="100%" stop-color="rgb(251 191 36)">
                                        <animate attributeName="stop-color" values="rgb(244 244 245);rgb(251 191 36);rgb(244 244 245)" dur="5s" repeatCount="indefinite"></animate>
                                    </stop>
                                </linearGradient>
                    <linearGradient id="bg-pestana-logo-black">
                        <stop offset="0%" stop-color="rgb(24 24 27)">
                        <animate attributeName="stop-color" values="rgb(24 24 27);rgb(251 191 36);rgb(24 24 27)" dur="5s" repeatCount="indefinite"></animate>
                        </stop>
                        <stop offset="100%" stop-color="rgb(251 191 36)">
                        <animate attributeName="stop-color" values="rgb(24 24 27);rgb(251 191 36);rgb(24 24 27)" dur="5s" repeatCount="indefinite"></animate>
                        </stop>
                    </linearGradient>
                            </defs>
                            <path fill="url(#bg-pestana-logo)" id="XMLID_2_" d="M-31.2,510.4h-18.6v14.4H-57v-34.6h7.1v14.1h18.6v-14.1h7.1v34.6h-7.1V510.4z M6.7,489.6
                                c10.2,0,17.9,7.6,17.9,17.9c0,10.1-7.6,17.8-17.9,17.8c-10.1,0-17.8-7.6-17.8-17.8C-11.1,497.3-3.4,489.6,6.7,489.6 M6.8,518.6
                                c6.4,0,10.8-4.8,10.8-11.1c0-6.4-4.4-11.1-10.8-11.1c-6.3,0-10.8,4.7-10.8,11.1C-4,513.8,0.5,518.6,6.8,518.6 M51.9,497.3v27.5h-7.1
                                v-27.5H33.3v-7.1h29.6v7.1H51.9z M74.5,524.8v-34.6h27.4v6.3H81.3v7.5h16.9v6.3H81.3v8.3h20.6v6.3H74.5z M115,524.8v-34.6h7.1v28.4
                                h18v6.2H115z M200.4,504.3v16.3c-3.2,2.5-9.5,4.7-14.8,4.7c-10.2,0-18.4-6.6-18.4-17.8c0-11.3,8.2-17.9,18.4-17.9
                                c5.6,0,10,1.9,13.5,4.7l-3.3,5.4c-2.7-2.2-5.9-3.5-10-3.5c-6.3,0-11.2,4.1-11.2,11.3c0,7.1,4.9,11.2,11.5,11.2
                                c2.7,0,5.3-0.7,7.2-1.8v-6.4h-9.1v-6.2H200.4z M214.1,490.2h15.2c6.8,0,13.8,2.8,13.8,11.3c0,5.7-4.2,9.9-9.8,10.7
                                c3.2,3.2,6.6,7,10.2,7c1.2,0,2.7-0.3,3.9-0.8l0.7,5.6c-1.4,0.7-3.5,1.3-5.7,1.3c-7.7,0-13.5-9.8-17.8-13h-3.5v12.5h-7.1V490.2z
                                M221.2,496.4v10.3h8.9c3.3,0,5.6-1.9,5.6-5.1c0-3.4-2.3-5.2-5.6-5.2H221.2z M273.8,489.6c10.2,0,17.9,7.6,17.9,17.9
                                c0,10.1-7.6,17.8-17.9,17.8c-10.1,0-17.8-7.6-17.8-17.8C256,497.3,263.7,489.6,273.8,489.6 M273.9,518.6c6.4,0,10.8-4.8,10.8-11.1
                                c0-6.4-4.4-11.1-10.8-11.1c-6.3,0-10.8,4.7-10.8,11.1C263.1,513.8,267.6,518.6,273.9,518.6 M311.5,509.7c0,5.5,2.8,9,8.6,9
                                c5.9,0,8.7-3.7,8.7-9.1v-19.5h7.1v20c0,8.2-5.5,15.2-15.9,15.2c-10.2,0-15.7-6.4-15.7-15.2v-20h7.1V509.7z M350.6,490.2h16.6
                                c6.8,0,12.6,4,12.6,12.6c0,7.8-5.8,12.4-12.6,12.4h-9.4v9.6h-7.1V490.2z M357.8,496.4V509h8.3c3.5,0,6.3-2.4,6.3-6.3
                                c0-4.1-2.8-6.4-6.3-6.4H357.8z M-177.8,333.1h48c19.6,0,36.5,11.5,36.5,36.6c0,22.6-16.8,36-36.5,36h-27.3v27.8h-20.7V333.1z
                                M-157.1,351.1v36.6h24.1c10.2,0,18.3-6.9,18.3-18.2c0-12-8.1-18.5-18.3-18.5H-157.1z M-76.6,433.5V333.1H2.9v18.2h-59.7v21.7h37.5
                                v18.2h-37.5v24.2H2.9v18.2H-76.6z M225.6,333.1h24.2l38.8,100.4h-21l-7.7-20.1h-45.6l-7.8,20.1h-21L225.6,333.1z M219.7,398h35.1
                                l-17.1-44.4L219.7,398z M322.2,366v67.5h-20.7V333.1h18l56.4,67.6v-67.6h20.7v100.4h-18L322.2,366z M452.2,333.1l24.2,0l38.8,100.4
                                h-21l-7.7-20.1H441l-7.8,20.1h-21L452.2,333.1z M446.3,398h35.1l-17.1-44.4L446.3,398z M203.2,333.1h-98.1v20.7h34.6v79.7h20.7
                                v-79.7h33.5L203.2,333.1z M71,375.4l-22.4-5.3c-7.2-2.1-10.9-4.3-10.9-9.7c0-5.8,5.3-9.8,18-9.8c7.4,0,19.2,1.7,26,4.3l10.5-14.2
                                l0.3-1c-7.7-4.1-21.5-8-36-8c-27.6,0-40.1,13.7-40.1,30.4c0,13.6,7.8,22.9,23,26.9l19,5.2c9,2.5,18.1,5.2,18.1,10.6
                                c0,6.6-10.6,11.2-22.7,11.2c-6.6,0-16.9-1.4-22.6-3.5l-12.2,14.2c6.9,3.6,20.5,8.2,34.4,8.2c24.2,0,44.7-12.8,44.7-31.7
                                C98,388.9,89.1,380.6,71,375.4 M158,233.5l-62.3,23.9V81.3L158,57.4V233.5z M241.7,25.4l-62.3,24.2v147.7l62.3-23.9V25.4z"/>
                </svg>
            </a>
        </div>
    </aside>
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <!-- breadcrumb -->
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal text-zinc-600">Dashboard</li>
                        <li class="text-sm pl-2 capitalize leading-normal text-zinc-600 before:float-left before:pr-2 before:text-zinc-600 before:content-['/']" aria-current="page">My Bookings</li>
                    </ol>
                </nav>
                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full md:ml-auto">
                        <li class="flex items-center text-zinc-100">
                                <i class="relative top-0 text-2xl leading-normal material-icons-outlined">waving_hand</i>
                                <span class="hidden sm:inline ml-2 text-lg font-semibold">Welcome back <?= $_SESSION['first-name'] . " " . $_SESSION['family-name'];?></span>
                        </li>
                        <li class="flex items-center pl-4 xl:hidden">
                            <button type="button" class="block p-0 text-sm text-white transition-all ease" sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                </div>
                            </button>
                        </li>
                        <li class="flex items-center px-4">
                            <input fixed-plugin id="dark-toggle" class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 after:checked:translate-x-7 h-7 relative float-left mt-1 ml-auto w-14 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-6 after:w-6 after:translate-x-px after:bg-white after:font-goggle after:text-center after:content-['\e518'] after:text-amber-500 after:checked:content-['\e51c'] after:checked:text-blue-700 checked:border-zinc-900 checked:bg-zinc-900 checked:bg-none checked:bg-right" type="checkbox" />
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="w-full max-w-full mt-10 bg-white border-0 shadow-xl dark:bg-zinc-800 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white text-xl font-semibold">My Bookings</h6>
                </div>
                <div class="px-0 pb-2">
                    <div class="overflow-x-auto scroll-bar">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Room Type</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Check In</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Check Out</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Bookers</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Price</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($reservations as $reserv) { 
                                        if($reserv['Check_Out'] != "0000-00-00" && $reserv['Check_In'] != "0000-00-00") { 
                                ?>
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <button class="bookers-pop relative left-1/2 -translate-x-1/2">
                                                <span class="material-icons">more_horiz</span>
                                            </button>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="px-2 py-1">
                                                <h6 class="leading-normal dark:text-white"><?= $reserv['Room_Name'] ?></h6>
                                                <p class="text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400"><?= $reserv['Room_Type'] ?></p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80"><?= $reserv['Check_In'] ?></p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80"><?= $reserv['Check_Out'] ?></p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80">
                                                <?php
                                                    $count_bookers = 0;
                                                    foreach($bookers as $booker) {
                                                        if($booker["ReservationID"] == $reserv["ID"]) {
                                                            $count_bookers++;
                                                        }
                                                    }
                                                    echo $count_bookers;
                                                ?>
                                            </p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="text-sm font-semibold leading-tight dark:text-white dark:opacity-80"><?= number_format($reserv['Price'], 2) . " €" ?></p>
                                        </td>
                                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <?php if($reserv['Check_Out'] >= date("Y-m-d") && $reserv['Check_In'] <= date("Y-m-d")) { ?>
                                                <span class="bg-gradient-to-tl from-emerald-600 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">In Service</span>
                                            <?php }else if($reserv['Check_Out'] < date("Y-m-d")) { ?>
                                                <span class="bg-gradient-to-tl from-blue-600 to-sky-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Done</span>
                                            <?php }else if($reserv['Check_In'] > date("Y-m-d")) { ?>
                                                <span class="bg-gradient-to-tl from-amber-600 to-yellow-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Pending</span>
                                            <?php } ?>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <?php if(!empty($reserv['Check_In']) && ($reserv['Check_In'] > date('Y-m-d'))) { ?>
                                                <button type="button" class="update-btn inline-flex items-center px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in hover:-translate-y-px active:opacity-85 bg-x-25 text-sky-700 dark:text-sky-300"><span class="material-icons-outlined mr-2 text-sky-700 dark:text-sky-300">edit</span>Edit</button>
                                                <button type="button" class="cancel-btn relative z-10 inline-flex items-center px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-gradient-to-tl from-red-700 to-orange-600 dark:from-red-400 dark:to-orange-300 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"><span class="material-icons-outlined mr-2 bg-gradient-to-tl from-red-700 to-orange-600 dark:from-red-400 dark:to-orange-300 bg-x-25 bg-clip-text">highlight_off</span>Cancel</button>
                                                <div class="cancel-popup fixed hidden top-1/2 left-1/2 w-[500px] max-w-[94%] h-72 bg-slate-100 text-slate-900 rounded-xl px-3 py-8 -translate-x-1/2 -translate-y-1/2 z-[999]">
                                                    <div class="flex flex-col justify-between items-center w-full h-full">
                                                        <p class="text-center font-semibold text-2xl">ARE YOU SURE THAT YOU WANT<br>TO CANCEL YOUR RESERVATION?</p>
                                                        <p class="text-center text-sm">Note that you'll lose -1% of your discount.</p>
                                                        <div>
                                                            <span class="material-icons-outlined text-6xl text-amber-400 text-stroke-black-2">warning</span>
                                                        </div>
                                                        <div class="flex gap-8">
                                                            <button class="undo-btn bg-slate-900 text-slate-100 px-4 py-2 rounded-lg font-semibold">Nooooo!</button>
                                                            <a href="cancel_booking/<?= $reserv['ID'] ?>" class="rounded-lg"><p class="bg-red-600 text-slate-100 px-4 py-2 rounded-lg font-semibold">Yes, I'm sure</p></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php foreach($reservations as $reserv) { ?>
                <div class="bookers hidden fixed top-1/2 left-1/2 px-4 py-3 -translate-x-1/2 -translate-y-1/2 bg-white border shadow-xl dark:bg-zinc-800 dark:shadow-dark-xl rounded-2xl bg-clip-border z-[999]">
                    <div class="flex justify-between">
                        <h6 class="dark:text-white text-lg font-semibold">Bookers</h6>
                        <button>
                            <span class="bookers-btn material-icons-outlined text-3xl text-zinc-900 dark:text-zinc-100">close</span>
                        </button>
                    </div>
                    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">First Name</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Family Name</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Birthday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($bookers as $booker) { 
                                    if($booker['ReservationID'] == $reserv['ID']) {
                            ?>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="text-base font-semibold dark:text-white dark:opacity-80"><?= $booker['First_Name'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="text-base font-semibold dark:text-white dark:opacity-80"><?= $booker['Family_Name'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-t dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="text-base font-semibold dark:text-white dark:opacity-80"><?= $booker['Birthday'] ?></p>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php foreach($reservations as $reserv) { ?>
                <div class="update-bookers hidden fixed top-1/2 left-1/2 px-4 py-3 -translate-x-1/2 -translate-y-1/2 bg-white border shadow-xl dark:bg-zinc-800 dark:shadow-dark-xl rounded-2xl bg-clip-border z-[999]">
                    <div class="flex justify-between">
                        <h6 class="dark:text-white text-lg font-semibold">Update bookers</h6>
                        <button>
                            <span class="close-update material-icons-outlined text-3xl text-zinc-900 dark:text-zinc-100">close</span>
                        </button>
                    </div>
                    <form action="update_bookers" method="post">
                        <div class="guests-form max-h-[600px] overflow-y-auto">
                            <div class="flex flex-col items-center gap-y-10 w-full min-h-full py-10 px-6">
                                <?php 
                                    $cnt = 1;
                                    foreach($bookers as $booker) { 
                                        if($booker['ReservationID'] == $reserv['ID']) {
                                ?>
                                    <div class="flex flex-col items-center gap-y-10" id="guest-info-cont">
                                        <h4 class="text-2xl font-semibold text-center dark:text-zinc-100"># - <span class="text-amber-400 font-bold"><?= $cnt ?></span></h4>
                                        <div class="input-container relative w-80">
                                            <input class="w-full p-4 border border-solid rounded-lg border-zinc-900 dark:border-white text-zinc-900 dark:text-zinc-100 bg-white dark:bg-zinc-800 outline-none transition duration-300" type="text" name="first-name[]" value="<?= $booker['First_Name'] ?>" required>
                                            <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">First Name</span>
                                        </div>
                                        <div class="input-container relative w-80">
                                            <input class="w-full p-4 border border-solid rounded-lg border-zinc-900 dark:border-white text-zinc-900 dark:text-zinc-100 bg-white dark:bg-zinc-800 outline-none transition duration-300" type="text" name="family-name[]" value="<?= $booker['Family_Name'] ?>" required>
                                            <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Family Name</span>
                                        </div>
                                        <div class="input-container relative w-80">
                                            <input class="w-full p-4 border border-solid rounded-lg border-zinc-900 dark:border-white text-white dark:text-zinc-900 bg-white dark:bg-zinc-800 outline-none transition duration-300 focus:text-zinc-900 dark:focus:text-white valid:text-zinc-900 dark:valid:text-white" type="date" name="bday[]" value="<?= $booker['Birthday'] ?>" required>
                                            <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Birthday</span>
                                        </div>
                                        <input onlyread type="hidden" name="booker-id[]" value="<?= $booker['ID']; ?>">
                                    </div>
                                <?php
                                            $cnt++;
                                        }
                                    }
                                ?>
                                <div class="flex justify-around items-center gap-x-10 text-zinc-900 font-semibold text-xl">
                                    <button type="reset" class="group relative w-40 py-2 bg-amber-400 rounded-md before:absolute before:top-0 before:-left-8 before:h-full before:w-5 before:bg-gradient-to-l before:from-zinc-100 before:to-transparent before:bg-opacity-40 before:skew-x-[30deg] before:transition-all before:duration-300 before:hover:left-[110%] active:bg-amber-500 overflow-hidden"><p class="transition-all duration-300 group-hover:scale-110 group-active:scale-95 group-active:transition-none">Reset</p></button>
                                    <button type="submit" name="submit" class="group relative w-40 py-2 bg-amber-400 rounded-md before:absolute before:top-0 before:-left-8 before:h-full before:w-5 before:bg-gradient-to-l before:from-zinc-100 before:to-transparent before:bg-opacity-40 before:skew-x-[30deg] before:transition-all before:duration-300 before:hover:left-[110%] active:bg-amber-500 overflow-hidden"><p class="transition-all duration-300 group-hover:scale-110 group-active:scale-95 group-active:transition-none">Update</p></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php 
                    } 
                include_once(INCLUDES . "d-footer.php");
            ?>
        </div>
    </main>
    <div class="blured-bg hidden fixed top-1/2 left-1/2 w-screen h-screen rounded-xl -translate-x-1/2 -translate-y-1/2 z-[998] backdrop-blur"></div>
</body>
<!-- plugin for charts  -->
<script src="<?= URLROOT ?>js/js/plugins/chartjs.min.js" async></script>
<!-- main script file  -->
<script src="<?= URLROOT ?>js/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>
<?php }
