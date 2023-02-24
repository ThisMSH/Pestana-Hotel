<?php
$rooms = new HomeController();
$room_n_c = $rooms->get_room_names_capacities();
$room_n_t = $rooms->get_room_types();
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
	<script src="<?= URLROOT ?>/js/script.js" defer></script>
	<title>Pestana Hotel</title>
</head>
<body class="bg-zinc-900 text-zinc-100">
	<!-- Breakpoints of TailwindCSS -->
    <!-- <div class="fixed top-96 left-4 z-50 bg-black">
        <p class="text-4xl font-bold block sm:hidden">ESM</p>
        <p class="text-4xl font-bold hidden sm:block md:hidden">SM</p>
        <p class="text-4xl font-bold hidden md:block lg:hidden">MD</p>
        <p class="text-4xl font-bold hidden lg:block xl:hidden">LG</p>
        <p class="text-4xl font-bold hidden xl:block 2xl:hidden">XL</p>
        <p class="text-4xl font-bold hidden 2xl:block">2XL</p>
    </div> -->
    <?php require_once(INCLUDES . "header.php"); ?>
	<main class="mt-52">
        <?php if(isset($_GET["booking"]) && $_GET["booking"] == "success") { ?>
        <div id="alert" class="fixed top-44 left-1/2 -translate-x-1/2 flex p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 z-50">
            <span class="material-icons-outlined text-amber-600">check_circle</span>
            <p class="ml-3 text-sm font-medium">Thank you. Your reservation has been successfully added.</p>
            <button type="button" id="close-alert" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 pointer-events-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <?php } ?>
		<!-- Top section right below navbar -->
		<section class="h-[800px] lg:h-[700px] flex flex-col-reverse lg:flex-row justify-evenly items-center overflow-hidden">
			<div class="relative w-11/12 sm:w-6/12 h-[600px] flex justify-center items-center">
				<div class="top-imgs w-full lg:w-2/3 absolute before:absolute before:w-20 before:h-20 md:before:w-36 md:before:h-36 before:bg-img1 before:bg-cover before:bg-center before:top-5 before:left-10 sm:before:top-20 sm:before:left-full">
					<img src="<?= URLROOT ?>/img/home/bed.png" alt="Bed" srcset="">
					<p class="text-2xl lg:text-3xl font-semibold text-center"><span class="text-amber-400">Comfortable rooms</span> that will fit all your needs.</p>
				</div>
				<div class="top-imgs w-full lg:w-2/3 absolute before:absolute before:bg-img2 before:bg-cover before:bg-center before:w-28 before:h-20 md:before:w-44 md:before:h-36 before:top-5 before:left-10 sm:before:top-20 sm:before:left-full">
					<img src="<?= URLROOT ?>/img/home/gaming.png" alt="Gamers" srcset="">
					<p class="text-2xl lg:text-3xl font-semibold text-center"><span class="text-amber-400">Play</span> with your partners and have fun with all our <span class="text-amber-400">entertainment services</span>.</p>
				</div>
				<div class="top-imgs w-full lg:w-2/3 absolute before:absolute before:bg-img3 before:bg-cover before:bg-center before:w-36 before:h-20 md:before:w-52 md:before:h-36 before:top-5 before:left-10 sm:before:top-20 sm:before:left-full">
					<img src="<?= URLROOT ?>/img/home/pool.png" alt="Pool" srcset="">
					<p class="text-2xl lg:text-3xl font-semibold text-center">Enjoy our <span class="text-amber-400">pool</span>.</p>
				</div>
				<div class="top-imgs w-full lg:w-2/3 absolute before:absolute before:bg-img4 before:bg-cover before:bg-center before:w-24 before:h-20 md:before:w-40 md:before:h-36 before:top-5 before:left-10 sm:before:top-20 sm:before:left-full">
					<img src="<?= URLROOT ?>/img/home/service.png" alt="Waiter" srcset="">
					<p class="text-2xl lg:text-3xl font-semibold text-center">Get the best <span class="text-amber-400">services</span> from our services teams.</p>
				</div>
			</div>
			<div class="w-3/4 md:w-4/12 flex justify-center">
				<svg class="w-96" version="1.1" id="layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
			</div>
		</section>
		<!-- Small section where the user can pick the room that he needs -->
		<section class="py-10 px-3 md:px-0">
			<svg class="relative rotate-180 container max-w-3xl fill-zinc-100 top-0.5" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"><g fill="%23000000"><path d="M-1-.4h1004v34a874.4 874.4 0 01-178.7 17.8c-68.8-.4-106.2-8.9-150.6-14-172-19.7-238 35.3-411.7 34.2A860 860 0 01-1 27.4"></path><path d="M-1 5.4h1004v31c-57.6 13-118 26-178.7 25.8-68.9-.4-106.2-9.7-150.6-15.3-172-21.7-238 38.7-411.7 37.4C201.4 84 110.6 69.4-1 29.5" opacity=".5"></path><path d="M492.6 100.6a442.8 442.8 0 01233-4c3.8 1-1.3-2.8-1.9-3.3a36.2 36.2 0 00-11.6-6.1A447 447 0 00476 91c-.6.1 6.9 5.5 7.5 6 2 1.1 6.5 4.3 9 3.6z" opacity=".5"></path><path d="M699.5 68.2a336.2 336.2 0 00-181-5.9c-2 .5 4.3 4.5 4.8 4.8 2 1.3 8 5.8 10.8 5.1A332.4 332.4 0 01713 77.6c3.8 1.2-1.4-3-2-3.3a41 41 0 00-11.5-6.1z"></path></g></svg>
			<form action="<?= URLROOT ?>booking/search" method="post" class="py-5 max-w-3xl mx-auto bg-zinc-100 text-zinc-900">
				<div class="container max-w-xl grid grid-cols-12 gap-x-8 gap-y-2 px-2 md:px-0">
					<h3 class="col-span-12 font-serif text-lg">Please choose the type of room that fits your needs followed by the number of your guests:</h3>
					<div class="col-span-9 relative">
						<select class="w-full col-span-3 px-6 py-3 text-lg bg-zinc-200 border border-zinc-900 rounded-lg" name="room-name" id="room-name">
							<?php foreach($room_n_c as $name) { 
								echo '<option value="' . $name["Room_Name"] . '">' . $name["Room_Name"] . '</option>';
							} ?>
						</select>
					</div>
					<select class="col-span-3 bg-zinc-200 border border-zinc-900 rounded-lg px-4 py-3 text-lg" name="guests-number" id="guests-number">
						<option value="1">1</option>
					</select>
					<div class="col-span-12" id="room-type">

                    </div>
					<h3 class="col-span-12 font-serif text-lg">Please choose the date of your booking:</h3>
					<div class="date flex justify-between items-center md:block col-span-12 md:col-span-4">
						<label class="font-serif text-lg" for="checkin-date">Check In</label>
						<input class="bg-zinc-200 border border-zinc-900 rounded-lg px-4 py-3" type="date" id="checkin-date" name="check-in" min="<?= date('Y-m-d') ?>" required>
					</div>
					<div class="date flex justify-between items-center md:block col-span-12 md:col-span-4">
						<label class="font-serif text-lg" for="checkout-date">Check Out</label>
						<input class="bg-zinc-200 border border-zinc-900 rounded-lg px-4 py-3" type="date" id="checkout-date" name="check-out" min="<?= date('Y-m-d') ?>" required>
					</div>
					<button class="group col-span-4 col-start-5 md:col-start-auto border border-zinc-900 rounded-xl active:bg-slate-300 py-3 px-2" type="submit" name="search"><p class="text-2xl transition duration-300 group-hover:scale-125">Search</p></button>
				</div>
			</form>
			<svg class="relative container max-w-3xl fill-zinc-100 bottom-0.5" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"><g fill="%23000000"><path d="M907 19c-55-5-97 5-109 8-44 12-44 24-101 44-36 12-63 21-97 20-46-1-81-20-100-33-19 13-54 32-100 33-34 1-61-8-97-20-57-20-57-32-101-44-12-3-54-13-109-8A306 306 0 000 43V0h1000v43a306 306 0 00-93-24z"></path><path d="M50 38s76-32 155 2c0 0-65-21-155-2z" opacity=".5"></path><path d="M80 46s47-20 95 1c0 0-40-13-95-1z" opacity=".3"></path><path d="M801 38s76-32 155 2c0 0-65-21-155-2z" opacity=".5"></path><path d="M831 46s47-20 95 1c0 0-40-13-95-1z" opacity=".3"></path></g></svg>
		</section>
		<!-- This section will display the offers of the hotel (rooms only) -->
		<section></section>
		<!-- This section will display the discounts offer -->
		<section></section>
		<!-- This section will display some services of the hotel (e.g.: WIFI, Parking, Swimming pool ... etc)  -->
		<section></section>
		<!-- This section will display a brief paragraph about you to choose this hotel -->
		<section></section>
	</main>
    <?php require_once(INCLUDES . "footer.php"); ?>
