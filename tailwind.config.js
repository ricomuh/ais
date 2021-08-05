const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                flat: ["'Hammersmith One'", ...defaultTheme.fontFamily.sans],
                hand: ["Simonetta", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                float: {
                    '0%, 100%': {transform:'translateY(1em)'},
                    '50%': {transform:'translateY(0em)'},
                },
                'from-left': {
                    '0%': {transform: 'translateX(-2em)',opacity:'0'},
                    '100%': {transform: 'translateX(0em)',opacity:'100'},
                },
                'from-right': {
                    '0%': {transform: 'translateX(2em)',opacity:'0'},
                    '100%': {transform: 'translateX(0em)',opacity:'100'},
                },
                'from-bottom': {
                    '0%': {transform: 'translateY(2em)',opacity:'0'},
                    '100%': {transform: 'translateY(0em)',opacity:'100'},
                }
            },
            animation: {
                float: 'float 3s ease-in-out infinite',
                'from-left': 'from-left ease-out 1s ',
                'from-right': 'from-right ease-out 1s ',
                'from-bottom': 'from-bottom ease-out 1s ',
            },
            zIndex: {
                '-10' : '-10',
            },
        },
        colors: {
            black: colors.black,
            white: colors.white,
            primary: {
                light:'#5c607a',
                DEFAULT: '#404356',
                dark:'#2b2d39'
            },
            secondary: {
                light:'#ffcb79',
                DEFAULT: '#ffbe58',
                dark:'#eaa02d'
            },
            gray: colors.coolGray,
            indigo: colors.indigo,
            red: colors.rose,
            yellow: colors.amber,
            blue: colors.blue,
            green: colors.green,
            purple: colors.pink
          }
    },

    variants: {
        extend: {
            opacity: ['disabled','group-hover'],
            translate: ['group-hover'],
            scale: ['group-hover'],
            padding: ['hover'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
