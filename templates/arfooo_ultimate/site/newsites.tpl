{foreach from=$newSites value=site}
<div class="newhome">
    <a href="{$site|objurl:'siteDetails'}" title="{$site.siteTitle}" >
    <img alt="{$site.siteTitle}" src="{$site.imageSrc}"  class="random_image2" />
    </a>
	{$site.description|htmlspecialchars_decode|strip_tags|truncate:$setting.numberOfCharactersForItemDescription|nl2br}
	
	</div>
{/foreach}