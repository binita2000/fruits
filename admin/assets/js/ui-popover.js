// /**
//  * UI Tooltips & Popovers
//  */

'use strict';

(function () {
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    // added { .php: true, sanitize: false } option to render button in content area of popover
    return new bootstrap.Popover(popoverTriggerEl, { .php: true, sanitize: false });
  });
})();
