import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
        
    // auto reload the window
    theme: {
        extend: {
            fontFamily: {
                // sans: ['Inter var', ...defaultTheme.fontFamily.sans],
                'custom': ['dv-font'],
            },
        },
    },
        
};
