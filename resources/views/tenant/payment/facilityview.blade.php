@extends('tenant.index')
@section('title')
Payment
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Pay Rent</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	   
    <div class="container payment_container">
         <div class="row">
             <h2><img src="{{asset('img/payment.png')}}" alt="Payment Information">Payment For Facility Booking Information<span class="payment_title_detail">(Awaiting Payment)</span></h2>
             
                         
             <h3 class="amount_required">Total: <span>${{$facility_price}}</span></h3>						
             
             <ul class="card_icons">
                 <li><img src="{{asset('img/amex.png')}}" alt="Amex"></li>
                 <li><img src="{{asset('img/discover.png')}}" alt="Discover"></li>
                 <li><img src="{{asset('img/visa.png')}}" alt="VISA"></li>
                 <li><img src="{{asset('img/mastercard.png')}}" alt="Mastercard"></li>				
             </ul>
             
             <form action="{{route('facility.payment.success',$payment->reference)}}" method="post"
                class="require-validation"
                data-cc-on-file="false"
                id="payment-form"
                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
             @csrf
             <input type="hidden" value="{{$payment->reference}}" name="reference" id="">
             <input type="hidden" value="{{$event_id}}" name="event_id" id="">
                {{-- <h3>Amount to pay:</h3> --}}
                 <div class="row">
                     <div class="field" id="payment_amount_container">
                         {{-- <label for="rent_payment_amount">Enter Amount</label> --}}
                         <input name="rent_payment_amount" type="hidden" value="{{$facility_price}}" id="rent_payment_amount">
                         {{-- <small>Enter the amount in $</small> --}}
                     </div>					
                 </div>
                 
                           
                 <div class="card_payment">
                     <h3>Credit Card:</h3>
                     <div class="row">
                         <div class="field full_width">
                             <label for="billing_card_name_on_card">Name On Card</label>
                             <input class="" name="billing_card_name_on_card" autocomplete="off" type="text" value="" id="billing_card_name_on_card" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your card name">
                             <small></small>
                         </div>					
                     </div>
                     <div class="row">
                         <div class="field full_width">
                             <label for="billing_card_number">Number</label>
                             <input class="card-number" name="billing_card_number" autocomplete="off" value="" type="text" maxlength="16" id="billing_card_number" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your card number">
                             <small>Long Card Number<span><span></span><input type="hidden" name="card_type" id="card_type" value=""></span></small>
                         </div>					
                     </div>				
                     <div class="row">
                         <div class="field exp_month">
                             <label for="billing_card_exp_month">Expiration Date</label>
                             <select class="card-expiry-month required" required="required" name="billing_card_exp_month" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your card expiry month" >
                                                                     <option  value="1">January</option>
                                                                     <option  value="2">February</option>
                                                                     <option  value="3">March</option>
                                                                     <option  value="4">April</option>
                                                                     <option  value="5">May</option>
                                                                     <option  value="6">June</option>
                                                                     <option  value="7">July</option>
                                                                     <option  value="8">August</option>
                                                                     <option  value="9">September</option>
                                                                     <option  value="10">October</option>
                                                                     <option  value="11">November</option>
                                                                     <option  value="12">December</option>
                                                             </select>
                         </div>
                         <div class="field exp_year">
                             <label for="field_billing_card_exp_year">&nbsp;</label>
                             <select class="card-expiry-year required" required="required" name="field_billing_card_exp_year" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your card expiry year" >
                                                                                                     <option  value="2022">2022</option>
                                                                     <option  value="2023">2023</option>
                                                                     <option  value="2024">2024</option>
                                                                     <option  value="2025">2025</option>
                                                                     <option  value="2026">2026</option>
                                                                     <option  value="2027">2027</option>
                                                                     <option  value="2028">2028</option>
                                                                     <option  value="2029">2029</option>
                                                                     <option  value="2030">2030</option>
                                                                     <option  value="2031">2031</option>
                                                                     <option  value="2032">2032</option>
                                                             </select>
                         </div>					
                     </div>
                     <div class="row">
                         <div class="field cvv">
                             <label for="billing_card_cvv">CVV</label>
                             <input class="card-cvc" name="billing_card_cvv" autocomplete="off" type="number" id="billing_card_cvv" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your card security code">
                         </div>
                     </div>
                     
                                         <h3>Auto-Pay</h3>
                     <p>You can choose to pay your rent automatically using the details provided. Simply turn the option on and select the day which you would like your payment to be collected.</p>
                     <div class="row">
                         <div class="field">
                             <div class="field_checkbox_toggle">								
                                 <input type="checkbox" name="auto_renew" id="auto_renew" class="chk_toggle" value="0" />
                             </div>						
                         </div>					
                     </div>
                     <div class="row field_billing_card_autopay_day_row">
                         <div class="field autopay_day ">							
                             <select name="field_billing_card_autopay_day" id="field_billing_card_autopay_day">
                                                                     <option value="1">1st</option>
                                                                     <option value="2">2nd</option>
                                                                     <option value="3">3rd</option>
                                                                     <option value="4">4th</option>
                                                                     <option value="5">5th</option>
                                                                     <option value="6">6th</option>
                                                                     <option value="7">7th</option>
                                                                     <option value="8">8th</option>
                                                                     <option value="9">9th</option>
                                                                     <option value="10">10th</option>
                                                             </select>
                         </div>	
                     </div>
                                     </div>
                 
                                 <div class="ach_payment">
                     
                     
                     <!--<h3>Bank Information:</h3>
                     <div class="row">
                         <div class="field full_width">
                             <label for="bank_draft_account_name">Account Name</label>
                             <input name="bank_draft_account_name" type="text" id="bank_draft_account_name">
                         </div>
                     </div>
                     <div class="row">
                         <div class="field full_width">
                             <label for="bank_draft_ach_number">ACH Number</label>
                             <input name="bank_draft_ach_number" type="text" id="bank_draft_ach_number">
                         </div>
                     </div>
                     <div class="row">
                         <div class="field full_width">
                             <label for="bank_draft_account_number">Account Number</label>
                             <input name="bank_draft_account_number" type="text" id="bank_draft_account_number">
                         </div>
                     </div>-->
 
                     <h3>Auto-Pay</h3>
                     <p>You can choose to pay your rent automatically using the bank account linked. Simply turn the option on and select the day which you would like your payment to be collected.</p>
                     <div class="row">
                         <div class="field">
                             <div class="field_checkbox_toggle">								
                                 <input type="checkbox" name="bank_draft_renew" id="bank_draft_renew" class="chk_toggle" value="0" />
                             </div>
                         </div>
                     </div>
                     <div class="row field_billing_ach_autopay_day_row">
                         <div class="field autopay_day">							
                             <select name="field_billing_ach_autopay_day" id="field_billing_ach_autopay_day">
                                                                     <option value="1">1st</option>
                                                                     <option value="2">2nd</option>
                                                                     <option value="3">3rd</option>
                                                                     <option value="4">4th</option>
                                                                     <option value="5">5th</option>
                                                                     <option value="6">6th</option>
                                                                     <option value="7">7th</option>
                                                                     <option value="8">8th</option>
                                                                     <option value="9">9th</option>
                                                                     <option value="10">10th</option>
                                                             </select>
                         </div>
                     </div>
                 </div>
                     
                                 
                 <div class="billing_information_fields">
                     <h3>Billing Information:</h3>
                     <div class="row">
                         <div class="field">
                             <label for="billing_card_fname">First Name</label>
                             <input name="billing_card_fname" autocomplete="off" type="text" value="" id="billing_card_fname" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your card name">
                             <small></small>
                         </div>
                         <div class="field">
                             <label for="billing_card_lname">Last Name</label>
                             <input name="billing_card_lname" autocomplete="off" type="text" value="" id="billing_card_lname" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your card name">
                             <small></small>						
                         </div>
                     </div>
                     
                     <div class="row">
                         <div class="field full_width">
                             <label for="billing_card_address">Address</label>
                             <input name="billing_card_address" autocomplete="off" type="text" value="" id="billing_card_address" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your address">
                             <small></small>
                         </div>					
                     </div>
                     
                     <div class="row">
                         <div class="field city">
                             <label for="billing_city">City</label>
                             <input name="billing_city" autocomplete="off" type="text" value="" id="billing_city" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your billing city">
                         </div>
                         <div class="field state">
                             <label for="billing_state">State</label>
                             <select name ="state" id ="state" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your billing state">
                                <option value="">Select State</option>
                             </select>
                             
                                 <script>
                                                                         var default_state = '';
                                                                     </script>							
                         </div>
                         <div class="field zip">
                             <label for="billing_zip">Zip</label>
                             <input name="billing_zip" autocomplete="off" maxlength="5" type="text" value="" id="billing_zip" class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your billing Zip">
                         </div>
                     </div>
                     
                     <div class="row">
                         <div class="field full_width">
                             <label for="billing_country">Country</label>
                             <select id="country" name ="country" class="required" required="required"  data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your billing country">
                            </select>
                             <small>Please enter your billing address</small>
                         </div>					
                     </div>
                 </div>
                 
                 <div class="row submit_buttons">
                     <div class="field">
                         <button type="submit" id="submit_payment" class="btn">Submit Payment</button>
                     </div>					
                 </div>
                                 
             </form>
                               
         </div>
     </div>
 
     <section id="pleaseWait">
         <div class="pleaseWaitInner">
             <p>Please wait, loading interface</p>
             <div class="sk-folding-cube">
                 <div class="sk-cube1 sk-cube"></div>
                 <div class="sk-cube2 sk-cube"></div>
                 <div class="sk-cube4 sk-cube"></div>
                 <div class="sk-cube3 sk-cube"></div>
             </div>
         </div>
     </section>
     
     
     
             <br />
    
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/countries.js') }}"></script> 
<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
@endsection