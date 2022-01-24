module.exports = {
    content: ['./resources/js/components/**/*.{html,js,vue}', './resources/js/views/**/*.{html,js,vue}', './resources/js/**/*.{html,js,vue}'],
    purge: [],
    theme: {
        borderRadius: {
            'none': '0',
            'sm': '0.125rem',
            DEFAULT: '0.25rem',
            DEFAULT: '4px',
            'md': '0.375rem',
            'lg': '0.5rem',
            // 'carta': '10px',
            'full': '9999px',
            'large': '12px',
        },
        extend: {
            spacing: {
                '80': '300rem',
                '100': '28em',

            },

            outline: {
                blue: '2px solid #0066ff',
            }
        },
    },

    plugins: [],

}

