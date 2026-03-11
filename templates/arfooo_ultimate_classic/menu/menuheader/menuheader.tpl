<div id="logo">
<a href="{$setting.siteRootUrl}">
<img src="/templates/arfooo_ultimate_classic/images/logo.png" alt="{$setting.siteRootUrl}"/>
</a>
</div>
<div id="menutop2">
<ul id="menu" class="navnav">
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> Menu</a>
  </li>
<li id="index"><a href="{$setting.siteRootUrl}">{'menuMenuheader_directory'|lang}</a></li>
{if !empty($setting.newsEnabled)}<li id="news"><a href="{'/site/news'|url}">{'menuMenuheader_news'|lang}</a></li>
{/if}
{if !empty($setting.hitsEnabled)}<li id="tophits"><a href="{'/site/topHits'|url}">{'menuMenuheader_top_hits'|lang}</a></li>
{/if}
{if !empty($setting.notationsEnabled)}<li id="topnotes"><a href="{'/site/topNotes'|url}">{'menuMenuheader_top_rated'|lang}</a></li>
{/if}
{if !empty($setting.topRankEnabled)}<li id="toprank"><a href="{'/site/topRank'|url}">{'menuMenuheader_top_rank'|lang}</a></li>
{/if}
{if !empty($setting.topReferrersEnabled)}<li id="topref"><a href="{'/site/topReferrers'|url}">{'menuMenuheader_top_referrers'|lang}</a></li>
{/if}

<li id="add"><a href="{'/info/useCondition'|url}">{'menuMenuheader_submit_website'|lang}</a></li>	
</ul>
</div>

{literal}
<script>
function myFunction() {
    var x = document.getElementById("menu");
    if (x.className === "navnav") {
        x.className += " responsive";
    } else {
        x.className = "navnav";
    }
}
</script>
{/literal}