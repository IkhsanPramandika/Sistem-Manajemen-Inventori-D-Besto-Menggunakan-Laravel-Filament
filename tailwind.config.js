const colors = require('tailwindcss/colors')

module.exports = {
    content: [ "./resources/**/*.blade.php","./vendor/filament/**/*.blade.php"],
    
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.red,
                success: colors.blue,
                warning: colors.amber,
            },
         
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
