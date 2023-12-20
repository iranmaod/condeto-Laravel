
@extends('tenant.index')
@section('title')
Make an Application
@endsection
@section('dashboard')
@section('header')
<header class="main_header">
    <div class="main_header_container" style="background-image: url({{asset('img/title_header_background.jpg')}})">
                    <h1>Apartments</h1>
                    <p class="sub_title"> {{$building->name}} 
                    </p>
        
        <div style="display:none;" class="main_logo_container"><img src="{{asset('img/condeto_logo.jpg')}}" /></div>

                        
            <a href="/contact" class="header_help_link"><span class="fa fa-question"></span></a>				
    </div>
</header>	

@endsection
<div class="main_content">
	
	        
	<div style="margin:-24px auto !important; margin-left:-84px !important" class="container apply_form">
        <div class="row">
            <div class="apt_apply_nav_and_logo">
				<div class="step_menu_icon"><span class="fa fa-list"></span><p>Collapse</p></div>
                <ul id="apt_apply_steps" class="apt_apply_steps">
                    <li class="active">
                        <span class="fa fa-building"></span><p>Apartments</p>
                    </li>
					
					<li class="loggedInRestricted">
                        <span class="fa fa-certificate"></span><p>Lease Term</p>
                    </li>
					
                                            <li class="loggedInRestricted">
                            <span class="fa fa-pencil-alt"></span><p>Rental Terms</p>
                        </li>
                    
                    <li class="loggedInRestricted"><span class="fa fa-user"></span><p>Personal</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-home"></span><p>Address</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-info"></span><p>Additional</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-hashtag"></span><p>Financial</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-file"></span><p>Documents</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-credit-card"></span><p>Payment</p></li>
                    <li class="loggedInRestricted"><span class="fa fa-check-circle"></span><p>Complete</p></li>
                </ul>

                
                            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-md-8 col-md-offset-2">

                
                    <input name="_token" type="hidden" value="uf4JRrTfyMxBPuTp08a9bqgLFD10ZUcENMiN5JDQ">

                    <div class="apt_form" id="apt_form">
                        
                        <div data-menu-trigger="0" class="property_list_section apt_section active" data-header_title="What's Available?" data-header_text="Please select from the available apartment homes listed.">
                            <h2><img src="{{asset('img/cube.png')}}" alt="Available Apartments"/>Available Apartments
                                
                                <a style="margin-left: 500px" class="reload" title="Reload Apartments" href="{{route('apply.apartment')}}"><img src="{{asset('img/reload.png')}}"></a>
                            </h2>


                            


                            <form  action="{{route('apartment.search')}}" method="POST">
                                @csrf
                                <div class="property_search">
                                    <input style="display:none;" type="text" name="property_search_field" id="property_search_field" placeholder="Enter address or state to search">
                                    <input type="text" name="search" id="search" placeholder="Enter address or state to search">
                                    <input style="display: none" type="submit" value="submit">
                                </div>
                            </form>
        
                            <div class="property_container">
                                @foreach ($all_apartments as $item)

                                <div class="property_row"><div class="property_sel"><input type="radio" name="property_sel" value="1604736" class="property_selector" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select a property" id="form-validation-field-64"></div><div class="property_name"><p><span class="price">$0.00 /mo </span>{{$item->name}}, 
                                    
                                   {{$item->address}} , RIDGEWOOD, NY, 11385</p></div><p></p><div class="property_links"><span class="apply_button">Apply</span><a href="http://www.scoutbk.com//index.cfm?page=details&amp;id=4360" target="_blank"><i class="fa fa-search"></i></a></div></div>

                                @endforeach
                            </div>
                        </div>
						


						<div data-menu-trigger="1" class="lease_section apt_section" data-header_title="What's Available?" data-header_text="Please select from the available apartment homes listed.">
                            <h2><img src="/apt_apply_assets/images/icons/cube.png" alt="Length of Lease Duration"/>Length of Lease Duration</h2>
							<div class="apt_field_block">
								<label for="lease_term"></label>
								<select class="required validate[required]" required="required" name="lease_term" id="lease_term" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the lease length">
									<option value="12">12 Months</option>
									<option value="24">24 Months</option>
									<option value="36">36 Months</option>
								</select>
								
								<p class="rent_cost">Rent: <span>$55555</span></p>
							</div>
                           
                        </div>
						
						
                                                    

                            <div data-menu-trigger="2"
                                                                      class="terms_and_conditions apt_section"
                                                                  data-bypass_saving="true" data-header_title="Terms & Conditions" data-header_text="Fields a red border are required. Thank you for applying. The mobile process is secure and all submissions are encrypted for your protection.">

                                <h2><img src="/apt_apply_assets/images/icons/signed_paper.png" alt="Rental Terms" />Rental Terms &amp; Conditions</h2>
                                <p class="sub_header_intro">Fields with a red border are required</p>
                                <p>Thank you for applying. The online process is secure and all submissions are encrypted for your protection. Please enter all requested information and click Continue.</p>
                                <p>
                                    <strong>Current property you are applying for :
                                        <span class="tandc_address">
                                                                                            , , , 
                                                                                    </span>
                                    </strong>
                                </p>

                                <div class="apt_apply_tandc_container" style="clear:both;width:100%;">
                                    <div id="criteria" class="criteria loaded">
                                        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

                                        <meta content="Mon, 06 Jan 1990 00:00:01 GMT" http-equiv="Expires">
                                        <style type="text/css">
                                            h1 {
                                                text-align: center;
                                            }
                                            p {
                                                margin-top: 15px;
                                            }
                                        </style>

                                        <div style="font-family: Arial, sans-serif;font-size: 10pt;">
                                            <h1 class="editable" style="font-size: 14pt; margin-top: 6pt;">
                                                RENTAL TERMS AND CONDITIONS
                                            </h1>
                                            <h3 class="editable" style="font-size: 10pt;">
                                                NON-DISCRIMINATION
                                            </h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                <span style="font-weight: bold; text-decoration: underline;" id="tandc_address" class="tandc_address">
                                                                                                            , , , 
                                                                                                    </span>
                                                ("Management") operates in accordance with the Federal Fair Housing Act,
                                                as well as all state and local fair housing and civil rights laws.
                                                We do not discriminate against any person based on race, color, religion, gender, national origin, age,
                                                sex, familial status, handicap, disability, veteran status, or any other basis protected by applicable
                                                state or local laws. The Rental Criteria below outlines some of the policies for this community
                                                with regard to standards that may be required by each applicant in order to be approved for residency.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">APPLICATIONS</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                All applicants must be of legal age. All parties 18 years of age or older are required to
                                                complete an application and pay any and all applicable fees.
                                                <span style="font-weight: bold; text-decoration: underline;">Applications are to be completed in
                                                    full; applications containing untrue, incorrect, or misleading information will be denied.
                                                </span> The application fee is non-refundable unless otherwise provided by state or local law.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">IDENTITY VERIFICATION</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                ALL applicants are REQUIRED to show at least one of any of the following forms of identification:
                                            </p>

                                            <table style="font-size: 10pt;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Government issued identification such as military identification, driver's license or passport
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Age of majority card
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Birth certificate
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Social security card
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <h3 class="editable" style="font-size: 10pt;">RENTAL SCORE</h3>


                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 6pt;">
                                                All applications are submitted to On-Site.com, a third-party rental applicant screening company.
                                                <span style="font-weight: bold; text-decoration: underline;">All applications are evaluated based on a rental scoring system.</span>
                                                Rental scoring is based on real data and

                                                statistical


                                                data such as payment history, quantity and type of accounts, outstanding debt, and age of accounts.
                                                Every applicant is treated objectively because each application is scored statistically in exactly the same manner.
                                            </p>


                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 6pt;">
                                                The rental scoring system will compare your application to On-Site's database, and by evaluating those statistics and real data in accordance with pre-established criteria set by Management, On-Site will recommend one of the following:
                                            </p>

                                            <table style="font-size: 10pt;" width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            <span style="font-weight: bold">Accepted.</span> The applicant will be accepted with the standard deposits and fees.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            <span style="font-weight: bold">Accepted with Conditions.</span> Depending on the community's policy, the applicant may be given the option to pay an additional security deposit.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 2pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            <span style="font-weight: bold">Denied.</span> The application will not be accepted. The applicant will be provided with contact information for the consumer reporting agencies that provided the consumer information.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <h3 class="editable" style="font-size: 10pt;">GUARANTORS/CO-SIGNERS</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                If On-Site recommends "Accepted with Conditions" or "Denial," a guarantor or co-signer may be considered. In this instance, the original applicant's application will be re-submitted along with the guarantor or co-signer's application. Applications for guarantors and co-signers processed through On-Site are also scored, but are typically held to a more stringent, pre-established screening standard because guarantors and co-signers are technically responsible for the payments for this residence, as well as their own place of residence.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">INCOME VERIFICATION</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                Written verification of income in an amount equal to <span style="font-weight: bold; text-decoration: underline;">2.5</span> times the monthly rent per household will be required, along with any necessary supporting documents.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">RESIDENCE VERIFICATION</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                Management reserves the right to verify the applicant's residence history.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">CRIMINAL CHARGES/CONVICTIONS</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                Applicants charged convicted for certain felony and misdemeanor offenses may not be approved for residency, depending upon the pre-established criteria set by Management.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">EVICTIONS</h3>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                Applicants who have been a party to an eviction proceeding may not be approved for residency, depending upon the pre-established criteria set by Management.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">DENIAL POLICY</h3>


                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                If your application is denied due to unfavorable information received on your screening report you may:
                                            </p><table style="font-size: 10pt;" width="100%" cellspacing="0" cellpadding="0">

                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 6pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Contact On-Site to discuss your application and identify any unfavorable information.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 6pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Supply On-Site with proof of any incorrect or incomplete information.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" style="font-size: 10pt;text-align: justify; height: 6pt;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="listbullet" style="font-size: 10pt;" valign="top">
                                                            <b>•</b>
                                                        </td>
                                                        <td class="editable" style="font-size: 10pt;text-align: justify;">
                                                            Request that On-Site re-evaluate and re-report your screening information and rental score to Management.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p></p>

                                            <h3 class="editable" style="font-size: 10pt;">HOW YOU CAN IMPROVE YOUR RENTAL SCORE</h3>


                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                Your rental score results from information found in your credit report, criminal history, references, and application data. Such information may include your history of paying bills and rent, the accounts you have, collections and delinquencies, income and debt.
                                            </p>

                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 2pt;">
                                                Your rental score may change if the underlying information it is based upon changes. To improve your score, concentrate on paying your bills on time, paying down outstanding balances, and removing incorrect information. Your chances of approval may also improve if you apply for an apartment with lower monthly rent, or use a guarantor or co-signer if permitted by Management.
                                            </p>

                                            <h3 class="editable" style="font-size: 10pt;">HOW YOU CAN REMOVE INCORRECT INFORMATION</h3>


                                            <p class="editable" style="font-size: 10pt;text-align: justify; margin-top: 0pt;">
                                                On-Site is committed to accuracy and will investigate any information you dispute. Contact our Renter Relations team at (877) 222-0384. If you provide proof of your claim, we will promptly make appropriate adjustments. Download the form on our site for details.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="check_tandc">
                                    <input type="checkbox" name="terms_agreed"  id="terms_agreed" value="1" data-validation-engine="validate[required]" data-errormessage-value-missing="Please accept our terms and conditions"> I agree to these policies, and wish to apply for the residential unit.
                                </div>

                                <div class="apt_field how_hear_block">
                                    <div class="apt_field_label">
                                        <label for="how_hear_about_us">How did you hear about us?:</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <select name="how_hear_about_us" id="how_hear_about_us_select">

                                                                                            <option selected="selected" value="1">Online Search</option>
                                                <option  value="2">Broker Website</option>
                                                <option  value="3">YourNeighborhood.co</option>
                                                <option  value="4">Word of Mouth</option>
                                            
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="apt_section personal_information" data-menu-trigger="3" id="personal_information" data-header_title="Personal Information" data-header_text="Fields with a red border are required. Thank you again for applying, please look over the information below and verify it for correctness prior to submitting your application.">

                                <h2><img src="/apt_apply_assets/images/icons/user-blue.png" alt="Personal Information">Personal Information</h2>

                                <div style="display:none" class="apt_field" id="application_type_field">
                                    <div class="apt_field_label">
                                        <label for="applicant_type">Please select your application type</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_guarantoring_for">
                                            <label style="display:none">Applicant Type</label>
                                            <select name="applicant_type" id="applicant_type_select" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the application type">

                                                                                                <option selected="selected" value="1">Individual</option>
                                                <option  value="3">Guarantor</option></select>
                                            
                                        </div>

                                    </div>

                                </div>

                                <div class="apt_field" id="guarantor_for" >

                                    <div class="apt_field_block field_guarantoring_for">
                                        <label for="guarantoring_for">Guarantor For</label>
                                        <input name="guarantoring_for" value="" type="text" id="guarantoring_for" class="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please Enter the person guarantoring for">
                                        <small>Who are you Guarantoring for</small>
                                    </div>

                                </div>

                                <div class="apt_field apt_field_first_name">
                                    <div class="apt_field_label">
                                        <label>Personal Information</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_title field_width_70">
                                            <label for="suffix">Title</label>
                                            <select class="required" required="required" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select a title"  id="suffix" name="suffix">
                                                                                                    <option selected="selected" value="1">Mr</option>
                                                    <option  value="2">Mrs</option>
                                                                                            </select>
                                        </div>

                                        <div class="apt_field_block field_first_name">
                                            <label for="first_name">First Name</label>
                                            <input class="required" value="Kim" required="required" name="first_name" type="text" id="first_name" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your first name">
                                        </div>

                                        <div class="apt_field_block field_middle_initial field_width_50">
                                            <label for="middle_initial">Initial</label>
                                            <input name="middle_initial" type="text" value="" id="middle_initial" >
                                        </div>

                                        <div class="apt_field_block field_last_name">
                                            <label for="last_name">Last Name</label>
                                            <input class="required validate[required]" value="Sachs" required="required" name="last_name" type="text" id="last_name" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your last name">
                                        </div>

                                    </div>

                                </div>

                                <div class="apt_field">


                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_phone">
                                            <label for="phone">Phone Number</label>
                                            <input class="required" required="required" value="234" name="phone" type="tel" id="phone" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your phone">
                                        </div>

                                    </div>

                                    <div class="apt_field_block field_phone_type">
                                        <label for="phone_type">Type</label>
                                        <select class="required validate[required]" required="required" name="phone_type" id="phone_type" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select an id type">
                                                                                            <option selected="selected" value="Home">Home</option>
                                                <option  value="Work">Work</option>
                                                <option  value="Mobile">Mobile</option>
                                                                                    </select>
                                    </div>

                                </div>


                                <div class="apt_field">
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_alternate_phone">
                                            <label for="alternative_phone">Alternate Phone</label>
                                            <input value="234" name="alternative_phone" type="tel" id="alternative_phone" />
                                        </div>

                                    </div>

                                    <div class="apt_field_block field_alternative_phone_type">
                                        <label for="alternative_phone_type">Type</label>
                                        <select name="alternative_phone_type" id="alternative_phone_type">
                                                                                            <option selected="selected" value="Home">Home</option>
                                                <option  value="Work">Work</option>
                                                <option  value="Mobile">Mobile</option>
                                                                                    </select>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_email_address field_width_445">
                                            <label for="email_address">Email Address</label>
                                            <input class="required" type="email" name="email_address" value="mikeypengelly@gmail.com" id="email_address" data-validation-engine="validate[required,custom[email]]" data-errormessage-value-missing="Email is required!" >
                                            <small>Please enter a valid email address, example@example.com</small>
                                        </div>

                                    </div>

                                    <div class="apt_field_fieldx" style="clear:both;padding-top:12px;">

                                        <div class="apt_field_block field_width_100" >
                                            <label for="date_of_birth">Date Of Birth</label>
                                            <select class="required" required="required" name="date_of_birth_month" id="date_of_birth_month" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your date of birth month">
                                                <option value="">Month</option>
                                                                                                                                                            <option  value="01">January</option>
                                                                                                                                                                                                                <option selected="selected" value="02">February</option>
                                                                                                                                                                                                                <option  value="03">March</option>
                                                                                                                                                                                                                <option  value="04">April</option>
                                                                                                                                                                                                                <option  value="05">May</option>
                                                                                                                                                                                                                <option  value="06">June</option>
                                                                                                                                                                                                                <option  value="07">July</option>
                                                                                                                                                                                                                <option  value="08">August</option>
                                                                                                                                                                                                                <option  value="09">September</option>
                                                                                                                                                                                                                <option  value="10">October</option>
                                                                                                                                                                                                                <option  value="11">November</option>
                                                                                                                                                                                                                <option  value="12">December</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="date_of_birth">&nbsp;</label>
                                            <select class="required" required="required" name="date_of_birth_day" id="date_of_birth_day" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your date of birth Day">
                                                <option value="">Day</option>
                                                                                                                                                            <option  value="01">1</option>
                                                                                                                                                                                                                <option  value="02">2</option>
                                                                                                                                                                                                                <option selected="selected" value="03">3</option>
                                                                                                                                                                                                                <option  value="04">4</option>
                                                                                                                                                                                                                <option  value="05">5</option>
                                                                                                                                                                                                                <option  value="06">6</option>
                                                                                                                                                                                                                <option  value="07">7</option>
                                                                                                                                                                                                                <option  value="08">8</option>
                                                                                                                                                                                                                <option  value="09">9</option>
                                                                                                                                                                                                                <option  value="10">10</option>
                                                                                                                                                                                                                <option  value="11">11</option>
                                                                                                                                                                                                                <option  value="12">12</option>
                                                                                                                                                                                                                <option  value="13">13</option>
                                                                                                                                                                                                                <option  value="14">14</option>
                                                                                                                                                                                                                <option  value="15">15</option>
                                                                                                                                                                                                                <option  value="16">16</option>
                                                                                                                                                                                                                <option  value="17">17</option>
                                                                                                                                                                                                                <option  value="18">18</option>
                                                                                                                                                                                                                <option  value="19">19</option>
                                                                                                                                                                                                                <option  value="20">20</option>
                                                                                                                                                                                                                <option  value="21">21</option>
                                                                                                                                                                                                                <option  value="22">22</option>
                                                                                                                                                                                                                <option  value="23">23</option>
                                                                                                                                                                                                                <option  value="24">24</option>
                                                                                                                                                                                                                <option  value="25">25</option>
                                                                                                                                                                                                                <option  value="26">26</option>
                                                                                                                                                                                                                <option  value="27">27</option>
                                                                                                                                                                                                                <option  value="28">28</option>
                                                                                                                                                                                                                <option  value="29">29</option>
                                                                                                                                                                                                                <option  value="30">30</option>
                                                                                                                                                                                                                <option  value="31">31</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="date_of_birth">&nbsp;</label>
                                            <select class="required" required="required" id="date_of_birth_year" name="date_of_birth_year" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your date of birth year" >
                                                <option value="">Year</option>
                                                                                                                                                                                                            <option  value="2022">2022</option>
                                                                                                                                                                                                                <option  value="2021">2021</option>
                                                                                                                                                                                                                <option  value="2020">2020</option>
                                                                                                                                                                                                                <option  value="2019">2019</option>
                                                                                                                                                                                                                <option  value="2018">2018</option>
                                                                                                                                                                                                                <option  value="2017">2017</option>
                                                                                                                                                                                                                <option  value="2016">2016</option>
                                                                                                                                                                                                                <option  value="2015">2015</option>
                                                                                                                                                                                                                <option  value="2014">2014</option>
                                                                                                                                                                                                                <option  value="2013">2013</option>
                                                                                                                                                                                                                <option  value="2012">2012</option>
                                                                                                                                                                                                                <option  value="2011">2011</option>
                                                                                                                                                                                                                <option  value="2010">2010</option>
                                                                                                                                                                                                                <option  value="2009">2009</option>
                                                                                                                                                                                                                <option  value="2008">2008</option>
                                                                                                                                                                                                                <option  value="2007">2007</option>
                                                                                                                                                                                                                <option  value="2006">2006</option>
                                                                                                                                                                                                                <option  value="2005">2005</option>
                                                                                                                                                                                                                <option  value="2004">2004</option>
                                                                                                                                                                                                                <option selected="selected" value="2003">2003</option>
                                                                                                                                                                                                                <option  value="2002">2002</option>
                                                                                                                                                                                                                <option  value="2001">2001</option>
                                                                                                                                                                                                                <option  value="2000">2000</option>
                                                                                                                                                                                                                <option  value="1999">1999</option>
                                                                                                                                                                                                                <option  value="1998">1998</option>
                                                                                                                                                                                                                <option  value="1997">1997</option>
                                                                                                                                                                                                                <option  value="1996">1996</option>
                                                                                                                                                                                                                <option  value="1995">1995</option>
                                                                                                                                                                                                                <option  value="1994">1994</option>
                                                                                                                                                                                                                <option  value="1993">1993</option>
                                                                                                                                                                                                                <option  value="1992">1992</option>
                                                                                                                                                                                                                <option  value="1991">1991</option>
                                                                                                                                                                                                                <option  value="1990">1990</option>
                                                                                                                                                                                                                <option  value="1989">1989</option>
                                                                                                                                                                                                                <option  value="1988">1988</option>
                                                                                                                                                                                                                <option  value="1987">1987</option>
                                                                                                                                                                                                                <option  value="1986">1986</option>
                                                                                                                                                                                                                <option  value="1985">1985</option>
                                                                                                                                                                                                                <option  value="1984">1984</option>
                                                                                                                                                                                                                <option  value="1983">1983</option>
                                                                                                                                                                                                                <option  value="1982">1982</option>
                                                                                                                                                                                                                <option  value="1981">1981</option>
                                                                                                                                                                                                                <option  value="1980">1980</option>
                                                                                                                                                                                                                <option  value="1979">1979</option>
                                                                                                                                                                                                                <option  value="1978">1978</option>
                                                                                                                                                                                                                <option  value="1977">1977</option>
                                                                                                                                                                                                                <option  value="1976">1976</option>
                                                                                                                                                                                                                <option  value="1975">1975</option>
                                                                                                                                                                                                                <option  value="1974">1974</option>
                                                                                                                                                                                                                <option  value="1973">1973</option>
                                                                                                                                                                                                                <option  value="1972">1972</option>
                                                                                                                                                                                                                <option  value="1971">1971</option>
                                                                                                                                                                                                                <option  value="1970">1970</option>
                                                                                                                                                                                                                <option  value="1969">1969</option>
                                                                                                                                                                                                                <option  value="1968">1968</option>
                                                                                                                                                                                                                <option  value="1967">1967</option>
                                                                                                                                                                                                                <option  value="1966">1966</option>
                                                                                                                                                                                                                <option  value="1965">1965</option>
                                                                                                                                                                                                                <option  value="1964">1964</option>
                                                                                                                                                                                                                <option  value="1963">1963</option>
                                                                                                                                                                                                                <option  value="1962">1962</option>
                                                                                                                                                                                                                <option  value="1961">1961</option>
                                                                                                                                                                                                                <option  value="1960">1960</option>
                                                                                                                                                                                                                <option  value="1959">1959</option>
                                                                                                                                                                                                                <option  value="1958">1958</option>
                                                                                                                                                                                                                <option  value="1957">1957</option>
                                                                                                                                                                                                                <option  value="1956">1956</option>
                                                                                                                                                                                                                <option  value="1955">1955</option>
                                                                                                                                                                                                                <option  value="1954">1954</option>
                                                                                                                                                                                                                <option  value="1953">1953</option>
                                                                                                                                                                                                                <option  value="1952">1952</option>
                                                                                                                                                                                                                <option  value="1951">1951</option>
                                                                                                                                                                                                                <option  value="1950">1950</option>
                                                                                                                                                                                                                <option  value="1949">1949</option>
                                                                                                                                                                                                                <option  value="1948">1948</option>
                                                                                                                                                                                                                <option  value="1947">1947</option>
                                                                                                                                                                                                                <option  value="1946">1946</option>
                                                                                                                                                                                                                <option  value="1945">1945</option>
                                                                                                                                                                                                                <option  value="1944">1944</option>
                                                                                                                                                                                                                <option  value="1943">1943</option>
                                                                                                                                                                                                                <option  value="1942">1942</option>
                                                                                                                                                                                                                <option  value="1941">1941</option>
                                                                                                                                                                                                                <option  value="1940">1940</option>
                                                                                                                                                                                                                <option  value="1939">1939</option>
                                                                                                                                                                                                                <option  value="1938">1938</option>
                                                                                                                                                                                                                <option  value="1937">1937</option>
                                                                                                                                                                                                                <option  value="1936">1936</option>
                                                                                                                                                                                                                <option  value="1935">1935</option>
                                                                                                                                                                                                                <option  value="1934">1934</option>
                                                                                                                                                                                                                <option  value="1933">1933</option>
                                                                                                                                                                                                                <option  value="1932">1932</option>
                                                                                                                                                                                                                <option  value="1931">1931</option>
                                                                                                                                                                                                                <option  value="1930">1930</option>
                                                                                                                                                                                                                <option  value="1929">1929</option>
                                                                                                                                                                                                                <option  value="1928">1928</option>
                                                                                                                                                                                                                <option  value="1927">1927</option>
                                                                                                                                                                                                                <option  value="1926">1926</option>
                                                                                                                                                                                                                <option  value="1925">1925</option>
                                                                                                                                                                                                                <option  value="1924">1924</option>
                                                                                                                                                                                                                <option  value="1923">1923</option>
                                                                                                                                                                                                                <option  value="1922">1922</option>
                                                                                                                                                </select>
                                            <input class="required" required="required" value="2003-02-03" name="date_of_birth" type="hidden" id="date_of_birth" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your date of birth" >
                                        </div>


                                    </div>

                                </div>

                                <div class="apt_field">

                                    <div class="apt_field_label">
                                        <label>Do you have any pets?</label>
                                    </div>
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_form_of_id">
                                            <select name="has_pets" id="has_pets">
                                                                                                    <option selected="selected" value="0">No</option>
                                                    <option  value="1">Yes</option>
                                                                                            </select>
                                        </div>

                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="apt_field_fieldx pet_list" style="margin-top:15px;display:none">

                                        <div class="apt_field_block"
                                             <label for="what_pets">What pets do you have?</label>
                                            <select name="what_pets[]" id="what_pets" multiple>
                                                                                                    <option  value="Dog">Dog</option>
                                                                                                    <option  value="Cat">Cat</option>
                                                                                                    <option  value="Bird">Bird</option>
                                                                                                    <option  value="Rabbit">Rabbit</option>
                                                                                                    <option  value="Rat">Rat</option>
                                                                                                    <option  value="Mice">Mice</option>
                                                                                                    <option  value="Hamster">Hamster</option>
                                                                                            </select>

                                        </div>

                                    </div>
									
									<div class="pet_information" data-max_pets="2">
										<div class="pet_information_row">
											<div class="apt_field">
												<div class="apt_field_fieldx">

													<div class="apt_field_block">
														<label for="pet_type">Pet Type</label>
														<input value="" name="pet_type" type="text" id="pet_type" >
													</div>

													<div class="apt_field_block">
														<label for="pet_weight">Weight(lbs)</label>
														<input value="" name="pet_weight" type="text" id="pet_weight" >
													</div>

													<div class="apt_field_block">
														<label for="pet_age">Age</label>
														<input value="" name="pet_age" type="text" id="pet_age" >
													</div>

													<div class="apt_field_block">
														<label for="pet_color">Color</label>
														<input value="" name="pet_color" type="text" id="pet_color" >
													</div>

													<div class="apt_field_block">
														<label for="pet_breed">Breed</label>
														<input value="" name="pet_breed" type="text" id="pet_breed" >
													</div>

													<div class="apt_field_block">
														<label for="pet_name">Name</label>
														<input value="" name="pet_name" type="text" id="pet_name" >
													</div>

													<div class="apt_field_block">
														<label for="pet_gender">Gender</label>
														<input value="" name="pet_gender" type="text" id="pet_gender" >
													</div>

													<div class="apt_field_block">
														<label for="pet_spayed">Spayed/Neutered</label>
														<select name="pet_spayed" id="pet_spayed">
															<option value="1">Yes</option>
															<option value="0">No</option>
														</select>														
													</div>

												</div>

											</div>											
										</div>
										<p class="add_another">
											<a href="#" title="Add Another Pet">Add Another (Max 2 allowed)</a>
										</p>
										
									</div>

                                </div>


                                <div class="apt_field">

                                    <div class="apt_field_label">
                                        <label>Please provide your Social Security Number</label>
                                    </div>
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_form_of_id" style="display:none;">
                                            <label for="form_of_id">I.D. Type</label>
                                            <select class="required validate[required]" required="required" name="form_of_id" id="form_of_id" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select an id type">
                                                                                                    <option selected="selected" value="1">Social Security Number</option>
                                                
                                                                                            </select>
                                        </div>

                                        <div class="apt_field_block field_issuing_state field_width_160" id="field_issuing_state">
                                            <label for="issuing_state">Issuing State</label>
                                            <select class="required" required="required"  name="issuing_state" id="issuing_state" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your issuing state">
                                                                                                <option selected="selected" value="NY">NY</option>
                                                <option  value="AL">AL</option></select>
                                            
                                        </div>

                                        <div class="apt_field_block field_id_number">
                                            <label for="id_number">ID Number</label>
                                            <input autocomplete="off" class="required validate[required]" value="" required="required" name="id_number" type="password" id="id_number" data-validation-engine="validate[required,custom[integer],minSize[9],maxSize[9]]" data-errormessage-value-missing="Please enter the ID number">
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="apt_section" data-menu-trigger="4">
                                <h2><img src="/apt_apply_assets/images/icons/user-blue.png" alt="Personal Information">Current Address</h2>
                                <p class="sub_header_intro">Fields with a red border are required</p>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_country field_width_445">
                                            <label for="country">Country</label>
                                            <select class="required" required="required" id="country" name="country" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your country">
                                                                                                    <option selected="selected" value="United States">United States</option>
                                                                                                                                                                                                            <option selected="selected" value="United States">United States</option>
                                                    
                                                                                                                                                            <option  value="Canada">Canada</option>
                                                    
                                                                                                                                                            <option  value="Afghanistan">Afghanistan</option>
                                                    
                                                                                                                                                            <option  value="Albania">Albania</option>
                                                    
                                                                                                                                                            <option  value="Algeria">Algeria</option>
                                                    
                                                                                                                                                            <option  value="Andorra">Andorra</option>
                                                    
                                                                                                                                                            <option  value="Angola">Angola</option>
                                                    
                                                                                                                                                            <option  value="Argentina">Argentina</option>
                                                    
                                                                                                                                                            <option  value="Armenia">Armenia</option>
                                                    
                                                                                                                                                            <option  value="Australia">Australia</option>
                                                    
                                                                                                                                                            <option  value="Austria">Austria</option>
                                                    
                                                                                                                                                            <option  value="Azerbaijan">Azerbaijan</option>
                                                    
                                                                                                                                                            <option  value="Bahrain">Bahrain</option>
                                                    
                                                                                                                                                            <option  value="Bangladesh">Bangladesh</option>
                                                    
                                                                                                                                                            <option  value="Belarus">Belarus</option>
                                                    
                                                                                                                                                            <option  value="Belgium">Belgium</option>
                                                    
                                                                                                                                                            <option  value="Belize">Belize</option>
                                                    
                                                                                                                                                            <option  value="Benin">Benin</option>
                                                    
                                                                                                                                                            <option  value="Bhutan">Bhutan</option>
                                                    
                                                                                                                                                            <option  value="Bolivia">Bolivia</option>
                                                    
                                                                                                                                                            <option  value="Botswana">Botswana</option>
                                                    
                                                                                                                                                            <option  value="Brazil">Brazil</option>
                                                    
                                                                                                                                                            <option  value="Brunei">Brunei</option>
                                                    
                                                                                                                                                            <option  value="Bulgaria">Bulgaria</option>
                                                    
                                                                                                                                                            <option  value="Burkina Faso">Burkina Faso</option>
                                                    
                                                                                                                                                            <option  value="Burundi">Burundi</option>
                                                    
                                                                                                                                                            <option  value="Cambodia">Cambodia</option>
                                                    
                                                                                                                                                            <option  value="Cameroon">Cameroon</option>
                                                    
                                                                                                                                                            <option  value="Cape Verde Is.">Cape Verde Is.</option>
                                                    
                                                                                                                                                            <option  value="Central African Republic">Central African Republic</option>
                                                    
                                                                                                                                                            <option  value="Chad">Chad</option>
                                                    
                                                                                                                                                            <option  value="Chile">Chile</option>
                                                    
                                                                                                                                                            <option  value="China">China</option>
                                                    
                                                                                                                                                            <option  value="Colombia">Colombia</option>
                                                    
                                                                                                                                                            <option  value="Comoros">Comoros</option>
                                                    
                                                                                                                                                            <option  value="Costa Rica">Costa Rica</option>
                                                    
                                                                                                                                                            <option  value="Cuba">Cuba</option>
                                                    
                                                                                                                                                            <option  value="Cyprus">Cyprus</option>
                                                    
                                                                                                                                                            <option  value="Czech Republic">Czech Republic</option>
                                                    
                                                                                                                                                            <option  value="Denmark">Denmark</option>
                                                    
                                                                                                                                                            <option  value="Djibouti">Djibouti</option>
                                                    
                                                                                                                                                            <option  value="Ecuador">Ecuador</option>
                                                    
                                                                                                                                                            <option  value="Egypt">Egypt</option>
                                                    
                                                                                                                                                            <option  value="El Salvador">El Salvador</option>
                                                    
                                                                                                                                                            <option  value="Equatorial Guinea">Equatorial Guinea</option>
                                                    
                                                                                                                                                            <option  value="Eritrea">Eritrea</option>
                                                    
                                                                                                                                                            <option  value="Estonia">Estonia</option>
                                                    
                                                                                                                                                            <option  value="Ethiopia">Ethiopia</option>
                                                    
                                                                                                                                                            <option  value="Fiji">Fiji</option>
                                                    
                                                                                                                                                            <option  value="Finland">Finland</option>
                                                    
                                                                                                                                                            <option  value="France">France</option>
                                                    
                                                                                                                                                            <option  value="French Guiana">French Guiana</option>
                                                    
                                                                                                                                                            <option  value="Gabon">Gabon</option>
                                                    
                                                                                                                                                            <option  value="Gambia">Gambia</option>
                                                    
                                                                                                                                                            <option  value="Georgia">Georgia</option>
                                                    
                                                                                                                                                            <option  value="Germany">Germany</option>
                                                    
                                                                                                                                                            <option  value="Ghana">Ghana</option>
                                                    
                                                                                                                                                            <option  value="Gibraltar">Gibraltar</option>
                                                    
                                                                                                                                                            <option  value="Greece">Greece</option>
                                                    
                                                                                                                                                            <option  value="Greenland">Greenland</option>
                                                    
                                                                                                                                                            <option  value="Guatemala">Guatemala</option>
                                                    
                                                                                                                                                            <option  value="Guinea">Guinea</option>
                                                    
                                                                                                                                                            <option  value="Guinea Bissau">Guinea Bissau</option>
                                                    
                                                                                                                                                            <option  value="Guyana">Guyana</option>
                                                    
                                                                                                                                                            <option  value="Honduras">Honduras</option>
                                                    
                                                                                                                                                            <option  value="Hong Kong and Macau">Hong Kong and Macau</option>
                                                    
                                                                                                                                                            <option  value="Hungary">Hungary</option>
                                                    
                                                                                                                                                            <option  value="Iceland">Iceland</option>
                                                    
                                                                                                                                                            <option  value="India">India</option>
                                                    
                                                                                                                                                            <option  value="Iran">Iran</option>
                                                    
                                                                                                                                                            <option  value="Iraq">Iraq</option>
                                                    
                                                                                                                                                            <option  value="Ireland">Ireland</option>
                                                    
                                                                                                                                                            <option  value="Israel">Israel</option>
                                                    
                                                                                                                                                            <option  value="Italy">Italy</option>
                                                    
                                                                                                                                                            <option  value="Ivory Coast">Ivory Coast</option>
                                                    
                                                                                                                                                            <option  value="Japan">Japan</option>
                                                    
                                                                                                                                                            <option  value="Jordan">Jordan</option>
                                                    
                                                                                                                                                            <option  value="Kenya">Kenya</option>
                                                    
                                                                                                                                                            <option  value="Kosovo">Kosovo</option>
                                                    
                                                                                                                                                            <option  value="Kuwait">Kuwait</option>
                                                    
                                                                                                                                                            <option  value="Kyrgyzstan">Kyrgyzstan</option>
                                                    
                                                                                                                                                            <option  value="Laos">Laos</option>
                                                    
                                                                                                                                                            <option  value="Latvia">Latvia</option>
                                                    
                                                                                                                                                            <option  value="Lebanon">Lebanon</option>
                                                    
                                                                                                                                                            <option  value="Lesotho">Lesotho</option>
                                                    
                                                                                                                                                            <option  value="Liberia">Liberia</option>
                                                    
                                                                                                                                                            <option  value="Libya">Libya</option>
                                                    
                                                                                                                                                            <option  value="Liechtenstein">Liechtenstein</option>
                                                    
                                                                                                                                                            <option  value="Lithuania">Lithuania</option>
                                                    
                                                                                                                                                            <option  value="Luxembourg">Luxembourg</option>
                                                    
                                                                                                                                                            <option  value="Madagascar">Madagascar</option>
                                                    
                                                                                                                                                            <option  value="Malawi">Malawi</option>
                                                    
                                                                                                                                                            <option  value="Malaysia">Malaysia</option>
                                                    
                                                                                                                                                            <option  value="Maldives">Maldives</option>
                                                    
                                                                                                                                                            <option  value="Mali">Mali</option>
                                                    
                                                                                                                                                            <option  value="Malta">Malta</option>
                                                    
                                                                                                                                                            <option  value="Mauritania">Mauritania</option>
                                                    
                                                                                                                                                            <option  value="Mauritius">Mauritius</option>
                                                    
                                                                                                                                                            <option  value="Mexico">Mexico</option>
                                                    
                                                                                                                                                            <option  value="Moldova">Moldova</option>
                                                    
                                                                                                                                                            <option  value="Monaco">Monaco</option>
                                                    
                                                                                                                                                            <option  value="Mongolia">Mongolia</option>
                                                    
                                                                                                                                                            <option  value="Morocco">Morocco</option>
                                                    
                                                                                                                                                            <option  value="Mozambique">Mozambique</option>
                                                    
                                                                                                                                                            <option  value="Myanmar">Myanmar</option>
                                                    
                                                                                                                                                            <option  value="Namibia">Namibia</option>
                                                    
                                                                                                                                                            <option  value="Nepal">Nepal</option>
                                                    
                                                                                                                                                            <option  value="Netherlands">Netherlands</option>
                                                    
                                                                                                                                                            <option  value="New Zealand">New Zealand</option>
                                                    
                                                                                                                                                            <option  value="Nicaragua">Nicaragua</option>
                                                    
                                                                                                                                                            <option  value="Niger">Niger</option>
                                                    
                                                                                                                                                            <option  value="Nigeria">Nigeria</option>
                                                    
                                                                                                                                                            <option  value="North Korea">North Korea</option>
                                                    
                                                                                                                                                            <option  value="Norway">Norway</option>
                                                    
                                                                                                                                                            <option  value="Oman">Oman</option>
                                                    
                                                                                                                                                            <option  value="Pakistan">Pakistan</option>
                                                    
                                                                                                                                                            <option  value="Palestine">Palestine</option>
                                                    
                                                                                                                                                            <option  value="Panama">Panama</option>
                                                    
                                                                                                                                                            <option  value="Paraguay">Paraguay</option>
                                                    
                                                                                                                                                            <option  value="Peru">Peru</option>
                                                    
                                                                                                                                                            <option  value="Philippines">Philippines</option>
                                                    
                                                                                                                                                            <option  value="Poland">Poland</option>
                                                    
                                                                                                                                                            <option  value="Portugal">Portugal</option>
                                                    
                                                                                                                                                            <option  value="Puerto Rico">Puerto Rico</option>
                                                    
                                                                                                                                                            <option  value="Qatar">Qatar</option>
                                                    
                                                                                                                                                            <option  value="Republic Macedonia">Republic Macedonia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Bosnia-Herzegovina">Republic of Bosnia-Herzegovina</option>
                                                    
                                                                                                                                                            <option  value="Republic of Croatia">Republic of Croatia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Kazakhstan">Republic of Kazakhstan</option>
                                                    
                                                                                                                                                            <option  value="Republic of Slovenia">Republic of Slovenia</option>
                                                    
                                                                                                                                                            <option  value="Reunion">Reunion</option>
                                                    
                                                                                                                                                            <option  value="Romania">Romania</option>
                                                    
                                                                                                                                                            <option  value="Russia">Russia</option>
                                                    
                                                                                                                                                            <option  value="Rwanda">Rwanda</option>
                                                    
                                                                                                                                                            <option  value="San Marino">San Marino</option>
                                                    
                                                                                                                                                            <option  value="Saudi Arabia">Saudi Arabia</option>
                                                    
                                                                                                                                                            <option  value="Seychelles">Seychelles</option>
                                                    
                                                                                                                                                            <option  value="Sierra Leone">Sierra Leone</option>
                                                    
                                                                                                                                                            <option  value="Singapore">Singapore</option>
                                                    
                                                                                                                                                            <option  value="Slovak Republic">Slovak Republic</option>
                                                    
                                                                                                                                                            <option  value="Somalia">Somalia</option>
                                                    
                                                                                                                                                            <option  value="South Africa">South Africa</option>
                                                    
                                                                                                                                                            <option  value="South Korea">South Korea</option>
                                                    
                                                                                                                                                            <option  value="Spain">Spain</option>
                                                    
                                                                                                                                                            <option  value="Sri Lanka">Sri Lanka</option>
                                                    
                                                                                                                                                            <option  value="Sudan">Sudan</option>
                                                    
                                                                                                                                                            <option  value="Suriname">Suriname</option>
                                                    
                                                                                                                                                            <option  value="Swaziland">Swaziland</option>
                                                    
                                                                                                                                                            <option  value="Sweden">Sweden</option>
                                                    
                                                                                                                                                            <option  value="Switzerland">Switzerland</option>
                                                    
                                                                                                                                                            <option  value="Syria">Syria</option>
                                                    
                                                                                                                                                            <option  value="Tadjikistan">Tadjikistan</option>
                                                    
                                                                                                                                                            <option  value="Taiwan">Taiwan</option>
                                                    
                                                                                                                                                            <option  value="Tanzania">Tanzania</option>
                                                    
                                                                                                                                                            <option  value="Thailand">Thailand</option>
                                                    
                                                                                                                                                            <option  value="Turkey">Turkey</option>
                                                    
                                                                                                                                                            <option  value="Turkmenistan">Turkmenistan</option>
                                                    
                                                                                                                                                            <option  value="Uganda">Uganda</option>
                                                    
                                                                                                                                                            <option  value="Ukraine">Ukraine</option>
                                                    
                                                                                                                                                            <option  value="United Arab Emirates">United Arab Emirates</option>
                                                    
                                                                                                                                                            <option  value="United Kingdom">United Kingdom</option>
                                                    
                                                                                                                                                            <option  value="Uruguay">Uruguay</option>
                                                    
                                                                                                                                                            <option  value="Uzbekistan">Uzbekistan</option>
                                                    
                                                                                                                                                            <option  value="Vatican City">Vatican City</option>
                                                    
                                                                                                                                                            <option  value="Venezuela">Venezuela</option>
                                                    
                                                                                                                                                            <option  value="Vietnam">Vietnam</option>
                                                    
                                                                                                                                                            <option  value="Yemen">Yemen</option>
                                                    
                                                                                                                                                            <option  value="Yugoslavia">Yugoslavia</option>
                                                    
                                                                                                                                                            <option  value="Zaire">Zaire</option>
                                                    
                                                                                                                                                            <option  value="Zambia">Zambia</option>
                                                    
                                                                                                                                                            <option  value="Zimbabwe">Zimbabwe</option>
                                                    
                                                                                                                                                            <option  value="Kiribati">Kiribati</option>
                                                    
                                                                                                                                                            <option  value="Niue">Niue</option>
                                                    
                                                                                                                                                            <option  value="Samoa">Samoa</option>
                                                    
                                                                                                                                                            <option  value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                    
                                                                                                                                                            <option  value="Senegal">Senegal</option>
                                                    
                                                                                                                                                            <option  value="Solomon Islands">Solomon Islands</option>
                                                    
                                                                                                                                                            <option  value="St. Helena Is.">St. Helena Is.</option>
                                                    
                                                                                                                                                            <option  value="Togo">Togo</option>
                                                    
                                                                                                                                                            <option  value="Tonga">Tonga</option>
                                                    
                                                                                                                                                            <option  value="Tunisia">Tunisia</option>
                                                    
                                                                                                                                                            <option  value="Tuvalu">Tuvalu</option>
                                                    
                                                                                                                                                            <option  value="Vanuatu">Vanuatu</option>
                                                    
                                                                                                                                                            <option  value="Indonesia">Indonesia</option>
                                                    
                                                                                                                                                            <option  value="Bahamas">Bahamas</option>
                                                    
                                                                                                                                                            <option  value="Barbados">Barbados</option>
                                                    
                                                                                                                                                            <option  value="Dominican Republic">Dominican Republic</option>
                                                    
                                                                                                                                                            <option  value="Scotland">Scotland</option>
                                                    
                                                                                                                                                            <option  value="England">England</option>
                                                    
                                                                                                                                                            <option  value="Northern Ireland">Northern Ireland</option>
                                                    
                                                                                                                                                            <option  value="American Samoa">American Samoa</option>
                                                    
                                                                                                                                                            <option  value="Anguilla">Anguilla</option>
                                                    
                                                                                                                                                            <option  value="Antarctica">Antarctica</option>
                                                    
                                                                                                                                                            <option  value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    
                                                                                                                                                            <option  value="Aruba">Aruba</option>
                                                    
                                                                                                                                                            <option  value="Bermuda">Bermuda</option>
                                                    
                                                                                                                                                            <option  value="Bouvet Island">Bouvet Island</option>
                                                    
                                                                                                                                                            <option  value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    
                                                                                                                                                            <option  value="Cayman Islands">Cayman Islands</option>
                                                    
                                                                                                                                                            <option  value="Christmas Island">Christmas Island</option>
                                                    
                                                                                                                                                            <option  value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    
                                                                                                                                                            <option  value="Congo, Republic of the">Congo, Republic of the</option>
                                                    
                                                                                                                                                            <option  value="Congo, The Democratic Republic">Congo, The Democratic Republic</option>
                                                    
                                                                                                                                                            <option  value="Cook Islands">Cook Islands</option>
                                                    
                                                                                                                                                            <option  value="Dominica">Dominica</option>
                                                    
                                                                                                                                                            <option  value="East Timor">East Timor</option>
                                                    
                                                                                                                                                            <option  value="Falkland Islands">Falkland Islands</option>
                                                    
                                                                                                                                                            <option  value="Faroe Islands">Faroe Islands</option>
                                                    
                                                                                                                                                            <option  value="French Polynesia">French Polynesia</option>
                                                    
                                                                                                                                                            <option  value="French Southern Territories">French Southern Territories</option>
                                                    
                                                                                                                                                            <option  value="Grenada">Grenada</option>
                                                    
                                                                                                                                                            <option  value="Guadeloupe">Guadeloupe</option>
                                                    
                                                                                                                                                            <option  value="Guam">Guam</option>
                                                    
                                                                                                                                                            <option  value="Haiti">Haiti</option>
                                                    
                                                                                                                                                            <option  value="Heard Island / McDonald Islands">Heard Island / McDonald Islands</option>
                                                    
                                                                                                                                                            <option  value="Jamaica">Jamaica</option>
                                                    
                                                                                                                                                            <option  value="Macao">Macao</option>
                                                    
                                                                                                                                                            <option  value="Marshall Islands">Marshall Islands</option>
                                                    
                                                                                                                                                            <option  value="Martinique">Martinique</option>
                                                    
                                                                                                                                                            <option  value="Mayotte">Mayotte</option>
                                                    
                                                                                                                                                            <option  value="Micronesia">Micronesia</option>
                                                    
                                                                                                                                                            <option  value="Montenegro">Montenegro</option>
                                                    
                                                                                                                                                            <option  value="Montserrat">Montserrat</option>
                                                    
                                                                                                                                                            <option  value="Nauru">Nauru</option>
                                                    
                                                                                                                                                            <option  value="Netherlands Antilles">Netherlands Antilles</option>
                                                    
                                                                                                                                                            <option  value="New Caledonia">New Caledonia</option>
                                                    
                                                                                                                                                            <option  value="Norfolk Island">Norfolk Island</option>
                                                    
                                                                                                                                                            <option  value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    
                                                                                                                                                            <option  value="Palau">Palau</option>
                                                    
                                                                                                                                                            <option  value="Papua New Guinea">Papua New Guinea</option>
                                                    
                                                                                                                                                            <option  value="Pitcairn">Pitcairn</option>
                                                    
                                                                                                                                                            <option  value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    
                                                                                                                                                            <option  value="Saint Lucia">Saint Lucia</option>
                                                    
                                                                                                                                                            <option  value="Serbia">Serbia</option>
                                                    
                                                                                                                                                            <option  value="South Georgia / Sandwich Islands">South Georgia / Sandwich Islands</option>
                                                    
                                                                                                                                                            <option  value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                    
                                                                                                                                                            <option  value="St. Vincent and Grenadines">St. Vincent and Grenadines</option>
                                                    
                                                                                                                                                            <option  value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    
                                                                                                                                                            <option  value="Tajikistan">Tajikistan</option>
                                                    
                                                                                                                                                            <option  value="Tokelau">Tokelau</option>
                                                    
                                                                                                                                                            <option  value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    
                                                                                                                                                            <option  value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    
                                                                                                                                                            <option  value="US Minor Outlying Islands">US Minor Outlying Islands</option>
                                                    
                                                                                                                                                            <option  value="Virgin Islands, US">Virgin Islands, US</option>
                                                    
                                                                                                                                                            <option  value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                    
                                                                                                                                                            <option  value="Western Sahara">Western Sahara</option>
                                                    
                                                                                                                                                            <option  value="Croatia">Croatia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Tunisia">Republic of Tunisia</option>
                                                    
                                                                                                                                                            <option  value="Virgin Islands, British">Virgin Islands, British</option>
                                                    
                                                                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_street_address field_width_445">
                                            <label for="street_address">Street Address</label>
                                            <input class="required" required="required" value="123" name="street_address" type="text" id="street_address" data-validation-engine="validate[required]" data-errormessage-value-missing="Street address is required!" >
                                            <small>Enter the Street of your address, eg 4 High Street</small>
                                        </div>
                                    </div>

                                </div>


                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_city">
                                            <label for="city">City</label>
                                            <input class="required" required="required" value="1312" name="city" type="text" id="city" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your city ">
                                        </div>
                                        <div class="apt_field_block field_state field_width_100">
                                            <label for="state">State</label>
                                            <select class="required" required="required"  name="state" id="state" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your state">
                                                                                                                                                                                                    <option value="">Select State</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
                                            </select>
                                            <input type="text" name="state_text" id="state_text" value="NY">
                                        </div>
                                        <div class="apt_field_block field_zip field_width_100">
                                            <label for="zip">Zip</label>
                                            <input class="required" required="required" value="123" name="zip" type="text" id="zip" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your zip">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_tenancy_type field_width_100">
                                            <label for="tenancy_type">Current Tenancy Type</label>
                                            <select class="required" required="required" name="tenancy_type" id="tenancy_type" data-validation-engine="validate[required]">
                                                                                                    <option selected="selected" value="Rent">Rent</option>
                                                    <option  value="Own">Own</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field rental_details">
                                    <div class="apt_field_label">
                                        <label for="landlord_name">Current Landlord Details </label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_landlord_name">
                                            <label for="landlord_name">Full Name</label>
                                            <input class="required" required="required" value="123" name="landlord_name" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your landlords name" type="text" id="landlord_name">
                                        </div>
                                        <div class="apt_field_block field_landlord_phone">
                                            <label for="landlord_phone">Phone</label>
                                            <input class="required" required="required" value="123" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your landlords phone" name="landlord_phone" type="tel" id="landlord_phone">
                                        </div>
                                        <div class="apt_field_block field_landlord_fax">
                                            <label for="landlord_fax">Fax</label>
                                            <input name="landlord_fax" type="tel" value="" id="landlord_fax">
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field rental_details">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_landlord_email field_width_445">
                                            <label for="landlord_email">Email</label>
                                            <input name="landlord_email" type="email" value="" id="landlord_email" data-validation-engine="validate[custom[email]]"  data-errormessage-value-missing="Valid email is required!"  >
                                            <small>Your Landlords Email address</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field rental_details">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_rent">
                                            <label for="rent">Rent</label>
                                            <input class="required" required="required" value="0.00" name="rent" type="number" id="rent" data-validation-engine="validate[required]" data-errormessage-value-missing="Please enter your rent">
                                            <small>How much in $ is your rent?</small>
                                        </div>
                                        <div class="apt_field_block field_rent_per_month">
                                            <label for="rent_period">Frequency</label>
                                            <select class="required" required="required" name="rent_period" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select the rent frequency">
                                                                                                    <option selected="selected" value="0">Per Month</option>
                                                    <option  value="1">Per Year</option>
                                                                                            </select>
                                            <small>How often do you pay your rent?</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field own_details">
                                    <div class="apt_field_label">
                                        <label for="rent">Own Property Information</label>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx" style="clear:both;">
                                        <div class="apt_field_block field_width_100">
                                            <label for="move_in_date">Move In Date</label>
                                            <select name="move_in_date_month" id="move_in_date_month">
                                                <option value="">Month</option>
                                                                                                                                                            <option  value="01">January</option>
                                                                                                                                                                                                                <option  value="02">February</option>
                                                                                                                                                                                                                <option  value="03">March</option>
                                                                                                                                                                                                                <option  value="04">April</option>
                                                                                                                                                                                                                <option  value="05">May</option>
                                                                                                                                                                                                                <option  value="06">June</option>
                                                                                                                                                                                                                <option  value="07">July</option>
                                                                                                                                                                                                                <option  value="08">August</option>
                                                                                                                                                                                                                <option  value="09">September</option>
                                                                                                                                                                                                                <option  value="10">October</option>
                                                                                                                                                                                                                <option  value="11">November</option>
                                                                                                                                                                                                                <option  value="12">December</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="move_in_date">&nbsp;</label>
                                            <select name="move_in_date_day" id="move_in_date_day">
                                                <option value="">Day</option>
                                                                                                                                                            <option  value="01">1</option>
                                                                                                                                                                                                                <option  value="02">2</option>
                                                                                                                                                                                                                <option  value="03">3</option>
                                                                                                                                                                                                                <option  value="04">4</option>
                                                                                                                                                                                                                <option  value="05">5</option>
                                                                                                                                                                                                                <option  value="06">6</option>
                                                                                                                                                                                                                <option  value="07">7</option>
                                                                                                                                                                                                                <option  value="08">8</option>
                                                                                                                                                                                                                <option  value="09">9</option>
                                                                                                                                                                                                                <option  value="10">10</option>
                                                                                                                                                                                                                <option  value="11">11</option>
                                                                                                                                                                                                                <option  value="12">12</option>
                                                                                                                                                                                                                <option  value="13">13</option>
                                                                                                                                                                                                                <option  value="14">14</option>
                                                                                                                                                                                                                <option  value="15">15</option>
                                                                                                                                                                                                                <option  value="16">16</option>
                                                                                                                                                                                                                <option  value="17">17</option>
                                                                                                                                                                                                                <option  value="18">18</option>
                                                                                                                                                                                                                <option  value="19">19</option>
                                                                                                                                                                                                                <option  value="20">20</option>
                                                                                                                                                                                                                <option  value="21">21</option>
                                                                                                                                                                                                                <option  value="22">22</option>
                                                                                                                                                                                                                <option  value="23">23</option>
                                                                                                                                                                                                                <option  value="24">24</option>
                                                                                                                                                                                                                <option  value="25">25</option>
                                                                                                                                                                                                                <option  value="26">26</option>
                                                                                                                                                                                                                <option  value="27">27</option>
                                                                                                                                                                                                                <option  value="28">28</option>
                                                                                                                                                                                                                <option  value="29">29</option>
                                                                                                                                                                                                                <option  value="30">30</option>
                                                                                                                                                                                                                <option  value="31">31</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="move_in_date">&nbsp;</label>
                                            <select id="move_in_date_year" name="move_in_date_year">
                                                <option value="">Year</option>
                                                                                                                                                                                                            <option  value="2022">2022</option>
                                                                                                                                                                                                                <option  value="2021">2021</option>
                                                                                                                                                                                                                <option  value="2020">2020</option>
                                                                                                                                                                                                                <option  value="2019">2019</option>
                                                                                                                                                                                                                <option  value="2018">2018</option>
                                                                                                                                                                                                                <option  value="2017">2017</option>
                                                                                                                                                                                                                <option  value="2016">2016</option>
                                                                                                                                                                                                                <option  value="2015">2015</option>
                                                                                                                                                                                                                <option  value="2014">2014</option>
                                                                                                                                                                                                                <option  value="2013">2013</option>
                                                                                                                                                                                                                <option  value="2012">2012</option>
                                                                                                                                                                                                                <option  value="2011">2011</option>
                                                                                                                                                                                                                <option  value="2010">2010</option>
                                                                                                                                                                                                                <option  value="2009">2009</option>
                                                                                                                                                                                                                <option  value="2008">2008</option>
                                                                                                                                                                                                                <option  value="2007">2007</option>
                                                                                                                                                                                                                <option  value="2006">2006</option>
                                                                                                                                                                                                                <option  value="2005">2005</option>
                                                                                                                                                                                                                <option  value="2004">2004</option>
                                                                                                                                                                                                                <option  value="2003">2003</option>
                                                                                                                                                                                                                <option  value="2002">2002</option>
                                                                                                                                                                                                                <option  value="2001">2001</option>
                                                                                                                                                                                                                <option  value="2000">2000</option>
                                                                                                                                                                                                                <option  value="1999">1999</option>
                                                                                                                                                                                                                <option  value="1998">1998</option>
                                                                                                                                                                                                                <option  value="1997">1997</option>
                                                                                                                                                                                                                <option  value="1996">1996</option>
                                                                                                                                                                                                                <option  value="1995">1995</option>
                                                                                                                                                                                                                <option  value="1994">1994</option>
                                                                                                                                                                                                                <option  value="1993">1993</option>
                                                                                                                                                                                                                <option  value="1992">1992</option>
                                                                                                                                                                                                                <option  value="1991">1991</option>
                                                                                                                                                                                                                <option  value="1990">1990</option>
                                                                                                                                                                                                                <option  value="1989">1989</option>
                                                                                                                                                                                                                <option  value="1988">1988</option>
                                                                                                                                                                                                                <option  value="1987">1987</option>
                                                                                                                                                                                                                <option  value="1986">1986</option>
                                                                                                                                                                                                                <option  value="1985">1985</option>
                                                                                                                                                                                                                <option  value="1984">1984</option>
                                                                                                                                                                                                                <option  value="1983">1983</option>
                                                                                                                                                                                                                <option  value="1982">1982</option>
                                                                                                                                                                                                                <option  value="1981">1981</option>
                                                                                                                                                                                                                <option  value="1980">1980</option>
                                                                                                                                                                                                                <option  value="1979">1979</option>
                                                                                                                                                                                                                <option  value="1978">1978</option>
                                                                                                                                                                                                                <option  value="1977">1977</option>
                                                                                                                                                                                                                <option  value="1976">1976</option>
                                                                                                                                                                                                                <option  value="1975">1975</option>
                                                                                                                                                                                                                <option  value="1974">1974</option>
                                                                                                                                                                                                                <option  value="1973">1973</option>
                                                                                                                                                                                                                <option  value="1972">1972</option>
                                                                                                                                                                                                                <option  value="1971">1971</option>
                                                                                                                                                                                                                <option  value="1970">1970</option>
                                                                                                                                                                                                                <option  value="1969">1969</option>
                                                                                                                                                                                                                <option  value="1968">1968</option>
                                                                                                                                                                                                                <option  value="1967">1967</option>
                                                                                                                                                                                                                <option  value="1966">1966</option>
                                                                                                                                                                                                                <option  value="1965">1965</option>
                                                                                                                                                                                                                <option  value="1964">1964</option>
                                                                                                                                                                                                                <option  value="1963">1963</option>
                                                                                                                                                                                                                <option  value="1962">1962</option>
                                                                                                                                                                                                                <option  value="1961">1961</option>
                                                                                                                                                                                                                <option  value="1960">1960</option>
                                                                                                                                                                                                                <option  value="1959">1959</option>
                                                                                                                                                                                                                <option  value="1958">1958</option>
                                                                                                                                                                                                                <option  value="1957">1957</option>
                                                                                                                                                                                                                <option  value="1956">1956</option>
                                                                                                                                                                                                                <option  value="1955">1955</option>
                                                                                                                                                                                                                <option  value="1954">1954</option>
                                                                                                                                                                                                                <option  value="1953">1953</option>
                                                                                                                                                                                                                <option  value="1952">1952</option>
                                                                                                                                                                                                                <option  value="1951">1951</option>
                                                                                                                                                                                                                <option  value="1950">1950</option>
                                                                                                                                                                                                                <option  value="1949">1949</option>
                                                                                                                                                                                                                <option  value="1948">1948</option>
                                                                                                                                                                                                                <option  value="1947">1947</option>
                                                                                                                                                                                                                <option  value="1946">1946</option>
                                                                                                                                                                                                                <option  value="1945">1945</option>
                                                                                                                                                                                                                <option  value="1944">1944</option>
                                                                                                                                                                                                                <option  value="1943">1943</option>
                                                                                                                                                                                                                <option  value="1942">1942</option>
                                                                                                                                                                                                                <option  value="1941">1941</option>
                                                                                                                                                                                                                <option  value="1940">1940</option>
                                                                                                                                                                                                                <option  value="1939">1939</option>
                                                                                                                                                                                                                <option  value="1938">1938</option>
                                                                                                                                                                                                                <option  value="1937">1937</option>
                                                                                                                                                                                                                <option  value="1936">1936</option>
                                                                                                                                                                                                                <option  value="1935">1935</option>
                                                                                                                                                                                                                <option  value="1934">1934</option>
                                                                                                                                                                                                                <option  value="1933">1933</option>
                                                                                                                                                                                                                <option  value="1932">1932</option>
                                                                                                                                                                                                                <option  value="1931">1931</option>
                                                                                                                                                                                                                <option  value="1930">1930</option>
                                                                                                                                                                                                                <option  value="1929">1929</option>
                                                                                                                                                                                                                <option  value="1928">1928</option>
                                                                                                                                                                                                                <option  value="1927">1927</option>
                                                                                                                                                                                                                <option  value="1926">1926</option>
                                                                                                                                                                                                                <option  value="1925">1925</option>
                                                                                                                                                                                                                <option  value="1924">1924</option>
                                                                                                                                                                                                                <option  value="1923">1923</option>
                                                                                                                                                                                                                <option  value="1922">1922</option>
                                                                                                                                                </select>
                                            <input value="" name="move_in_date" type="hidden" id="move_in_date" >
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx" style="clear:both;">
                                        <div class="apt_field_block field_still_live_here field_width_100">
                                            <label for="move_out_date">Do You Still Live Here?</label>
                                            <select class="required" required="required" name="still_live_here" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your preference">
                                                                                                    <option selected="selected" value="1">Yes</option>
                                                    <option  value="2">No</option>
                                                                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div id="moveoutdateblock" class="apt_field_fieldx" style="clear:both;">
                                        <div class="apt_field_block field_width_100">
                                            <label for="move_out_date">Move Out Date</label>
                                            <select name="move_out_date_month" id="move_out_date_month">
                                                <option value="">Month</option>
                                                                                                                                                            <option selected="selected" value="01">January</option>
                                                                                                                                                                                                                <option  value="02">February</option>
                                                                                                                                                                                                                <option  value="03">March</option>
                                                                                                                                                                                                                <option  value="04">April</option>
                                                                                                                                                                                                                <option  value="05">May</option>
                                                                                                                                                                                                                <option  value="06">June</option>
                                                                                                                                                                                                                <option  value="07">July</option>
                                                                                                                                                                                                                <option  value="08">August</option>
                                                                                                                                                                                                                <option  value="09">September</option>
                                                                                                                                                                                                                <option  value="10">October</option>
                                                                                                                                                                                                                <option  value="11">November</option>
                                                                                                                                                                                                                <option  value="12">December</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="move_out_date">&nbsp;</label>
                                            <select name="move_out_date_day" id="move_out_date_day">
                                                <option value="">Day</option>
                                                                                                                                                            <option selected="selected" value="01">1</option>
                                                                                                                                                                                                                <option  value="02">2</option>
                                                                                                                                                                                                                <option  value="03">3</option>
                                                                                                                                                                                                                <option  value="04">4</option>
                                                                                                                                                                                                                <option  value="05">5</option>
                                                                                                                                                                                                                <option  value="06">6</option>
                                                                                                                                                                                                                <option  value="07">7</option>
                                                                                                                                                                                                                <option  value="08">8</option>
                                                                                                                                                                                                                <option  value="09">9</option>
                                                                                                                                                                                                                <option  value="10">10</option>
                                                                                                                                                                                                                <option  value="11">11</option>
                                                                                                                                                                                                                <option  value="12">12</option>
                                                                                                                                                                                                                <option  value="13">13</option>
                                                                                                                                                                                                                <option  value="14">14</option>
                                                                                                                                                                                                                <option  value="15">15</option>
                                                                                                                                                                                                                <option  value="16">16</option>
                                                                                                                                                                                                                <option  value="17">17</option>
                                                                                                                                                                                                                <option  value="18">18</option>
                                                                                                                                                                                                                <option  value="19">19</option>
                                                                                                                                                                                                                <option  value="20">20</option>
                                                                                                                                                                                                                <option  value="21">21</option>
                                                                                                                                                                                                                <option  value="22">22</option>
                                                                                                                                                                                                                <option  value="23">23</option>
                                                                                                                                                                                                                <option  value="24">24</option>
                                                                                                                                                                                                                <option  value="25">25</option>
                                                                                                                                                                                                                <option  value="26">26</option>
                                                                                                                                                                                                                <option  value="27">27</option>
                                                                                                                                                                                                                <option  value="28">28</option>
                                                                                                                                                                                                                <option  value="29">29</option>
                                                                                                                                                                                                                <option  value="30">30</option>
                                                                                                                                                                                                                <option  value="31">31</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="move_out_date">&nbsp;</label>
                                            <select id="move_out_date_year" name="move_out_date_year">
                                                <option value="">Year</option>
                                                                                                                                                                                                            <option  value="2022">2022</option>
                                                                                                                                                                                                                <option  value="2021">2021</option>
                                                                                                                                                                                                                <option selected="selected" value="2020">2020</option>
                                                                                                                                                                                                                <option  value="2019">2019</option>
                                                                                                                                                                                                                <option  value="2018">2018</option>
                                                                                                                                                                                                                <option  value="2017">2017</option>
                                                                                                                                                                                                                <option  value="2016">2016</option>
                                                                                                                                                                                                                <option  value="2015">2015</option>
                                                                                                                                                                                                                <option  value="2014">2014</option>
                                                                                                                                                                                                                <option  value="2013">2013</option>
                                                                                                                                                                                                                <option  value="2012">2012</option>
                                                                                                                                                                                                                <option  value="2011">2011</option>
                                                                                                                                                                                                                <option  value="2010">2010</option>
                                                                                                                                                                                                                <option  value="2009">2009</option>
                                                                                                                                                                                                                <option  value="2008">2008</option>
                                                                                                                                                                                                                <option  value="2007">2007</option>
                                                                                                                                                                                                                <option  value="2006">2006</option>
                                                                                                                                                                                                                <option  value="2005">2005</option>
                                                                                                                                                                                                                <option  value="2004">2004</option>
                                                                                                                                                                                                                <option  value="2003">2003</option>
                                                                                                                                                                                                                <option  value="2002">2002</option>
                                                                                                                                                                                                                <option  value="2001">2001</option>
                                                                                                                                                                                                                <option  value="2000">2000</option>
                                                                                                                                                                                                                <option  value="1999">1999</option>
                                                                                                                                                                                                                <option  value="1998">1998</option>
                                                                                                                                                                                                                <option  value="1997">1997</option>
                                                                                                                                                                                                                <option  value="1996">1996</option>
                                                                                                                                                                                                                <option  value="1995">1995</option>
                                                                                                                                                                                                                <option  value="1994">1994</option>
                                                                                                                                                                                                                <option  value="1993">1993</option>
                                                                                                                                                                                                                <option  value="1992">1992</option>
                                                                                                                                                                                                                <option  value="1991">1991</option>
                                                                                                                                                                                                                <option  value="1990">1990</option>
                                                                                                                                                                                                                <option  value="1989">1989</option>
                                                                                                                                                                                                                <option  value="1988">1988</option>
                                                                                                                                                                                                                <option  value="1987">1987</option>
                                                                                                                                                                                                                <option  value="1986">1986</option>
                                                                                                                                                                                                                <option  value="1985">1985</option>
                                                                                                                                                                                                                <option  value="1984">1984</option>
                                                                                                                                                                                                                <option  value="1983">1983</option>
                                                                                                                                                                                                                <option  value="1982">1982</option>
                                                                                                                                                                                                                <option  value="1981">1981</option>
                                                                                                                                                                                                                <option  value="1980">1980</option>
                                                                                                                                                                                                                <option  value="1979">1979</option>
                                                                                                                                                                                                                <option  value="1978">1978</option>
                                                                                                                                                                                                                <option  value="1977">1977</option>
                                                                                                                                                                                                                <option  value="1976">1976</option>
                                                                                                                                                                                                                <option  value="1975">1975</option>
                                                                                                                                                                                                                <option  value="1974">1974</option>
                                                                                                                                                                                                                <option  value="1973">1973</option>
                                                                                                                                                                                                                <option  value="1972">1972</option>
                                                                                                                                                                                                                <option  value="1971">1971</option>
                                                                                                                                                                                                                <option  value="1970">1970</option>
                                                                                                                                                                                                                <option  value="1969">1969</option>
                                                                                                                                                                                                                <option  value="1968">1968</option>
                                                                                                                                                                                                                <option  value="1967">1967</option>
                                                                                                                                                                                                                <option  value="1966">1966</option>
                                                                                                                                                                                                                <option  value="1965">1965</option>
                                                                                                                                                                                                                <option  value="1964">1964</option>
                                                                                                                                                                                                                <option  value="1963">1963</option>
                                                                                                                                                                                                                <option  value="1962">1962</option>
                                                                                                                                                                                                                <option  value="1961">1961</option>
                                                                                                                                                                                                                <option  value="1960">1960</option>
                                                                                                                                                                                                                <option  value="1959">1959</option>
                                                                                                                                                                                                                <option  value="1958">1958</option>
                                                                                                                                                                                                                <option  value="1957">1957</option>
                                                                                                                                                                                                                <option  value="1956">1956</option>
                                                                                                                                                                                                                <option  value="1955">1955</option>
                                                                                                                                                                                                                <option  value="1954">1954</option>
                                                                                                                                                                                                                <option  value="1953">1953</option>
                                                                                                                                                                                                                <option  value="1952">1952</option>
                                                                                                                                                                                                                <option  value="1951">1951</option>
                                                                                                                                                                                                                <option  value="1950">1950</option>
                                                                                                                                                                                                                <option  value="1949">1949</option>
                                                                                                                                                                                                                <option  value="1948">1948</option>
                                                                                                                                                                                                                <option  value="1947">1947</option>
                                                                                                                                                                                                                <option  value="1946">1946</option>
                                                                                                                                                                                                                <option  value="1945">1945</option>
                                                                                                                                                                                                                <option  value="1944">1944</option>
                                                                                                                                                                                                                <option  value="1943">1943</option>
                                                                                                                                                                                                                <option  value="1942">1942</option>
                                                                                                                                                                                                                <option  value="1941">1941</option>
                                                                                                                                                                                                                <option  value="1940">1940</option>
                                                                                                                                                                                                                <option  value="1939">1939</option>
                                                                                                                                                                                                                <option  value="1938">1938</option>
                                                                                                                                                                                                                <option  value="1937">1937</option>
                                                                                                                                                                                                                <option  value="1936">1936</option>
                                                                                                                                                                                                                <option  value="1935">1935</option>
                                                                                                                                                                                                                <option  value="1934">1934</option>
                                                                                                                                                                                                                <option  value="1933">1933</option>
                                                                                                                                                                                                                <option  value="1932">1932</option>
                                                                                                                                                                                                                <option  value="1931">1931</option>
                                                                                                                                                                                                                <option  value="1930">1930</option>
                                                                                                                                                                                                                <option  value="1929">1929</option>
                                                                                                                                                                                                                <option  value="1928">1928</option>
                                                                                                                                                                                                                <option  value="1927">1927</option>
                                                                                                                                                                                                                <option  value="1926">1926</option>
                                                                                                                                                                                                                <option  value="1925">1925</option>
                                                                                                                                                                                                                <option  value="1924">1924</option>
                                                                                                                                                                                                                <option  value="1923">1923</option>
                                                                                                                                                                                                                <option  value="1922">1922</option>
                                                                                                                                                </select>
                                            <input value="" name="move_out_date" type="hidden" id="move_out_date" >
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_reason_for_leaving field_width_445">
                                            <label for="reason_for_leaving">Reason for Leaving Current Address</label>
                                            <textarea style="width:100%;height:100px;" id="reason_for_leaving" name="reason_for_leaving"></textarea>
                                            <small>Please list your main reasons for leaving your current address</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_will_keep_this_residence field_width_100">
                                            <label for="will_keep_this_residence">Your residence</label>
                                            <select class="required" required="required" name="will_keep_this_residence" data-validation-engine="validate[required]" data-errormessage-value-missing="Please select your preference">
                                                                                                    <option selected="selected" value="1">Yes</option>
                                                    <option  value="2">No</option>
                                                                                            </select>
                                            <small>Will you keep this residence?</small>
                                        </div>
                                    </div>

                                </div>

                                <div style="clear:both"></div>


                                <h2>Previous Address (if less than 2 years at current)</h2>



                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="previous_street">Address Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_street field_width_445">
                                            <label for="previous_country">Country</label>
                                            <select id="previous_country" name="previous_country">
                                                                                                                                                            <option selected="selected" value="United States">United States</option>
                                                    
                                                                                                                                                            <option  value="Canada">Canada</option>
                                                    
                                                                                                                                                            <option  value="Afghanistan">Afghanistan</option>
                                                    
                                                                                                                                                            <option  value="Albania">Albania</option>
                                                    
                                                                                                                                                            <option  value="Algeria">Algeria</option>
                                                    
                                                                                                                                                            <option  value="Andorra">Andorra</option>
                                                    
                                                                                                                                                            <option  value="Angola">Angola</option>
                                                    
                                                                                                                                                            <option  value="Argentina">Argentina</option>
                                                    
                                                                                                                                                            <option  value="Armenia">Armenia</option>
                                                    
                                                                                                                                                            <option  value="Australia">Australia</option>
                                                    
                                                                                                                                                            <option  value="Austria">Austria</option>
                                                    
                                                                                                                                                            <option  value="Azerbaijan">Azerbaijan</option>
                                                    
                                                                                                                                                            <option  value="Bahrain">Bahrain</option>
                                                    
                                                                                                                                                            <option  value="Bangladesh">Bangladesh</option>
                                                    
                                                                                                                                                            <option  value="Belarus">Belarus</option>
                                                    
                                                                                                                                                            <option  value="Belgium">Belgium</option>
                                                    
                                                                                                                                                            <option  value="Belize">Belize</option>
                                                    
                                                                                                                                                            <option  value="Benin">Benin</option>
                                                    
                                                                                                                                                            <option  value="Bhutan">Bhutan</option>
                                                    
                                                                                                                                                            <option  value="Bolivia">Bolivia</option>
                                                    
                                                                                                                                                            <option  value="Botswana">Botswana</option>
                                                    
                                                                                                                                                            <option  value="Brazil">Brazil</option>
                                                    
                                                                                                                                                            <option  value="Brunei">Brunei</option>
                                                    
                                                                                                                                                            <option  value="Bulgaria">Bulgaria</option>
                                                    
                                                                                                                                                            <option  value="Burkina Faso">Burkina Faso</option>
                                                    
                                                                                                                                                            <option  value="Burundi">Burundi</option>
                                                    
                                                                                                                                                            <option  value="Cambodia">Cambodia</option>
                                                    
                                                                                                                                                            <option  value="Cameroon">Cameroon</option>
                                                    
                                                                                                                                                            <option  value="Cape Verde Is.">Cape Verde Is.</option>
                                                    
                                                                                                                                                            <option  value="Central African Republic">Central African Republic</option>
                                                    
                                                                                                                                                            <option  value="Chad">Chad</option>
                                                    
                                                                                                                                                            <option  value="Chile">Chile</option>
                                                    
                                                                                                                                                            <option  value="China">China</option>
                                                    
                                                                                                                                                            <option  value="Colombia">Colombia</option>
                                                    
                                                                                                                                                            <option  value="Comoros">Comoros</option>
                                                    
                                                                                                                                                            <option  value="Costa Rica">Costa Rica</option>
                                                    
                                                                                                                                                            <option  value="Cuba">Cuba</option>
                                                    
                                                                                                                                                            <option  value="Cyprus">Cyprus</option>
                                                    
                                                                                                                                                            <option  value="Czech Republic">Czech Republic</option>
                                                    
                                                                                                                                                            <option  value="Denmark">Denmark</option>
                                                    
                                                                                                                                                            <option  value="Djibouti">Djibouti</option>
                                                    
                                                                                                                                                            <option  value="Ecuador">Ecuador</option>
                                                    
                                                                                                                                                            <option  value="Egypt">Egypt</option>
                                                    
                                                                                                                                                            <option  value="El Salvador">El Salvador</option>
                                                    
                                                                                                                                                            <option  value="Equatorial Guinea">Equatorial Guinea</option>
                                                    
                                                                                                                                                            <option  value="Eritrea">Eritrea</option>
                                                    
                                                                                                                                                            <option  value="Estonia">Estonia</option>
                                                    
                                                                                                                                                            <option  value="Ethiopia">Ethiopia</option>
                                                    
                                                                                                                                                            <option  value="Fiji">Fiji</option>
                                                    
                                                                                                                                                            <option  value="Finland">Finland</option>
                                                    
                                                                                                                                                            <option  value="France">France</option>
                                                    
                                                                                                                                                            <option  value="French Guiana">French Guiana</option>
                                                    
                                                                                                                                                            <option  value="Gabon">Gabon</option>
                                                    
                                                                                                                                                            <option  value="Gambia">Gambia</option>
                                                    
                                                                                                                                                            <option  value="Georgia">Georgia</option>
                                                    
                                                                                                                                                            <option  value="Germany">Germany</option>
                                                    
                                                                                                                                                            <option  value="Ghana">Ghana</option>
                                                    
                                                                                                                                                            <option  value="Gibraltar">Gibraltar</option>
                                                    
                                                                                                                                                            <option  value="Greece">Greece</option>
                                                    
                                                                                                                                                            <option  value="Greenland">Greenland</option>
                                                    
                                                                                                                                                            <option  value="Guatemala">Guatemala</option>
                                                    
                                                                                                                                                            <option  value="Guinea">Guinea</option>
                                                    
                                                                                                                                                            <option  value="Guinea Bissau">Guinea Bissau</option>
                                                    
                                                                                                                                                            <option  value="Guyana">Guyana</option>
                                                    
                                                                                                                                                            <option  value="Honduras">Honduras</option>
                                                    
                                                                                                                                                            <option  value="Hong Kong and Macau">Hong Kong and Macau</option>
                                                    
                                                                                                                                                            <option  value="Hungary">Hungary</option>
                                                    
                                                                                                                                                            <option  value="Iceland">Iceland</option>
                                                    
                                                                                                                                                            <option  value="India">India</option>
                                                    
                                                                                                                                                            <option  value="Iran">Iran</option>
                                                    
                                                                                                                                                            <option  value="Iraq">Iraq</option>
                                                    
                                                                                                                                                            <option  value="Ireland">Ireland</option>
                                                    
                                                                                                                                                            <option  value="Israel">Israel</option>
                                                    
                                                                                                                                                            <option  value="Italy">Italy</option>
                                                    
                                                                                                                                                            <option  value="Ivory Coast">Ivory Coast</option>
                                                    
                                                                                                                                                            <option  value="Japan">Japan</option>
                                                    
                                                                                                                                                            <option  value="Jordan">Jordan</option>
                                                    
                                                                                                                                                            <option  value="Kenya">Kenya</option>
                                                    
                                                                                                                                                            <option  value="Kosovo">Kosovo</option>
                                                    
                                                                                                                                                            <option  value="Kuwait">Kuwait</option>
                                                    
                                                                                                                                                            <option  value="Kyrgyzstan">Kyrgyzstan</option>
                                                    
                                                                                                                                                            <option  value="Laos">Laos</option>
                                                    
                                                                                                                                                            <option  value="Latvia">Latvia</option>
                                                    
                                                                                                                                                            <option  value="Lebanon">Lebanon</option>
                                                    
                                                                                                                                                            <option  value="Lesotho">Lesotho</option>
                                                    
                                                                                                                                                            <option  value="Liberia">Liberia</option>
                                                    
                                                                                                                                                            <option  value="Libya">Libya</option>
                                                    
                                                                                                                                                            <option  value="Liechtenstein">Liechtenstein</option>
                                                    
                                                                                                                                                            <option  value="Lithuania">Lithuania</option>
                                                    
                                                                                                                                                            <option  value="Luxembourg">Luxembourg</option>
                                                    
                                                                                                                                                            <option  value="Madagascar">Madagascar</option>
                                                    
                                                                                                                                                            <option  value="Malawi">Malawi</option>
                                                    
                                                                                                                                                            <option  value="Malaysia">Malaysia</option>
                                                    
                                                                                                                                                            <option  value="Maldives">Maldives</option>
                                                    
                                                                                                                                                            <option  value="Mali">Mali</option>
                                                    
                                                                                                                                                            <option  value="Malta">Malta</option>
                                                    
                                                                                                                                                            <option  value="Mauritania">Mauritania</option>
                                                    
                                                                                                                                                            <option  value="Mauritius">Mauritius</option>
                                                    
                                                                                                                                                            <option  value="Mexico">Mexico</option>
                                                    
                                                                                                                                                            <option  value="Moldova">Moldova</option>
                                                    
                                                                                                                                                            <option  value="Monaco">Monaco</option>
                                                    
                                                                                                                                                            <option  value="Mongolia">Mongolia</option>
                                                    
                                                                                                                                                            <option  value="Morocco">Morocco</option>
                                                    
                                                                                                                                                            <option  value="Mozambique">Mozambique</option>
                                                    
                                                                                                                                                            <option  value="Myanmar">Myanmar</option>
                                                    
                                                                                                                                                            <option  value="Namibia">Namibia</option>
                                                    
                                                                                                                                                            <option  value="Nepal">Nepal</option>
                                                    
                                                                                                                                                            <option  value="Netherlands">Netherlands</option>
                                                    
                                                                                                                                                            <option  value="New Zealand">New Zealand</option>
                                                    
                                                                                                                                                            <option  value="Nicaragua">Nicaragua</option>
                                                    
                                                                                                                                                            <option  value="Niger">Niger</option>
                                                    
                                                                                                                                                            <option  value="Nigeria">Nigeria</option>
                                                    
                                                                                                                                                            <option  value="North Korea">North Korea</option>
                                                    
                                                                                                                                                            <option  value="Norway">Norway</option>
                                                    
                                                                                                                                                            <option  value="Oman">Oman</option>
                                                    
                                                                                                                                                            <option  value="Pakistan">Pakistan</option>
                                                    
                                                                                                                                                            <option  value="Palestine">Palestine</option>
                                                    
                                                                                                                                                            <option  value="Panama">Panama</option>
                                                    
                                                                                                                                                            <option  value="Paraguay">Paraguay</option>
                                                    
                                                                                                                                                            <option  value="Peru">Peru</option>
                                                    
                                                                                                                                                            <option  value="Philippines">Philippines</option>
                                                    
                                                                                                                                                            <option  value="Poland">Poland</option>
                                                    
                                                                                                                                                            <option  value="Portugal">Portugal</option>
                                                    
                                                                                                                                                            <option  value="Puerto Rico">Puerto Rico</option>
                                                    
                                                                                                                                                            <option  value="Qatar">Qatar</option>
                                                    
                                                                                                                                                            <option  value="Republic Macedonia">Republic Macedonia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Bosnia-Herzegovina">Republic of Bosnia-Herzegovina</option>
                                                    
                                                                                                                                                            <option  value="Republic of Croatia">Republic of Croatia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Kazakhstan">Republic of Kazakhstan</option>
                                                    
                                                                                                                                                            <option  value="Republic of Slovenia">Republic of Slovenia</option>
                                                    
                                                                                                                                                            <option  value="Reunion">Reunion</option>
                                                    
                                                                                                                                                            <option  value="Romania">Romania</option>
                                                    
                                                                                                                                                            <option  value="Russia">Russia</option>
                                                    
                                                                                                                                                            <option  value="Rwanda">Rwanda</option>
                                                    
                                                                                                                                                            <option  value="San Marino">San Marino</option>
                                                    
                                                                                                                                                            <option  value="Saudi Arabia">Saudi Arabia</option>
                                                    
                                                                                                                                                            <option  value="Seychelles">Seychelles</option>
                                                    
                                                                                                                                                            <option  value="Sierra Leone">Sierra Leone</option>
                                                    
                                                                                                                                                            <option  value="Singapore">Singapore</option>
                                                    
                                                                                                                                                            <option  value="Slovak Republic">Slovak Republic</option>
                                                    
                                                                                                                                                            <option  value="Somalia">Somalia</option>
                                                    
                                                                                                                                                            <option  value="South Africa">South Africa</option>
                                                    
                                                                                                                                                            <option  value="South Korea">South Korea</option>
                                                    
                                                                                                                                                            <option  value="Spain">Spain</option>
                                                    
                                                                                                                                                            <option  value="Sri Lanka">Sri Lanka</option>
                                                    
                                                                                                                                                            <option  value="Sudan">Sudan</option>
                                                    
                                                                                                                                                            <option  value="Suriname">Suriname</option>
                                                    
                                                                                                                                                            <option  value="Swaziland">Swaziland</option>
                                                    
                                                                                                                                                            <option  value="Sweden">Sweden</option>
                                                    
                                                                                                                                                            <option  value="Switzerland">Switzerland</option>
                                                    
                                                                                                                                                            <option  value="Syria">Syria</option>
                                                    
                                                                                                                                                            <option  value="Tadjikistan">Tadjikistan</option>
                                                    
                                                                                                                                                            <option  value="Taiwan">Taiwan</option>
                                                    
                                                                                                                                                            <option  value="Tanzania">Tanzania</option>
                                                    
                                                                                                                                                            <option  value="Thailand">Thailand</option>
                                                    
                                                                                                                                                            <option  value="Turkey">Turkey</option>
                                                    
                                                                                                                                                            <option  value="Turkmenistan">Turkmenistan</option>
                                                    
                                                                                                                                                            <option  value="Uganda">Uganda</option>
                                                    
                                                                                                                                                            <option  value="Ukraine">Ukraine</option>
                                                    
                                                                                                                                                            <option  value="United Arab Emirates">United Arab Emirates</option>
                                                    
                                                                                                                                                            <option  value="United Kingdom">United Kingdom</option>
                                                    
                                                                                                                                                            <option  value="Uruguay">Uruguay</option>
                                                    
                                                                                                                                                            <option  value="Uzbekistan">Uzbekistan</option>
                                                    
                                                                                                                                                            <option  value="Vatican City">Vatican City</option>
                                                    
                                                                                                                                                            <option  value="Venezuela">Venezuela</option>
                                                    
                                                                                                                                                            <option  value="Vietnam">Vietnam</option>
                                                    
                                                                                                                                                            <option  value="Yemen">Yemen</option>
                                                    
                                                                                                                                                            <option  value="Yugoslavia">Yugoslavia</option>
                                                    
                                                                                                                                                            <option  value="Zaire">Zaire</option>
                                                    
                                                                                                                                                            <option  value="Zambia">Zambia</option>
                                                    
                                                                                                                                                            <option  value="Zimbabwe">Zimbabwe</option>
                                                    
                                                                                                                                                            <option  value="Kiribati">Kiribati</option>
                                                    
                                                                                                                                                            <option  value="Niue">Niue</option>
                                                    
                                                                                                                                                            <option  value="Samoa">Samoa</option>
                                                    
                                                                                                                                                            <option  value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                    
                                                                                                                                                            <option  value="Senegal">Senegal</option>
                                                    
                                                                                                                                                            <option  value="Solomon Islands">Solomon Islands</option>
                                                    
                                                                                                                                                            <option  value="St. Helena Is.">St. Helena Is.</option>
                                                    
                                                                                                                                                            <option  value="Togo">Togo</option>
                                                    
                                                                                                                                                            <option  value="Tonga">Tonga</option>
                                                    
                                                                                                                                                            <option  value="Tunisia">Tunisia</option>
                                                    
                                                                                                                                                            <option  value="Tuvalu">Tuvalu</option>
                                                    
                                                                                                                                                            <option  value="Vanuatu">Vanuatu</option>
                                                    
                                                                                                                                                            <option  value="Indonesia">Indonesia</option>
                                                    
                                                                                                                                                            <option  value="Bahamas">Bahamas</option>
                                                    
                                                                                                                                                            <option  value="Barbados">Barbados</option>
                                                    
                                                                                                                                                            <option  value="Dominican Republic">Dominican Republic</option>
                                                    
                                                                                                                                                            <option  value="Scotland">Scotland</option>
                                                    
                                                                                                                                                            <option  value="England">England</option>
                                                    
                                                                                                                                                            <option  value="Northern Ireland">Northern Ireland</option>
                                                    
                                                                                                                                                            <option  value="American Samoa">American Samoa</option>
                                                    
                                                                                                                                                            <option  value="Anguilla">Anguilla</option>
                                                    
                                                                                                                                                            <option  value="Antarctica">Antarctica</option>
                                                    
                                                                                                                                                            <option  value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    
                                                                                                                                                            <option  value="Aruba">Aruba</option>
                                                    
                                                                                                                                                            <option  value="Bermuda">Bermuda</option>
                                                    
                                                                                                                                                            <option  value="Bouvet Island">Bouvet Island</option>
                                                    
                                                                                                                                                            <option  value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                    
                                                                                                                                                            <option  value="Cayman Islands">Cayman Islands</option>
                                                    
                                                                                                                                                            <option  value="Christmas Island">Christmas Island</option>
                                                    
                                                                                                                                                            <option  value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                    
                                                                                                                                                            <option  value="Congo, Republic of the">Congo, Republic of the</option>
                                                    
                                                                                                                                                            <option  value="Congo, The Democratic Republic">Congo, The Democratic Republic</option>
                                                    
                                                                                                                                                            <option  value="Cook Islands">Cook Islands</option>
                                                    
                                                                                                                                                            <option  value="Dominica">Dominica</option>
                                                    
                                                                                                                                                            <option  value="East Timor">East Timor</option>
                                                    
                                                                                                                                                            <option  value="Falkland Islands">Falkland Islands</option>
                                                    
                                                                                                                                                            <option  value="Faroe Islands">Faroe Islands</option>
                                                    
                                                                                                                                                            <option  value="French Polynesia">French Polynesia</option>
                                                    
                                                                                                                                                            <option  value="French Southern Territories">French Southern Territories</option>
                                                    
                                                                                                                                                            <option  value="Grenada">Grenada</option>
                                                    
                                                                                                                                                            <option  value="Guadeloupe">Guadeloupe</option>
                                                    
                                                                                                                                                            <option  value="Guam">Guam</option>
                                                    
                                                                                                                                                            <option  value="Haiti">Haiti</option>
                                                    
                                                                                                                                                            <option  value="Heard Island / McDonald Islands">Heard Island / McDonald Islands</option>
                                                    
                                                                                                                                                            <option  value="Jamaica">Jamaica</option>
                                                    
                                                                                                                                                            <option  value="Macao">Macao</option>
                                                    
                                                                                                                                                            <option  value="Marshall Islands">Marshall Islands</option>
                                                    
                                                                                                                                                            <option  value="Martinique">Martinique</option>
                                                    
                                                                                                                                                            <option  value="Mayotte">Mayotte</option>
                                                    
                                                                                                                                                            <option  value="Micronesia">Micronesia</option>
                                                    
                                                                                                                                                            <option  value="Montenegro">Montenegro</option>
                                                    
                                                                                                                                                            <option  value="Montserrat">Montserrat</option>
                                                    
                                                                                                                                                            <option  value="Nauru">Nauru</option>
                                                    
                                                                                                                                                            <option  value="Netherlands Antilles">Netherlands Antilles</option>
                                                    
                                                                                                                                                            <option  value="New Caledonia">New Caledonia</option>
                                                    
                                                                                                                                                            <option  value="Norfolk Island">Norfolk Island</option>
                                                    
                                                                                                                                                            <option  value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                    
                                                                                                                                                            <option  value="Palau">Palau</option>
                                                    
                                                                                                                                                            <option  value="Papua New Guinea">Papua New Guinea</option>
                                                    
                                                                                                                                                            <option  value="Pitcairn">Pitcairn</option>
                                                    
                                                                                                                                                            <option  value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    
                                                                                                                                                            <option  value="Saint Lucia">Saint Lucia</option>
                                                    
                                                                                                                                                            <option  value="Serbia">Serbia</option>
                                                    
                                                                                                                                                            <option  value="South Georgia / Sandwich Islands">South Georgia / Sandwich Islands</option>
                                                    
                                                                                                                                                            <option  value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                    
                                                                                                                                                            <option  value="St. Vincent and Grenadines">St. Vincent and Grenadines</option>
                                                    
                                                                                                                                                            <option  value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                    
                                                                                                                                                            <option  value="Tajikistan">Tajikistan</option>
                                                    
                                                                                                                                                            <option  value="Tokelau">Tokelau</option>
                                                    
                                                                                                                                                            <option  value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    
                                                                                                                                                            <option  value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                    
                                                                                                                                                            <option  value="US Minor Outlying Islands">US Minor Outlying Islands</option>
                                                    
                                                                                                                                                            <option  value="Virgin Islands, US">Virgin Islands, US</option>
                                                    
                                                                                                                                                            <option  value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                    
                                                                                                                                                            <option  value="Western Sahara">Western Sahara</option>
                                                    
                                                                                                                                                            <option  value="Croatia">Croatia</option>
                                                    
                                                                                                                                                            <option  value="Republic of Tunisia">Republic of Tunisia</option>
                                                    
                                                                                                                                                            <option  value="Virgin Islands, British">Virgin Islands, British</option>
                                                    
                                                                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_street field_width_445">
                                            <label for="previous_street">Street</label>
                                            <input name="previous_street" value="" type="text" id="previous_street">
                                            <small>Enter the street of your address</small>
                                        </div>
                                    </div>

                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_city">
                                            <label for="previous_city">City</label>
                                            <input name="previous_city" value="" type="text" id="previous_city">
                                        </div>
                                        <div class="apt_field_block field_state field_width_100">
                                            <label for="previous_state">State</label>
                                            <select name="previous_state" id="previous_state">
                                                                                                                                                                                                    <option value="">Select State</option>
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
                                            </select>
                                            <input type="text" name="previous_state_text" id="previous_state_text" value="">
                                        </div>

                                        <div class="apt_field_block field_previous_zip field_width_100">
                                            <label for="previous_zip">Zip</label>
                                            <input name="previous_zip" value="" type="text" id="previous_zip">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="previous_landlord_name">Previous Landlord Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_landlord_name">
                                            <label for="previous_landlord_name">Full Name</label>
                                            <input name="previous_landlord_name" value="" type="text" id="previous_landlord_name">
                                        </div>
                                        <div class="apt_field_block field_previous_landlord_phone">
                                            <label for="previous_landlord_phone">Phone</label>
                                            <input name="previous_landlord_phone" value="" type="tel" id="previous_landlord_phone">
                                        </div>
                                        <div class="apt_field_block field_previous_landlord_fax">
                                            <label for="previous_landlord_fax">Fax</label>
                                            <input name="previous_landlord_fax" value="" type="tel" id="previous_landlord_fax">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label>Tenancy Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_rent">
                                            <label for="previous_monthly_rent">Rent</label>
                                            <input value="0.00" name="previous_monthly_rent" type="number" id="previous_monthly_rent">
                                            <small>How much was your rent?</small>
                                        </div>
                                        <div class="apt_field_block field_rent_per_month">
                                            <label for="previous_rent_period">Frequency</label>
                                            <select name="previous_rent_period">
                                                                                                    <option selected="selected" value="0">Per Month</option>
                                                    <option  value="1">Per Year</option>
                                                
                                            </select>
                                            <small>How often did you pay your rent?</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_width_100" style="clear:both">
                                            <label for="previous_move_in_date">Move In Date</label>
                                            <select name="previous_move_in_date_month" id="previous_move_in_date_month">
                                                <option value="">Month</option>
                                                                                                                                                            <option  value="01">January</option>
                                                                                                                                                                                                                <option  value="02">February</option>
                                                                                                                                                                                                                <option  value="03">March</option>
                                                                                                                                                                                                                <option  value="04">April</option>
                                                                                                                                                                                                                <option  value="05">May</option>
                                                                                                                                                                                                                <option  value="06">June</option>
                                                                                                                                                                                                                <option  value="07">July</option>
                                                                                                                                                                                                                <option  value="08">August</option>
                                                                                                                                                                                                                <option  value="09">September</option>
                                                                                                                                                                                                                <option  value="10">October</option>
                                                                                                                                                                                                                <option  value="11">November</option>
                                                                                                                                                                                                                <option  value="12">December</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="previous_move_in_date">&nbsp;</label>
                                            <select name="previous_move_in_date_day" id="previous_move_in_date_day">
                                                <option value="">Day</option>
                                                                                                                                                            <option  value="01">1</option>
                                                                                                                                                                                                                <option  value="02">2</option>
                                                                                                                                                                                                                <option  value="03">3</option>
                                                                                                                                                                                                                <option  value="04">4</option>
                                                                                                                                                                                                                <option  value="05">5</option>
                                                                                                                                                                                                                <option  value="06">6</option>
                                                                                                                                                                                                                <option  value="07">7</option>
                                                                                                                                                                                                                <option  value="08">8</option>
                                                                                                                                                                                                                <option  value="09">9</option>
                                                                                                                                                                                                                <option  value="10">10</option>
                                                                                                                                                                                                                <option  value="11">11</option>
                                                                                                                                                                                                                <option  value="12">12</option>
                                                                                                                                                                                                                <option  value="13">13</option>
                                                                                                                                                                                                                <option  value="14">14</option>
                                                                                                                                                                                                                <option  value="15">15</option>
                                                                                                                                                                                                                <option  value="16">16</option>
                                                                                                                                                                                                                <option  value="17">17</option>
                                                                                                                                                                                                                <option  value="18">18</option>
                                                                                                                                                                                                                <option  value="19">19</option>
                                                                                                                                                                                                                <option  value="20">20</option>
                                                                                                                                                                                                                <option  value="21">21</option>
                                                                                                                                                                                                                <option  value="22">22</option>
                                                                                                                                                                                                                <option  value="23">23</option>
                                                                                                                                                                                                                <option  value="24">24</option>
                                                                                                                                                                                                                <option  value="25">25</option>
                                                                                                                                                                                                                <option  value="26">26</option>
                                                                                                                                                                                                                <option  value="27">27</option>
                                                                                                                                                                                                                <option  value="28">28</option>
                                                                                                                                                                                                                <option  value="29">29</option>
                                                                                                                                                                                                                <option  value="30">30</option>
                                                                                                                                                                                                                <option  value="31">31</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="previous_move_in_date">&nbsp;</label>
                                            <select id="previous_move_in_date_year" name="previous_move_in_date_year">
                                                <option value="">Year</option>
                                                                                                                                                                                                            <option  value="2022">2022</option>
                                                                                                                                                                                                                <option  value="2021">2021</option>
                                                                                                                                                                                                                <option  value="2020">2020</option>
                                                                                                                                                                                                                <option  value="2019">2019</option>
                                                                                                                                                                                                                <option  value="2018">2018</option>
                                                                                                                                                                                                                <option  value="2017">2017</option>
                                                                                                                                                                                                                <option  value="2016">2016</option>
                                                                                                                                                                                                                <option  value="2015">2015</option>
                                                                                                                                                                                                                <option  value="2014">2014</option>
                                                                                                                                                                                                                <option  value="2013">2013</option>
                                                                                                                                                                                                                <option  value="2012">2012</option>
                                                                                                                                                                                                                <option  value="2011">2011</option>
                                                                                                                                                                                                                <option  value="2010">2010</option>
                                                                                                                                                                                                                <option  value="2009">2009</option>
                                                                                                                                                                                                                <option  value="2008">2008</option>
                                                                                                                                                                                                                <option  value="2007">2007</option>
                                                                                                                                                                                                                <option  value="2006">2006</option>
                                                                                                                                                                                                                <option  value="2005">2005</option>
                                                                                                                                                                                                                <option  value="2004">2004</option>
                                                                                                                                                                                                                <option  value="2003">2003</option>
                                                                                                                                                                                                                <option  value="2002">2002</option>
                                                                                                                                                                                                                <option  value="2001">2001</option>
                                                                                                                                                                                                                <option  value="2000">2000</option>
                                                                                                                                                                                                                <option  value="1999">1999</option>
                                                                                                                                                                                                                <option  value="1998">1998</option>
                                                                                                                                                                                                                <option  value="1997">1997</option>
                                                                                                                                                                                                                <option  value="1996">1996</option>
                                                                                                                                                                                                                <option  value="1995">1995</option>
                                                                                                                                                                                                                <option  value="1994">1994</option>
                                                                                                                                                                                                                <option  value="1993">1993</option>
                                                                                                                                                                                                                <option  value="1992">1992</option>
                                                                                                                                                                                                                <option  value="1991">1991</option>
                                                                                                                                                                                                                <option  value="1990">1990</option>
                                                                                                                                                                                                                <option  value="1989">1989</option>
                                                                                                                                                                                                                <option  value="1988">1988</option>
                                                                                                                                                                                                                <option  value="1987">1987</option>
                                                                                                                                                                                                                <option  value="1986">1986</option>
                                                                                                                                                                                                                <option  value="1985">1985</option>
                                                                                                                                                                                                                <option  value="1984">1984</option>
                                                                                                                                                                                                                <option  value="1983">1983</option>
                                                                                                                                                                                                                <option  value="1982">1982</option>
                                                                                                                                                                                                                <option  value="1981">1981</option>
                                                                                                                                                                                                                <option  value="1980">1980</option>
                                                                                                                                                                                                                <option  value="1979">1979</option>
                                                                                                                                                                                                                <option  value="1978">1978</option>
                                                                                                                                                                                                                <option  value="1977">1977</option>
                                                                                                                                                                                                                <option  value="1976">1976</option>
                                                                                                                                                                                                                <option  value="1975">1975</option>
                                                                                                                                                                                                                <option  value="1974">1974</option>
                                                                                                                                                                                                                <option  value="1973">1973</option>
                                                                                                                                                                                                                <option  value="1972">1972</option>
                                                                                                                                                                                                                <option  value="1971">1971</option>
                                                                                                                                                                                                                <option  value="1970">1970</option>
                                                                                                                                                                                                                <option  value="1969">1969</option>
                                                                                                                                                                                                                <option  value="1968">1968</option>
                                                                                                                                                                                                                <option  value="1967">1967</option>
                                                                                                                                                                                                                <option  value="1966">1966</option>
                                                                                                                                                                                                                <option  value="1965">1965</option>
                                                                                                                                                                                                                <option  value="1964">1964</option>
                                                                                                                                                                                                                <option  value="1963">1963</option>
                                                                                                                                                                                                                <option  value="1962">1962</option>
                                                                                                                                                                                                                <option  value="1961">1961</option>
                                                                                                                                                                                                                <option  value="1960">1960</option>
                                                                                                                                                                                                                <option  value="1959">1959</option>
                                                                                                                                                                                                                <option  value="1958">1958</option>
                                                                                                                                                                                                                <option  value="1957">1957</option>
                                                                                                                                                                                                                <option  value="1956">1956</option>
                                                                                                                                                                                                                <option  value="1955">1955</option>
                                                                                                                                                                                                                <option  value="1954">1954</option>
                                                                                                                                                                                                                <option  value="1953">1953</option>
                                                                                                                                                                                                                <option  value="1952">1952</option>
                                                                                                                                                                                                                <option  value="1951">1951</option>
                                                                                                                                                                                                                <option  value="1950">1950</option>
                                                                                                                                                                                                                <option  value="1949">1949</option>
                                                                                                                                                                                                                <option  value="1948">1948</option>
                                                                                                                                                                                                                <option  value="1947">1947</option>
                                                                                                                                                                                                                <option  value="1946">1946</option>
                                                                                                                                                                                                                <option  value="1945">1945</option>
                                                                                                                                                                                                                <option  value="1944">1944</option>
                                                                                                                                                                                                                <option  value="1943">1943</option>
                                                                                                                                                                                                                <option  value="1942">1942</option>
                                                                                                                                                                                                                <option  value="1941">1941</option>
                                                                                                                                                                                                                <option  value="1940">1940</option>
                                                                                                                                                                                                                <option  value="1939">1939</option>
                                                                                                                                                                                                                <option  value="1938">1938</option>
                                                                                                                                                                                                                <option  value="1937">1937</option>
                                                                                                                                                                                                                <option  value="1936">1936</option>
                                                                                                                                                                                                                <option  value="1935">1935</option>
                                                                                                                                                                                                                <option  value="1934">1934</option>
                                                                                                                                                                                                                <option  value="1933">1933</option>
                                                                                                                                                                                                                <option  value="1932">1932</option>
                                                                                                                                                                                                                <option  value="1931">1931</option>
                                                                                                                                                                                                                <option  value="1930">1930</option>
                                                                                                                                                                                                                <option  value="1929">1929</option>
                                                                                                                                                                                                                <option  value="1928">1928</option>
                                                                                                                                                                                                                <option  value="1927">1927</option>
                                                                                                                                                                                                                <option  value="1926">1926</option>
                                                                                                                                                                                                                <option  value="1925">1925</option>
                                                                                                                                                                                                                <option  value="1924">1924</option>
                                                                                                                                                                                                                <option  value="1923">1923</option>
                                                                                                                                                                                                                <option  value="1922">1922</option>
                                                                                                                                                </select>
                                            <input value="0000-00-00" name="previous_move_in_date" type="hidden" id="previous_move_in_date" >
                                        </div>
                                    </div>
                                </div>
                                <div class="apt_field">
                                    <div class="apt_field_fieldx">

                                        <div class="apt_field_block field_width_100">
                                            <label for="previous_move_out_date">Move Out Date</label>
                                            <select name="previous_move_out_date_month" id="previous_move_out_date_month">
                                                <option value="">Month</option>
                                                                                                                                                            <option  value="01">January</option>
                                                                                                                                                                                                                <option  value="02">February</option>
                                                                                                                                                                                                                <option  value="03">March</option>
                                                                                                                                                                                                                <option  value="04">April</option>
                                                                                                                                                                                                                <option  value="05">May</option>
                                                                                                                                                                                                                <option  value="06">June</option>
                                                                                                                                                                                                                <option  value="07">July</option>
                                                                                                                                                                                                                <option  value="08">August</option>
                                                                                                                                                                                                                <option  value="09">September</option>
                                                                                                                                                                                                                <option  value="10">October</option>
                                                                                                                                                                                                                <option  value="11">November</option>
                                                                                                                                                                                                                <option  value="12">December</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="previous_move_out_date">&nbsp;</label>
                                            <select name="previous_move_out_date_day" id="previous_move_out_date_day">
                                                <option value="">Day</option>
                                                                                                                                                            <option  value="01">1</option>
                                                                                                                                                                                                                <option  value="02">2</option>
                                                                                                                                                                                                                <option  value="03">3</option>
                                                                                                                                                                                                                <option  value="04">4</option>
                                                                                                                                                                                                                <option  value="05">5</option>
                                                                                                                                                                                                                <option  value="06">6</option>
                                                                                                                                                                                                                <option  value="07">7</option>
                                                                                                                                                                                                                <option  value="08">8</option>
                                                                                                                                                                                                                <option  value="09">9</option>
                                                                                                                                                                                                                <option  value="10">10</option>
                                                                                                                                                                                                                <option  value="11">11</option>
                                                                                                                                                                                                                <option  value="12">12</option>
                                                                                                                                                                                                                <option  value="13">13</option>
                                                                                                                                                                                                                <option  value="14">14</option>
                                                                                                                                                                                                                <option  value="15">15</option>
                                                                                                                                                                                                                <option  value="16">16</option>
                                                                                                                                                                                                                <option  value="17">17</option>
                                                                                                                                                                                                                <option  value="18">18</option>
                                                                                                                                                                                                                <option  value="19">19</option>
                                                                                                                                                                                                                <option  value="20">20</option>
                                                                                                                                                                                                                <option  value="21">21</option>
                                                                                                                                                                                                                <option  value="22">22</option>
                                                                                                                                                                                                                <option  value="23">23</option>
                                                                                                                                                                                                                <option  value="24">24</option>
                                                                                                                                                                                                                <option  value="25">25</option>
                                                                                                                                                                                                                <option  value="26">26</option>
                                                                                                                                                                                                                <option  value="27">27</option>
                                                                                                                                                                                                                <option  value="28">28</option>
                                                                                                                                                                                                                <option  value="29">29</option>
                                                                                                                                                                                                                <option  value="30">30</option>
                                                                                                                                                                                                                <option  value="31">31</option>
                                                                                                                                                </select>
                                        </div>
                                        <div class="apt_field_block field_width_70">
                                            <label for="previous_move_out_date">&nbsp;</label>
                                            <select id="previous_move_out_date_year" name="previous_move_out_date_year">
                                                <option value="">Year</option>
                                                                                                                                                                                                            <option  value="2022">2022</option>
                                                                                                                                                                                                                <option  value="2021">2021</option>
                                                                                                                                                                                                                <option  value="2020">2020</option>
                                                                                                                                                                                                                <option  value="2019">2019</option>
                                                                                                                                                                                                                <option  value="2018">2018</option>
                                                                                                                                                                                                                <option  value="2017">2017</option>
                                                                                                                                                                                                                <option  value="2016">2016</option>
                                                                                                                                                                                                                <option  value="2015">2015</option>
                                                                                                                                                                                                                <option  value="2014">2014</option>
                                                                                                                                                                                                                <option  value="2013">2013</option>
                                                                                                                                                                                                                <option  value="2012">2012</option>
                                                                                                                                                                                                                <option  value="2011">2011</option>
                                                                                                                                                                                                                <option  value="2010">2010</option>
                                                                                                                                                                                                                <option  value="2009">2009</option>
                                                                                                                                                                                                                <option  value="2008">2008</option>
                                                                                                                                                                                                                <option  value="2007">2007</option>
                                                                                                                                                                                                                <option  value="2006">2006</option>
                                                                                                                                                                                                                <option  value="2005">2005</option>
                                                                                                                                                                                                                <option  value="2004">2004</option>
                                                                                                                                                                                                                <option  value="2003">2003</option>
                                                                                                                                                                                                                <option  value="2002">2002</option>
                                                                                                                                                                                                                <option  value="2001">2001</option>
                                                                                                                                                                                                                <option  value="2000">2000</option>
                                                                                                                                                                                                                <option  value="1999">1999</option>
                                                                                                                                                                                                                <option  value="1998">1998</option>
                                                                                                                                                                                                                <option  value="1997">1997</option>
                                                                                                                                                                                                                <option  value="1996">1996</option>
                                                                                                                                                                                                                <option  value="1995">1995</option>
                                                                                                                                                                                                                <option  value="1994">1994</option>
                                                                                                                                                                                                                <option  value="1993">1993</option>
                                                                                                                                                                                                                <option  value="1992">1992</option>
                                                                                                                                                                                                                <option  value="1991">1991</option>
                                                                                                                                                                                                                <option  value="1990">1990</option>
                                                                                                                                                                                                                <option  value="1989">1989</option>
                                                                                                                                                                                                                <option  value="1988">1988</option>
                                                                                                                                                                                                                <option  value="1987">1987</option>
                                                                                                                                                                                                                <option  value="1986">1986</option>
                                                                                                                                                                                                                <option  value="1985">1985</option>
                                                                                                                                                                                                                <option  value="1984">1984</option>
                                                                                                                                                                                                                <option  value="1983">1983</option>
                                                                                                                                                                                                                <option  value="1982">1982</option>
                                                                                                                                                                                                                <option  value="1981">1981</option>
                                                                                                                                                                                                                <option  value="1980">1980</option>
                                                                                                                                                                                                                <option  value="1979">1979</option>
                                                                                                                                                                                                                <option  value="1978">1978</option>
                                                                                                                                                                                                                <option  value="1977">1977</option>
                                                                                                                                                                                                                <option  value="1976">1976</option>
                                                                                                                                                                                                                <option  value="1975">1975</option>
                                                                                                                                                                                                                <option  value="1974">1974</option>
                                                                                                                                                                                                                <option  value="1973">1973</option>
                                                                                                                                                                                                                <option  value="1972">1972</option>
                                                                                                                                                                                                                <option  value="1971">1971</option>
                                                                                                                                                                                                                <option  value="1970">1970</option>
                                                                                                                                                                                                                <option  value="1969">1969</option>
                                                                                                                                                                                                                <option  value="1968">1968</option>
                                                                                                                                                                                                                <option  value="1967">1967</option>
                                                                                                                                                                                                                <option  value="1966">1966</option>
                                                                                                                                                                                                                <option  value="1965">1965</option>
                                                                                                                                                                                                                <option  value="1964">1964</option>
                                                                                                                                                                                                                <option  value="1963">1963</option>
                                                                                                                                                                                                                <option  value="1962">1962</option>
                                                                                                                                                                                                                <option  value="1961">1961</option>
                                                                                                                                                                                                                <option  value="1960">1960</option>
                                                                                                                                                                                                                <option  value="1959">1959</option>
                                                                                                                                                                                                                <option  value="1958">1958</option>
                                                                                                                                                                                                                <option  value="1957">1957</option>
                                                                                                                                                                                                                <option  value="1956">1956</option>
                                                                                                                                                                                                                <option  value="1955">1955</option>
                                                                                                                                                                                                                <option  value="1954">1954</option>
                                                                                                                                                                                                                <option  value="1953">1953</option>
                                                                                                                                                                                                                <option  value="1952">1952</option>
                                                                                                                                                                                                                <option  value="1951">1951</option>
                                                                                                                                                                                                                <option  value="1950">1950</option>
                                                                                                                                                                                                                <option  value="1949">1949</option>
                                                                                                                                                                                                                <option  value="1948">1948</option>
                                                                                                                                                                                                                <option  value="1947">1947</option>
                                                                                                                                                                                                                <option  value="1946">1946</option>
                                                                                                                                                                                                                <option  value="1945">1945</option>
                                                                                                                                                                                                                <option  value="1944">1944</option>
                                                                                                                                                                                                                <option  value="1943">1943</option>
                                                                                                                                                                                                                <option  value="1942">1942</option>
                                                                                                                                                                                                                <option  value="1941">1941</option>
                                                                                                                                                                                                                <option  value="1940">1940</option>
                                                                                                                                                                                                                <option  value="1939">1939</option>
                                                                                                                                                                                                                <option  value="1938">1938</option>
                                                                                                                                                                                                                <option  value="1937">1937</option>
                                                                                                                                                                                                                <option  value="1936">1936</option>
                                                                                                                                                                                                                <option  value="1935">1935</option>
                                                                                                                                                                                                                <option  value="1934">1934</option>
                                                                                                                                                                                                                <option  value="1933">1933</option>
                                                                                                                                                                                                                <option  value="1932">1932</option>
                                                                                                                                                                                                                <option  value="1931">1931</option>
                                                                                                                                                                                                                <option  value="1930">1930</option>
                                                                                                                                                                                                                <option  value="1929">1929</option>
                                                                                                                                                                                                                <option  value="1928">1928</option>
                                                                                                                                                                                                                <option  value="1927">1927</option>
                                                                                                                                                                                                                <option  value="1926">1926</option>
                                                                                                                                                                                                                <option  value="1925">1925</option>
                                                                                                                                                                                                                <option  value="1924">1924</option>
                                                                                                                                                                                                                <option  value="1923">1923</option>
                                                                                                                                                                                                                <option  value="1922">1922</option>
                                                                                                                                                </select>
                                            <input value="0000-00-00" name="previous_move_out_date" type="hidden" id="previous_move_out_date" >
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label>Additional Information</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_reason_for_leaving field_width_445">
                                            <label for="previous_reason_for_leaving">Reason for Leaving Previous Address</label>
                                            <textarea style="width:100%;height:100px;" id="previous_reason_for_leaving" name="previous_reason_for_leaving"></textarea>
                                            <small>Please list your reasons for leaving your previous address.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="apt_section" data-menu-trigger="5">
                                <h2><img src="/apt_apply_assets/images/icons/user-blue.png" alt="Personal Information">Additional Questions</h2>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="employment_status">Employment</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employment_status">
                                            <label for="employment_status">Current Status</label>
                                            <select name="employment_status">
                                                                                                    <option selected="selected" value="1">Employed</option>
                                                    <option  value="2">Self Employed</option>
                                                                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="employer_name">Employment Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_landlord_name">
                                            <label for="employer_name">Employer Name</label>
                                            <input name="employer_name" value="" type="text" id="employer_name">
                                        </div>
                                        <div class="apt_field_block field_previous_landlord_phone">
                                            <label for="employer_phone">Employer Phone</label>
                                            <input name="employer_phone" value="" type="tel" id="employer_phone">
                                        </div>
                                        <div class="apt_field_block field_employment_length">
                                            <label for="employment_length">Employment Length</label>
                                            <input name="employment_length" value="" type="text" id="employment_length">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employer_address field_width_445">
                                            <label for="employer_address">Employer Address</label>
                                            <input name="employer_address"  value="" type="text" id="employer_address">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">

                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employment_status">
                                            <label for="occupation">Occupation/Source of Income</label>
                                            <input name="occupation" value="" type="text" id="occupation">
                                        </div>
                                    </div>

                                    <div class="apt_field_label">
                                        <label for="employer_name">Former Employment Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_landlord_name">
                                            <label for="former_employer_name">Employer Name</label>
                                            <input name="former_employer_name" value="" type="text" id="former_employer_name">
                                        </div>
                                        <div class="apt_field_block field_previous_landlord_phone">
                                            <label for="former_employer_phone">Employer Phone</label>
                                            <input name="former_employer_phone" value="" type="tel" id="former_employer_phone">
                                        </div>
                                        <div class="apt_field_block field_employment_length">
                                            <label for="former_employment_length">Employment Length</label>
                                            <input name="former_employment_length" value="" type="text" id="former_employment_length">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employer_address field_width_445">
                                            <label for="former_employer_address">Employer Address</label>
                                            <input name="former_employer_address"  value="" type="text" id="former_employer_address">
                                        </div>
                                    </div>

                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employment_status">
                                            <label for="employer_type_of_business">Type of Business</label>
                                            <input name="employer_type_of_business" value="" type="text" id="employer_type_of_business">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="attorneys_name">Attorney&#039;s Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_attorneys_name">
                                            <label for="attorneys_name">Name</label>
                                            <input name="attorneys_name" value="" type="text" id="attorneys_name">
                                        </div>
                                        <div class="apt_field_block field_attorneys_phone">
                                            <label for="attorneys_phone">Phone</label>
                                            <input name="attorneys_phone" value="" type="tel" id="attorneys_phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="co_tennants">Co-Tenants</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_width_445">
                                            <label for="co_tennants">Names of Co-Tenants</label>
                                            <textarea style="width:100%;height:100px" name="co_tennants" type="text" id="co_tennants"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="accountants_name">Personal Reference</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_previous_landlord_name">
                                            <label for="personal_reference_name">Full Name</label>
                                            <input name="personal_reference_name" value="" type="text" id="personal_reference_name">
                                        </div>
                                        <div class="apt_field_block field_previous_landlord_phone">
                                            <label for="personal_reference_phone">Phone</label>
                                            <input name="personal_reference_phone" value="" type="tel" id="personal_reference_phone">
                                        </div>
                                    </div>

                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_employer_address field_width_445">
                                            <label for="personal_reference_address">Address</label>
                                            <input name="personal_reference_address"  value="" type="text" id="personal_reference_address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="apt_section" data-menu-trigger="6">
                                <h2><img src="/apt_apply_assets/images/icons/user-blue.png" alt="Personal Information">Financial Details</h2>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="bank_address">Financial</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_bank_address field_width_445">
                                            <label for="bank_address">Bank Address</label>
                                            <input name="bank_address" value="" type="text" id="bank_address">
                                            <small>Your banks full address</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_bank_account_balance">
                                            <label for="bank_account_balance">Checking Account Balance </label>
                                            <input name="bank_account_balance" value="0.00" type="text" id="bank_account_balance">
                                            <small>Your Checking Account Balance in $</small>
                                        </div>
                                        <div class="apt_field_block field_bank_account_balance">
                                            <label for="bank_account_number">Checking Account Number</label>
                                            <input name="bank_account_number" value="" type="text" id="bank_account_number">
                                            <small>Your checking account number</small>
                                        </div>
                                        <div class="apt_field_block field_additional_assets_income">
                                            <label for="additional_assets_income">Additional Income/Assets</label>
                                            <input name="additional_assets_income" value="" type="text" id="additional_assets_income">
                                            <small>Please list any additional income/assets</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_savings_bank_account_balance">
                                            <label for="savings_bank_account_balance">Savings Account Balance</label>
                                            <input name="savings_bank_account_balance" value="0.00" type="text" id="savings_bank_account_balance">
                                            <small>Your Saving Account Balance in $</small>
                                        </div>
                                        <div class="apt_field_block field_bank_account_balance">
                                            <label for="savings_bank_account_number">Savings Account Number</label>
                                            <input name="savings_bank_account_number" value="" type="text" id="savings_bank_account_number">
                                            <small>Your savings account number</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="apt_field">
                                    <div class="apt_field_label">
                                        <label for="accountants_name">Accountant&#039;s Details</label>
                                    </div>
                                    <div class="apt_field_fieldx">
                                        <div class="apt_field_block field_accountants_name">
                                            <label for="accountants_name">Name</label>
                                            <input name="accountants_name" value="" type="text" id="accountants_name">
                                        </div>
                                        <div class="apt_field_block field_accountants_phone">
                                            <label for="accountants_phone">Phone</label>
                                            <input name="accountants_phone" value="" type="tel" id="accountants_phone">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="apt_section document_section" data-menu-trigger="7">
                                <h2><img src="/apt_apply_assets/images/icons/user-blue.png" alt="Personal Information">Upload Documents</h2>
                                <p class="sub_header_intro">Please note we will only accept 5 PDF documents, max 10MB, for relevant documents (i.e. Employment forms, guarantor forms, other supporting documentation).</p>
                                <p class="doc_error"></p>
                                <div class="fallback">
                                    <input name="apt_files[]" id="apt_files" type="file" multiple>
                                </div>
								
                            </div>

                            <div class="apt_section payment_information " id="payment_section" data-menu-trigger="8" data-header_title="Payment Information" data-header_text="Fields a red border are required. By continuing, you are providing acceptance and authorization to AptApply, Inc. to obtain information from your personal credit file." >
                                <h2><img src="/apt_apply_assets/images/icons/payment.png" alt="Payment Information">Payment Information</h2>
                                <p class="sub_header_intro">Fields with a red border are required</p>
                                <h3>Total Cost : $<span class="total_cost"></span></h3>

                                <p>By continuing, you are providing acceptance to Transunion Interactive, Inc. authorizing Transunion Interactive, Inc. to obtain information from your personal credit profile. You authorize Transunion Interactive, Inc. to obtain such information solely to confirm your identity and transmit this information as part of this application.</p>

                              </div>

                            <div class="apt_section" data-menu-trigger="9" data-action-form-save="true">
                                <h2>Complete</h2>
                                <p>Thank you for your payment. We have successfull processed the transaction.</p>
                                <p>Your order reference is : <strong>12342343242342</strong></p>
                            </div>

                                                            <a href="#"   class="back_link btn btn-primary" id="back_link">Back</a>
                                <button type="button" class="btn btn-primary" id="save_and_continue">Save and Continue</button>
                            
                        
                        <input name="_token" type="hidden" value="uf4JRrTfyMxBPuTp08a9bqgLFD10ZUcENMiN5JDQ">
                        <input name="property_id" id="property_id" type="hidden" value="">
                        <input name="agent_id" id="agent_id" type="hidden" value="">
                        <input name="brokerage_id" id="brokerage_id" type="hidden" value="">
                        <input name="property_direct" type="hidden" value="">
                        <input name="agent_direct" type="hidden" value="">
                        <input type="hidden" name="payment_type" id="payment_type" value="card">
                        <input type="hidden" name="applicationReference" id="applicationReference" value="">

                                            </div>
                </form>
            </div>
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

    <section id="forgot_password">
        <div class="forgot_password_inner">
            <h2>Trouble logging in?</h2>
            <p>Simply type your email address used to register with us and we will email you a password reset link.</p>
            <label>Email Address</label>
            <input type="email" name="forgot_password_email" id="forgot_password_email">
            <button class="btn button" id="forgot_password_button">Reset Password</button>


            <a href="#" class="forgotten_password_trigger_dismiss">dismiss</a>
        </div>
    </section>
	
	
			<br />
    
@endsection


@section('js')



@endsection