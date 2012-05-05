var AppAttachment = new Class({
	initialize: function(form, data) {
		var field = new Element('div', { class: 'form-field'} );
		var val = new Element('div', { class: 'form-field-val', text:data.name });

		(new Element('a', { class:'form-field-rm', href: 'javascript:ajsstub()', html: 'x', events: { click:this.remove.bind(this) } })).inject(val);
		(new Element('div', { class: 'form-field-label', text:'Attachment' })).inject(field);
		val.inject(field);

		this.id = data.id;
		this.field = field;
		this.form = form;
	},

	remove: function() {
		(new Element('input', { type:'hidden', name:'rm-attachment[]', value:this.id })).inject(this.form);
		this.field.destroy();
	},

	getElement: function() {
		return this.field;
	}
});