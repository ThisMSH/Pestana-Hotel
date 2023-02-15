/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin');
const rotateY = plugin(function ({addUtilities}) {
  addUtilities({
    '.rotate-y-0': {
      transform: 'rotateY(0deg)',
    },
    '.rotate-y-90': {
      transform: 'rotateY(90deg)',
    },
    '.rotate-y-180': {
      transform: 'rotateY(180deg)',
    },
  })
})
const rotateX = plugin(function ({addUtilities}) {
  addUtilities({
    '.rotate-x-0': {
      transform: 'rotateX(0deg)',
    },
    '.rotate-x-90': {
      transform: 'rotateX(90deg)',
    },
    '.rotate-x-180': {
      transform: 'rotateX(180deg)',
    },
  })
})

module.exports = {
  content: [
    "./css/*.css",
    "./js/*.js",
    "./*.php",
    "../app/views/*.php",
  ],
  darkMode: "class",
  theme: {
    extend: {
      container: {
        center: true,
      },
      backgroundImage: {
        'signInBg': 'url("../img/hotel_room_SI.png")',
        'signUpBg': 'url("../img/hotel_room_SU.png")',
        'img1': 'url("../img/home/bed-min.png")',
        'img2': 'url("../img/home/gaming-min.png")',
        'img3': 'url("../img/home/pool-min.png")',
        'img4': 'url("../img/home/service-min.png")',
      },
      colors: {
        'zinc-100-0.4': 'rgb(244 244 245 / 0.4)',
        'red-0': 'rgb(255 0 0)',
      },
      width: {
        'inherit': 'inherit',
      },
      textShadow: {
        'white-1': '0 0 2px #fff',
        'white-2': '0 0 8px #fff',
        'white-3': '0 0 15px #fff',
        'zinc-1': '0 0 2px rgb(24 24 27)',
        'zinc-2': '0 0 8px rgb(24 24 27)',
        'zinc-3': '0 0 15px rgb(24 24 27)',
      },
      textStroke: {
        '0': '0px',
        'amber-1': '1px #fbbf24',
        'amber-2': '2px #fbbf24',
      },
      height: {
        'sidenav': 'calc(100vh - 360px)',
      },
      boxShadow: {
        'white': '0 1px 3px 0 rgb(255 255 255 / 0.1), 0 1px 2px -1px rgb(255 255 255 / 0.1)',
      },
      fontFamily: {
        'goggle': ['Material Icons'],
      },
    },
  },
  plugins: [
    rotateY,
    rotateX,
    plugin(function ({matchUtilities, theme}) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          })
        },
        { values:
          theme('textShadow')
        }
      )
    }),
    plugin(function ({matchUtilities, theme}) {
      matchUtilities(
        {
          'text-stroke': (value) => ({
            '-webkit-text-stroke': value,
          })
        },
        { values:
          theme('textStroke')
        }
      )
    }),
  ],
}
