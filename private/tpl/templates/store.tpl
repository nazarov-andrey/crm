<h1 class="list">Store</h1>

search:&nbsp;<input type="text" onkeyup="searchKeyup(event)"/><br />

<table class="tbl store-tbl" id="store"></table>

<script type="text/javascript" src="/js/store.js"></script>
<script type="text/javascript">
	var store = null;

	function searchKeyup(event) {
		store.filter(event.target.value);
	}

	$(window).addEvent('domready', function () {
		store = new Store('store', {$items|json_encode}, {if $smarty.session.super > 0}true{else}false{/if});
		store.addField('Id', 'store-tbl-id', 'id', true)
			.addField('Code', 'store-tbl-code', 'code', true)
			.addField('Description', 'store-tbl-desc', 'description', false)
			.addField('Supplier code', 'store-tbl-supcode', 'supplierCode', true)
			.addField('Manufacturer code', 'store-tbl-mancode', 'manufacturerCode', true)
			.addField('Amount', 'store-tbl-amount', 'amount', true)
			.addField('Min amount', 'store-tbl-minamount', 'minAmount', true)
			.addField('Comment', 'store-tbl-comment', 'comment', false)
			.refresh();
		/*var store = $('store').getElement('tbody');

		for (var i = 0; i < items.length; i++) {
			(new StoreItem(items[i])).getElement().inject(store);
		}

		alert(store.getChildren().length);*/
	});
</script>