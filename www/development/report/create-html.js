const fs = require('fs');
const util = require('util');
const jsdom = require('jsdom');
const { JSDOM } = jsdom;

let content = fs.readFileSync(__dirname + '/report-in.html', 'utf8').toString();
let dom = new JSDOM(content);
let doc = dom.window.document;

let structure = {}
let chapter = 0;
let section = 0
let current

doc.querySelectorAll('a.footnote-ref').forEach(a => {
	const sup = a.querySelector('sup');
	const num = parseInt(sup.textContent)
	if (num > 0) {
	 	const footnote = doc.querySelector('li#fn'+num)

	 	a.insertAdjacentHTML('afterend', ' [[[' + footnote.textContent.replace('↩︎', '').replace(/\n/g, ' ').trim() + ']]]');
		a.parentNode.removeChild(a)
	}
})

const html = doc.documentElement.outerHTML;
fs.writeFileSync('report-out.html', html);

content = fs.readFileSync(__dirname + '/report-out.html', 'utf8').toString();
dom = new JSDOM(content);
doc = dom.window.document;

function getTitle(str) {
	const words = str.split(' ');
	const firstWord = words[0];
	const firstLetter = firstWord.substr(0, 1);
	if (isNaN(parseInt(firstLetter))) {
		return str;
	} else {
		words.shift()
		const title = words.join(' ');
		return title
	}
}

let rootType = 'introduction';

for (let i in doc.querySelector('body').children) {
	const el = doc.querySelector('body').children[i]

	if (el.tagName == 'H1' && el.textContent != 'Contents') {
		chapter++;
		const title = getTitle(el.textContent);
		
		if (title === 'Conclusion') {
			rootType = 'conclusion';
		}
		
		structure['chapter_' + chapter] = {
			type: rootType,
			title: title,
			content: '',
			sections: {},
		}

		current = structure['chapter_' + chapter]
		section = 0;

		if (title === 'Background') {
			rootType = 'chapter';
		}

	} else if (el.tagName == 'H2' || el.tagName == 'H3') {
		section++;
		let title = getTitle(el.textContent);
		
		let type = 'section';
		if (title.toUpperCase().indexOf('LEGAL TEXT BOX') >= 0) {
			type = 'legal-text';
			title = title.replace(/LEGAL TEXT BOX:?/, '').trim();
		}

		structure['chapter_' + chapter].sections['section_' + section] = {
			type: type,
			title: title,
			content: '',			
		};

		current = structure['chapter_' + chapter].sections['section_' + section]

	} else if (chapter > 0) {
		if (el.tagName !== 'SECTION' && el.outerHTML) {
			current.content += el.outerHTML
		}
	}
}

fs.writeFileSync('report-out.json', JSON.stringify(structure));
