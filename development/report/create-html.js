const fs = require('fs');
const jsdom = require('jsdom');
const { JSDOM } = jsdom;

const content = fs.readFileSync(__dirname + '/report-in.html', 'utf8').toString();
const dom = new JSDOM(content);
const doc = dom.window.document;

doc.querySelectorAll('a.footnote-ref').forEach(footnoteLink => {
	console.log(footnoteLink);
});