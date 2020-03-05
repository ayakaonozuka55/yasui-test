
<aside class="side">
  <div class="sideblock">
    <h2><span>カテゴリから選ぶ</span></h2>
    <ul class="sideblock_unordered visible-md visible-sm">
<?php 
$results = $wpdb->get_results("
    SELECT A.name, A.slug /* post_titleとguidとIDの値を取り出す */
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE  B.taxonomy = 'event_category' 
		AND B.count != '0' 
    ORDER BY B.parent, A.term_order ASC
");
?>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
      <li>
        <a href="<?php echo home_url(); ?>/event_category/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></a>
      </li>
<?php endforeach; ?>
    </ul>
    <div class="select sideblock_select visible-xs">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>選択してください</option>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
            <option value="<?php echo home_url(); ?>/event_category/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></option>
<?php endforeach; ?>
        </select>
      </form>
    </div>
  </div>
  <div class="sideblock">
    <h2><span>ブランドから選ぶ</span></h2>
    <ul class="sideblock_unordered visible-md visible-sm">
<?php 
$results = $wpdb->get_results("
    SELECT A.name, A.slug /* post_titleとguidとIDの値を取り出す */
    FROM $wpdb->terms AS A
	LEFT OUTER JOIN $wpdb->term_taxonomy AS B ON A.term_id = B.term_id 
    WHERE  B.taxonomy = 'event_brand' 
		AND B.count != '0' 
    ORDER BY B.parent, A.term_order ASC
");
?>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
      <li>
        <a href="<?php echo home_url(); ?>/event_brand/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></a>
      </li>
<?php endforeach; ?>
    </ul>
    <div class="select sideblock_select visible-xs">
      <form action="">
        <select name="category" onchange="document.location=form.category.options[form.category.selectedIndex].value;">
          <option selected>選択してください</option>
<?php
foreach ($results as $value) :
	$oyaslug = $value->slug;
	$oyaname = $value->name;
?>
            <option value="<?php echo home_url(); ?>/event_brand/<?php echo $oyaslug; ?>"><?php echo $oyaname; ?></option>
<?php endforeach; ?>

        </select>
      </form>
    </div>
  </div>
  <div class="sideblock">
    <ul class="sideblock_unordered sideblock_unordered_prev">
      <li>
        <a href="<?php echo home_url(); ?>/event-past">過去のイベント</a>
      </li>
    </ul>
  </div>
</aside>