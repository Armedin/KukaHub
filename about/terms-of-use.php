<?php
  include('../include/init_constantFunctions.php');
?>

<html>
  <head>
    <meta name="description" content="Kuka Academy's terms of use, property right provisions
    and alterations." />
  <?php getHeader("Terms of Use | Kuka Academy"); ?>

  </head>
<body>

<?php
  init_pageHeader();
?>



  <section class="content termsOfUsePage">
		<div class="termsPage_oexf98v3a_wrapper">
		<div class="termsPage_oexf98v3a_Header">
			<h1>Terms and Conditions</h1>
			<small>Last Updated On: 01/07/2018</small>
		</div>
		<hr class="termsPage_oexf98v3a_Header_divider">
		<div class="row-col">
			<div class="col-md-8">

				<div class="terms_oexf98v3a_card_outer">
					<div class="terms_oexf98v3a_card" id="introduction">
						<div class="terms_oexf98v3a_card_Heading">
							<h3>1. Introduction</h3>
						</div>
						<div class="terms_oexf98v3a_card_content">
								<span>Welcome, and thank you for using Kuka Academy! Please read our <strong>Terms and Conditions</strong> in great details in order to have permission to make use of our website services! Thank you for your understanding.</span>
						</div>
					</div>
				</div>


				<div class="terms_oexf98v3a_card_outer">
					<div class="terms_oexf98v3a_card" id="property_rights">
						<div class="terms_oexf98v3a_card_Heading">
							<h3>2. Property Rights Provision </h3>
						</div>
						<div class="terms_oexf98v3a_card_content">
								<span>The site and its original content, features, and functionality are owned by Kuka Academy and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws. </span>
						</div>
					</div>
				</div>

				<div class="terms_oexf98v3a_card_outer">
					<div class="terms_oexf98v3a_card" id="informational_purposes">
						<div class="terms_oexf98v3a_card_Heading">
							<h3>3. Property Rights Provision </h3>
						</div>
						<div class="terms_oexf98v3a_card_content">
								<span>This site and its components are offered for informational purposes only; this site shall not be responsible or liable for the accuracy, usefulness or availability of any information transmitted or made available via the site, and shall not be responsible or liable for any error or omissions in that information. </span>
						</div>
					</div>
				</div>

				<div class="terms_oexf98v3a_card_outer">
					<div class="terms_oexf98v3a_card" id="third_party">
						<div class="terms_oexf98v3a_card_Heading">
							<h3>4. Third Party Access </h3>
						</div>
						<div class="terms_oexf98v3a_card_content">
								<span>It's important to know that we currently <strong>do not</strong> share your data with any third-parties companies without you permission! However, in the future we will share your data <strong>(with your permission)</strong> in order to provide better services for you.</span>
						</div>
					</div>
				</div>

				<div class="terms_oexf98v3a_card_outer">
					<div class="terms_oexf98v3a_card" id="alterations">
						<div class="terms_oexf98v3a_card_Heading">
							<h3>5. Alterations </h3>
						</div>
						<div class="terms_oexf98v3a_card_content">
								<span>Kuka Academy reserves the right to change these conditions from time to time as it sees fit and your continued use of the site will signify your acceptance of any adjustment to these terms. If there are any changes to our privacy policy, we will announce you that these changes have been made. If there are any changes in how we use our site customers' Personally Identifiable Information, notification by email will be made to those affected by the change. You are therefore advised to re-read this statement on a regular basis."</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 terms_oexf98v3a_flexForAbsolute">
				<div class="terms_oexf98v3a_navigationContent">
					<h5>Table of Content</h5>
					<ul class="terms_oexf98v3a_navigation_linksCon">
						<li><a href="#introduction">1. Introduction</a></li>
						<li><a href="#property_rights">2. Property Rights</a></li>
						<li><a href="#informational_purposes">3. Informational Purposes</a></li>
						<li><a href="#third_party">4. Third Party</a></li>
						<li><a href="#alterations">5. Alterations</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- Wrapper ends -->
    <?php include('../include/footer.php') ?>
</section>

  <?php
  init_login_page();
  init_pageSidebar();
  getJs_Files();
  ?>

  <script>

  $(document).ready(function() {
		$('.terms_oexf98v3a_navigation_linksCon a[href*=\\#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable

				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top-60
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});

				return false;

		});

    $(".slim-scroller").each(function(){
    		$(this).slimScroll({
    			height:$(this).attr("data-height")||"100%",
    			color:$(this).attr("data-color")||"#71808f",
    			railOpacity:"0.9",
    			size:"4px"
    			})
    	});
});

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();

		// Assign active class to nav links while scolling
		$('.terms_oexf98v3a_card_outer').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.terms_oexf98v3a_navigation_linksCon a.active').removeClass('active');
						$('.terms_oexf98v3a_navigation_linksCon a').eq(i).addClass('active');
			}
	});

		//HARD CODED -___-
		var seperationLine = $("hr").offset();
		var pdTop = 60 + 16;
		var pdBot = 40+18;
		var footer = $(".main_oexfFooter").offset();
		var heightNav = ($(".terms_oexf98v3a_navigationContent").outerHeight());
		if((scrollDistance)>(footer.top- heightNav - 230)){
			$('.terms_oexf98v3a_navigationContent').css('position','absolute').css('top',footer.top - heightNav-370).css('width','300');
		}
		else if(scrollDistance > seperationLine.top-60){
			$('.terms_oexf98v3a_navigationContent').css('position','fixed').css('top',pdTop).css('width','300').css('bottom','');
		}
		else{
			$('.terms_oexf98v3a_navigationContent').css('position','').css('top','').css('width','').css('bottom','');
	}

}).scroll();
</script>

</body>
</html>
