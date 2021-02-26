module.exports = {
    purge: [
        './resources/themes/active/**/*.php',
        './resources/themes/active/**/*.js',
    ],
    theme: {
        fontFamily: {
            'main': '"Source Serif Pro", serif',
            'display': '"Limelight", serif',
        },
        colors: {
            'white': '#fefefe',
            'lightest-grey': '#f6f2e7',
            'main-red': '#e44141',
            'grey': '#323b49',
            'dark-grey': '#272d37',
            'darkest-grey': '#161b22',
        },
        aspectRatio: {
            'none': 0,
            'square': [1, 1],
            '16:9': [16, 9],
            '4:3': [4, 3],
            '3:1': [3, 1],
        },
        extend: {
            boxShadow: {
                DEFAULT: '1px 1px 3px 1px rgba(0, 0, 0, 0.2)',
            },
            spacing: {
                '2px': '2px',
                'full': '100%',
                '3/5': '60%',
                '2/3': '66.666%',
                '3/4': '75%',
                '4/5': '80%',
                '-1': '-0.25rem',
                '-6': '-1.5rem',
            },
            width: {
                container: '1024px',
                'readable-text': '800px',
            },
            height: {
                'mobile-scroll': 'calc(100% - 80px)',
                '128': '32rem',
            },
            minHeight: theme => theme('height'),
            minWidth: theme => theme('width'),
            maxHeight: theme => theme('height'),
            maxWidth: theme => theme('width'),
            inset: theme => theme('spacing'),
            screens: {
                'just-after-lg': '1064px',
            }
        },
    },
    variants: {
        display: ['responsive', 'hover', 'focus', 'group-hover'],
    },
    plugins: [
        require('tailwindcss-aspect-ratio'),
    ],
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
}
