//import createMap from './map';
import createCases, { scrollToInitalCase } from './cases';
import createFootnotes from './footnotes';
import createTakeAction from './take-action';
import createReport from './report';
import createPolyfills from './polyfills';
import createIntro from './intro';
import createHeader from './header';
import hasTouch from 'has-touch';

if (hasTouch) {
	document.querySelector('html').classList.add('touch');
} else {
	document.querySelector('html').classList.add('no-touch');
}

createPolyfills();

window.addEventListener('DOMContentLoaded', e=>{	
	createCases();
	createFootnotes();
	//createMap();
	createTakeAction();
	createReport();
	scrollToInitalCase();
	createIntro();
	createHeader();
});

window.onload = function() {
	scrollToInitalCase();
};
