function updateSelect(selects, opts) {
	selects.each(function (select) {
		select.empty();
		(new Element('option', { html: '--select item--', disabled: 'disabled' })).inject(select, 'top');
	});

	var select = selects[0];
	var opts = opts[this.options[this.selectedIndex].value];

	if (opts == null || opts == 'undefined') {
		return;
	}

	opts.each(function(optData) {
		var opt = new Element('option', {
			value: optData.val,
			html: optData.label
		});

		opt.inject(select);
	});
}

Array.implement({
	indexOfFun: function(fn) {
		for (var i = 0; i < this.length; i++) {
			if (fn(this[i])) {
				return i;
			}
		}

		return -1;
	}
});