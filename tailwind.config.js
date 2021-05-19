module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            spacing: {
                '80': '24rem',
                '100': '28em',

            },

            outline: {
                blue: '2px solid #0066ff',
            }
        },
    },
    variants: {
        extend: {
            opacity: ['disabled'],
            cursor: ['disabled'],
        },
    },
    plugins: [],

}