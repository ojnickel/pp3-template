<?php
/**
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.

 * Aenderungshistorie
 * 130412 Fischer: Block für Nachrichten von Joomla temporaer auskommentiert, da sonst "Nachricht" ausgegeben wird
 * J.Mueller OWS 16.05.2014 Mueller: geänderter Block für Nachrichten von Joomla eingefügt
 * J.Mueller OWS 11.2015: bei Newsletter spezielles CSS einbinden
 * A.Wagner OWS 01.12.2015: doppelter Anker content entfernt
 */
 
defined('_JEXEC') or die;
//JHtml::_('behavior.framework', true);
//unset($this->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);

$url = clone(JURI::getInstance());
$showRightColumn = $this->countModules('user1 or user2 or right or top');
$showRightColumn &= JRequest::getCmd('layout') != 'form';
$showRightColumn &= JRequest::getCmd('task') != 'edit';

// unset canonical link
$doc = JFactory::getDocument(); 
foreach ( $doc->_links as $k => $array ) { 
  if ( $array['relation'] == 'canonical' ) { 
    unset($doc->_links[$k]); 
  } 
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="google-site-verification" content="zlKvOQSINb31Rl555EN0xJfXjmzRsiYc6beHbLTVPnI" />

<?php
  $app = JFactory::getApplication();
  $menu = $app->getMenu()->getActive();
  $pageclass = '';
 
  if (is_object($menu))
    $pageclass = $menu->params->get('pageclass_sfx');
  
  /* [br] aus title löschen */
  $title = $this->getTitle();
  if (strpos($title,'[br]') !== false) {
    $title_obr = str_replace('[br]', '', $title);
    $this->setTitle( $title_obr );
  }  
?>
 
<jdoc:include type="head" />

<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/print.css" type="text/css" media="print" />
<!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/template.css" type="text/css" media="screen, projection, print" />-->
<!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/position.css" type="text/css" media="screen, projection, print" />-->
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/layout.min.css" type="text/css" media="screen, projection, print" />
<?php  // J.Mueller OWS 11.2015: bei Newsletter spezielles CSS einbinden
  $input = JFactory::getApplication()->input;
  $itemId = $input->getInt('id');
  $item = JTable::getInstance('content');
  $item->load($itemId);
  $cat = JTable::getInstance('category');
  $cat->load($item->catid);
  echo 'newsletter' == $cat->alias ? '<link rel="stylesheet" href="' . $this->baseurl . '/templates/' . $this->template . '/css/layout_newsletter.css" type="text/css" media="screen, projection, print" />' : '';
?>
<!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/general.css" type="text/css" media="screen, projection, print" />-->
<?php if($this->direction == 'rtl') : ?>
<!--<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/template_rtl.css" type="text/css" />-->
<?php endif; ?>
<!--[if IE]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/ieall.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 6]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 7]>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/javascript/md_stylechanger.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/javascript/wohnenppkarte.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/javascript/html5.js"></script>
<![endif]-->
</head>

