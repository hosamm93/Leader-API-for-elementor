<?php 
add_action('elementor_pro/forms/new_record', 'leaderElementorForm', 10, 2);

function leaderElementorForm($record, $ajax_handler)
{
    $form_name = $record->get_form_settings('form_name');
    if ('leader' !== $form_name) {
        return;
    }
	
	$raw_fields = $record->get( 'fields' );
    $fields = [];
	foreach ( $raw_fields as $id => $field ) {
        $fields[ $id ] = $field['value'];
    }
	
	$token = get_option('leaderApi_token');
	$client = get_option('leaderApi_client_id');
	if(!empty($fields['leaderID'])){
		$leader = $fields['leaderID'];
	}else{
		$leader = get_option('leaderApi_leader_id');
	}
    $phone = $fields['phone'];
    $name = $fields['name'];
    $email = $fields['email'];
	$datapass = array('client' => $client, 'leader' => $leader,'phone' => $phone,'name' => $name,'email' => $email);
	if(!empty($fields['subservice'])){
		$subservice = $fields['subservice'];
		$datapass['subservice'] = $subservice;
	}
	if(!empty($fields['source'])){
		$utm_source = $fields['source'];
		$utm_medium = $fields['medium'];
		$utm_campaign = $fields['campaign'];
		$utm_content = $fields['content'];
		$datapass['comments'] = 'utm_source: '.$utm_source.', utm_medium: '.$utm_medium.', utm_campaign: '.$utm_campaign.', utm_content: '.$utm_content;
	}

	$body = $datapass;

	$response = wp_remote_post( 'https://app.weallleaders.co.il/index_api/leads', array(
	  'method' => 'POST',
	  'headers' => array('token' => $token),
	  'body' => $body
	  )
	);
	//print_r($body);
}