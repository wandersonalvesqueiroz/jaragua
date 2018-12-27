<?php
/**
 * @subpackage    Cirrus Green v1.6 HM02J
 * @copyright    Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$LeftMenuOn = ($this->countModules('position-4') or $this->countModules('position-5') or $this->countModules('position-7'));
$RightMenuOn = ($this->countModules('position-6') or $this->countModules('position-3'));
$app = JFactory::getApplication();
$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';
$logo = $this->params->get('logo', $logopath);
$logoimage = $this->params->get('logoimage');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');

$w = 3;
if ($LeftMenuOn AND $RightMenuOn):
    $w = 1;
elseif ($LeftMenuOn OR $RightMenuOn):
    $w = 2;
endif;

JHTML::_('behavior.modal');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"
      lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="head"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/all.min.css"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/lity.min.css"
          type="text/css"/>
    <script type="text/javascript"
            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js"></script>
    <script type="text/javascript"
            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/lity.min.js"></script>

</head>
<body>

<div id="wrapper">

    <div id="header_wrap">
        <div id="palmeiras">
            <img src="<?php echo $this->baseurl ?>/images/palmeiras_l.png"/>
            <img src="<?php echo $this->baseurl ?>/images/palmeiras_r.png"/>
        </div>
        <div id="header">

            <!-- Logo -->
            <div id="logo">

                <?php if ($logo && $logoimage == 1): ?>
                    <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>"
                                                                alt="<?php echo $sitename; ?>"/></a>
                <?php endif; ?>
                <?php if (!$logo || $logoimage == 0): ?>

                    <?php if ($sitetitle): ?>
                        <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br/>
                    <?php endif; ?>

                    <?php if ($sitedescription): ?>
                        <div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
                    <?php endif; ?>

                <?php endif; ?>

            </div>

            <!-- Search -->
            <div id="search">
                <jdoc:include type="modules" name="position-0"/>
            </div>

            <div id="topmenu_wrap">
                <div id="topmenu">
                    <jdoc:include type="modules" name="position-1"/>
                </div>
            </div>

        </div>
    </div>

    <!-- TopNav -->
    <?php if ($this->countModules('position-13')): ?>
        <div id="topnav_wrap">
            <div id="topnav">
                <jdoc:include type="modules" name="position-13" style="xhtml"/>
            </div>
        </div>
    <?php endif; ?>

    <!-- Breadcrumbs -->
    <?php if ($this->countModules('position-2')): ?>
        <div id="breadcrumbs">
            <jdoc:include type="modules" name="position-2"/>
        </div>
    <?php endif; ?>

    <!-- Content/Menu Wrap -->
    <div id="content-menu_wrap_bg">
        <div id="content-menu_wrap">

            <!-- Left Menu -->
            <?php if ($LeftMenuOn): ?>
                <div id="leftmenu">
                    <jdoc:include type="modules" name="position-7" style="xhtml"/>
                    <jdoc:include type="modules" name="position-4" style="xhtml"/>
                    <jdoc:include type="modules" name="position-5" style="xhtml"/>
                </div>
            <?php endif; ?>

            <!-- COMPONENT-->
            <div id="content-w<?= $w ?>">
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
            </div>

            <!-- Right Menu -->
            <?php if ($RightMenuOn): ?>
                <div id="rightmenu">
                    <jdoc:include type="modules" name="position-6" style="xhtml"/>
                    <jdoc:include type="modules" name="position-3" style="xhtml"/>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <!-- Content Bottom ONE -->
    <?php if ($this->countModules('position-8')): ?>
        <div id="content-bottom-one-wrap">
            <div id="content-bottom-one">
                <jdoc:include type="modules" name="position-8" style="xhtml"/>
            </div>
        </div>
    <?php endif; ?>

    <!-- Content Bottom TWO -->
    <?php if ($this->countModules('position-9')): ?>
        <div id="content-bottom-two-wrap" class="home">
            <div id="content-bottom-two">
                <jdoc:include type="modules" name="position-9" style="xhtml"/>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->countModules('position-12')): ?>
        <div id="content-top">
            <jdoc:include type="modules" name="position-12" style="xhtml"/>
        </div>
    <?php endif; ?>

    <!-- Banner/Links -->
    <div id="box_wrap">

        <div id="box_placeholder">
            <div id="box1">
                <jdoc:include type="modules" name="position-10" style="xhtml"/>
            </div>
            <div id="box2">
                <jdoc:include type="modules" name="position-11" style="xhtml"/>
            </div>
            <div id="box3">
                <jdoc:include type="modules" name="position-14" style="xhtml"/>
            </div>
            <div id="box4">
                <jdoc:include type="modules" name="position-15" style="xhtml"/>
            </div>
        </div>

        <!-- Page End -->
        <div id="copyright">
            <div class="copyrightint">
                <p>Copyright &copy; <?= $sitetitle . ' ' . $sitedescription . ' - ' . date('Y')?> | Todos os direitos reservados</p>
                <a class="sd" href="http://www.sdrummond.com.br" title="Sdrummond Tecnologia" target="_blank">
                    <img src="<?= $this->baseurl ?>/images/sd.png" alt="Sdrummond Tecnologia" title="Sdrummond Tecnologia">
                </a>
            </div>
        </div>

    </div>



</div>

</body>
</html>