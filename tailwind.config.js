import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

export default {
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php'],
    darkMode:'class',
    theme: {
        extend: {
            colors: {
                danger: colors.red,
                primary: colors.red,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [forms, typography],
}
