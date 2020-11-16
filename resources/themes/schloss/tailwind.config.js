module.exports = {
    purge: [
        './resources/themes/active/**/*.php',
        './resources/themes/active/**/*.js',
    ],
    theme: {
        extend: {
            backgroundColor: theme => theme('color'),
            borderColor: theme => theme('color'),
            textColor: theme => theme('color'),
            minHeight: theme => theme('height'),
            minWidth: theme => theme('width'),
            maxHeight: theme => theme('height'),
            maxWidth: theme => theme('width'),
            inset: theme => theme('spacing'),
        },
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    },
    plugins: [],
    future: {
        purgeLayersByDefault: true,
        removeDeprecatedGapUtilities: true,
    },
}
