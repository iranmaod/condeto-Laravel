@extends('users.index')
@section('dashboard')

<div class="main_content">
	
	    

	<div class="container contact_us">
	
		<h2><img src="/apt_apply_assets/images/icons/message_blue.png"> Contact Us</h2>
		
					<div class="errors">
						</div>
		<form action="" id="contact_form" method="post">
		
			<div class="row" style="margin-bottom:10px;padding-top:10px;">					
				<div class="field">
					<label>Subject</label>
					<select name="subject" id="subject">
						<option value="Technical Support">Technical Support</option>
						<option value="General Questions">General Questions</option>
						<option value="Features Suggestion">Features Suggestion</option>
						<option value="Other">Other</option>
					</select>					
				</div>					
			</div>
				
			<div class="row">					
				<div class="field">
					<label>Message</label>
					<textarea style="height:200px;" required="required" name="message_text" id="message_text" placeholder="Enter your message here"></textarea>
				</div>					
			</div>
				
		</form>
		<div class="row button_group">
				<button class="btn" id="submit_new_message">Send Message</button>
			</div>
				
	</div>	

	
	
			<br />
    
@endsection