var Attachment = new Class({
	initialize: function(data) {
		var field = new Element('div', { class: 'form-field'} );
		var lbl = new Element('div', { class: 'form-field-label', html:'Attachment' });
		var val = new Element('div', { class: 'form-field-input' });
		var input = new Element('input', { type: 'file', name: this.getAttachmentsKey() + '[]', value: data });
		var rm = new Element('a', { class:'form-field-rm', href: 'javascript:ajsstub()', html: 'x', events: { click:this.remove.bind(this) } });

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