<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
 		
            </div><!--/span-->
            
          </div><!--/row-->
        </div><!--/span-->
 		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
			<?
			if ($USER->IsAuthorized())
			{
	            $APPLICATION->IncludeComponent("bitrix:menu", 
	               "left_menu", 
	               array("ROOT_MENU_TYPE" => "top",
	                     "MENU_CACHE_TYPE" => "N",
	                     "MENU_CACHE_TIME" => "3600",
	                     "MENU_CACHE_USE_GROUPS" => "Y",
	                     "MENU_CACHE_GET_VARS" => array(),
	                     "MAX_LEVEL" => "1",
	                     "CHILD_MENU_TYPE" => "left",
	                     "USE_EXT" => "N",
	                     "DELAY" => "N",
	                     "ALLOW_MULTI_SELECT" => "N"
	                    ), 
	               false);
				?>
				<?
					//$month_sale	= Intranet::getInstance()->GetMonthSale(date('n'), date('Y'));
					//$sale_plan	= Intranet::getInstance()->GetUserSalePlan();

				?>
	 			<br/>
	 			<br/>
	 			<? if(Intranet::getInstance()->IsSeller() 
	 					&& !CSite::InDir(SITE_DIR.'intranet/statistics/')
	 					&& !CSite::InDir(SITE_DIR.'intranet/plans/')
	 					&& !CSite::InDir(SITE_DIR.'intranet/reports/')
	 					) { ?>
                    <?
                        $currentPeriod = Intranet::getInstance()->getCurrentPeriod();
                        $currentBonus = new \IT\Intranet\Applications\CurrentBonus();

                        $prevPeriod = Intranet::getInstance()->getNextPeriod(Intranet::getInstance()->getCurrentPeriodId(), true);
                        $prevBonus = new \IT\Intranet\Applications\CurrentBonus(0, $prevPeriod);

                        $userMoney = new \IT\Intranet\Applications\UserMoney();
                    ?>
		 			<?/*<p class="text-primary h3">План на текущий месяц</p>
		 			<p class="h4"><?=number_format($sale_plan, 0, ',', ' ');?> руб</p>
		 			<hr>*/?>
                    <p class="month-title"><?=$currentPeriod['NAME']?></p>
		 			<p class="text-primary h3">Подтверждено</p>
		 			<p class="h4">баллов: <?=$currentBonus->getAccepted()?> (<?=$currentBonus->getReward()?> руб.)</p>
		 			<hr>
		 			<p class="text-primary h3">Ожидает подтверждения</p>
		 			<p class="h4">баллов: <?=$currentBonus->getAwaiting()?></p>
                    <hr>
                    <p class="text-primary h3">Доступно для снятия</p>
                    <p class="h4">
                        <a href="/intranet/money/"><?=$userMoney->getBalance()?></a> руб.
                    </p>
                    <hr>

                    <p class="month-title"><?=$prevPeriod['NAME']?></p>
                    <p class="text-primary h3">Подтверждено</p>
                    <p class="h4">баллов: <?=$prevBonus->getAccepted()?> (<?=$prevBonus->getReward()?> руб.)</p>
                    <hr>
                    <p class="text-primary h3">Ожидает подтверждения</p>
                    <p class="h4">баллов: <?=$prevBonus->getAwaiting()?></p>
                    <hr>

	 			<? } ?>
 			<? } ?>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p class="text-right">&copy; KÖRTING 2013</p>
      </footer>

    </div><!--/.container-->