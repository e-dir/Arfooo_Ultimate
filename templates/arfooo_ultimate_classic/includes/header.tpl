{if $setting.referrersSavingEnabled}{saveReferrer}{/if}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{'includesHeader_language'|lang}" lang="{'includesHeader_language'|lang}">
<head>
<meta name=viewport content="width=device-width, initial-scale=1">
<title>{$title}</title>
<meta name="description" content="{if isset($metaDescription)}{$metaDescription}{else}{$title}{/if}" />
{if isset($metaKeywords)}<meta name="keywords" content="{$metaKeywords}" />   
{/if}
<meta name="robots" content="index, follow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
{if isset($headData)}
{$headData}{/if}
{include file="includes/header_ico.tpl"}  
</head>
<body>


<header>

<div id="top1">
<div id="top33">
{if !empty($setting.allCategoriesPageEnabled)}<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
<a href="{'/category/showAll'|url}">{'menuMenuheader_categories'|lang}</a>
{/if}

{if $setting.contactPageEnabled}
<i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
<a href="{'/contact'|url}" class="link_black_grey">{'includesFooter_contact'|lang}</a>
{/if} &nbsp;&nbsp;
</div>
{if isset($includeSearchEngine)}
{include file="menu/menuheader/searchEngine.tpl"}  
{/if}


</div>

</header>

<nav>

<div id="top2">
{include file="menu/menuheader/menuheader.tpl"}
</div>



</nav>

<div id="principal">





<div id="middle">



