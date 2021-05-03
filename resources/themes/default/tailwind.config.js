module.exports = {
    theme: {
        fontFamily: {
            'title': 'Arial, sans-serif',
            'text': 'Georgia, serif',
        },
        extend: {
            color: {
                'primary': '#4e72ff',
                'secondary': '#00eb9d',
            },
            backgroundColor: theme => theme('color'),
            borderColor: theme => theme('color'),
            textColor: theme => theme('color'),
            width: {
                'container-xl': '700px',
                'container-lg': '600px',
            },
            height: {
                'hero-xl': '700px',
                'hero-lg': '600px',
                'image-max': '500px',
                'screen': 'calc(var(--vh) * 100)',
                'mobile-scroll': 'calc(100% - 48px)',
            },
            minHeight: theme => theme('height'),
            minWidth: theme => theme('width'),
            maxHeight: theme => theme('height'),
            maxWidth: theme => theme('width'),
            inset: theme => theme('spacing'),
        },
        variants: {
            zIndex: ['responsive', 'focus-within', 'focus', 'hover'],
        },
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
        zIndex: ['responsive', 'focus-within', 'focus', 'hover'],
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
    ],
    future: {
        removeDeprecatedGapUtilities: true,
    },
    purge: [
        './resources/themes/active/views/**/*.blade.php',
    ]
}
