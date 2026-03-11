{if $setting.referrersSavingEnabled}{saveReferrer}{/if}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{'includesHeader_language'|lang}" lang="{'includesHeader_language'|lang}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{$setting.siteTitle}</title>
<meta name="description" content="{if isset($metaDescription)}{$metaDescription}{else}{$title}{/if}" />
{if isset($metaKeywords)}<meta name="keywords" content="{$metaKeywords}" />   
{/if}
<meta name="robots" content="index, follow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
{if isset($headData)}
{$headData}{/if}
{if isset($includeSearchEngine)}
<script async type="text/javascript" src="{'/javascript/config'|url}"></script>
<script async type="text/javascript" src="{'/javascript/jquery/jquery.searchEnginePanel.js'|resurl}"></script>
<script async type="text/javascript" src="{'/javascript/main/loadSearchEngine.js'|resurl}"></script>
{/if}
{include file="includes/header_speed.tpl"}  
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

{include file="menu/menuheader/searchEngine.tpl"}  



</div>

</header>

<nav>

<div id="top2">
{include file="menu/menuheader/menuheader.tpl"}
</div>



</nav>

<div id="principal">



<div id="middle">

{displayAd place="overCategories"}   

<div id="homebox">


<div class="column_in_boxh">
<p>{$directoryDescription.description|htmlspecialchars_decode|nl2br}</p>
</div>

{displayAd place="underIntroductionText"}


</div>
            
{if $setting.newsiteinhome}
<div class="title_h_2">
<h2>{'siteNews_h1'|lang}</h2>
{if $setting.rssNewsEnabled}
<a href="{'/rss/news'|url}" title="{'siteNews_rss'|lang}"><img src="{'/templates/arfooo_ultimate_classic/images/rss.gif'|resurl}" class="rss_image" alt="{'siteNews_rss'|lang}" /></a>
{/if}</div>
<div class="column_in">
{"/site/newsites"|action}
</div>
{/if}


{displayAd place="underCategories"}


{if $setting.catinhome}
{"/category/list"|action}
{/if}


{displayAd place="underRandomSites"}




{if $setting.aleainhome}
<div class="title_h_2">
<h2>{'mainIndex_h2'|lang}</h2>
</div>
<div class="column_in">
{'/site/randomList'|action}
</div>
{/if}


</div>

<div id="cote">

<div id="right">
{include file="menu/menuright/menuright.tpl"}

{displayAd place="rightMenu"}

</div>

<div id="left">
{include file="menu/menuleft/menuleft.tpl"}

{displayAd place="leftMenu"}

</div>



</div>


</div>


<div class="fixe">&nbsp;</div>


<footer>
<div id="column_bottom">

{'includesFooter_powered'|lang} <a href="{'includesFooter_arfooo_url'|lang}" title="{'includesFooter_arfooo_title'|lang}" class="link_black_grey">{'includesFooter_arfooo_name'|lang}</a>
revu par <a href="http://www.e-dir.fr/" title="e-dir.fr" class="link_black_grey">e-dir.fr</a>
 &copy; {'includesFooter_date'|lang}{display_time} &nbsp;&nbsp;
{if $setting.contactPageEnabled}
<a href="{'/contact'|url}" class="link_black_grey">{'includesFooter_contact'|lang}</a>
{/if} &nbsp;&nbsp;
{if $setting.newsletterEnabled}
<a href="{'/newsletter'|url}" class="link_black_grey">{'includesFooter_newsletter'|lang}</a>
{/if}
{include file="includes/header_speed_index.tpl"}  
<link href="{"/templates/$templateName/css/style.css"|resurl}" rel="stylesheet" type="text/css" />
</div>
</footer>

</body>
</html> 