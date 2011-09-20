<?php /*%%SmartyHeaderCode:13839199294e650dba192f97-38708957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1315244983,
      2 => 'file',
    ),
    '636dea431b7d6e1a8a4a6329094fb3cf82b3712b' => 
    array (
      0 => './templates/headinclude.tpl',
      1 => 1315245188,
      2 => 'file',
    ),
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1315173216,
      2 => 'file',
    ),
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1315245009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13839199294e650dba192f97-38708957',
  'variables' => 
  array (
    'loggedin' => 1,
    'username' => 1,
    'SCRIPT_NAME' => 0,
    'Name' => 1,
    'test' => 0,
    'FirstName' => 0,
    'LastName' => 0,
    'contacts' => 0,
    'option_values' => 0,
    'option_selected' => 0,
    'option_output' => 0,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e650dba4a7e0',
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e650dba4a7e0')) {function content_4e650dba4a7e0($_smarty_tpl) {?><?php $_smarty = $_smarty_tpl->smarty; if (!is_callable('smarty_modifier_capitalize')) include '/Applications/MAMP/htdocs/cms/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include '/Applications/MAMP/htdocs/cms/libs/plugins/modifier.date_format.php';
?><html>
<head>
<title>foo - <?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
<style type="text/css">

body {
color: #757575;
font-family: Helvetica, Verdana, Arial;
margin:0;
}

#mantel {
width:100%;
height:100%;
background-color:white;
}

#header {
border: 1px solid lightgray;
height:15%;
padding: 10px;
margin-bottom:10px;
overflow: hidden;
font-size: 72px;
}

#menu {
border: 1px solid lightgray;
height:3%;
padding: 5px;
margin:auto;
overflow: hidden;
}

#footer {
border: 1px solid lightgray;
height:2%;
padding: 5px;
font-size: 12px;
overflow: hidden;
margin-top:10px;
}

#content {
background-color:white;
height:69%;
padding:10px;
margin:0px 0;
margin-bottom:20px;
}

#innercontent {
float:left;
border: 1px solid lightgray;
width:83%;
padding: 10px;
height:100%;
margin-left:-10px;
}

#sidebar {
border: 1px solid lightgray;
margin-right:-10px;
width: 15%;
height: 100%;
padding: 10px;
float: right;
}

#menu ul {
float:left;
vertical-align:middle;
list-style-type: none;
margin: 0;
padding: 0;
}

#menu li {
display:inline;
}

#menu li a {
text-decoration:none;
color:#757575;
font-size:22px;
padding:0 25px;
text-transform:uppercase;
}

div {
background-color: #F7F8FF;
display: block;
}

</style>
</head>
<body

<div id="mantel">
<div id="header">
Head-Bereich
</div>
<div id="menu">
<ul>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
<li><a href="#">Link</A></li>
</ul>
</div>
<div id="content">
<div id="innercontent">


<?php if ($_smarty_tpl->tpl_vars['loggedin']->value==true){?>Herzlich Wilkommen, <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
.<?php }else{ ?>Hallo Gast<?php }?><br />
<br />
Title: 

The current date and time is 2011-09-05 19:58:18

The value of global assigned variable $SCRIPT_NAME is /cms/index.php

Example of accessing server environment variable SERVER_NAME: localhost

The value of {$Name} is <b><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</b>

Test: <br />
<b>Notice</b>:  Undefined index:  test in <b>/Applications/MAMP/htdocs/cms/templates_c/c0360d049dff10f364dfc53ba2cc3958abf6ee6d.file.index.tpl.cache.php</b> on line <b>70</b><br />
<br />
<b>Notice</b>:  Trying to get property of non-object in <b>/Applications/MAMP/htdocs/cms/templates_c/c0360d049dff10f364dfc53ba2cc3958abf6ee6d.file.index.tpl.cache.php</b> on line <b>70</b><br />
FALSCH
variable modifier example of {$Name|upper}

<b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['Name']->value,SMARTY_RESOURCE_CHAR_SET);?>
</b>


An example of a section loop:

	1 * John Doe
	2 * Mary Smith
	3 . James Johnson
	4 . Henry Case

An example of section looped key values:

	phone: 1<br>
	fax: 2<br>
	cell: 3<br>
	phone: 555-4444<br>
	fax: 555-3333<br>
	cell: 760-1234<br>
<p>

testing strip tags
<table border=0><tr><td><A HREF="/cms/index.php"><font color="red">This is a  test     </font></A></td></tr></table>


This is an example of the html_select_date function:

<form>
<select name="Date_Month">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09" selected="selected">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="Date_Day">
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5" selected="selected">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="Date_Year">
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
</select>
</form>

This is an example of the html_select_time function:

<form>
<select name="Time_Hour">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07" selected="selected">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select name="Time_Minute">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58" selected="selected">58</option>
<option value="59">59</option>
</select>
<select name="Time_Second">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18" selected="selected">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>
<select name="Time_Meridian">
<option value="am">AM</option>
<option value="pm" selected="selected">PM</option>
</select>
</form>

This is an example of the html_options function:

<form>
<select name=states>
<option value="NY">New York</option>
<option value="NE" selected="selected">Nebraska</option>
<option value="KS">Kansas</option>
<option value="IA">Iowa</option>
<option value="OK">Oklahoma</option>
<option value="TX">Texas</option>

</select>
</form>


</div>
<div id="sidebar">
<?php if ($_smarty_tpl->tpl_vars['loggedin']->value==true){?>Herzlich Wilkommen, <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
.<?php }else{ ?>Hallo Gast<?php }?><br />
</div>
</div>
<div id="footer">
Copyright &copy; by juliankern.com - Powered by MCMS Final 1 - Powered bei MNetwork Final 1
</div>
</div>
</body>
</html>
<?php }} ?>