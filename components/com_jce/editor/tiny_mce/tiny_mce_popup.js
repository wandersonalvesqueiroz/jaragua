/**
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 * License: https://tinymce.moxiecode.com/license
 * Contributing: https://tinymce.moxiecode.com/contributing
**/
var tinymce=null,tinyMCEPopup,tinyMCE;tinyMCEPopup={init:function(){var w,t=this;w=t.getWin(),tinymce=w.tinymce,tinyMCE=w.tinyMCE,t.editor=tinymce.EditorManager.activeEditor,t.params=t.editor.windowManager.params,t.features=t.editor.windowManager.features,t.dom=t.editor.windowManager.createInstance("tinymce.dom.DOMUtils",document,{ownEvents:!0,proxy:tinyMCEPopup._eventProxy}),t.dom.bind(window,"ready",t._onDOMLoaded,t),t.features.popup_css!==!1&&t.dom.loadCSS(t.features.popup_css||t.editor.settings.popup_css),t.listeners=[],t.onInit={add:function(f,s){t.listeners.push({func:f,scope:s})}},t.isWindow=!t.getWindowArg("mce_inline"),t.id=t.getWindowArg("mce_window_id"),t.editor.windowManager.onOpen.dispatch(t.editor.windowManager,window)},getWin:function(){return!window.frameElement&&window.dialogArguments||opener||parent||top},getWindowArg:function(n,dv){var v=this.params[n];return tinymce.is(v)?v:dv},getParam:function(n,dv){return this.editor.getParam(n,dv)},getLang:function(n,dv){return this.editor.getLang(n,dv)},execCommand:function(cmd,ui,val,a){return a=a||{},a.skip_focus=1,this.restoreSelection(),this.editor.execCommand(cmd,ui,val,a)},resizeToInnerSize:function(){var t=this;setTimeout(function(){var vp=t.dom.getViewPort(window);t.editor.windowManager.resizeBy(t.getWindowArg("mce_width")-vp.w,t.getWindowArg("mce_height")-vp.h,t.id||window)},10)},executeOnLoad:function(s){this.onInit.add(function(){eval(s)})},storeSelection:function(){this.editor.windowManager.bookmark=tinyMCEPopup.editor.selection.getBookmark(1)},restoreSelection:function(){var t=tinyMCEPopup;!t.isWindow&&tinymce.isIE&&t.editor.selection.moveToBookmark(t.editor.windowManager.bookmark)},requireLangPack:function(){var t=this,u=t.getWindowArg("plugin_url")||t.getWindowArg("theme_url");u&&t.editor.settings.language&&t.features.translate_i18n!==!1&&t.editor.settings.language_load!==!1&&(u+="/langs/"+t.editor.settings.language+"_dlg.js",tinymce.ScriptLoader.isDone(u)||(document.write('<script type="text/javascript" src="'+tinymce._addVer(u)+'"></script>'),tinymce.ScriptLoader.markDone(u)))},pickColor:function(e,element_id){this.execCommand("mceColorPicker",!0,{color:document.getElementById(element_id).value,func:function(c){document.getElementById(element_id).value=c;try{document.getElementById(element_id).onchange()}catch(ex){}}})},openBrowser:function(args){tinyMCEPopup.restoreSelection(),this.editor.execCallback("file_browser_callback",args,window)},confirm:function(t,cb,s){this.editor.windowManager.confirm(t,cb,s,window)},alert:function(tx,cb,s){this.editor.windowManager.alert(tx,cb,s,window)},close:function(){function close(){t.editor.windowManager.close(window),tinymce=tinyMCE=t.editor=t.params=t.dom=t.dom.doc=null}var t=this;tinymce.isOpera?t.getWin().setTimeout(close,0):close()},_restoreSelection:function(e){var e=e&&e.target||window.event.srcElement;"INPUT"!=e.nodeName||"submit"!=e.type&&"button"!=e.type||tinyMCEPopup.restoreSelection()},_onDOMLoaded:function(){var h,nv,t=tinyMCEPopup,ti=document.title;t.features.translate_i18n!==!1&&(h=document.body.innerHTML,tinymce.isIE&&(h=h.replace(/ (value|title|alt)=([^"][^\s>]+)/gi,' $1="$2"')),document.dir=t.editor.getParam("directionality",""),(nv=t.editor.translate(h))&&nv!=h&&(document.body.innerHTML=nv),(nv=t.editor.translate(ti))&&nv!=ti&&(document.title=ti=nv)),t.editor.getParam("browser_preferred_colors",!1)&&t.isWindow||t.dom.addClass(document.body,"forceColors"),document.body.style.display="",tinymce.isIE&&!tinymce.isIE11?(document.attachEvent("onmouseup",tinyMCEPopup._restoreSelection),t.dom.add(t.dom.select("head")[0],"base",{target:"_self"})):tinymce.isIE11&&document.addEventListener("mouseup",tinyMCEPopup._restoreSelection,!1),t.restoreSelection(),t.resizeToInnerSize(),t.isWindow?window.focus():t.editor.windowManager.setTitle(window,ti),tinymce.isIE||t.isWindow||t.dom.bind(document,"focus",function(){t.editor.windowManager.focus(t.id)}),tinymce.each(t.dom.select("select"),function(e){e.onkeydown=tinyMCEPopup._accessHandler}),tinymce.each(t.listeners,function(o){o.func.call(o.scope,t.editor)}),t.getWindowArg("mce_auto_focus",!0)&&(window.focus(),tinymce.each(document.forms,function(f){tinymce.each(f.elements,function(e){if(t.dom.hasClass(e,"mceFocus")&&!e.disabled)return e.focus(),!1})})),document.onkeyup=tinyMCEPopup._closeWinKeyHandler},_accessHandler:function(e){if(e=e||window.event,13==e.keyCode||32==e.keyCode){var elm=e.target||e.srcElement;return elm.onchange&&elm.onchange(),tinymce.dom.Event.cancel(e)}},_closeWinKeyHandler:function(e){e=e||window.event,27==e.keyCode&&tinyMCEPopup.close()},_eventProxy:function(id){return function(evt){tinyMCEPopup.dom.events.callNativeHandler(id,evt)}}},tinyMCEPopup.init();