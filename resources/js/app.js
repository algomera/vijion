import './bootstrap';

import Alpine from 'alpinejs';
import tippy from "tippy.js";
import 'tippy.js/dist/tippy.css';

window.Alpine = Alpine;
document.addEventListener('alpine:init', () => {
    Alpine.directive('tooltip', (el, {expression}) => {
        tippy(el, {content: expression})
    })
})

Alpine.start();
