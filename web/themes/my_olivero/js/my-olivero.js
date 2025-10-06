/**
 * @file
 * my_olivero behaviors.
 */
(function (Drupal) {

  'use strict';

  Drupal.behaviors.myOlivero = {
    attach (context, settings) {

      console.log('It works!');

    }
  };

} (Drupal));


(function () {
  const toggle = document.createElement('button');
  toggle.innerText = '🌙 Dark Mode';
  toggle.setAttribute('id', 'dark-mode-toggle');
  toggle.style.position = 'fixed';
  toggle.style.bottom = '20px';
  toggle.style.right = '20px';
  toggle.style.zIndex = '9999';
  document.body.appendChild(toggle);

  // Load saved preference
  if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark-mode');
  }

  toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode'));
  });
})();

