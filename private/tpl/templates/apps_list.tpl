<h1 class="list">Applications</h1>

Filter by organization:<select id="filter"><option disabled="disabled">--select item--</option>{foreach $orgs as $i => $org}
	{if ($i == 0 || $orgs[$i - 1]->getType() != $org->getType())}
		<option disabled="disabled">{$org->getType()->getCode()}s:</option>
	{/if}
	<option{if ($org->getId() == $orgId)} selected="selected"{/if} value="{$org->getId()}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$org->getName()}</option>
{/foreach}</select>

<table class="tbl">
	<tr>
		<th class="app-tbl-id">Id</th>
		<th class="app-tbl-client">Client</th>
		<th class="app-tbl-supplier">Supplier</th>
		<th class="app-tbl-date">Date</th>
		<th class="app-tbl-attachments">Attachments</th>
		<th class="app-tbl-comment">Comment</th>
		<th class="acts">Actions</th>
	</tr>
	{foreach $apps as $i => $app}
		<tr>
			<td class="app-tbl-id">{$app->getId()}</td>
			<td class="app-tbl-client">{$app->getClient()->getName()}</td>
			<td class="app-tbl-supplier">{$app->getSupplier()->getName()}</td>
			<td class="app-tbl-date">{$app->getDate()->format('Y-m-d')}</td>
			<td class="app-tbl-attachments">{if (array_key_exists($app->getId(), $attachments))}
				{foreach $attachments[$app->getId()] as $attachment}
					<a href="/?action=attachment&id={$attachment->getId()}">{$attachment->getName()|truncate:15:' ... ':true:true}</a><br/>
				{/foreach}{/if}</td>
			<td class="app-tbl-comment">{$app->getComment()|nl2br}</td>
			<td class="app-tbl-print">
				<a href="/?action=edit_app&id={$app->getId()}">modify</a><br />
				<a href="/?action=app_print&id={$app->getId()}">print</a><br />
				{if $smarty.session.super}<a href="/?action=remove_app&id={$app->getId()}">detele</a>{/if}
			</td>
		</tr>
	{/foreach}
</table>

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var filter = $('filter');
		filter.addEvent('change', function() {
			var org = filter.options[filter.selectedIndex].value;
			window.location = '/?action=apps_list' + (org ? '&org=' + org : '');
		});
	});
</script>