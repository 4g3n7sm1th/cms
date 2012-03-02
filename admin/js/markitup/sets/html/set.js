// ----------------------------------------------------------------------------
// markItUp!
// ----------------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// ----------------------------------------------------------------------------
// Html tags
// http://en.wikipedia.org/wiki/html
// ----------------------------------------------------------------------------
// Basic set. Feel free to add more tags
// ----------------------------------------------------------------------------
var id = '';
var linktext = '';
var songtext = '';
function insertSongtext(text)
{
		    var id = timestamp();
		    newtext = text.replace(/popup_X/gi, 'popup_'+id);
		    newtext = newtext.replace(/<br>/gi, '<br />'+getLineSeparator());
		    newtext = newtext.replace(/<br \/>/gi, '<br />'+getLineSeparator());
		    newtext = newtext.replace(/\n\n/gi, getLineSeparator());
		    newtext = newtext.replace(/\n\n/gi, getLineSeparator());
		    newtext = newtext.replace(/\n\n/gi, getLineSeparator());
		    return newtext;
}

mySettings = {
	onEnter:	{keepDefault:false, replaceWith:'<br />\n'},
	onCtrlEnter:	{keepDefault:false, openWith:'\n<p>', closeWith:'</p>\n'},
	onTab:			{keepDefault:false, openWith:'	 '},
	previewAutoRefresh: true,
	markupSet: [
		{name:'Heading 1', key:'1', openWith:'<h1(!( class="[![Class]!]")!)>', closeWith:'</h1>', placeHolder:'Your title here...' },
		{name:'Heading 2', key:'2', openWith:'<h2(!( class="[![Class]!]")!)>', closeWith:'</h2>', placeHolder:'Your title here...' },
		{name:'Heading 3', key:'3', openWith:'<h3(!( class="[![Class]!]")!)>', closeWith:'</h3>', placeHolder:'Your title here...' },
		{name:'Heading 4', key:'4', openWith:'<h4(!( class="[![Class]!]")!)>', closeWith:'</h4>', placeHolder:'Your title here...' },
		{name:'Heading 5', key:'5', openWith:'<h5(!( class="[![Class]!]")!)>', closeWith:'</h5>', placeHolder:'Your title here...' },
		{name:'Heading 6', key:'6', openWith:'<h6(!( class="[![Class]!]")!)>', closeWith:'</h6>', placeHolder:'Your title here...' },
		{name:'Paragraph', openWith:'<p(!( class="[![Class]!]")!)>', closeWith:'</p>' },
		{separator:'---------------' },
		{name:'Bold', key:'B', openWith:'(!(<strong>|!|<b>)!)', closeWith:'(!(</strong>|!|</b>)!)' },
		{name:'Italic', key:'I', openWith:'(!(<em>|!|<i>)!)', closeWith:'(!(</em>|!|</i>)!)' },
		{name:'Stroke through', key:'S', openWith:'<del>', closeWith:'</del>' },
		{separator:'---------------' },
		{name:'Ul', openWith:'<ul>\n', closeWith:'</ul>\n' },
		{name:'Ol', openWith:'<ol>\n', closeWith:'</ol>\n' },
		{name:'Li', openWith:'<li>', closeWith:'</li>' },
		{separator:'---------------' },
		{name:'Link', key:'L', openWith:'<a href="[![Link:!:http://]!]"(!( title="[![Title]!]")!)>', closeWith:'</a>', placeHolder:'Your text to link...' },
		{name:'Bild-Link', className: 'image', replaceWith: '<a href="[![Bild-URL:!:http://]!]" class="fancybox gallerylink"><img src="[![Bild-URL:!:http://]!]" style="max-width:150px;height:100px;margin:10px"></a>'},
		{name:'Page-Break', className:'pagebreak', openWith:'<!-- pagebreak -->' },
		{separator:'---------------' },
		{name:'Clean', className:'clean', replaceWith:function(markitup) { return markitup.selection.replace(/<(.*?)>/g, "") } },	
		{name:'Songtext Pop-Up', 
		 className:'songtext', 
		 replaceWith: '<a href="#" onclick="$(\'#popup_X\').dialog({ height:400, width:750 })">[![Song-Name]!]</a>\n\n<div id="popup_X" style="display:none">[![Songtext]!]</div>',
		 afterInsert:function(h) {
        text= $(h.textarea).val();
        newtext = insertSongtext(text);
        $(h.textarea).val(newtext);
     }
		}		
	]
}