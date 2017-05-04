<<<<<<< HEAD
<?php





//
if ( $_SERVER ['REQUEST_METHOD'] == 'POST' ) {
	include __EB_EFM_DIR . 'update.php';
}





?>
<style type="text/css">
.efm-color-picker {
	padding: 0 3px;
	margin: 0;
	height: 30px;
	width: 90px;
	cursor: pointer;
	border: 1px solid #91765d;
	background: #eee;
}
#widget_width,
#widget_height {
	width: 70px!important;
	border: 1px #BDBDBD solid;
	transition: border-color .3s;
	-o-transition: border-color .3s;
	-ms-transition: border-color .3s;
	-moz-transition: border-color .3s;
	-webkit-transition: border-color .3s;
}
#widget_width:hover,
#widget_height:hover {
	background: #f0fff0;
	border-color: #7DC27D;
}
/*
.btn-restore-default {
	display: inline-block;
	font-weight: 400;
	text-align: center;
	vertical-align: middle;
	touch-action: manipulation;
	cursor: pointer;
	border: 1px solid transparent;
	white-space: nowrap;
	font-size: 13px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	-webkit-tap-highlight-color: rgba(169,3,41,.5);
	border-radius: 2px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	-moz-box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 4px 12px;
	background: #888;
	color: #fff;
	margin: 0 auto;
}
*/
.efm-exemple-relative { position: relative; }
.efm-exemple-box {
	position: absolute;
	background: #fff;
	border: 1px #ccc solid;
	top: 250px;
	right: 6%;
	width: 40%;
	min-width: 250px;
	height: 40%;
	min-height: 250px;
	z-index: 9;
	color: #999;
	padding: 10px;
}
</style>
<div class="efm-exemple-relative">
	<!--
	<div class="efm-exemple-box">Exemple box</div>
	-->
	<div class="wrap">
		<h1>Setting Facebook Messenger Box</h1>
		<p>* Note: the default value has been active if custom value not set.</p>
		<form name="echbay_config_for_efm" id="echbay_config_for_efm" method="post" action="" class="validate">
			<table class="form-table">
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="fb_link">URL Facebook page/ Profile</label></th>
					<td><input name="_efm_fb_link" id="fb_link" type="text" value="<?php echo $___cf_efm_options['fb_link']; ?>" placeholder="<?php echo $___cf_default_efm_options['fb_link']; ?>" />
						<p class="description">URL Facebook page or URL your profile.</p></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="widget_title">Header Title</label></th>
					<td><input name="_efm_widget_title" id="widget_title" type="text" value="<?php echo $___cf_efm_options['widget_title']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_title']; ?>" /></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="header_bg">Header Background</label></th>
					<td><input type="color" name="_efm_header_bg" id="header_bg" value="<?php echo $___cf_efm_options['header_bg']; ?>" placeholder="<?php echo $___cf_default_efm_options['header_bg']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="header_text">Header Text</label></th>
					<td><input type="color" name="_efm_header_text" id="header_text" value="<?php echo $___cf_efm_options['header_text']; ?>" placeholder="<?php echo $___cf_default_efm_options['header_text']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="widget_width">Widget Width</label></th>
					<td><input name="_efm_widget_width" id="widget_width" type="text" value="<?php echo $___cf_efm_options['widget_width']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_width']; ?>" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="widget_height">Widget Height</label></th>
					<td><input name="_efm_widget_height" id="widget_height" type="text" value="<?php echo $___cf_efm_options['widget_height']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_height']; ?>" /></td>
				</tr>
				<tr class="form-field term-parent-wrap">
					<th scope="row"><label for="widget_position">Position</label></th>
					<td><select name="_efm_widget_position" id="widget_position" class="postform">
							<?php
						$arr_for_Position_widget = array(
							"tr" => 'Top Right',
							"tl" => 'Top Left',
							"cr" => 'Center Right',
							"cl" => 'Center Left',
							"br" => 'Bottom Right',
							"bl" => 'Bottom Left',
						);
						
						foreach ( $arr_for_Position_widget as $k => $v ) {
							echo '<option value="' . $k . '"' . ___eb_efm_checked_or_selected( $___cf_efm_options['widget_position'], $k ) . '>' . $v . '</option>';
						}
						?>
						</select></td>
				</tr>
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="round">Desktop widget</label></th>
					<td><input type="radio" id="round" name="_efm_desktop_theme" value="min" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['desktop_theme'], 'min', ' checked="checked"' ); ?>>
						<input type="radio" id="rectangle" name="_efm_desktop_theme" value="full" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['desktop_theme'], 'full', ' checked="checked"' ); ?>>
						<p class="description">Select your desktop widget.</p></td>
				</tr>
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="mobile_round">Mobile widget</label></th>
					<td><input type="radio" id="mobile_round" name="_efm_mobile_theme" value="min" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['mobile_theme'], 'min', ' checked="checked"' ); ?>>
						<input type="radio" id="mobile_rectangle" name="_efm_mobile_theme" value="full" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['mobile_theme'], 'full', ' checked="checked"' ); ?>>
						<p class="description">Select your mobile widget.</p></td>
				</tr>
				<!--
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="show_bubble">Show Bubble</label></th>
					<td><input type="checkbox" id="show_bubble" name="_efm_show_bubble" value="no" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['show_bubble'], 'no', ' checked="checked"' ); ?>></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="bubble_bg_colors">Bubble Colors</label></th>
					<td><input type="color" name="_efm_bubble_bg_colors" id="bubble_bg_colors" value="<?php echo $___cf_efm_options['bubble_bg_colors']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_bg_colors']; ?>" class="efm-color-picker" />
						&nbsp;
						<input type="color" name="_efm_bubble_colors" id="bubble_colors" value="<?php echo $___cf_efm_options['bubble_colors']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_colors']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="bubble_content">Bubble Content</label></th>
					<td><input name="_efm_bubble_content" id="bubble_content" type="text" value="<?php echo $___cf_efm_options['bubble_content']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_content']; ?>" /></td>
				</tr>
				-->
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="custom_style">Description</label></th>
					<td><textarea name="_efm_custom_style" id="custom_style" rows="5" cols="50" placeholder="<?php echo $___cf_default_efm_options['custom_style']; ?>" class="large-text"><?php echo $___cf_efm_options['custom_style']; ?></textarea>
						<p class="description">The custom style for development.</p></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Update"  />
			</p>
		</form>
	</div>
