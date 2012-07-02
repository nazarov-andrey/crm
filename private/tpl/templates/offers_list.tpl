<h1 class="list">Offers</h1>

Filter by organization type: <select id="filter"><option>any</option>{foreach $types as $type}<option{if ($type->getId() == $filter)} selected="selected"{/if} value="{$type->getId()}">{$type->getCode()}s</option>{/foreach}</select>
<table class="tbl">
	<tr>
		<th class="offer-tbl-id">Id</th>
		<th class="offer-tbl-org">Organization</th>
		<th class="offer-tbl-app" >Request id</th>
		<th class="offer-tbl-offer-id">Offer №</th>
		<th class="offer-tbl-date">Date</th>
		<th class="offer-tbl-attachments">Attachments</th>
		<th class="offer-tbl-comment">Comment</th>

		<th class="acts">Actions</th>
	</tr>
{foreach $offers as $i => $offer}
	<tr>
		<td class="offer-tbl-id">{$offer->getId()}</td>
		<td class="offer-tbl-org">{$offer->getOrg()->getName()}</td>
		<td class="offer-tbl-app">{$offer->getApp()->getId()}</td>
		<td class="offer-tbl-offer-id">{$offer->getOfferId()}</td>
		<td class="offer-tbl-date">{$offer->getDate()->format('Y-m-d')}</td>
		<td class="offer-tbl-attachments">{if (array_key_exists($offer->getId(), $attachments))}
			{foreach $attachments[$offer->getId()] as $attachment}
				<a href="/?action=attachment&id={$attachment->getId()}">{$attachment->getName()|truncate:30:' ... ':true:true}</a><br/>
			{/foreach}{/if}
		</td>
		<td class="offer-tbl-comment">{$offer->getComment()|nl2br}</td>
		<td class="acts">
			<a href="/?action=edit_offer&id={$offer->getId()}">modify</a><br />
			{if $smarty.session.super}<a href="/?action=remove_offer&id={$offer->getId()}">delete</a>{/if}
		</td>
	</tr>
{/foreach}
</table>

<script type="text/javascript">
	$(window).addEvent('domready', function() {
		var filter = $('filter');
		filter.addEvent('change', function() {
			var type = filter.options[filter.selectedIndex].value;
			window.location = '/?action=offers_list' + (type ? '&type=' + type : '');
		});
	});
</script>