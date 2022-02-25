<div>
    <?php screen_icon(); ?>
    <h1>חיבור מערכת Leader</h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'leaderApi_options_group' ); ?>
        <h3>חיבור לטופס אלמנטור</h3>
        <p>1. הגדירו את שם הטופס כ leader</p>
		<p>2. וודאו ש ID השדות תחת כרטיסיה 'מתקדם' בטופס הינם: name,email,phone</p>
		<p>3. מלאו את פרטי ההתממשקות שקיבלתם מאיתנו</p>
		<p>* במידה וישנם מספר טפסים עם מזהה לידר שונה, יש להקים בטופס שדה מוסתר אשר תחת הכרטיסיה מתקדם יכיל את הערך של מזהה לידר ולהגדיר לו ID בשם leaderID</p>
        <table>
            <tr valign="top">
                <th scope="row"><label for="leaderApi_token">טוקן</label></th>
				<?php $token = get_option('leaderApi_token'); ?>
                <td><input type="text" id="leaderApi_token" name="leaderApi_token" value="<?php esc_html_e($token); ?>" /></td>
            </tr>
			<tr valign="top">
                <th scope="row"><label for="leaderApi_client_id">מזהה משתמש</label></th>
				<?php $client_id = get_option('leaderApi_client_id'); ?>
                <td><input type="text" id="leaderApi_client_id" name="leaderApi_client_id" value="<?php esc_html_e($client_id); ?>" /></td>
            </tr>
			<tr valign="top">
                <th scope="row"><label for="leaderApi_leader_id">מזהה לידר</label></th>
				<?php $leader_id = get_option('leaderApi_leader_id'); ?>
                <td><input type="text" id="leaderApi_leader_id" name="leaderApi_leader_id" value="<?php esc_html_e($leader_id); ?>" /></td>
            </tr>
        </table>
        <?php  submit_button(); ?>
    </form>
</div>