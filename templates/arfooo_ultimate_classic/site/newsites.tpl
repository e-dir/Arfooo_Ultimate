{foreach from=$newSites value=site}
<div class="newhome">
    <a href="{$site|objurl:'siteDetails'}" title="{$site.siteTitle}" >
    <img alt="{$site.siteTitle}" src="{$site.imageSrc}"  class="random_image2" />
    </a>
	<a class="title_newh" href="{$site|objurl:'siteDetails'}" title="{$site.siteTitle}">{$site.siteTitle|truncate:60}</a>
	<p>{$site.description|htmlspecialchars_decode|strip_tags|truncate:$setting.numberOfCharactersForItemDescription|nl2br}</p>
	
	</div>
{/foreach}