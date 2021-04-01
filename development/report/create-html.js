const fs = require('fs');
const util = require('util');
const jsdom = require('jsdom');
const { JSDOM } = jsdom;

const content = fs.readFileSync(__dirname + '/report-in.html', 'utf8').toString();
const dom = new JSDOM(content);
const doc = dom.window.document;

let structure = {}
let chapter = 0;
let section = 0
let current




doc.querySelectorAll('sup').forEach(sup => {
	const num = parseInt(sup.textContent)
	if (num > 0) {
	 	const footnote = doc.querySelector('li#fn'+num)
	 	console.log(footnote.textContent)
		sup.insertAdjacentHTML('afterend', ' [[[' + footnote.textContent + ']]]');
		// sup.parentNode.removeChild
	}
})

const html = doc.documentElement.outerHTML;
fs.writeFileSync('report-out.html', html);



// for (let i in doc.querySelector('body').children) {
// 	const el = doc.querySelector('body').children[i]

// 	if (el.tagName == 'H1' && el.textContent != 'Contents') {
// 		chapter++;
// 		structure['chapter_' + chapter] = {
// 			title: el.textContent,
// 			content: '',
// 			sections: {},
// 		}

// 		current = structure['chapter_' + chapter]
// 		section = 0;

// 	} else if (el.tagName == 'H2') {
// 		section++;
// 		structure['chapter_' + chapter].sections['section_' + section] = {
// 			title: el.textContent,
// 			content: '',			
// 		};

// 		current = structure['chapter_' + chapter].sections['section_' + section]

// 	} else if (chapter > 0) {
// 		if (el.tagName !== 'SECTION' && el.outerHTML) {
// 			console.log(el.tagName)
// 			current.content += el.outerHTML
// 		}
// 	}
// }

// fs.writeFileSync('report-out.json', JSON.stringify(structure));
