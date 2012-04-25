function ajsstub() {}

var FieldInjector = new Class({
	initialize: function(form, fieldKind, FieldClass) {
		this.form = form;
		this.FieldClass = FieldClass;

		var field = new Element('div', { class: 'form-field' });
		var lbl = new Element('div', { class: 'form-field-label', html:'&nbsp;' });
		var val = new Element('div', { class: 'form-field-val' });
		var add = new Element('a', { href: 'javascript:ajsstub()', html:'add ' + fieldKind, events: { click: this.injectField.bind(this, null, null) } });

		add.inject(val);
		lbl.inject(field);
		val.inject(field);
		field.inject(form.getLast(), 'before');

		this.addBtField = field;
	},

	injectField: function(data) {
		(new this.FieldClass(data)).getElement().inject(this.addBtField, 'before');
	},

	init: function(data) {
		if (data != null) {
			data.each((function (c) { this.addContact(c); }).bind(this));
		}
	}
});