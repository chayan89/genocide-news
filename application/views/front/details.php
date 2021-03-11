<section class="sec-padding section-light sec-m-margin-1">
	<div class="container">
		<h1 style="color: #fff; text-align: center; font-size: 25px; margin-bottom: 5px; line-height: 25px;">
			<?=(isset($category) && !empty($category))? $category[0]->name:ucwords($this->uri->segment(2))?> </h1>
		<h1 style="color: #f00; text-align: center;  font-size: 20px; margin-bottom: 10px; line-height: 25px;"> Stage: 1
			of Genocide </h1>
		<p style="text-align: center; color: #fff;"> <?=isset($sub_title)? $sub_title:''?> </p>
	</div>
</section>
<style>
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
  opacity: 1;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<div class="clearfix"></div>

<!-- end section -->
<section class="section-light">
    <div class="container">
    <h4 style="color: #fff;"><?= $for=='articles' || $for=='videos' || $for=='news'?$list->title:$list->news_title?></h4>
        <div class="row">
            <div class="col-md-12"> 
                <?php
                    if($for=='articles' || $for=='news' || $for =='nrc_news' || $for=='legal_news'|| $for=='hate_news' || $for=='genocide_news') {
                        ?>
                            <div class="clearfix"></div>
                            hii
                       

<div class="">
    <?php
    if(isset($images) && !empty($images)){
        foreach($images as $image){
            ?>
            <div class="mySlides fade">
              <img src="<?= base_url('uploads/'.$path.'/'.$image->news_image) ?>" style="width:100%">
            </div>
            <?php
        }
    }else{
        ?>
        <div class="mySlides fade">
          <img src="<?= base_url('uploads/thumbnail/'.$list->thumb_image) ?>" style="width:100%">
        </div>
        <?php
    }
    ?>
    
    
    <a class="prev" onclick="plusSlides(-1)"> &#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
</div>

<!-- END  SLIDER -->
 
                        <?php
                    }else{
                        ?>
                        <video width="320" height="240" controls>
                          <source src="<?= base_url('uploads/videos/'.$list->video) ?>" type="video/mp4">
                        </video>
                        <?php
                    }
                ?>
            </div>
            <div class="col-md-12"> <p style="text-align: justify; color: #fff;"> 
                <?= $for=='articles' || $for=='videos' || $for=='news'?$list->description:$list->news_description?>
            </div>
        </div>
    </div>
</section>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>