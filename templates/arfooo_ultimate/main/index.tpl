{include file="includes/header.tpl" title=$setting.siteTitle|htmlspecialchars includeSearchEngine=true} 

            
{if $setting.newsiteinhome}
<div class="title_h_2">
<h2>{'siteNews_h1'|lang}</h2>
{if $setting.rssNewsEnabled}
<a href="{'/rss/news'|url}" title="{'siteNews_rss'|lang}"><img src="{'/templates/arfooo_ultimate/images/rss.gif'|resurl}" class="rss_image" alt="{'siteNews_rss'|lang}" /></a>
{/if}</div>
<div class="column_in">
{"/site/newsites"|action}
</div>
{/if}

{displayAd place="overCategories"}   


{if $setting.catinhome}
{"/category/list"|action}
{/if}
{displayAd place="underCategories"}

{displayAd place="underRandomSites"}

<div class="title_h_2">
<h1>{$directoryDescription.title}</h1>
</div>
<div class="column_in">
{$directoryDescription.description|htmlspecialchars_decode|nl2br}
</div>

{displayAd place="underIntroductionText"}


{if $setting.aleainhome}
<div class="title_h_2">
<h2>{'mainIndex_h2'|lang}</h2>
</div>
<div class="column_in">
{'/site/randomList'|action}
</div>
{/if}

<div id="principal">

<div id="left">
{include file="menu/menuleft/menuleft.tpl"}
{displayAd place="leftMenu"}
</div>


{include file="includes/footer.tpl"}