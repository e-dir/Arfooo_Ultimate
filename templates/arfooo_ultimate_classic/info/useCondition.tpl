{include file="includes/header.tpl" title="{'infoUseCondition_html_title'|lang}" metaDescription="{'infoUseCondition_meta_description'|lang}"}    
{include file="includes/header_ico.tpl"}  
<div class="show_arbo"> 
<a href="{$setting.siteRootUrl}" class="link_showarbo">{'show_arbo_directory'|lang}</a> &gt; <a href="{'/info/useCondition'|url}" class="link_showarbo">{'infoUseCondition_arbo'|lang}</a> 
</div>
                
<div class="title_h_1">
<h1>{'infoUseCondition_h1'|lang}</h1>
</div>
<div class="column_in">
{$directoryCondition.description|htmlspecialchars_decode|nl2br} 

<a class="envoi" href="{'/webmaster/submitWebsite'|url}">{'infoUseCondition_envoi'|lang}</a>
</div>

{include file="includes/footer.tpl"}