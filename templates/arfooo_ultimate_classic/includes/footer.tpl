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
</div>
</div>

<footer>
<div id="column_bottom">
{'includesFooter_powered'|lang} <a href="{'includesFooter_arfooo_url'|lang}" title="{'includesFooter_arfooo_title'|lang}" class="link_black_grey">{'includesFooter_arfooo_name'|lang}</a>
revu par <a href="https://www.e-dir.fr/" title="e-dir.fr" class="link_black_grey">e-dir.fr</a>
 &copy; {'includesFooter_date'|lang}{display_time} &nbsp;&nbsp;
{if $setting.contactPageEnabled}
<a href="{'/contact'|url}" class="link_black_grey">{'includesFooter_contact'|lang}</a>
{/if} &nbsp;&nbsp;
{if $setting.newsletterEnabled}
<a href="{'/newsletter'|url}" class="link_black_grey">{'includesFooter_newsletter'|lang}</a>
{/if}
<link href="{"/templates/$templateName/css/style.css"|resurl}" rel="stylesheet" type="text/css" />
</div>
</footer>

</body>
</html> 