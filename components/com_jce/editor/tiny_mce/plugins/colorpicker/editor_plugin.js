/* jce - 2.6.33 | 2018-10-10 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2018 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function(){tinymce.create("tinymce.plugins.ColorPicker",{init:function(ed,url){this.editor=ed,ed.addCommand("mceColorPicker",function(ui,v){ed.windowManager.open({url:ed.getParam("site_url")+"index.php?option=com_jce&view=editor&plugin=colorpicker",width:365+parseInt(ed.getLang("advanced.colorpicker_delta_width",0)),height:320+parseInt(ed.getLang("advanced.colorpicker_delta_height",0)),close_previous:!1,inline:!0,popup_css:!1},{input_color:v.color,func:v.func})})}}),tinymce.PluginManager.add("colorpicker",tinymce.plugins.ColorPicker)}();