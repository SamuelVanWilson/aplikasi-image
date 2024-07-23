<?php if ($tabbar_halaman == 'beranda') :?>
<div class=" border-b w-full border-gray-200 dark:border-gray-700 fixed bottom-0 left-0">
    <ul class="flex justify-center w-full flex-wrap text-sm font-medium " id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="home-tab" data-tabs-target="#home" role="tab" aria-controls="home" aria-selected="false">Home</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
    </ul>
</div>
<?php endif; ?>
<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 absolute" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
<div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 absolute" id="home" role="tabpanel" aria-labelledby="home-tab"></div>
<script src="<?= BASE_URL ?>public/js/direct.js?v=1"></script>
<script src="<?= BASE_URL ?>public/js/update.js?v=1"></script>
<script src="<?= BASE_URL ?>/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>