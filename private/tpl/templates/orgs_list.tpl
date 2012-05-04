<h1 class="list">Organizations</h1>

Filter by organization type: <select id="filter"><option>any</option>{foreach $types as $type}<option{if ($type->getId() == $filter)} selected="selected"{/if} value="{$type->getId()}">{$type->getCode()}s</option>{/foreach}</select>
<table class="tbl">
	<tr>
		<th class="org-tbl-name">Name</th>
		<th class="org-tbl-type">Type</th>
		<th class="org-tbl-phone" >Phone</th>
		<th class="org-tbl-site">Site</th>
		<th class="org-tbl-address">Address</th>
		<th class="org-tbl-country">Country</th>
		<th class="acts">Actions</th>
	</tr>
	{foreach $orgs as $i => $org}
		<tr>
			<td class="org-tbl-name">{$org->getName()}</td>
			<td class="org-tbl-type">{$org->getType()->getCode()}</td>
			<td class="org-tbl-phone">{$org->getPhone()}</td>
			<td class="org-tbl-site">
				<a href="{if strpos($org->getSite(), 'http://') === 0}{else}http://{/if}{$org->getSite()}">{$org->getSite()}</a>
			</td>
			<td class="org-tbl-address">{$org->getAddress()}</td>
			<td class="org-tbl-country">{$org->getCountry()}</td>
			<td class="acts"><a href="/?action=edit_org&id={$org->getId()}">modify</a><br /><a href="/?action=remove_org&id={$org->getId()}">delete</a></td>
		</tr>
	{/foreach}
</table>

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var filter = $('filter');
		filter.addEvent('change', function() {
			var type = filter.options[filter.selectedIndex].value;
			window.location = '/?action=orgs_list' + (type ? '&type=' + type : '');
		});
	});
</script>