</div>
=======
<?php





//
if ( $_SERVER ['REQUEST_METHOD'] == 'POST' ) {
	include __EB_EFM_DIR . 'update.php';
}





?>
<style type="text/css">
.efm-color-picker {
	padding: 0 3px;
	margin: 0;
	height: 30px;
	width: 90px;
	cursor: pointer;
	border: 1px solid #91765d;
	background: #eee;
}
#widget_width,
#widget_height {
	width: 70px!important;
	border: 1px #BDBDBD solid;
	transition: border-color .3s;
	-o-transition: border-color .3s;
	-ms-transition: border-color .3s;
	-moz-transition: border-color .3s;
	-webkit-transition: border-color .3s;
}
#widget_width:hover,
#widget_height:hover {
	background: #f0fff0;
	border-color: #7DC27D;
}
/*
.btn-restore-default {
	display: inline-block;
	font-weight: 400;
	text-align: center;
	vertical-align: middle;
	touch-action: manipulation;
	cursor: pointer;
	border: 1px solid transparent;
	white-space: nowrap;
	font-size: 13px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	-webkit-tap-highlight-color: rgba(169,3,41,.5);
	border-radius: 2px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	-moz-box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	-webkit-box-shadow: inset 0 -2px 0 rgba(0,0,0,.05);
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	padding: 4px 12px;
	background: #888;
	color: #fff;
	margin: 0 auto;
}
*/
.efm-exemple-relative { position: relative; }
.efm-exemple-box {
	position: absolute;
	background: #fff;
	border: 1px #ccc solid;
	top: 250px;
	right: 6%;
	width: 40%;
	min-width: 250px;
	height: 40%;
	min-height: 250px;
	z-index: 9;
	color: #999;
	padding: 10px;
}
</style>
<div class="efm-exemple-relative">
	<!--
	<div class="efm-exemple-box">Exemple box</div>
	-->
	<div class="wrap">
		<h1>Setting Facebook Messenger Box</h1>
		<p>* Note: the default value has been active if custom value not set.</p>
		<form name="echbay_config_for_efm" id="echbay_config_for_efm" method="post" action="" class="validate">
			<table class="form-table">
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="fb_link">URL Facebook page/ Profile</label></th>
					<td><input name="_efm_fb_link" id="fb_link" type="text" value="<?php echo $___cf_efm_options['fb_link']; ?>" placeholder="<?php echo $___cf_default_efm_options['fb_link']; ?>" />
						<p class="description">URL Facebook page or URL your profile.</p></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="widget_title">Header Title</label></th>
					<td><input name="_efm_widget_title" id="widget_title" type="text" value="<?php echo $___cf_efm_options['widget_title']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_title']; ?>" /></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="header_bg">Header Background</label></th>
					<td><input type="color" name="_efm_header_bg" id="header_bg" value="<?php echo $___cf_efm_options['header_bg']; ?>" placeholder="<?php echo $___cf_default_efm_options['header_bg']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="header_text">Header Text</label></th>
					<td><input type="color" name="_efm_header_text" id="header_text" value="<?php echo $___cf_efm_options['header_text']; ?>" placeholder="<?php echo $___cf_default_efm_options['header_text']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="widget_width">Widget Width</label></th>
					<td><input name="_efm_widget_width" id="widget_width" type="text" value="<?php echo $___cf_efm_options['widget_width']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_width']; ?>" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="widget_height">Widget Height</label></th>
					<td><input name="_efm_widget_height" id="widget_height" type="text" value="<?php echo $___cf_efm_options['widget_height']; ?>" placeholder="<?php echo $___cf_default_efm_options['widget_height']; ?>" /></td>
				</tr>
				<tr class="form-field term-parent-wrap">
					<th scope="row"><label for="widget_position">Position</label></th>
					<td><select name="_efm_widget_position" id="widget_position" class="postform">
							<?php
						$arr_for_Position_widget = array(
							"tr" => 'Top Right',
							"tl" => 'Top Left',
							"cr" => 'Center Right',
							"cl" => 'Center Left',
							"br" => 'Bottom Right',
							"bl" => 'Bottom Left',
						);
						
						foreach ( $arr_for_Position_widget as $k => $v ) {
							echo '<option value="' . $k . '"' . ___eb_efm_checked_or_selected( $___cf_efm_options['widget_position'], $k ) . '>' . $v . '</option>';
						}
						?>
						</select></td>
				</tr>
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="round">Desktop widget</label></th>
					<td><input type="radio" id="round" name="_efm_desktop_theme" value="min" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['desktop_theme'], 'min', ' checked="checked"' ); ?>>
						<input type="radio" id="rectangle" name="_efm_desktop_theme" value="full" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['desktop_theme'], 'full', ' checked="checked"' ); ?>>
						<p class="description">Select your desktop widget.</p></td>
				</tr>
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="mobile_round">Mobile widget</label></th>
					<td><input type="radio" id="mobile_round" name="_efm_mobile_theme" value="min" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['mobile_theme'], 'min', ' checked="checked"' ); ?>>
						<input type="radio" id="mobile_rectangle" name="_efm_mobile_theme" value="full" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['mobile_theme'], 'full', ' checked="checked"' ); ?>>
						<p class="description">Select your mobile widget.</p></td>
				</tr>
				<!--
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="show_bubble">Show Bubble</label></th>
					<td><input type="checkbox" id="show_bubble" name="_efm_show_bubble" value="no" <?php echo ___eb_efm_checked_or_selected( $___cf_efm_options['show_bubble'], 'no', ' checked="checked"' ); ?>></td>
				</tr>
				<tr class="form-field form-required term-name-wrap">
					<th scope="row"><label for="bubble_bg_colors">Bubble Colors</label></th>
					<td><input type="color" name="_efm_bubble_bg_colors" id="bubble_bg_colors" value="<?php echo $___cf_efm_options['bubble_bg_colors']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_bg_colors']; ?>" class="efm-color-picker" />
						&nbsp;
						<input type="color" name="_efm_bubble_colors" id="bubble_colors" value="<?php echo $___cf_efm_options['bubble_colors']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_colors']; ?>" class="efm-color-picker" /></td>
				</tr>
				<tr class="form-field term-slug-wrap">
					<th scope="row"><label for="bubble_content">Bubble Content</label></th>
					<td><input name="_efm_bubble_content" id="bubble_content" type="text" value="<?php echo $___cf_efm_options['bubble_content']; ?>" placeholder="<?php echo $___cf_default_efm_options['bubble_content']; ?>" /></td>
				</tr>
				-->
				<tr class="form-field term-description-wrap">
					<th scope="row"><label for="custom_style">Description</label></th>
					<td><textarea name="_efm_custom_style" id="custom_style" rows="5" cols="50" placeholder="<?php echo $___cf_default_efm_options['custom_style']; ?>" class="large-text"><?php echo $___cf_efm_options['custom_style']; ?></textarea>
						<p class="description">The custom style for development.</p></td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Update"  />
			</p>
		</form>
	</div>
</div>
>>>>>>> origin/master
