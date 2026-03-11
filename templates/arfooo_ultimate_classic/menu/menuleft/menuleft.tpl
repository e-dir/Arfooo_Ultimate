{if $setting.registrationOfWebmastersEnabled}
{if isset($session.role) && $session.role != "webmaster"}
<form id="webmasterLoginForm" action="{'/webmaster/logIn'|url}" method="post"> 
<div class="title_h2">
<h1>{'webmasterLogIn_button_login'|lang}</h1>
</div>
<fieldset class="column_in2"> 
    <div class="form">
    
    <div class="form">
    <label class="title2">{'webmasterLogIn_email'|lang} <span class="text_color_mandatory">*</span></label>
    <div class=""><input type="text" class="input_text_medium_2" name="email" value="" /></div>
    </div>
    
    <div class="form">
    <label class="title2">{'webmasterLogIn_pass'|lang} <span class="text_color_mandatory">*</span></label>
    <div class=""><input type="password" class="input_text_medium_2" name="password" value="" /></div>
    </div>
    
    <div class="form">

    <div><input type="checkbox" name="rememberMe" value="1" /> {'webmasterLogIn_remember'|lang}</div>
    </div>
    
    <div class="form_2">

    <div><input type="submit" class="button" value="{'webmasterLogIn_button_login'|lang}" /></div>
    </div>
</fieldset>
</form>
{/if}
{/if}

{if $setting.registrationOfWebmastersEnabled}

<div class="menuright">
<ul>
<li class="header">{'menuright_members_area'|lang}</li>
<li><a href="{'/webmaster/manage'|url}" title="{'Members area management'|lang}">{'menuright_management'|lang}</a></li>
{if isset($session.role) && $session.role == "webmaster"}
<li><a href="{'/webmaster/changePassword'|url}" title="{'Change password'|lang}">{'menuright_change_password'|lang}</a></li>
<li><a href="{'/webmaster/logoff'|url}" title="{'Members area management'|lang}">{'menuright_logout'|lang}</a></li>
{/if}
</ul>
</div>
{/if}



{if $setting.tagCloudEnabled}
{"menu/displayTagCloud"|action}
{/if}