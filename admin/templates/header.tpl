<div id="wrapper">

	<header id="header">
    {$app_title}
    <div id="menu">
      {adminmenue id=1}
    </div>
  </header><!-- #header-->

	<section id="middle">

		<div id="container">
			<div id="content">
			  <h1>{$pagetitle}</h1>
        {include file="message.tpl" position_actual=1}
        <!-- Message-Container for JS -->
        <div id="message_div"></div>
        <br />