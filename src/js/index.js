import '../scss/index.scss';


import $ from 'jquery';

global.jQuery = $;
global.$ = $;

import "./components";
import "./pages";
import aos from "aos";


$(function() {
    aos.init();
})
