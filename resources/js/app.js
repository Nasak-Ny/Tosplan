// import './bootstrap';
import 'flowbite';


//{{-- Collapse sidebar --}}
document.getElementById('sidebar-toggle').addEventListener('click', function()
{
    document.getElementById('sidebar').classList.toggle('hidden');
});

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
var themeToggleBtn = document.getElementById('theme-toggle');

// Check if theme is set in localStorage
if (!localStorage.getItem('color-theme')) {
    // Set dark theme as default
    document.documentElement.classList.add('dark');
    localStorage.setItem('color-theme', 'dark');
    themeToggleLightIcon.classList.remove('hidden');
} else {
    // Apply theme based on localStorage
    if (localStorage.getItem('color-theme') === 'dark') {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }
}

themeToggleBtn.addEventListener('click', function() {
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');
    document.documentElement.classList.toggle('dark');

    // Update localStorage
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('color-theme', 'dark');
    } else {
        localStorage.setItem('color-theme', 'light');
    }
});


