function toCamelCase(str) {
	const camelSymbol = str.includes('-') ? '-' : '_';
	const camelType = str.charAt(0) === str.charAt(0).toUpperCase() ? 'upperCase' : 'camelCase';
	const strToArr = str.split(camelSymbol);
	const mutateArr = strToArr.map((word, index) => {
		if (index === 0) {
			return word.charAt(0).toLowerCase() + word.slice(1);
		}

		return word.charAt(0).toUpperCase() + word.slice(1);
	});

	return mutateArr.join('');
}

function camelizeKeys(obj) {
	if (Array.isArray(obj)) {
		return obj.map((v) => camelizeKeys(v));
	} else if (obj != null && obj.constructor === Object) {
		return Object.keys(obj).reduce(
			(result, key) => ({
				...result,
				[toCamelCase(key)]: camelizeKeys(obj[key])
			}),
			{}
		);
	}
	return obj;
}

var obj = {
	FirstName: 'John',
	LastName: 'Smith',
	BirthDate: new Date(),
	Array_Test: ['one', 'TWO', 3],
	ThisKey: {
		'This-sub-key': {
			a_ba_ccs: 54
		}
	}
};

const objCamelCase = camelizeKeys(obj);

console.log(objCamelCase);
