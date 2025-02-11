<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");

?>



<?$APPLICATION->IncludeComponent(
	"service:service.edit",
	".default",
    [
        "IBLOCK_ID" => 5, 
    ]
);?>





<!-- Portfolio Grid--> 
<section class="page-section bg-light" id="portfolio">
<div class="container">
	<div class="text-center">
		<h2 class="section-heading text-uppercase">Новости</h2>
		<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
	</div>
	<div class="row">
		 <?$APPLICATION->IncludeComponent(
			"parse:parse.news",
			".default",
		Array()
		);?>
	</div>
</div>


 </section>
<!-- Team-->  
 <?$APPLICATION->IncludeComponent(
	"team:our.team",
	".default",
	[
        "IBLOCK_ID" => 6, 
    ]
);?>
<!-- Clients-->
<div class="py-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-3 col-sm-6 my-3">
 <a href="#!"><img src="/local/templates/startbootstrap-agency-gh-pages/assets/img/logos/microsoft.svg" class="img-fluid img-brand d-block mx-auto" alt="..." aria-label="Microsoft Logo"></a>
			</div>
			<div class="col-md-3 col-sm-6 my-3">
 <a href="#!"><img src="/local/templates/startbootstrap-agency-gh-pages/assets/img/logos/google.svg" class="img-fluid img-brand d-block mx-auto" alt="..." aria-label="Google Logo"></a>
			</div>
			<div class="col-md-3 col-sm-6 my-3">
 <a href="#!"><img src="/local/templates/startbootstrap-agency-gh-pages/assets/img/logos/facebook.svg" class="img-fluid img-brand d-block mx-auto" alt="..." aria-label="Facebook Logo"></a>
			</div>
			<div class="col-md-3 col-sm-6 my-3">
 <a href="#!"><img src="/local/templates/startbootstrap-agency-gh-pages/assets/img/logos/ibm.svg" class="img-fluid img-brand d-block mx-auto" alt="..." aria-label="IBM Logo"></a>
			</div>
		</div>
	</div>
</div>
 

 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>