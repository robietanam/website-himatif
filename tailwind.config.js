/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  darkMode: 'class',
  purge: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    colors: {
      'midnight': '#42465f',
    },
    extend: {
      
      fontFamily : {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      },
      content: {
        'decor1' : "url('../img/decoration/bg/1.svg')",
        'decor2' : "url('../img/decoration/bg/2.svg')",
        'decor3' : "url('../img/decoration/bg/3.svg')",
        'man-bg' : "url('../img/decoration/bg/man-bg-white.svg')",
        'sitemap-bg' : "url('../img/decoration/bg/sitemap-bg-white.svg')",
        'work-bg' : "url('../img/decoration/bg/work-bg-primary.svg')",
        'memphis1' : "url('../img/decoration/memphis/1.svg')",
        'memphis2' : "url('../img/decoration/memphis/2.svg')",
        'memphis3' : "url('../img/decoration/memphis/3.svg')",
        'memphis4' : "url('../img/decoration/memphis/4.svg')",
        'memphis5' : "url('../img/decoration/memphis/5.svg')",
        'memphis6' : "url('../img/decoration/memphis/6.svg')",
        'memphis7' : "url('../img/decoration/memphis/7.svg')",
        'memphis8' : "url('../img/decoration/memphis/8.svg')",
        'memphis9' : "url('../img/decoration/memphis/9.svg')",
        'memphis10' : "url('../img/decoration/memphis/10.svg')",
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('daisyui'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/line-clamp'),
    // require('daisyui')
  ],
}

