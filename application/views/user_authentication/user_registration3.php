<script type="text/javascript">
    function confirmReferral(obj){
        if(!obj.referral_id.value){
            return confirm("You did not enter any referral code. If you like to continue Press Ok")
        }

        return true;
    }
</script>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Souktrain- Login</title>
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="<?php print('assets/landing/assets/img/favicon30f4.png?v=3') ;?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/preload.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/plugins.min.css') ;?>">
    <link rel="stylesheet" href=" <?php print base_url('assets/landing/assets/css/style.light-blue-500.min.css') ;?>">
    <link rel="stylesheet" href="<?php print base_url('assets/landing/assets/css/width-boxed.min.css" id="ms-boxed" disabled="">');?>">
    <!--[if lt IE 9]>

    <script src="<?php print base_url('assets/landing/assets/js/html5shiv.min.js')?>" ></script>
    <script src="<?php print base_url('assets/landing/assets/js/respond.min.js')?> "></script>
    <![endif]-->
</head>
<body>


<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<div class="container-fluid" >
    <div style="margin-top: 50px"></div>
    <div class="row ">

        <div class="col-sm-offset-3 col-sm-6 col-xs-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <img src="<?php print base_url('assets/images/sk-logo.jpg'); ?>" width="32px" /> &nbsp;ST-Registration

                    </h3>
                </div>
                <div class="panel-body">
                    <p class="alert alert-info">
                        Please Read The Policy Document Of Souktrain Before Registering.Thank You.
                    </p>
                    <?php  echo form_open('user_authentication/registeroauth', array('onsubmit' => 'return confirmReferral(this)'));?>

                    <?php if (isset($message)) { ?>
                        <CENTER><h5><?php echo $message ?></h5></CENTER><br>
                    <?php } ?>
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label>Referral Code</label>
                            <input type="text" class="form-control"  name="referral_id"
                                   placeholder="referral code"  value="<?php  if (isset($referral_id))echo $referral_id ;?>">
                        </div>
                        <div class="col-md-6">
                            <label class="" >Service Center</label>
                            <div class="form-group">
                                <?php echo '<div class="text text-danger">'. form_error('service_center_id').'</div>'; ?>
                                <input type="text" class="form-control" name="service_center_id"  value="" autocomplete="false" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" required class="form-control" name="first_name" placeholder="First Name"
                                       value="<?php echo set_value('first_name')?>"  >
                            </div>
                            <?php echo '<div class="text text-danger">'. form_error('first_name').'</div>'; ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" required class="form-control" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name')?>"  />
                            </div>
                            <?php echo '<div class="text text-danger">'. form_error('last_name').'</div>'; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone number</label>
                                <input type="text" size="13" class="form-control" name="phone_no" value="<?php echo set_value('phone_no')?>"  autocomplete="off" placeholder="phone no08067874533" >
                            </div>
                            <div class="text text-danger"><?php echo form_error('phone_no'); ?></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="text text-danger"> <?php echo form_error('gender');  ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" required name="email" placeholder="Email" value="<?php echo set_value('email')?>"  />
                            </div>
                            <?php echo  '<div class="text text-danger">'. form_error('email').'</div>'; ?>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" required name="username" value="<?php echo set_value('username')?>" placeholder="username" />
                            </div>
                            <?php echo '<div class="text text-danger">'. form_error('username').'</div>'; ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" required class="form-control" name="password" placeholder="Password"  autocomplete="off" /><br>
                            </div>
                            <?php echo '<div class="text text-danger">'. form_error('password').'</div>'; ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" required class="form-control" name="confirm_password" placeholder="Confirm Password"  autocomplete="off" /><br>
                                <div class="text text-danger"> <?php echo  form_error('confirm_password'); ?></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input class="pull-left" type="checkbox" name="agree" id="agree" value="1" required> &nbsp;I agree.
                            </label>
                            <a class="pull-right" data-toggle="modal" data-target="#myModal" href="<?php echo base_url()?>home/readpolicy"  class="to_register">Read Agreement </a >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Register' ,'class' =>'btn btn-primary btn-sm') ); ?>&nbsp;
                        </div>
                        <div class="col-md-4">
                            <button type="Reset" value ="Reset"  class="btn btn-reset">Reset</button>

                        </div>
                        <div class="col-md-4">
                            <a  href="oauth" class="to_register pull-right btn btn-info">Log in </a>
                        </div>

                    </div>
                    <?php echo form_close(); ?><br/>
                </div>
                <div class="panel-footer">
                    <div class="footer"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">



    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Policy Agreement</h4>
                </div>
                <div class="modal-body">
                    <h2>POLICY DOCUMENT</h2>
                    <h3>INTRODUCTION</h3>
                    <ol>
                        <li><p>Thank you for taking the time to read and study this Policy Manual. This manual is
                                intended to outline legally binding policies, procedures and terms and conditions that must be
                                followed to:</p>
                            <ol>
                                <li>establish a SOUKTRAIN Business Systems Ltd. affiliation;</li>
                                <li>order, purchase, sell and return of products;</li>
                                <li>recruit new SOUKTRAIN Business Systems Ltd affiliates;</li>
                                <li>earn income from sales of services and products and/ or from recruiting of new affiliates;</li>
                                <li> manage your SOUKTRAIN Business Systems affiliation; and </li>
                                <li> maintain your affiliation in good standing with SOUKTRAIN Business Systems Ltd.</li>
                            </ol>


                        </li>
                        <li><h3>SOUKTRAIN Business Systems Ltd.</h3>
                            <p>
                                SOUKTRAIN Business Systems Ltd hereafter referred to as SOUKTRAIN, trains, coaches
                                and mentors individuals, groups and organisations. It also markets personal wears, health
                                products, electronic items and luxury products through independent distributors hereafter
                                referred to as Affiliates or IBOs [Independent Business Owners] in a network marketing
                                structure (affiliation). SOUKTRAIN operates through subsidiaries in many countries
                                throughout the world. Sales organizations can be built with affiliates in any country in which
                                SOUKTRAIN has formally opened for business. SOUKTRAIN makes its services and
                                products available to the general public as well as the affiliates at a price determined by the
                                company at any given point in time. SOUKTRAIN can alter the prices of its services and
                                products without any prior consultation with its affiliates.
                            </p>
                        </li>
                        <li>
                            <h3> AFFILIATES CODE OF ETHICS</h3>
                            <p>
                                In pursuing the success of their SOUKTRAIN business, SOUKTRAIN independent affiliates shall
                                safeguard and protect the reputation of SOUKTRAIN and its products and services. Affiliates
                                shall refrain from all conduct which might be harmful to the reputation of SOUKTRAIN and its
                                products and services or will damage the ability of others to participate in the SOUKTRAIN
                                business opportunity. SOUKTRAIN affiliates will be professional in the approach to their
                                business, and will treat other affiliates, customers, clients and SOUKTRAIN employees
                                respectfully and courteously in their interaction. Affiliates will strictly avoid all deceptive,
                                misleading, discourteous, unethical, and immoral conducts. SOUKTRAIN affiliates will respect
                                the honest efforts of fellow affiliates and will not engage in predatory or unethical recruitment
                                practices.
                            </p>
                        </li>
                        <li>
                            <P>SOUKTRAIN respects the business activities of all legitimate companies and strictly
                                discourages any SOUKTRAIN affiliate from unfairly representing any competing opportunity.
                                SOUKTRAIN believes that the ultimate success of all SOUKTRAIN affiliates depends on its
                                ability to bring important products, services and opportunities to the market. This will be done in
                                a positive and honourable way.
                            </P>
                        </li>
                        <li><h3> CIRCUMVENTION OF POLICY</h3>
                            <p>SOUKTRAIN policies and procedures are designed to protect affiliates and the company from the
                                adverse consequences of their violation. Affiliates who consciously or unconsciously circumvent
                                policies and procedures to accomplish indirectly what is prohibited directly will be disciplined as
                                if the applicable policy or rule had been broken directly. At its sole discretion, SOUKTRAIN have
                                the right to adjust and/ or out rightly cancel bonuses, commissions and/or the placement or status
                                of an affiliate or of those in the affiliate‟s Successline who were affected. None of the policies
                                and procedures herein is intended to create third-party rights in any affiliation regarding the
                                conduct of any other affiliate.
                            </p>
                        </li>
                        <li><h3>
                                AMMENDING SOUKTRAIN POLICIES
                            </h3>
                            <p>SOUKTRAIN reserves the right to amend the Distributor [affiliates] Agreement, this Policy
                                manual, prices of products and services, bonuses, commissions and any other monetary incomes
                                payable to affiliates, company literature and/or the compensation plan at any time without prior
                                notice. Any such changes will be communicated to affiliates by posting them on SOUKTRAIN‟s
                                website and/or sending written communication mailed to all affiliates who are receiving bonuses
                                and commissions from SOUKTRAIN via e-mails. These amendments are binding on all affiliates
                                at the time of their publication by SOUKTRAIN on the company‟s website or otherwise
                                communicated to active affiliates, whichever is earlier. In the event of any conflict between the
                                amendment and the terms of the Distributor Agreement, the Policy Manual, or any other
                                document, the amendment will control.
                            </p>
                        </li>
                        <li><p>
                                Affiliates must be of legal age in the state in which they reside. Affiliates must pay the
                                non-refundable annual coaching/ mentoring minimum fee of N16, 000.00 and will receive a free
                                online back-office on the company‟s website upon signing up. SOUKTRAIN reserves the right to
                                terminate the affiliation of any affiliate whose conduct is deemed to be detrimental to the image
                                of the company and proper functioning of SOUKTRAIN business and its subsidiaries. All
                                restrictions imposed in terminated affiliations, including conflict of interest and confidentiality
                                requirements, will be imposed on an affiliate so terminated.
                            </p></li>
                        <li>
                            <p>
                                SOUKTRAIN reserves the right to reject any affiliate‟s application form and/ or agreement that is
                                incomplete or otherwise unacceptable or is not accompanied by proper legal identification.
                                Unacceptable affiliate agreement includes but is not limited to those that are inaccurate or
                                submitted in violation of SOUKTRAIN‟s ideals, these policies and procedures, any amendments
                                thereto, and any applicable law. So long as SOUKTRAIN follows procedures that are reasonable
                                in nature to detect submissions that are unacceptable, the affiliations are voidable by
                                SOUKTRAIN within one year of the discovery of the information and notification of the same is
                                provided to the affiliate.
                            </p>
                        </li>
                        <li><p>
                                Each affiliate must submit and maintain a correct mailing and shipping address that
                                accurately reflects where the affiliate resides and/or is doing business. Phone, fax, and/or cell
                                phone numbers, bank account numbers and names must also be kept accurate.
                                If the affiliate has failed to notify SOUKTRAIN of a change in address and SOUKTRAIN is
                                unable to deliver commissions, rebates, bonuses, or products to that affiliate as earned or
                                requested, the affiliate will be charged a N25, 000.00 administrative costs associated with
                                SOUKTRAIN‟s efforts to correct the error.
                                In the event that any commissions, bonuses and/ or products remain undeliverable for six months
                                after the product is ordered, or the commission or bonus is earned or entitlement to rebate occurs,
                                after a final effort to make contact by SOUKTRAIN, the outstanding funds remaining (after the
                                N25, 000.00 charge for administrative costs) shall be turned over to the respective state‟s
                                unclaimed property authorities when required to do so under the laws of that state. So long as the
                                failure to receive the products/ monies from SOUKTRAIN has arisen because of the failure of the
                                affiliate to maintain a correct address on file with SOUKTRAIN, any and all claims to
                                prejudgement interest on any amount not paid is waived by the affiliate.
                            </p></li>
                        <li><p>
                                SOUKTRAIN affiliates are independent students/ mentees/ distributors/ and or
                                contractors. For both taxation and legal purposes, they are not franchises, joint ventures, partners,
                                employees or agents of SOUKTRAIN. They are prohibited from stating or implying anything to
                                the contrary, either orally or in writing. An affiliate has no authority to bind SOUKTRAIN or
                                incur any obligation on behalf of SOUKTRAIN. SOUKTRAIN is not responsible for payment or
                                copayment of any independent affiliate‟s indebtedness or his or her employees‟ benefits.
                                Affiliates set their own hours and determine how to conduct their SOUKTRAIN business. They
                                are responsible for their own liability, health, automobile, disability, workers compensation and
                                all other insurance.
                                As independent contractors, affiliates will not be treated as franchises, partners, employees, or
                                agents by SOUKTRAIN.
                            </p></li>
                        <li><h2>
                                PURCHASE OF COMPANY’S PRODUCTS
                            </h2>
                            <p>Affiliates are to check and make sure that products are functioning, complete and in good
                                conditions before they leave the counter. Under no circumstances shall the company accept
                                liabilities or entertain complaints on inaccurate, incomplete, damaged, non-functioning,
                                malfunctioning, or loss of products or any parts thereof, after they must been accepted and taken
                                away from the counter.</p>
                        </li>
                        <li>
                            <p> Affiliates are to check and make sure that products are functioning, complete and in good
                                conditions before they leave the counter. Under no circumstances shall the company accept
                                liabilities or entertain complaints on inaccurate, incomplete, damaged, non-functioning,
                                malfunctioning, or loss of products or any parts thereof, after they must been accepted and taken
                                away from the counter.</p> </li>
                        </li>
                        <li><h3>CREDIT PURCHASE/ PROJECT FINANCING</h3>
                            <p>
                                To qualify for these considerations, an affiliate must be Platinum and above, and must have at
                                least 10 members at his/ her Gold successline level 1. He / she must have in his/ her e-wallet
                                25% or more of the price of the product(s) requested to be used as down payment. All
                                outstanding balances are deducted at source within 3 months and a maximum of 10 months
                                duration. The company determines the eligibility and extent of credit purchases that may be
                                given to affiliate at any point in time and its decision is final.

                            </p>
                        </li>
                        <li>
                            <h3> TERMINATION OF AFFILIATION</h3>
                            <p>
                                Where an affiliate is found to have directly or indirectly or by the use of third party, agents,
                                fellow affiliates or otherwise involved or be involving in conducts or behaviour that is contrary
                                to this policy or detrimental to the company, its services and products, such an affiliate shall be
                                terminated immediately and all rights, claims, privileges, entitlements, including pending
                                bonuses, commissions, fees, all monies pending payments, products pending delivery shall be
                                forfeited to the company forthwith. All ongoing services, including education, seminar
                                participation, medical services, tourism, children events, projects financing, etc. shall be
                                withdrawn immediately. Furthermore, such persons are forbidden to attend any company‟s
                                function, conduct themselves in any manner that may suggest, expressly or by implication, that
                                they are still affiliate of the company either to fellow affiliates or any member of the general
                                public. They are to return or destroyed all company‟s identification materials including ID cards,
                                name‟s tags, symbols, logos, etc. in their custo
                            </p>
                        </li>
                    </ol>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php print base_url('assets/landing/assets/js/plugins.min.js');?>"></script>
<script src="<?php print base_url('assets/landing/assets/js/app.min.js');?>"></script>
<script src="<?php print base_url('assets/landing/assets/js/configurator.min.js');?>"></script>
<script>
    (function(i, s, o, g, r, a, m)
    {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
            {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-90917746-2', 'auto');
    ga('send', 'pageview');
</script>
</body>

<!-- Mirrored from agmstudio.io/themes/material-style/2.0.3/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2018 07:30:46 GMT -->
</html>