<form class="max-w-xs mt-9 md:max-w-sm mx-auto" action="<?= BASE_URL ?>profile/update_user/<?= $_SESSION['user_id'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
  <div class="mb-5">
    <label for="gambar" class="block mb-2"><img src="<?= BASE_URL ?>public/img/<?= $user_data['foto'] ?>" alt=""></label>
    <input type="file" id="gambar" name="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
  </div>
  <div class="custom-select">
        <img id="selected-image" src="<?= BASE_URL ?>public/img/<?= $user_data['banner'] ?>" alt="">
        <select name="banner" id="banner-select" >
            <option value="banner1.png">Banner 1</option>
            <option value="banner2.png">Banner 2</option>
            <option value="banner3.png">Banner 3</option>
            <option value="banner4.png">Banner 4</option>
        </select>
    </div>
  <div class="mb-5">
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
    <input type="text" id="nama" name="nama" value="<?= $user_data['nama'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
  </div>
  <div class="mb-5">
    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $user_data['deskripsi'] ?></textarea>
  </div>
  <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
</form>