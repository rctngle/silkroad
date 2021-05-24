//import createMap from './map';
import createCases, { scrollToInitalCase } from './cases';
import createFootnotes from './footnotes';
import createTakeAction from './take-action';
import createReport from './report';
import createPolyfills from './polyfills';
import createIntro from './intro';

createPolyfills();

window.addEventListener('DOMContentLoaded', e=>{	
	createCases();
	createFootnotes();
	//createMap();
	createTakeAction();
	createReport();
	scrollToInitalCase();
	createIntro();
});

window.onload = function() {
	scrollToInitalCase();
};
