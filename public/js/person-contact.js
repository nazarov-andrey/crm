var PersonContact = new Class({
	initialize: function(data) {
		if (data != null) {
			var type = data.type;
			var value = data.val;
		}

		var field = new Element('div', { class: 'form-field'} );
		var lbl = new Element('div', { class: 'form-field-label' });
		var val = new Element('div', { class: 'form-field-input' });
		var select = new Element('select', { name: this.getTypesKey() + '[]'});
		var input = new Element('input', { type: 'text', name: this.getValuesKey() + '[]', value: value });
		var rm = new Element('a', { class:'form-field-rm', href: 'javascript:ajsstub()', html: 'x', events: { click:this.remove.bind(this) } });

		this.getOpts().each(function (ct) {
			var opt = new Element('option', { value: ct.val, html: ct.lbl });

			if ((type != null) && (ct.val == type)) {
				opt.setProperty('selected', 'selected');
			}

			opt.inject(select)
		});

		select.inject(lbl);
		input.inject(val);
		rm.inject(val);
		lbl.inject(field);
		val.inject(field);

		this.field = field;
	},

	remove: function() {
		this.field.destroy();
	},

	getElement: function() {
		return this.field;
	}
});