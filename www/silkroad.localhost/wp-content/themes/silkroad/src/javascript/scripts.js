import createMap from './map';
import createCases from './cases';
import createFootnotes from './footnotes';
import createTakeAction from './take-action';
import createPolyfills from './polyfills';

createPolyfills();

window.addEventListener('DOMContentLoaded', e=>{
	createCases();
	createFootnotes();
	createMap();
	createTakeAction();
});
