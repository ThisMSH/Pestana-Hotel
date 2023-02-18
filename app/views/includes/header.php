<header class="fixed h-52 top-0 w-full bg-zinc-900 bg-opacity-20 backdrop-blur-md transition-all duration-300 z-40">
    <nav class="relative h-full flex justify-between md:justify-around items-center px-5 md:px-0">
        <!-- Left side of the navbar -->
        <div class="hidden md:block">
            <a class="group inline-block md:mr-10 w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="index"><p class="transition-all duration-300 group-hover:scale-125">Home</p></a>
            <a class="group inline-block w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="#"><p class="transition-all duration-300 group-hover:scale-125">About Us</p></a>
        </div>
        <!-- Logo of the website -->
        <div>
            <a class="w-10" href="#">
                <svg class="fill-zinc-100 w-16" id="edDG42R0mUv1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-153 -46 315 501" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
                    <g transform="matrix(2.149438 0 0 2.149438-5.172524-140.793055)">
                        <rect width="48.671805" height="96.898694" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665-68.774944 100.111967)" stroke-width="0"/>
                        <rect width="48.671805" height="81.570087" rx="0" ry="0" transform="matrix(1.285136-.493317 0 1.82665 15.225056 68.111967)" stroke-width="0"/>
                    </g>
                </svg>
            </a>
        </div>
        <!-- Right side of the navbar -->
        <?php if(!isset($_SESSION["id"])) {?>
        <div class="hidden md:block">
            <a class="group inline-block w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "signin/login" ?>"><p class="transition-all duration-300 group-hover:scale-125">Sign In</p></a>
            <a class="group inline-block md:ml-10 w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "signup/register" ?>"><p class="transition-all duration-300 group-hover:scale-125">Sign Up</p></a>
        </div>
        <?php }else { ?>
        <div class="hidden md:block">
            <a class="group inline-block w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "signin/login" ?>"><p class="transition-all duration-300 group-hover:scale-125">Dashboard</p></a>
            <a class="group inline-block md:ml-10 w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "home/logout" ?>"><p class="transition-all duration-300 group-hover:scale-125">Logout</p></a>
        </div>
        <?php } ?>
        <!-- Side bar & Burger menu -->
        <div class="absolute flex flex-col justify-around items-center top-0 -right-60 md:hidden min-h-screen w-60 bg-zinc-100 text-zinc-900 rounded-l-2xl transition-all duration-500" id="side-bar">
            <button class="text-3xl border border-zinc-900 rounded-lg flex justify-center items-center px-2 py-3 self-end mr-5" id="close-btn" type="button"><span class="material-icons-outlined text-4xl">close</span></button>
            <div class="flex flex-col justify-center gap-y-5">
                <a class="group inline-block md:mr-10 w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="index"><p class="transition-all duration-300 group-hover:scale-125">Home</p></a>
                <a class="group inline-block w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="#"><p class="transition-all duration-300 group-hover:scale-125">About Us</p></a>
                <a class="group inline-block w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "signin/login" ?>"><p class="transition-all duration-300 group-hover:scale-125">Sign In</p></a>
                <a class="group inline-block md:ml-10 w-32 h-12 py-2 text-center text-lg font-semibold border rounded-lg overflow-hidden relative shadow-lg transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-amber-400 before:shadow before:shadow-amber-400 before:transition-all before:duration-300 hover:shadow-amber-400 hover:text-zinc-900 hover:before:w-full hover:before:left-0" href="<?= URLROOT . "signup/register" ?>"><p class="transition-all duration-300 group-hover:scale-125">Sign Up</p></a>
            </div>
            <div class="">
                <svg class="w-11/12 mx-auto" version="1.1" id="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-180 0 700 550" xml:space="preserve">
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
            </div>
        </div>
        <button class="md:hidden text-3xl border border-zinc-100 rounded-lg flex justify-center items-center px-2 py-3" id="menu-btn" type="button"><span class="material-icons-outlined text-4xl">menu</span></button>
    </nav>
</header>