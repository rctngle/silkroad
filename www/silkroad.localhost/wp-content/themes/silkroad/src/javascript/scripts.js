import createMap from './map';
import createCases, { scrollToInitalCase } from './cases';
import createFootnotes from './footnotes';
import createTakeAction from './take-action';
import createReport from './report';
import createPolyfills from './polyfills';

createPolyfills();

window.addEventListener('DOMContentLoaded', e=>{	
	createCases();
	createFootnotes();
	createMap();
	createTakeAction();
	createReport();
	scrollToInitalCase();
});

window.onload = function() {
	scrollToInitalCase();
};
