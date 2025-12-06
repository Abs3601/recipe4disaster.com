import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const html = document.documentElement;

// Hamburger menu toggle
const mobileBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");

mobileBtn?.addEventListener("click", () => {
    const isHidden = mobileMenu.classList.contains("hidden");

    if (isHidden) {
        mobileMenu.classList.remove("hidden");
        mobileMenu.classList.add("mobile-menu-open");
    } else {
        mobileMenu.classList.add("hidden");
        mobileMenu.classList.remove("mobile-menu-open");
    }
});

// Dark mode toggle
document.addEventListener("DOMContentLoaded", () => {
    const desktopToggle = document.getElementById("theme-toggle");
    const mobileToggle = document.getElementById("theme-toggle-mobile");

    function toggleTheme() {
        const html = document.documentElement;

        if (html.classList.contains("dark")) {
            html.classList.remove("dark");
            localStorage.setItem("theme", "light");
        } else {
            html.classList.add("dark");
            localStorage.setItem("theme", "dark");
        }
    }

    if (desktopToggle) desktopToggle.addEventListener("click", toggleTheme);
    if (mobileToggle) mobileToggle.addEventListener("click", toggleTheme);

    // Makes sure correct theme is applied always register and login pages
    if (localStorage.getItem("theme") === "dark") {
        document.documentElement.classList.add("dark");
    }
});


// Tabs logic

    const tabs = document.querySelectorAll('.profile-tab');
    const contents = document.querySelectorAll('.profile-tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {

            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active-tab'));

            // Hide all tab content
            contents.forEach(c => c.classList.add('hidden'));

            // Add active class to clicked tab
            tab.classList.add('active-tab');

            // Show related content
            const target = document.getElementById(`tab-${tab.dataset.tab}`);
            target.classList.remove('hidden');
        });
    });

    
