import hash from 'hashtags'

export default {
	getHashTag(text) {
		text = text.match(/(^|\s)(#[a-z\d-]+)/ig, "")
		if (!text) return ''
		text = text[0]
		text = text.replace('#', '')
		text = text.replace(' ', '')
		return text;
	},
	getExcludedTag(text) {
		text = text.match(/(^|\s)(-[a-z\d-]+)/ig)
		if (!text) return ''
		text = text[0]
		text = text.replace('-', '')
		text = text.replace(' ', '')
		return text;
	},
	colorHashTagHTMl(text) {
		text = text.join(' ')
		return text.replace(/(^|\s)(#[a-z\d-]+)/ig, "$1<span style='color: blue'>$2</span>");
	},
	removeHashTag(text) {
		if (Array.isArray(text)) {
			return text = text.join(' ')
		}
		return text.replace(/(^|\s)(#[a-z\d-]+)/ig, "");
	},
	removeExcludedTag(text) {
		if (Array.isArray(text)) {
			return text = text.join(' ')
		}
		return text.replace(/(^|\s)(-[a-z\d-]+)/ig, "");
	}
}