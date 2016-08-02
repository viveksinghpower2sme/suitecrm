
{if strval({{sugarvar key='value' stringFormat='false'}}) == "1" || strval({{sugarvar key='value' stringFormat='false'}}) == "yes" || strval({{sugarvar key='value' stringFormat='false'}}) == "on"} 
{assign var="checked" value="CHECKED"}
{assign var="hidden_val" value="1"}
{else}
{assign var="checked" value=""}
{assign var="hidden_val" value=""}
{/if}
{if $smarty.request.action =='EditView'}
<input type="hidden" name="{{if empty($displayParams.idName)}}{{sugarvar key='name'}}{{else}}{{$displayParams.idName}}{{/if}}" value="{$hidden_val}">
{/if}
<input type="checkbox" class="checkbox" name="{{sugarvar key='name'}}" id="{{sugarvar key='name'}}" value="{{sugarvar key='value' stringFormat='false'}}" disabled="true" {$checked}>
{{if !empty($displayParams.enableConnectors)}}
{{sugarvar_connector view='DetailView'}} 
{{/if}}