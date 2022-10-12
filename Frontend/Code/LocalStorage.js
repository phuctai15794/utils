class LocalStorage {
	static has(key) {
		const value = localStorage.getItem(key);
		return !value || (typeof value === 'string' && value === 'null') ? false : true;
	}

	static get(key) {
		if (!this.has(key)) return null;
		const value = localStorage.getItem(key);
		return value && (value[0] === '{' || value[0] === '[' ? JSON.parse(value) : value);
	}

	static set(key, value) {
		if (value === undefined) return null;
		if (typeof value === 'object') value = JSON.stringify(value);
		if (typeof value !== 'string') return null;
		localStorage.setItem(key, value);
	}

	static remove(key) {
		this.has(key) && localStorage.removeItem(key);
	}
}

export default LocalStorage;
