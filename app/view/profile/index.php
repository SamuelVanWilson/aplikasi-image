<div class="fixed top-0 left-0 -z-10">
	<img src="<?= BASE_URL ?>public/img/<?= $user_data['banner'] ?>" alt="Banner Profile" class="w-full ">
</div>
<div class="bg-white p-8 rounded-t-3xl w-full mt-20">
	<!-- User Info with Verified Button -->
	<div class="flex items-center flex-col -mt-16 ">
		<div class=" relative">
			<a href="<?= BASE_URL ?>profile/setting" class="shadow-sm shadow-gray-400 bg-gradient-to-r to-blue-800 from-blue-600 w-fit rounded-full absolute top-2 -right-1">
				<svg class="p-1" xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" fill="white"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
			</a>
			<img src="<?= BASE_URL ?>public/img/<?= $user_data['foto'] ?>" alt="Profile Picture" class=" bg-gray-100 p-2 mt-3 bottom-0 w-20 h-20 rounded-full border-4 border-white">
		</div>
		<h2 class="text-xl font-bold text-gray-800"><?=$user_data['nama']?></h2>
	</div>
	<!-- Bio -->
	<p class="text-gray-700 mt-2"><?=$user_data['deskripsi']?></p>
	<!-- Social Links -->
	<!-- Separator Line -->
	<hr class="my-4 border-t border-gray-300">
	<!-- Stats -->
	<div class="flex justify-between text-gray-600 mx-2">
		<div class="text-center">
			<span class="block font-bold text-lg">1.5k</span>
			<span class="text-xs">Followers</span>
		</div>
		<div class="text-center">
			<span class="block font-bold text-lg">120</span>
			<span class="text-xs">Following</span>
		</div>
		<div class="text-center">
			<span class="block font-bold text-lg">0</span>
			<span class="text-xs">Posts</span>
		</div>
	</div>
</div>