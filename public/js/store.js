var Store = new Class({
	initialize: function(id, dp) {
		var tbl = $(id);
		var tbody = tbl.getElement('tbody');

		if (tbody == null) {
			tbody = new Element('tbody');
			tbody.inject(tbl);
		}

		this.tbody = tbody;
		this.dp = dp;
		this.fields = [];
		this.sortField = null;
		this.sortOrder = null;
		this.fltr = null;
	},

	addField: function(name, cls, dataField, sortable) {
		this.fields.push({ name:name, cls:cls, dataField:dataField, sortable:sortable });
		return this;
	},

	addHeader: function() {
		var tr = new Element('tr');
		var fields = this.fields;

		for (var i = 0; i < fields.length; i++) {
			var field = fields[i];
			var th = new Element('th', { 'class': field.cls });

			if (field.sortable) {
				var sortMarker = field.dataField == this.sortField
					? (this.sortOrder == 'desc' ? '&#11014;' : '&#11015;')
					: '';
				(new Element('a', { href:'javascript:store.sort(\'' + field.dataField + '\')', html:sortMarker + field.name })).inject(th);
			} else {
				th.set('text', field.name);
			}

			th.inject(tr);
		}

		var actsTh = new Element('th', { 'class': 'acts', text: 'Actions'});
		actsTh.inject(tr);

		tr.inject(this.tbody);
	},

	addRows: function(dp) {
		var tbody = this.tbody;
		var fields = this.fields;
		var fieldsNum = fields.length;

		for (var i = 0; i < dp.length; i++) {
			var tr = new Element('tr');
			tr.inject(this.tbody);

			for (var j = 0; j < fieldsNum; j++) {
				var field = fields[j];

				(new Element('td', { 'class': field.cls, html:dp[i][field.dataField] })).inject(tr);
			}

			var actsTd = new Element('td', { 'class': 'acts'});
			(new Element('a', { text: 'modify', href: '/?action=edit_store&id=' + dp[i].id})).inject(actsTd);
			(new Element('br')).inject(actsTd);
			(new Element('a', { text: 'delete', href: '/?action=remove_store&id=' + dp[i].id})).inject(actsTd);

			actsTd.inject(tr);
		}
	},

	refresh: function() {
		var tbody = this.tbody;
		var fltr = this.fltr;
		var dp = (fltr != null) && (fltr.length > 0)
			? this.dp.filter(this.testItem.bind(this, fltr))
			: this.dp;

		while (tbody.getChildren().length > 0) {
			tbody.getChildren().getLast().dispose();
		}

		this.addHeader();
		this.addRows(dp);
	},

	compare: function(a, b) {
		var factor = this.sortOrder == 'desc' ? -1 : 1;
		var numRegex = /^[\d]+$/;
		var valA = a[this.sortField];
		var valB = b[this.sortField];

		if (numRegex.test(valA) && numRegex.test(valB)) {
			valA = parseInt(valA);
			valB = parseInt(valB);
		}

		if (valA > valB) {
			return factor * 1;
		} else if (valA < valB) {
			return factor * -1;
		} else {
			return 0;
		}
	},

	testItem: function(fltr, item, index, ar) {
		var dp = this.dp;
		var fields = this.fields;

		for (var i = 0; i < fields.length; i++) {
			if (item[fields[i].dataField].search(fltr) > -1) {
				return true;
			}
		}

		return false;
	},

	filter: function(fltr) {
		this.fltr = fltr;
		this.refresh();
	},

	sort: function(field) {
		this.sortOrder = field == this.sortField
			? (this.sortOrder == 'asc' ? 'desc' : 'asc')
			: 'asc';
		this.sortField = field;
		this.dp.sort(this.compare.bind(this));
		this.refresh();
	}
});