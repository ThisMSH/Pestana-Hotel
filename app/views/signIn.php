<?php
if(isset($_SESSION["id"])) {
    header("location: " . URLROOT . "home/index");
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Welcome to Pestana Hotel where you can find the best offers and the most comfortable services.">
	<link rel="shortcut icon" href="<?= URLROOT ?>/img/logo/pestana_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/b44b654493.js" crossorigin="anonymous"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/tailwind_style.css">
	<link rel="stylesheet" href="<?= URLROOT ?>/css/style.css">
    <script src="<?= URLROOT ?>/js/signIn.js" defer></script>
	<title>Sign In - Pestana Hotel</title>
</head>
<body class="bg-zinc-900 text-zinc-100">
    <?php if(isset($_GET["account"]) && $_GET["account"] == "success") { ?>
    <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-10">
        <span class="material-icons-outlined text-amber-600">check_circle</span>
        <p class="ml-3 text-sm font-medium">Congratulations! Your account has been successfully created.</p>
        <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <?php } ?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "empty") { ?>
    <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-10">
        <span class="material-icons-outlined text-amber-600">cancel</span>
        <p class="ml-3 text-sm font-medium">Please fill in all the inputs.</p>
        <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <?php } ?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "stmt1_failed" || isset($_GET["error"]) && $_GET["error"] == "stmt2_failed") { ?>
    <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-10">
        <span class="material-icons-outlined text-amber-600">cancel</span>
        <p class="ml-3 text-sm font-medium">
            <?php if($_GET["error"] == "stmt1_failed") {echo "First ";}
            elseif($_GET["error"] == "stmt2_failed") {echo "Second ";} ?>
            statement failed.
        </p>
        <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <?php } ?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "wrong1" || isset($_GET["error"]) && $_GET["error"] == "wrong2") { ?>
    <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-10">
        <span class="material-icons-outlined text-amber-600">cancel</span>
        <p class="ml-3 text-sm font-medium">Your Username/Email or/and the password is wrong.</p>
        <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <?php } ?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "no_users") { ?>
    <div id="alert" class="fixed top-10 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-10">
        <span class="material-icons-outlined text-amber-600">cancel</span>
        <p class="ml-3 text-sm font-medium">Account not found</p>
        <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
            <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <?php } ?>
    <div class="absolute w-full min-h-screen top-0 left-0 md:bg-signInBg bg-top bg-[length:1920px]">
        <div class="relative md:top-36">
            <form action="signing" method="post">
                <div class="flex flex-col justify-center items-center gap-y-10">
                    <svg class="w-72 fill-white" version="1.1" id="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="-200 -46 752 652" xml:space="preserve">
                        <title>Pestana Hotel Logo</title>
                        <path id="XMLID_2_" d="M-31.2,510.4h-18.6v14.4H-57v-34.6h7.1v14.1h18.6v-14.1h7.1v34.6h-7.1V510.4z M6.7,489.6
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
                    <div class="input-container relative w-80">
                        <input class="w-full p-4 border border-solid border-zinc-100 rounded-lg text-zinc-100 bg-zinc-900 outline-none" type="text" name="user" autofocus required>
                        <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Username or E-mail</span>
                    </div>
                    <div class="input-container relative w-80">
                        <input class="w-full p-4 border border-solid border-zinc-100 rounded-lg text-zinc-100 bg-zinc-900 outline-none" type="password" name="password" required>
                        <span class="absolute left-0 p-4 pointer-events-none text-zinc-100 transition-all duration-300 ease-in-out">Password</span>
                    </div>
                    <button class="group relative overflow-hidden px-14 py-4 border-2 border-zinc-100 rounded-full text-xl before:absolute before:left-0 before:top-0 before:w-1/2 before:h-full before:bg-gradient-to-l before:from-zinc-100-0.4 before:skew-x-[45deg] before:transition-all before:duration-500 hover:before:left-44" type="submit" name="submit"><p class="transition-all duration-500 ease-in-out group-hover:scale-125">Sign In</p></button>
                    <p class="shadow-md">You don't have an account? <a href="<?= URLROOT . "signup/register" ?>" class="underline decoration-amber-400 decoration-2 underline-offset-2">Sign Up now!</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php }
