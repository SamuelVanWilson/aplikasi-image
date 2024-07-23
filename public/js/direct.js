    // Set aria-selected based on localStorage value
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('profile-tab').addEventListener('click', function() {
            localStorage.setItem('selectedTab', 'profile');
            window.location.href = 'profile';
        });
    
        document.getElementById('home-tab').addEventListener('click', function() {
            localStorage.setItem('selectedTab', 'home');
            window.location.href = 'home';
        });
        document.getElementById('home-tab').setAttribute('aria-selected', 'true');

        const currentURL = window.location.href;
        const urlParts = currentURL.replace(/\/$/, '').split('/');
        const targetUrl = urlParts[urlParts.length - 1].toLowerCase();
        console.log(targetUrl);

        if (targetUrl.includes('profile')) {
            localStorage.setItem('selectedTab', 'profile');
        } else if (targetUrl.includes('home')) {
            localStorage.setItem('selectedTab', 'home');
        }
        const selectedTab = localStorage.getItem('selectedTab');

        if (selectedTab === 'profile') {
            document.getElementById('profile-tab').setAttribute('aria-selected', 'true');
        } else if (selectedTab === 'home') {
            document.getElementById('home-tab').setAttribute('aria-selected', 'true');
        }
    });