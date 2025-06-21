import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import './_NumberTicker';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();