<body class="global<?php echo $pageclass ? htmlspecialchars($pageclass) : ''; ?>">
<div id="container" class="global<?php echo $pageclass ? htmlspecialchars($pageclass) : ''; ?>">
  <div id="all">
    <ul id="skiplinks">
      <li><a href="#content" class="u2">Springe zum Inhaltsbereich</a></li>
      <li><a href="#mainmenu" class="u2">Springe zum Hauptmenü</a></li>
      <li><a href="#topmenu" class="u2">Springe zur Topnavigation, Schriftgröße, Suche</a></li>
      <li><a href="#additional" class="u2">Springe zur Infospalte</a></li>
      <li><a href="#footer" class="u2">Springe zum Menü im Fußbereich</a></li>
    </ul>
    <a name="mainmenu"></a>
    <div id="left">
      <!-- <div id="logo"> <a href="index.php"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/images/logo.gif"  alt="Logo: Stiftung Pfennigparade" width="16em" /></a> </div> -->
      <h1 class="unseen">Hauptmenü</h1>
      <jdoc:include type="modules" name="left" style="xhtml" />
    </div>
    
    <!-- left -->    
    <div id="wrapperall" class="global<?php echo $pageclass ? htmlspecialchars($pageclass) : ''; ?>">
      <div id="header"> <a name="topmenu"></a>
        <h1 class="unseen">Topnavigation, Schriftgröße, Suche</h1>
        <jdoc:include type="modules" name="user3" />
        <div id="fontsize"> 
          <script type="text/javascript">
          //<![CDATA[
            document.write('<h3><?php echo JText::_('Schriftgröße:'); ?></h3><p class="fontsize">');
            document.write('<a href="index.php" title="<?php echo JText::_('Verkleinern'); ?>" onclick="changeFontSize(-2); return false;" class="smaller"><?php echo JText::_('A-'); ?></a><span class="unseen">&nbsp;</span>');
            document.write('<a href="index.php" title="<?php echo JText::_('Standardgröße'); ?>" onclick="revertStyles(); return false;" class="reset"><?php echo JText::_('A'); ?></a><span class="unseen">&nbsp;</span>');
            document.write('<a href="index.php" title="<?php echo JText::_('Vergrößern'); ?>" onclick="changeFontSize(2); return false;" class="larger"><?php echo JText::_('A+'); ?></a></p>');            
            
          //]]>
          </script> 
        </div>
        <div id="searchwrapper">
          <jdoc:include type="modules" name="user4" />
        </div>
		<jdoc:include type="modules" name="banners" />
      </div>
      <!-- end header -->      
      <!--     <div class="wrap">&nbsp;</div>       -->      
      <!--			<div class="wrap">&nbsp;</div> -->      
      <!-- Module des Bereiches DL + P Semi -->      
      <a name="content"></a>
      <h1 class="unseen">Inhaltsbereich</h1>
      <?php if($this->countModules('breadcrumb_dp')) : ?>
      <div id="breadcrumbs_dp">
        <div> 
          <jdoc:include type="modules" name="breadcrumb_dp" />
        </div>
      </div>
      <!-- end breadcrumbs_dp -->
      
      <?php endif; ?>
      <?php if($this->countModules('intro_dp')) : ?>
      <div id="intro_dp">
        <jdoc:include type="modules" name="intro_dp" />
      </div>
      <!-- end intro_dp -->
      
      <?php endif; ?>     
      <!-- end Module des Bereichs DL + P Semi -->
      
      <div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>">
        <div id="wrapper">
          <div id="<?php echo $showRightColumn ? 'main2' : 'main'; ?>">
            <div id="main_content"> 
              <!-- 20130412 Fischer temporaer auskommentiert, da sonst "Nachricht ausgegeben wird
				<?php //if ($this->getBuffer('message')) : ?>
				<div class="error">
					<h2>
						<?php //echo JText::_('Message'); ?>
					</h2>
					<jdoc:include type="message" />
				</div>
				<?php //endif; ?>
-->
			<?php
				$iserror=$app->getMessageQueue();
				if( !empty($iserror)) :?>
					<div class="error">
						<h2 class="unseen">
							<?php echo JText::_('TPL_PFENNIGPARADE_SYSTEM_MESSAGE'); ?>
						</h2>
						<jdoc:include type="message" />
					</div>
			<?php endif ; ?> 
              
              <?php if($this->countModules('breadcrumb')) : ?>
              <div id="breadcrumbs">
                <div>
                  <jdoc:include type="modules" name="breadcrumb" />
                </div>
              </div>
              <!-- end breadcrumb -->
              
              <?php endif; ?>
              <jdoc:include type="modules" name="startseite" />
              <jdoc:include type="modules" name="contentnavi" />
              
              <!-- Module des Bereichs DL + P Semi -->
              
              <?php if($this->countModules('infoboxen')) : ?>
              <div id="infoboxen">
                <jdoc:include type="modules" name="infoboxen" />
              </div>
              <!-- end infoboxen -->
              
              <?php endif; ?>
              
              <!-- end DL + P -->
              
              <jdoc:include type="component" />
              <?php if($this->countModules('footcrumb')) : ?>
              <div id="footcrumbs">
                <p>
                  <jdoc:include type="modules" name="footcrumb" />
                </p>
              </div>
              <!-- end footcrumb -->
              
              <?php endif; ?>
            </div>
            <!-- end main_content --> 
            
          </div>
          <!-- end main or main2 -->
          
          <?php if ($showRightColumn) : ?>
          <div id="right"> <a name="additional"></a>
            <h1 class="unseen">Infospalte</h1>
            <jdoc:include type="modules" name="top"   style="xhtml" />
            <jdoc:include type="modules" name="user1" style="xhtml" />
            <jdoc:include type="modules" name="user2" style="xhtml" />
            <jdoc:include type="modules" name="right" style="xhtml" />
          </div>
          <!-- right -->
          
          <?php endif; ?>
          <div class="wrap">&nbsp;</div>
        </div>
        <!-- wrapper --> 
        
      </div>
      <!-- contentarea -->
      
      <div class="wrap">&nbsp;</div>
      <div id="footer"> <a name="footermenu"></a>
        <h1 class="unseen">Menü im Fußbereich</h1>
        <div class="syndicate">
          <jdoc:include type="modules" name="syndicate" />
          <jdoc:include type="modules" name="footer" style="xhtml" />
        </div>
        
        <div class="wrap"></div>
      </div>
      <!-- footer --> 
      
    </div>
    <!-- wrapperall --> 
    
  </div>
  <!-- all --> 
  
</div>
<!-- container -->
<jdoc:include type="modules" name="debug" />
</body>
</html>