</body>
<script>
	const roomName = document.querySelector("#room-name");
	const guestsNum = document.querySelector("#guests-number");
	const roomType = document.querySelector("#room-type");

	roomName.addEventListener("change", function(event) {
		guestsNum.innerHTML = "";
		roomType.innerHTML = "";

		const selectedRoom = event.target.value;
		let guests = 0;

        if(selectedRoom == "<?= $room_n_c[0]["Room_Name"]?>") {
		    guests = <?= $room_n_c[0]["Room_Capacity"]?>;
            <?php
                $count = 0;
                for($i = 0; $i < count($room_n_t); $i++) {
                    if(!empty($room_n_t[$i]["Room_Type"]) && $room_n_t[$i]["Room_Name"] == $room_n_c[0]["Room_Name"]) {
                        $count++;
                    }
                }
                if($count > 0) {
                    echo 'roomType.innerHTML = `
                    <h3 class="w-full font-serif text-lg mb-1">Please select the type of suite room:</h3>
                    <select class="w-full col-span-3 px-6 py-3 text-lg bg-zinc-200 border border-zinc-900 rounded-lg" name="room-type" id="">';
                    for($i = 0; $i < count($room_n_t); $i++) {
                        if(!empty($room_n_t[$i]["Room_Type"]) && $room_n_t[$i]["Room_Name"] == $room_n_c[0]["Room_Name"]) {
                            echo '<option value="' . $room_n_t[$i]["Room_Type"] . '">' . $room_n_t[$i]["Room_Type"] . '</option>';
                        }
                    }
                    echo '</select>`;';
                }
            ?>
        }
		<?php for($i = 1; $i < count($room_n_c); $i++) { ?>
            if(selectedRoom == "<?= $room_n_c[$i]["Room_Name"]?>") {
                guests = <?= $room_n_c[$i]["Room_Capacity"]?>;
                <?php
                    $count = 0;
                    for($j = 0; $j < count($room_n_t); $j++) {
                        if(!empty($room_n_t[$j]["Room_Type"]) && $room_n_t[$j]["Room_Name"] == $room_n_c[$i]["Room_Name"]) {
                            $count++;
                        }
                    }
                    if($count > 0) {
                        echo 'roomType.innerHTML = `
                        <h3 class="w-full font-serif text-lg mb-1">Please select the type of suite room:</h3>
                        <select class="w-full col-span-3 px-6 py-3 text-lg bg-zinc-200 border border-zinc-900 rounded-lg" name="room-type" id="">';
                        for($j = 0; $j < count($room_n_t); $j++) {
                            if(!empty($room_n_t[$j]["Room_Type"]) && $room_n_t[$j]["Room_Name"] == $room_n_c[$i]["Room_Name"]) {
                                echo '<option value="' . $room_n_t[$j]["Room_Type"] . '">' . $room_n_t[$j]["Room_Type"] . '</option>';
                            }
                        }
                        echo '</select>`;';
                    }
                ?>
            }
		<?php } ?>

		for(let i = 1; i <= guests; i++) {
			const options = document.createElement("option");
			options.value = i;
			options.innerHTML = i;
			guestsNum.appendChild(options);
		}
	});
</script>
</html>