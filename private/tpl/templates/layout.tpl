<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>crm</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="/css/{if isset($le)}{$le->getResBaseName()}{else}default{/if}.css"/>
	<script type="text/javascript" src="/js/lib/mootools-core-1.4.5-full-nocompat-yc.js"></script>
</head>
<body>
<div class="header">
	{if isset($le)}<img class="logo" src="/img/{$le->getResBaseName()}/logo.png">{/if}
	{if isset($top_menu)}{include file=$top_menu}{/if}
</div>
{if isset($left_menu)}{include file=$left_menu}{/if}
<div class="content">{include file=$content}</div>
</body></html>